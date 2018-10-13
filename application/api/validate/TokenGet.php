<?php
/**
 * Created by PhpStorm.
 * User: Hasee
 * Date: 2018/10/13
 * Time: 下午 6:38
 */

namespace app\api\validate;


class TokenGet extends BaseValidate
{
    protected $rule = [
        'code'=>'require|isNotEmpty'
    ];

    protected $message = [
        'code'=>'验证失败'
    ];
}