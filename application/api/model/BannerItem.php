<?php
/**
 * Created by PhpStorm.
 * User: Hasee
 * Date: 2018/10/9
 * Time: 下午 10:01
 */

namespace app\api\model;
use think\Model;

class BannerItem extends Model
{
    public function img(){
        return $this->belongsTo('Image','img_id','id');
    }
}