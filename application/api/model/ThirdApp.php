<?php
/**
 * Created by PhpStorm.
 * User: Hasee
 * Date: 2018/11/11
 * Time: 下午 3:28
 */

namespace app\api\model;


use think\Model;

class ThirdApp extends BaseModel
{
    public static function check($ac,$se)
    {
        $app = self::where('app_id','=',$ac)
            ->where('app_secret','=',$se)
            ->find();
        return $app;
    }
}