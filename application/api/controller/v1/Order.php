<?php
/**
 * Created by PhpStorm.
 * User: Hasee
 * Date: 2018/10/17
 * Time: 下午 12:05
 */

namespace app\api\controller\v1;

use app\api\controller\BaseController;
use app\api\model\Order as OrderModel;
use app\api\service\Order as OrderService;
use app\api\service\Token as TokenService;
use app\api\validate\IDMustBePostiveInt;
use app\api\validate\OrderPlace;
use app\api\validate\PagingParameter;
use app\lib\exception\OrderException;
use app\lib\exception\SuccessMessage;


class Order extends BaseController
{
    //用户选择商品后，向api提交包含它所选择商品的相关信息
    //api在接受到信息后，需要检查订单相关商品的库存量
    //有库存，把订单数据存入数据库，下单成功，返回客户端信息，可以支付
    //支付接口
    //再次检测库存
    //微信支付接口
    //返回支付结果
    //成功 库存量检测
    //库存扣除或返回支付失败

    protected $beforeActionList = [
        'checkExclusiveScope' => ['only'=>'placeOrder'],
        'checkPrimaryScope'=>['only'=>'getDetail,getSummaryByUser'],
    ];

    //订单 列表
    public function getSummaryByUser($page = 1,$size = 15)
    {
        (new PagingParameter())->goCheck();
        $uid = TokenService::getCurrentUid();
        $pagingOrders = OrderModel::getSummaryByUser($uid,$page,$size);
        if ($pagingOrders->isEmpty()){
            return [
                'data'=>[],
                'current_page'=>$pagingOrders->getCurrentPage()
            ];
        }
        $data = $pagingOrders->hidden(['snap_items','snap_address','prepay_id'])
            ->toArray();
        return [
            'data'=>$data,
            'current_page'=>$pagingOrders->getCurrentPage()
        ];
    }
    
    //获取所有订单信息
    public function getSummary($page=1,$size=20)
    {
        (new PagingParameter())->goCheck();
        $pagingOrders = OrderModel::getSummaryByPage($page,$size);
        if ($pagingOrders->isEmpty()){
            return [
                'current_page'  =>  $pagingOrders->currentPage(),
                'data'  =>  []
            ];
        }
        $data = $pagingOrders->hidden(['snap_items','snap_address'])
            ->toArray();
        return [
            'current_page'  =>  $pagingOrders->currentPage(),
            'data'  =>  $data
        ];
    }
    
    //订单详情
    public function getDetail($id)
    {
        (new IDMustBePostiveInt())->goCheck();
        $orderDetail = OrderModel::get($id);
        if (!$orderDetail){
            throw new OrderException();
        }
        return $orderDetail->hidden(['prepay_id']);
    }

    //订单 创建
    public function placeOrder()
    {
        (new OrderPlace())->goCheck();
        $products = input('post.products/a');
        $uid = TokenService::getCurrentUid();

        $order = new OrderService();
        $status = $order->place($uid,$products);
        return $status;
    }

    public function delivery($id)
    {
        (new IDMustBePostiveInt())->goCheck();
        $order = new OrderService();
        $success = $order->delivery($id);
        if ($success){
            return new SuccessMessage();
        }
    }
}