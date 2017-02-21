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
        return Redis::expire($redisKey, 0);
    }

    public static function reset_rule()
    {
        $redisKey = config('app.redisKey.reply') . sprintf(self::KEY_KEYWORD, '*');
        $key = Redis::keys($redisKey);
        $data = array();
        foreach ($key as $val) {
            $st = Redis::del($val);
            if (!$st) {
                $data['delete'] = '1';
            }
        }

        $list = Rule::get();

        foreach ($list as $row) {
            $keywords = explode(',', $row->keyword);
            foreach ($keywords as $keyword) {
                if (empty($keyword)) {
                    continue;
                }
                if (!empty($row->bundle_data)) {
                    $mid = $row->bundle_data;
                } else {
                    $mid = $row->media_id;
                }
                $dbst = Rule::setRule($keyword, array("mt" => $row->media_type, "mid" => $mid));
                if (!$dbst) {
                    $data['add'] = '1';
                }
            }
        }

        return $data;
    }
}
