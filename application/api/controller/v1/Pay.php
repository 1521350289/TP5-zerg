<?php
/**
 * Created by PhpStorm.
 * User: Hasee
 * Date: 2018/10/21
 * Time: 下午 7:00
 */

namespace app\api\controller\v1;


use app\api\controller\BaseController;
use app\api\service\WxNotify;
use app\api\validate\IDMustBePostiveInt;
use Wx
use app\api\service\Pay as PayService;

class Pay extends BaseController
{
    protected $beforeActionList = [
        'checkExclusiveScope' => ['only'=>'placeOrder']
    ];

    public function getPreOrder($id='')
    {
        (new IDMustBePostiveInt())->goCheck();
        $pay = new PayService($id);
        return $pay->pay();
    }

    public function receiveNotify()
    {
        //检查库存量，超卖
        //更新订单status
        //减库存
        $notify = new WxNotify();
        $config = new \WxPayConfig();
        $notify->Handle($config);
    }
}