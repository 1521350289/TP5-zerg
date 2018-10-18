<?php
/**
 * Created by PhpStorm.
 * User: Hasee
 * Date: 2018/10/18
 * Time: 下午 1:34
 */

namespace app\lib\exception;


class OrderException extends BaseException
{
    public $code = 404;
    public $msg = '订单不存在，请检查ID';
    public $errorCode = 80000;
}