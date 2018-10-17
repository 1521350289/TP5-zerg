<?php
/**
 * Created by PhpStorm.
 * User: Hasee
 * Date: 2018/10/17
 * Time: 上午 11:26
 */

namespace app\lib\exception;


class ForbiddenException extends BaseException
{
    public $code = 403;
    public $msg = '权限不够';
    public $errorCode = 10001;
}