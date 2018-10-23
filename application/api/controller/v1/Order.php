<?php
/**
 * Created by PhpStorm.
 * User: Hasee
 * Date: 2018/10/17
 * Time: 下午 12:05
 */

namespace app\api\controller\v1;

use app\api\controller\BaseController;
use app\api\service\Token as TokenService;


use app\api\validate\OrderPlace;
use app\api\service\Order as OrderService;
use app\lib\enum\ScopeEnum;
use app\lib\exception\ForbiddenException;
use app\lib\exception\TokenException;
use think\Controller;

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
        'checkExclusiveScope' => ['only'=>'placeOrder']
    ];

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
}