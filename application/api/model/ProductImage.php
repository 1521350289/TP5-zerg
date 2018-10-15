<?php
/**
 * Created by PhpStorm.
 * User: Hasee
 * Date: 2018/10/15
 * Time: 下午 8:26
 */

namespace app\api\model;


class ProductImage extends BaseModel
{
    protected $hidden = ['img_id','delete_time','product_id'];

    public function imgUrl()
    {
        return $this->belongsTo('Image','img_id','id');
    }
}