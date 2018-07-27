# thinkphp5.1-weixinpay-wap

thinkphp5.1 微信支付 手机H5 支付

将根目录的weixinpay_wap.php拷贝到config目录

调用支付的控制器代码:
<pre>
    /**
     * 微信H5支付
     * @param $orderid  //订单号
     */
    public function h5wap($orderid){// 获取配置项
        Config::get('weixinpay_wap.');
        $order=array(
            'body' => '测试描述',// 商品描述（需要根据自己的业务修改）
            'total_fee' => 1,// 订单金额  以(分)为单位（需要根据自己的业务修改）
            'out_trade_no' => time().rand(1000,9999),// 订单号（需要根据自己的业务修改）
            'product_id' => '234242342',// 商品id（需要根据自己的业务修改）
            'trade_type' => 'MWEB',// JSAPI公众号支付
            );

        // 统一下单 获取prepay_id
        $redirect_url=urlencode('http://'.$_SERVER['HTTP_HOST'].'/index.php');  //支付完成后跳回地址
        $weixin = new \mangdin\weixinpaywap\WeixinH4Pay();
        $unified_order= $weixin->unifiedOrder($order);
        $this->redirect($unified_order['mweb_url']."&redirect_url=".$redirect_url);

    }
</pre>

回调控制器代码：
<pre>
    /**
     * notify_url接收页面
     */
    public function notify(){
        // 导入微信支付sdk
        $wxpay=new \mangdin\weixinpaywap\WeixinH4Pay();
        $result=$wxpay->notify();
        if ($result) {
            //完成支付后处理业务逻辑

        }
    }
</pre>

#注意，支付控制器代码一定要通过其他方法调用，不可以直接访问，否则会提示 “商家参数格式有误，请联系商家解决”
