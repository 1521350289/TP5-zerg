<?php
/**
 * Created by PhpStorm.
 * User: Hasee
 * Date: 2018/10/20
 * Time: 下午 2:48
 */

namespace app\api\model;


class Order extends BaseModel
{
    protected $hidden = ['user_id','delete_time','update_time'];
    protected $autoWriteTimestamp = true;
}