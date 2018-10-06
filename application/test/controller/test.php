<?php
/**
 * Created by PhpStorm.
 * User: Hasee
 * Date: 2018/10/5
 * Time: 上午 11:47
 */

namespace app\test\controller;


use think\Request;

class test
{
    public function test(Request $request){
        return 'hello,'.$request->param('name');
    }
}