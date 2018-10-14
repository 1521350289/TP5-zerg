<?php
/**
 * Created by PhpStorm.
 * User: Hasee
 * Date: 2018/10/14
 * Time: 下午 11:09
 */

namespace app\lib\exception;


class TokenException extends BaseException
{
    public $code = 401;
    public $msg = 'Token已经过期或无效Token';
    public $errorCode = 10001;
}