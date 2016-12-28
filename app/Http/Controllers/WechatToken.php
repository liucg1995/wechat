<?php

namespace Guo\Wechat\Http\Controllers;

use Illuminate\Support\Facades\Redis;
use Config;

class WechatToken
{
    public $redisKey;

    public function __construct()
    {
        $this->redisKey = config('app.redisKey.wechatToken');
    }

    public function save($id, $data, $lifeTime = 0)
    {
        Redis::HMSET($this->redisKey, array('expires_in' => $lifeTime + 2, 'access_token' => $data));
        Redis::EXPIRE($this->redisKey, $lifeTime);
    }

    public function fetch($id = 0)
    {
        $r = Redis::HGETALL($this->redisKey);
        if (!empty($r)) {
            return $r['access_token'];
        } else {
            return array();
        }
    }
    public function delete()
    {
        Redis::DEL($this->redisKey);
    }
}
