<?php
/**
 * Created by PhpStorm.
 * User: Hasee
 * Date: 2018/10/6
 * Time: 上午 12:17
 */

namespace app\api\validate;


use app\lib\exception\ParameterException;
use think\Request;
use think\Validate;

class BaseValidate extends Validate
{
    public function goCheck(){
        //获取http传入的参数
        //参数校验
        $request = Request::instance();
        $params = $request->param();
        $result = $this->check($params);
        if (!$result){
            //通用参数错误
            $e = new ParameterException();
            $e->msg = $this->error;
            throw $e;
        }else{
            return true;
        }
    }

    protected function isPositiveInteger($value,$field = '')
    {
        if (is_numeric($value)&&is_int($value + 0)&&($value+0) > 0){
            return true;
        }else{
            return false;
        }
    }


}