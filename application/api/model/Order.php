<?php
/**
 * Created by PhpStorm.
 * User: Hasee
 * Date: 2018/10/20
 * Time: 下午 2:48
 */

namespace app\api\model;


class Order extends BaseModel
{
    protected $hidden = ['user_id','delete_time','update_time'];
    protected $autoWriteTimestamp = true;

    public function getSnapItemAttr($value)
    {
        if (empty($value)){
            return null;
        }
        return json_decode($value);
    }

    //getAttr读取器
    public function getSnapAddressAttr($value)
    {
        if (empty($value)){
            return null;
        }
        return json_decode($value);
    }

    public static function getSummaryByUser($uid,$page=1,$size=15)
    {
        $pagingData=self::where('user_id','=',$uid)
            ->order('create_time desc')
            ->paginate($size,true,['page'=>$page]);
        return $pagingData;
    }

    public static function getSummaryByPage($page=1,$size=20)
    {
        $pagingData = self::order('create_time desc')
            ->paginate($size,true,['page'=>$page]);
        return $pagingData;
    }
}