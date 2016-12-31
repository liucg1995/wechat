<?php
/**
 * Created by PhpStorm.
 * User: we-te
 * Date: 2016/12/28
 * Time: 11:53
 */


return [
    /*
     *路由前缀
     */
    "prefix"=>"",
    /*
     * 模板继承的路径
     */
    'extends'=>'layouts.app',
    /*
     * 图片下载地址
     */
    'upload'=>'upload/images/',
    //地址为 public/upload/images  注意必须以/ 结尾

    'gameIndexArray' => array(
        '01' => '20160601',
        '02' => '20160701',
        '03' => '20160801',
        '04' => '20160901',
        '05' => '20161001',
        '06' => '20161101',
        '07' => '20161201',
        '08' => '20170101',
        '09' => '20170201',
        '10' => '20170301',
        '11' => '20170401',
        '12' => '20170501',
    ),

    'emotions' => array(
        "微笑",
        "撇嘴",
        "色",
        "发呆",
        "得意",
        "流泪",
        "害羞",
        "闭嘴",
        "睡",
        "大哭",
        "尴尬",
        "发怒",
        "调皮",
        "呲牙",
        "惊讶",
        "难过",
        "酷",
        "冷汗",
        "抓狂",
        "吐",
        "偷笑",
        "愉快",
        "白眼",
        "傲慢",
        "饥饿",
        "困",
        "惊恐",
        "流汗",
        "憨笑",
        "悠闲",
        "奋斗",
        "咒骂",
        "疑问",
        "嘘",
        "晕",
        "疯了",
        "衰",
        "骷髅",
        "敲打",
        "再见",
        "擦汗",
        "抠鼻",
        "鼓掌",
        "糗大了",
        "坏笑",
        "左哼哼",
        "右哼哼",
        "哈欠",
        "鄙视",
        "委屈",
        "快哭了",
        "阴险",
        "亲亲",
        "吓",
        "可怜",
        "菜刀",
        "西瓜",
        "啤酒",
        "篮球",
        "乒乓",
        "咖啡",
        "饭",
        "猪头",
        "玫瑰",
        "凋谢",
        "嘴唇",
        "爱心",
        "心碎",
        "蛋糕",
        "闪电",
        "炸弹",
        "刀",
        "足球",
        "瓢虫",
        "便便",
        "月亮",
        "太阳",
        "礼物",
        "拥抱",
        "强",
        "弱",
        "握手",
        "胜利",
        "抱拳",
        "勾引",
        "拳头",
        "差劲",
        "爱你",
        "NO",
        "OK",
        "爱情",
        "飞吻",
        "跳跳",
        "发抖",
        "怄火",
        "转圈",
        "磕头",
        "回头",
        "跳绳",
        "投降",
        "激动",
        "乱舞",
        "献吻",
        "左太极",
        "右太极"),
    'urls' => array(
        'base' => env('URL_BASE', 'http://yjwhadmintest.tonglingdi.cn'),
        'static' => env('URL_STATIC', 'http://bucket-test1440471735.oss-cn-hangzhou.aliyuncs.com'),
        'admin' => env('URL_ADMIN', 'http://yjwhadmintest.tonglingdi.cn')
    ),

    'redisKey' => array(
        'reply' => 'yjwhK', //回复关键词的前缀。后面跟md5后的关键词。比如yjwhK:xxxxxxx
        'wechatToken' => env('WECHAT_PREFIX', 'wechat:apptoken'),
        'wechatMenu' => 'wechat:menu',
        'KEY_WEIXIN_MEDIA' => 'wx:media:%s',
        'KEY_WEIXIN_MIXED' => 'wx:media_mixde:%s',
        'KEY_WEIXIN_MIXED_MULTI' => 'wx:media_mixde_multi:%s',
    ),

    'ruleId' => array(
        'follow' => 1, //关注回复
        'default' => 2, //默认回复
        'gain' => 3, //获取投票口令
        'command' => 4, //投票口令
    ),

    'mediaType' => array(
        'text' => 6,
        'command' => 7,
    ),

    'keyword' => array(
        'follow' => 'follow',
        'gain' => '投票口令',
    ),


    "options" => array(
        /*
         * Debug 模式，bool 值：true/false
         *
         * 当值为 false 时，所有的日志都不会记录
         */
        'debug' => true,

        /*
         * 使用 Laravel 的缓存系统
         */
        'use_laravel_cache' => true,

        /*
         * 账号基本信息，请从微信公众平台/开放平台获取
         */
        'app_id' => env('WECHAT_APPID', 'your-app-id'),         // AppID
        'secret' => env('WECHAT_SECRET', 'your-app-secret'),     // AppSecret
        'token' => env('WECHAT_TOKEN', 'your-token'),          // Token
        'aes_key' => env('WECHAT_AES_KEY', ''),                    // EncodingAESKey

        /*
         * 日志配置
         *
         * level: 日志级别，可选为：
         *                 debug/info/notice/warning/error/critical/alert/emergency
         * file：日志文件位置(绝对路径!!!)，要求可写权限
         */
        'log' => [
            'level' => env('WECHAT_LOG_LEVEL', 'debug'),
            'file' => env('WECHAT_LOG_FILE', storage_path('logs/wechat.log')),
        ],
    )

    /*
     * OAuth 配置
     *
     * scopes：公众平台（snsapi_userinfo / snsapi_base），开放平台：snsapi_login
     * callback：OAuth授权完成后的回调页地址(如果使用中间件，则随便填写。。。)
     */
    // 'oauth' => [
    //     'scopes'   => array_map('trim', explode(',', env('WECHAT_OAUTH_SCOPES', 'snsapi_userinfo'))),
    //     'callback' => env('WECHAT_OAUTH_CALLBACK', '/examples/oauth_callback.php'),
    // ],

    /*
     * 微信支付
     */
    // 'payment' => [
    //     'merchant_id'        => env('WECHAT_PAYMENT_MERCHANT_ID', 'your-mch-id'),
    //     'key'                => env('WECHAT_PAYMENT_KEY', 'key-for-signature'),
    //     'cert_path'          => env('WECHAT_PAYMENT_CERT_PATH', 'path/to/your/cert.pem'), // XXX: 绝对路径！！！！
    //     'key_path'           => env('WECHAT_PAYMENT_KEY_PATH', 'path/to/your/key'),      // XXX: 绝对路径！！！！
    //     // 'device_info'     => env('WECHAT_PAYMENT_DEVICE_INFO', ''),
    //     // 'sub_app_id'      => env('WECHAT_PAYMENT_SUB_APP_ID', ''),
    //     // 'sub_merchant_id' => env('WECHAT_PAYMENT_SUB_MERCHANT_ID', ''),
    //     // ...
    // ],

    /*
     * 开发模式下的免授权模拟授权用户资料
     *
     * 当 enable_mock 为 true 则会启用模拟微信授权，用于开发时使用，开发完成请删除或者改为 false 即可
     */
    // 'enable_mock' => env('WECHAT_ENABLE_MOCK', true),
    // 'mock_user' => [
    //     "openid" =>"odh7zsgI75iT8FRh0fGlSojc9PWM",
    //     // 以下字段为 scope 为 snsapi_userinfo 时需要
    //     "nickname" => "overtrue",
    //     "sex" =>"1",
    //     "province" =>"北京",
    //     "city" =>"北京",
    //     "country" =>"中国",
    //     "headimgurl" => "http://wx.qlogo.cn/mmopen/C2rEUskXQiblFYMUl9O0G05Q6pKibg7V1WpHX6CIQaic824apriabJw4r6EWxziaSt5BATrlbx1GVzwW2qjUCqtYpDvIJLjKgP1ug/0",
    // ],
];
