<?php
/**
 * Created by PhpStorm.
 * User: Hasee
 * Date: 2018/10/5
 * Time: 下午 9:45
 */

namespace app\api\validate;


use think\Validate;

class TestValidate extends Validate
{
    protected $rule = [
        'email'=>'email',
        'id'=>'integer'
    ];
}