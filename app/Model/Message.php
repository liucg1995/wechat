<?php
/**
 * Created by PhpStorm.
 * User: mxq
 * Date: 16-7-15
 * Time: 下午5:07
 */
namespace Guo\Wechat\Model;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    const CREATED_AT = 'created';
    public $timestamps = false;

    protected
        $table = 'message';
}