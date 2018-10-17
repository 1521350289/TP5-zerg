<?php
/**
 * Created by PhpStorm.
 * User: Hasee
 * Date: 2018/10/17
 * Time: 下午 2:37
 */

namespace app\api\controller;


use think\Controller;
use app\api\service\Token as TokenService;

class BaseController extends Controller
{
    protected function checkPrimaryScope()
    {
        TokenService::needPrimaryScope();
    }

    protected function checkExclusiveScope()
    {
        TokenService::needExclusiveScope();
    }
}