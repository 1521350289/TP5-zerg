<?php
/**
 * Created by PhpStorm.
 * User: Hasee
 * Date: 2018/11/11
 * Time: 下午 11:25
 */

namespace app\api\behavior;

use think\Response;

class CORS
{
    public function appInit(&$params)
    {
        header('Access-Control-Allow-Origin: *');
        header("Access-Control-Allow-Headers: token,Origin, X-Requested-With, Content-Type, Accept");
        header('Access-Control-Allow-Methods: POST,GET');
        if(request()->isOptions()){
            exit();
        }
    }
}