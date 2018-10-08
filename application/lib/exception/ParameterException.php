<?php
/**
 * Created by PhpStorm.
 * User: Hasee
 * Date: 2018/10/8
 * Time: 下午 2:43
 */

namespace app\lib\exception;


class ParameterException extends BaseException
{
    public $code = 400;
    public $msg = '参数错误';
    public $errorCode = 10000;
}