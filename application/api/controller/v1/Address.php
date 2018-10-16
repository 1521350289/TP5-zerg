<?php
/**
 * Created by PhpStorm.
 * User: Hasee
 * Date: 2018/10/16
 * Time: 下午 4:22
 */

namespace app\api\controller\v1;


use app\api\model\User;
use app\api\validate\AddressNew;
use app\api\service\Token as TokenService;
use app\api\model\User as UserModel;
use app\lib\exception\SuccessMessage;
use app\lib\exception\UserException;

class Address
{
    public function createOrUpdateAddress()
    {
        $validate = new AddressNew();
        $validate->goCheck();
        //根据token获取用户uid
        //根据uid查找用户数据，判断用户是否存在
        //获取用户从客户端提交的地址信息
        //判断添加或更新
        $uid = TokenService::getCurrentUid();
        $user = UserModel::get($uid);
        if (!$user){
            throw new UserException();
        }
        $dataArray = $validate->getDataByRule(input('post.'));
        $userAddress = $user->address;
        if (!$userAddress){
            $user->address()->save($dataArray);
        }else{
            $user->address->save($dataArray);
        }
        return json(new SuccessMessage(),201);
    }
}