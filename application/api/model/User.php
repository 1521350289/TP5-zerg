<?php
/**
 * Created by PhpStorm.
 * User: Hasee
 * Date: 2018/10/13
 * Time: 下午 6:49
 */

namespace app\api\model;


class User extends BaseModel
{
    public static function getByOpenID($openid)
    {
        $user = self::where('openid','=',$openid)
            ->find();
        return $user;
    }
}