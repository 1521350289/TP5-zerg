<?php
/**
 * Created by PhpStorm.
 * User: Hasee
 * Date: 2018/10/16
 * Time: 下午 11:39
 */

namespace app\api\model;


class UserAddress extends BaseModel
{
    protected $hidden = ['id','delete_time','user_id'];
}