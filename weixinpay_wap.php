<?php
/**
 * Created by PhpStorm.
 * User: wangyang
 * Date: 2018/7/27
 * Time: 下午9:16
 */

return[
    'APPID'         =>  "",       //对应微信公众号APPID
    'MCHID'         =>  "",       //微信支付商户号
    'NOTIFY_URL'    =>  "http://".$_SERVER['HTTP_HOST']."/index.php/Home/Alipay/returnurl",     //微信支付回调地址
    'KEY'           =>  ""      //微信支付商户KEY

];