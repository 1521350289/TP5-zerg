<?php
/**
 * Created by PhpStorm.
 * User: Hasee
 * Date: 2018/10/11
 * Time: 下午 1:27
 */

namespace app\api\model;


use app\lib\exception\ProductException;

class Product extends BaseModel
{
    protected $hidden = [
        'delete_time',
        'main_img_id',
        'pivot','from',
        'categort_id',
        'create_time',
        'update_time'
    ];

    public function getMainImgUrlAttr($value,$data)
    {
        return $this->prefixImgUrl($value,$data);
    }

    public static function getMostRecent($count)
    {
        $products = self::limit($count)
            ->order('create_time desc')
            ->select();
        if ($products->isEmpty()){
            throw new ProductException();
        }
        return $products;
    }

    public static function getProductsByCategoryID($categortID)
    {
        $products = self::where('category_id','=',$categortID)
            ->select();
        return $products;
    }
}