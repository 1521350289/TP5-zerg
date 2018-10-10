<?php
/**
 * Created by PhpStorm.
 * User: Hasee
 * Date: 2018/10/9
 * Time: 下午 10:01
 */

namespace app\api\model;

class BannerItem extends BaseModel
{
    protected $hidden = ['id','img_id','banner_id','delete_time','update_time'];
    public function img(){
        return $this->belongsTo('Image','img_id','id');
    }
}