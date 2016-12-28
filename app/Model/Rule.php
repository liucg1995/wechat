<?php
/**
 * Created by PhpStorm.
 * User: mxq
 * Date: 16-7-15
 * Time: 下午5:07.
 */

namespace Guo\Wechat\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Redis;

class Rule extends Model
{
    /**
     * @name string KEY_KEYWORD Holds the name of the reids key use in this model
     */
    const KEY_KEYWORD = ':%s';

    public static function getRule($keyword)
    {
        $redisKey = config('app.redisKey.reply') . sprintf(self::KEY_KEYWORD, md5($keyword));
        return Redis::HGETALL($redisKey);
    }

    public static function setRule($keyword, array $data = [])
    {
        $redisKey = config('app.redisKey.reply') . sprintf(self::KEY_KEYWORD, md5($keyword));
        return Redis::hmset($redisKey, $data);
    }

    public static function delRule($keyword)
    {
        $redisKey = config('app.redisKey.reply') . sprintf(self::KEY_KEYWORD, md5($keyword));
        return Redis::expire($redisKey, 1);
    }
}
