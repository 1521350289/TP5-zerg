<?php
/**
 * Created by PhpStorm.
 * User: Hasee
 * Date: 2018/10/7
 * Time: 下午 12:10
 */

namespace app\lib\exception;


use think\Exception;

class BaseException extends Exception
{
    public $code = 400;       //http状态码
    public $msg = '参数错误';        //错误信息
    public $errorCode = 10000;  //自定义错误码
}