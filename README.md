# Laravel 5.3 Vendor Package Example
### An example on how-to create a vendor package for Composer

"Packages are the primary way of adding functionality to Laravel. Packages might be anything from a great way to work with dates like Carbon, or an entire BDD testing framework like Behat."
https://laravel.com/docs/master/packages

Use this package to help develop new packages to share among your projects -- or the world.
https://github.com/Askedio/Laravel-Vendor-Package
# Installation
1. Clone this repo.

3. Add to https://packagist.org.
4. Using your details, install with commands below.

# Installation

composer require guo/wechat:dev-master

## Register with config/app.php
Register the service providers to enable the package:
```
Overtrue\LaravelWechat\ServiceProvider::class,
Guo\Wechat\Providers\AppServiceProvider::class,
Collective\Html\HtmlServiceProvider::class,
```
```
'Form' => Collective\Html\FormFacade::class,
'Html' => Collective\Html\HtmlFacade::class,
```

##  执行php命令
php artisan  vendor:publish

## Update  app\Http\Middleware\VerifyCsrfToken.php
```
 "wechat/materialadd",'wechat/upload','media/upload',"/api/wechat"
```

