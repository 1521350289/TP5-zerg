<?php
/**
 * Created by PhpStorm.
 * User: Hasee
 * Date: 2018/10/11
 * Time: 下午 2:50
 */

namespace app\lib\exception;


class ThemeException extends BaseException
{
    public $code = 404;
    public $msg = '指定主题不存在，请检查主题ID';
    public $errorCode = 30000;
}