<?php
/**
 * Created by PhpStorm.
 * User: Hasee
 * Date: 2018/10/6
 * Time: 下午 7:31
 */

namespace app\api\model;


use think\Db;
use think\Model;

class Banner extends Model
{
    /*public function items()
    {
        return $this->hasMany('BannerItem','banner_id','id');
    }*/
    protected $table = 'category';
    public static function getBannerByID($id)
    {
        $result = Db::table('banner_item')
            //->fetchSql()
            ->where(function ($query) use ($id){
                $query->where('banner_id','=',$id);
            })
            ->select();
        return $result;
    }
}