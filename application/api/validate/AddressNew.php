<?php
/**
 * Created by PhpStorm.
 * User: Hasee
 * Date: 2018/10/16
 * Time: 下午 6:47
 */

namespace app\api\validate;


class AddressNew extends BaseValidate
{
    protected $rule = [
        'name' => 'require|isNotEmpty',
        'mobile' => 'require|isMobile',
        'province' =>'require|isNotEmpty',
        'city' => 'require|isNotEmpty',
        'county' => 'require|isNotEmpty',
        'detail' => 'require|isNotEmpty'
    ];
}