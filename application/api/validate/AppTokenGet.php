<?php
/**
 * Created by PhpStorm.
 * User: Hasee
 * Date: 2018/11/11
 * Time: 下午 3:12
 */

namespace app\api\validate;


class AppTokenGet extends BaseValidate
{
    protected $rule = [
        'ac'    =>  'require|isNotEmpty',
        'se'    =>  'require|isNotEmpty'
    ];
}