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
    public function topicImg()
    {
        return $this->belongsTo('Image','topic_img_id','id');
    }

    public function headImg()
    {
        return $this->belongsTo('Image','head_img_id','id');
    }
}