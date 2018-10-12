<?php
/**
 * Created by PhpStorm.
 * User: Hasee
 * Date: 2018/10/12
 * Time: 上午 2:32
 */

namespace app\api\validate;


class Count extends BaseValidate
{
    protected $rule = [
        'count' => 'isPositiveInteger|between:1,15'
    ];

}