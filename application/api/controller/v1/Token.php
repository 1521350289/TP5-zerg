<?php
/**
 * Created by PhpStorm.
 * User: Hasee
 * Date: 2018/10/13
 * Time: 下午 6:37
 */

namespace app\api\controller\v1;


use app\api\service\UserToken;
use app\api\validate\TokenGet;

class Token
{
    public function getToken($code = '')
    {
        (new TokenGet())->goCheck($code);
        $ut = new UserToken($code);
        $token = $ut->get();
        return ['token'=>$token];
    }
}