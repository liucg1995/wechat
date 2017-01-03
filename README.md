# Laravel 5.3 微信后台管理
### 微信后台管理工具


# Installation

composer require guo/wechat:dev-master

## Register with config/app.php
Register the service providers to enable the package:
```
Overtrue\LaravelWechat\ServiceProvider::class,
Guo\Wechat\Providers\AppServiceProvider::class,
Collective\Html\HtmlServiceProvider::class,
```
Register the service aliases to enable the package:
```
'Form' => Collective\Html\FormFacade::class,
'Html' => Collective\Html\HtmlFacade::class,
```

##  执行php命令
```
php artisan  vendor:publish --tag=admin-wechat
```

## Update  app\Http\Middleware\VerifyCsrfToken.php
```
 "media",'wechat/upload','media/upload',"/api/wechat"
```
## Update  app\Newuser.php
```
设置用户表的信息
```

## 微信所需链接
```
/api/wechat     微信响应接口
/media          素材管理
/wechat/menu    自定义菜单
/mass/test      测试群发
/mass/index     正式群发
/message        粉丝消息管理 
/qrcode         生成二维码

```

