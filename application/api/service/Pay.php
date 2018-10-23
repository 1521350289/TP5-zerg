<?php
/**
 * Created by PhpStorm.
 * User: Hasee
 * Date: 2018/10/21
 * Time: 下午 7:09
 */

namespace app\api\service;

use app\api\service\Order as OrderService;
use app\api\model\Order as OrderModel;
use app\lib\enum\OrderStatusEnum;
use app\lib\exception\OrderException;
use app\lib\exception\TokenException;
use think\Exception;
use think\Loader;
use think\Log;

//extend/WxPay/WxPay.Api.php
Loader::import('WxPay.WxPay',EXTEND_PATH,'.Api.php');

class Pay
{
    private $orderID;
    private $orderNO;

    public function __construct($orderID)
    {
        if (!$orderID){
            throw  new  Exception('订单号不能为NULL');
        }
        $this->orderID = $orderID;
    }

    public function pay()
    {
        //订单号检测
        //订单与目前用户匹配检测
        //订单未支付状态检测
        //库存量检测
        $this->checkOrderValid();
        $orderService = new OrderService();
        //库存检测
        $status = $orderService->checkOrderStock($this->orderID);
        if (!$status['pass']){
            return $status;
        }
        return $this->makeWxPreOrder($status['orderPrice']);
    }

    //统一下单
    private function makeWxPreOrder($totalPrice)
    {
        //获取token对应value
        $openid = Token::getCurrentTokenVar('openid');
        if (!$openid){
            throw new TokenException();
        }
        $wxOrderDate = new \WxPayUnifiedOrder();
        $wxOrderDate->SetOut_trade_no($this->orderNO);
        $wxOrderDate->SetTrade_type('JSAPI');
        $wxOrderDate->SetTotal_fee($totalPrice*100);
        $wxOrderDate->SetBody('零食商贩');
        $wxOrderDate->SetOpenid($openid);
        $wxOrderDate->SetNotify_url(config('secure.pay_back_url'));
        return $this->getPaySignature($wxOrderDate);
    }

    private function getPaySignature($wxOrderDate)
    {
        $config = new WxConfig();
        $wxOrder = \WxPayApi::unifiedOrder($config,$wxOrderDate);
        if ($wxOrder['return_code']!='SUCCESS'||$wxOrder['result_code']!='SUCCESS'){
            Log::record($wxOrder,'error');
            Log::record('获取预支付订单失败','error');
        }
        echo 123;
        return null;
    }

    private function checkOrderValid()
    {
        $order = OrderModel::where('id','=',$this->orderID)
            ->find();
        if (!$order){
            throw new OrderException();
        }
        if (!Token::isValiOperate($order->user_id)){
            throw new TokenException([
                'msg'=>'订单与用户不匹配',
                'errorCode'=> 10003
            ]);
        }
        if ($order->status != OrderStatusEnum::UNPAID){
            throw new OrderException([
                'msg' => '订单已支付',
                'errorCode' => 80003,
                'code' => 400
            ]);
        }
        $this->orderNO = $order->order_no;
        return true;
    }
}