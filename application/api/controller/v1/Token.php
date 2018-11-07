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
use app\lib\exception\ParameterException;
use app\api\service\Token as TokenService;

class Token
{
    public function getToken($code = '')
    {
        (new TokenGet())->goCheck($code);
        $ut = new UserToken($code);
        $token = $ut->get();
        return ['token'=>$token];
    }

    //校验token
    public function verifyToken($token='')
    {
        if (!$token){
            throw new ParameterException([
                'token不允许为空'
            ]);
        }
        $valid = TokenService::verifyToken($token);
        return ['isValid'=>$valid];
    }
}