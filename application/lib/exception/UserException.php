<?php
/**
 * Created by PhpStorm.
 * User: Hasee
 * Date: 2018/10/16
 * Time: 下午 10:59
 */

namespace app\lib\exception;


class UserException extends BaseException
{
    public $code = 404;
    public $msg = '用户不存在';
    public $errorCode = 60000;
}