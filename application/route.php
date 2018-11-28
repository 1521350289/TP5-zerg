<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

use think\Route;
//php think optimize:schema缓存数据库表字段  php think optimize:route 缓存路由
Route::group('api/:version/token',function (){
    Route::post('/user','api/:version.Token/getToken');
    Route::post('/verify','api/:version.Token/verifyToken');
    Route::post('/app','api/:version.Token/getAppToken');
});


Route::get('api/:version/banner/:id','api/:version.Banner/getBanner');

Route::get('api/:version/theme','api/:version.Theme/getSimpleList');
Route::get('api/:version/theme/:id','api/:version.Theme/getComplexOne',[],['id'=>'\d+']);
Route::group('api/:version/product',function (){
    Route::get('/recent','api/:version.product/getRecent');
    Route::get('/by_category','api/:version.product/getAllInCategory');
    Route::get('/:id','api/:version.product/getOne');
});


Route::get('api/:version/category/all','api/:version.Category/getAllCategories');

//地址 添加 更新
Route::post('api/:version/address','api/:version.Address/createOrUpdateAddress');
Route::get('api/:version/address','api/:version.Address/getUserAddress');

Route::post('api/:version/order','api/:version.order/placeOrder');
Route::get('api/:version/order/by_user','api/:version.order/getSummaryByUser');
Route::get('api/:version/order/paginate','api/:version.order/getSummary');
Route::post('api/:version/order/:id','api/:version.order/getDetail',[],['id'=>'\d+']);
Route::put('api/:version/order/delivery','api/:version.Order/delivery');

Route::post('api/:version/pay/pre_order','api/:version.Pay/getPreOrder');
Route::post('api/:version/pay/notify','api/:version.Pay/receiveNotify');
