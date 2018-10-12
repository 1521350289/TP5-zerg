<?php
/**
 * Created by PhpStorm.
 * User: Hasee
 * Date: 2018/10/12
 * Time: 下午 12:19
 */

namespace app\api\model;


class Category extends BaseModel
{
    protected $hidden = ['delete_time','update_time','create_time'];
    public function img()
    {
        return $this->belongsTo('Image','topic_img_id','id');
    }
}