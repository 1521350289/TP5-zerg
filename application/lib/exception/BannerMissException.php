<?php
/**
 * Created by PhpStorm.
 * User: Hasee
 * Date: 2018/10/7
 * Time: 下午 12:14
 */

namespace app\lib\exception;

//BannerMiss时的错误信息
class BannerMissException extends BaseException
{
    public $code = 404;
    public $msg = '请求的Banner不存在';
    public $errorCode = 40000;
}