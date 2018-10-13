<?php
/**
 * Created by PhpStorm.
 * User: Hasee
 * Date: 2018/10/13
 * Time: 下午 8:28
 */

namespace app\lib\exception;


class WeChatException extends BaseException
{
    public $code = 404;
    public $msg = '微信服务器接口调用失败';
    public $errorCode = 999;
}