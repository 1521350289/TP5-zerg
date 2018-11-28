<?php

return [
    'app_id' => 'wxe185ce61985da087',
    'app_secret'=>'8b379d8a258ff19815bfbef653979d0a',
    'login_url'=>"https://api.weixin.qq.com/sns/jscode2session?"."appid=%s&secret=%s&js_code=%s&grant_type=authorization_code",
    //微信获取access_token的url地址
    'access_token_url' => "https://api.weixin.qq.com/cgi-bin/token?" . "grant_type=client_credential&appid=%s&secret=%s",
];