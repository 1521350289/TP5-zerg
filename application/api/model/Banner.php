<?php
/**
 * Created by PhpStorm.
 * User: Hasee
 * Date: 2018/10/6
 * Time: 下午 7:31
 */

namespace app\api\model;


class Banner extends BaseModel
{
    protected $hidden = ['delete_time','update_time'];
    public function items(){
        return $this->hasMany('BannerItem','banner_id','id');
    }

    public static function getBannerByID($id)
    {
        $banner = self::with(['items','items.img'])->find($id);
        return $banner;
    }
}