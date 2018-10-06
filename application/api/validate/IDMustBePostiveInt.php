<?php
/**
 * Created by PhpStorm.
 * User: Hasee
 * Date: 2018/10/5
 * Time: 下午 10:19
 */

namespace app\api\validate;


use think\Validate;

class IDMustBePostiveInt extends BaseValidate
{
    protected $rule = [
        'id'=>'require|integer'
    ];
}