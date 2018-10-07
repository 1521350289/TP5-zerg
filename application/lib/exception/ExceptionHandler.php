<?php
/**
 * Created by PhpStorm.
 * User: Hasee
 * Date: 2018/10/7
 * Time: 下午 12:07
 */

namespace app\lib\exception;


use think\exception\Handle;
use think\Request;

class ExceptionHandler extends Handle
{
    private $code;
    private $msg;
    private $errorCode;
    /**
     * 传入HttpException参数给app\lib\exception\ExceptionHandle::render()
     * 方法（本应传入think\Exception类型的参数），结果异常信息不能自动转换成正确的信息，
     * 查看think\Exception 和 HttpException 两个class类，都同时继承了\exception基类,
     * 也就是think\Exception 和 HttpException 两个class类并没有继承关系，二者互不关联，
     * 所以参数类型不能识别，将app\lib\exception\ExceptionHandle::render()的参数改为以基类的方式参数传入
     */
    public function render(\Exception $e)
    {
        if ($e instanceof BaseException){
            //自定义异常
            $this->code = $e->code;
            $this->msg = $e->msg;
            $this->errorCode = $e->errorCode;
        }else{
            //非自定义异常
            $this->code = 500;
            $this->msg = '服务器内部错误';
            $this->errorCode = 999;
        }
        $request = Request::instance();
        $result = [
            'msg' => $this->msg,
            'error_code' => $this->errorCode,
            'request_url' => $request->url()
        ];
        return json($result,$this->code);
    }
}