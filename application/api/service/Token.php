<?php
/**
 * Created by PhpStorm.
 * User: Hasee
 * Date: 2018/10/14
 * Time: 下午 10:50
 */

namespace app\api\service;


class Token
{
    public static function generateToken()
    {
        $randChars = getRandChar(32);
        $timestamp = $_SERVER['REQUEST_TIME_FLOAT'];
        //salt
        $salt = config('secure.token_salt');
        return md5($randChars.$timestamp.$salt);
    }
}