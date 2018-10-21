<?php
/**
 * Created by PhpStorm.
 * User: Hasee
 * Date: 2018/10/21
 * Time: 下午 7:42
 */

namespace app\lib\enum;


class OrderStatusEnum
{
    //待支付
    const UNPAID = 1;

    //已支付
    const PAID = 2;

    //已发货
    const DELIVERED = 3;

    //已支付但库存不足
    const PAID_BUT_OUT_OF = 4;
}