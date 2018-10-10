<?php

namespace app\api\model;

use think\Model;

class BaseModel extends Model
{
    //读取器：get字段名Attr
    /*public function getUrlAttr($value,$data)  //$value:"/banner-4a.png"  $data:image表所有字段数据
    {
        //from为1是服务器图片
        $finalUrl = $value;
        if ($data['from'] == 1){
            return config('setting.img_prefix').$finalUrl;
        }else{
            return $finalUrl;
        }
    }*/
    public function prefixImgUrl($value,$data)  //$value:"/banner-4a.png"  $data:image表所有字段数据
    {
        //from为1是服务器图片
        $finalUrl = $value;
        if ($data['from'] == 1){
            return config('setting.img_prefix').$finalUrl;
        }else{
            return $finalUrl;
        }
    }
}
