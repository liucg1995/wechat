<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Newuser extends Authenticatable
{
    /**
     * @var string
     *当前用户表表名
     */
    static $tables="openid";
    /**
     * @var string
     *当前用户表外键  openid 字段
     */
    static $key = "openid";
    /**
     * @var string
     *当前用户表   昵称 字段
     */
    static $nickname = "nickname";

    protected  $table="openid";

}
