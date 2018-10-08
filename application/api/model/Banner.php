<?php
/**
 * Created by PhpStorm.
 * User: Hasee
 * Date: 2018/10/6
 * Time: 下午 7:31
 */

namespace app\api\model;


use think\Db;

class Banner
{
    public static function getBannerByID($id){
        $result = Db::table('banner_item')->where('banner_id','=',$id)
            ->select();
        var_dump($result);die;
    }
}