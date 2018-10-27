<?php
/**
 * Created by PhpStorm.
 * User: Hasee
 * Date: 2018/10/27
 * Time: 下午 7:35
 */

namespace app\api\validate;


class PagingParameter extends BaseValidate
{
    protected $rule = [
        'page'=>'isPositiveInteger',
        'size'=>'isPositiveInteger'
    ];

    protected $message = [
        'page' => '分页参数必须是正整数',
        'size' => '分页参数必须是正整数'
    ];
}