<?php
/**
 * Created by PhpStorm.
 * User: Hasee
 * Date: 2018/10/5
 * Time: 下午 5:57
 */

namespace app\api\controller\v1;


use app\api\validate\IDMustBePostiveInt;
use think\Validate;

class Banner
{
    /**
     * 获取指定id的banner信息
     * @url /banner/:id
     * @http GET
     * @id banner的id号
     */
    public function getBanner($id)
    {
        /*$validate = new Validate([
            'name'=>'require|max:10',
            'email'=>'email'
        ]);*/
        (new IDMustBePostiveInt())->goCheck();
        //$result = $validate->check($id);
        /*if (!$result){
            echo $validate->getError();
        }*/
        //独立验证
        //验证器
    }
}