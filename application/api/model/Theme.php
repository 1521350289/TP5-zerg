<?php
/**
 * Created by PhpStorm.
 * User: Hasee
 * Date: 2018/10/11
 * Time: 下午 1:28
 */

namespace app\api\model;


class Theme extends BaseModel
{
    protected $hidden = ['delete_time','update_time','topic_img_id','head_img_id'];

    public function topicImg()
    {
        return $this->belongsTo('Image','topic_img_id','id');
    }

    public function headImg()
    {
        return $this->belongsTo('Image','head_img_id','id');
    }
}