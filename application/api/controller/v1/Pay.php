<?php
/**
 * Created by PhpStorm.
 * User: Hasee
 * Date: 2018/10/21
 * Time: 下午 7:00
 */

namespace app\api\controller\v1;


use app\api\controller\BaseController;
use app\api\validate\IDMustBePostiveInt;

class Pay extends BaseController
{
    protected $beforeActionList = [
        'checkExclusiveScope' => ['only'=>'placeOrder']
    ];

    public function getPreOrder($id='')
    {
        (new IDMustBePostiveInt())->goCheck();
    }
}