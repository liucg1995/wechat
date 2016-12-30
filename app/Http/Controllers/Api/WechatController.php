<?php

namespace  Guo\Wechat\Http\Controllers\Api;

use Guo\Wechat\Model\Rule;
use Guo\Wechat\Model\Media;
use App\Http\Controllers\Controller;
use Exception;
use Guo\Wechat\Model\Message;
use EasyWeChat\Foundation\Application;
use Guo\Wechat\Model\RuleSpecial;
use Illuminate\Support\Facades\Log;
use DB;
use EasyWeChat\Message\News;
use EasyWeChat\Message\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

define('MEDIA_TYPE_MIXED', 1);
define('MEDIA_TYPE_MIXED_MULTI', 2);
define('MEDIA_TYPE_IMAGE', 3);
define('MEDIA_TYPE_AUDIO', 4);
define('MEDIA_TYPE_VIDEO', 5);
define('MEDIA_TYPE_TEXT', 6);

class WechatController extends Controller
{

    /**
     * // Media type
     * define('MEDIA_TYPE_MIXED',          1);
     * define('MEDIA_TYPE_MIXED_MULTI',    2);
     * define('MEDIA_TYPE_IMAGE',          3);
     * define('MEDIA_TYPE_AUDIO',          4);
     * define('MEDIA_TYPE_VIDEO',          5);
     * define('MEDIA_TYPE_TEXT',           6);
     * define('MEDIA_TYPE_COMMAND',        7);.
     */
    public $m; //上行消息
    public $uid = 0; //粉丝uid
    public $gameIndex; //游戏期数
    public $r = 'Whoops, that was a mistake'; //回复消息
    public $wechat; //微信接口实例
    public $poster = '2016-11-01'; //redis过期时间
    public $key;

    public function __construct()
    {
        header("Content-type: text/html; charset=utf-8");
        $this->gameIndex = date('Ym01', time());
        $this->keyFollow = config('wxconfig.keyword.follow');
        $this->mediaTypeCommand = config('wxconfig.mediaType.command');

        $this->keyFollow = config('wxconfig.keyword.follow');

        //创建微信实例,并且用自己的缓存token方式
        $this->wechat = new Application(config('wxconfig.options'));
    }

    /**
     * 处理微信的请求消息.
     *
     * @return string
     */
    public function api()
    {
        //处理消息
        $this->wechat->server->setMessageHandler(function ($m) {
            $this->m = $m;
            Log::info($m);

            if ($m->Event != 'unsubscribe' && $m->Event != 'LOCATION' && $m->Event != 'VIEW' && $m->Event != 'TEMPLATESENDJOBFINISH') {
                //存上行消息
                $msg = new Message();
                $msg->from_user_name = $m->FromUserName;
                $msg->to_user_name = $m->ToUserName;
                $msg->create_time = $m->CreateTime;
                $msg->msg_type = $m->MsgType;
//                $msg->msg_id = isset($m->MsgId) ? $m->MsgId : 0;
                $msg->content = isset($m->Content) ? $m->Content : '';
                $msg->pic_url = isset($m->PicUrl) ? $m->PicUrl : '';
//                $msg->location_x = isset($m->Location_X) ? $m->Location_X : '';
//                $msg->location_x = isset($m->Location_Y) ? $m->Location_Y : '';
//                $msg->scale = isset($m->Scale) ? $m->Scale : '';
                $msg->label = isset($m->Label) ? $m->Label : '';
                $msg->title = isset($m->Title) ? $m->Title : '';
                $msg->description = isset($m->Description) ? $m->Description : '';
                $msg->url = isset($m->Url) ? $m->Url : '';
                $msg->media_id = isset($m->MediaId) ? $m->MediaId : '';
                $msg->thumb_media_id = $m->ThumbMediaId;
                $msg->event = $m->Event;
                $msg->event_key = $m->EventKey;
                $msg->save();
            }

            //从上行消息中提取关键词
            $key = '';
            switch ($m->MsgType) {
                case 'text':
                    $key = $m->Content;

                    break;
                case 'event':
                    switch ($m->Event) {
                        case 'CLICK':
                            $key = $m->EventKey;
                            break;
                        case 'subscribe'://关注事件
                            UserSns::where('openid', $m->FromUserName)->update(['status' => 0]);
                            break;
                        case 'unsubscribe'://取消关注事件
                            UserSns::where('openid', $m->FromUserName)->update(['status' => 1]);
                            break;
                        case 'SCAN':
                    }
                    break;
            }
            $this->key = $key;
            Log::info($this->key);

//            //帮用户生成本站用户数据
//            if (!$this->reg()) {
//                return 'whops';
//            }

            //判断关注默认回复的关键词
            if ($m->Event == 'subscribe' && empty($m->EventKey)) {
                $this->key = $this->keyFollow;
            }

            //事件key会抽风夹带类似这种的 last_trade_no_4009012001201605306519754434
            if (strpos($m->EventKey, 'last_trade_no') === 0) {
                $this->key = $this->keyFollow;
            }

            //根据关键词处理回复
            $res = FALSE;
            if (!empty($this->key)) {
                $this->r = $this->returnReply();
            } else {
                $this->r = '';
            }

            //入库消息.取关和地理位置不记录

            return $this->r;

        });

        return $this->wechat->server->serve();

    }



    private function returnReply()
    {
        //$m = $this->m;
        $key = $this->key;
        $save_content = '';
        $r = Rule::getRule($key);
        $msg_type = 'text';
        $content = '';
        if (!empty($r) && isset($r['mid'])) {

            switch ((int)$r['mt']) {

                case MEDIA_TYPE_MIXED:
                    $msg_type = 'mixed';
                    $media = Media::find(intval($r['mid']));
                    $news = new News([
                        'title' => $media->title,
                        'description' => $media->summary,
                        'url' => url('/m/' . $media->id),
                        'image' => url($media->media_url)
                    ]);
                    $content = $save_content = $news;
                    break;
                case MEDIA_TYPE_MIXED_MULTI:
                    $msg_type = 'mixed_multi';
                    $rows = Media::where(['bundle_id' => intval($r['mid'])])->orderBy('multi_order', 'asc')->get();
                    $arr = array();
                    foreach ($rows as $key => $value) {
                        $news = new News([
                            'title' => $value->title,
                            'description' => $value->summary,
                            'url' => url('/m/' . $value->id),
                            'image' => url($value->media_url)
                        ]);
                        $arr[$key] = $news;
                    }
                    $save_content = $arr;
                    $content = json_encode($save_content);
                    break;
                case MEDIA_TYPE_IMAGE:
                    $msg_type = 'image';
                    $wx_media_id = Redis::GET(sprintf(config('wxconfig.redisKey.KEY_WEIXIN_MEDIA'), $r['mid']));
                    $save_content = $content = new Image(['media_id' => $wx_media_id]);
                    break;
                case MEDIA_TYPE_AUDIO:
                case MEDIA_TYPE_VIDEO:
                case MEDIA_TYPE_TEXT:
                    $media = Media::find(intval($r['mid']));
                    $content = $save_content = $media->content;
                    break;
                default:
                    # code...
                    break;
            }


        } else {

//            /**
//             * 查询数据库中是否有默认回复
//             */

            $special = new RuleSpecial();
            $special = $special->where("special_title", 'default-rule')->orderBy(\DB::raw('RAND()'))->first();
            if (!empty($special)) {
                $rule = new Rule();
                $rule = $rule->where('id', $special->rule_id)->first();
                if (!empty($rule)) {
                    $this->key = $rule->keyword;//默认回复
                    $content = $save_content = $this->returnReply();
                } else {
                    $content = $save_content = $this->r;//默认回复
                }
            } else {
                $content = $save_content = $this->r;//默认回复
            }
        }
        $m = $this->m;
        if ($m->Event != 'unsubscribe' && $m->Event != 'LOCATION' && $m->Event != 'VIEW' && $m->Event != 'TEMPLATESENDJOBFINISH') {
            $msgR = new Message();
            $msgR->from_user_name = $m->ToUserName;
            $msgR->to_user_name = $m->FromUserName;
            $msgR->create_time = time();
            $msgR->msg_type = $msg_type; //todo 未来回复其他类型时需要判断
//            $msgR->msg_id = '';
            $msgR->content = $content;
            $msgR->pic_url = '';
//            $msgR->location_x = '';
//            $msgR->location_x = '';
//            $msgR->scale = '';
            $msgR->label = '';
            $msgR->title = '';
            $msgR->description = '';
            $msgR->url = '';
            $msgR->media_id = '';
            $msgR->thumb_media_id = '';
            $msgR->event = '';
            $msgR->event_key = '';
            $msgR->save();
        }
        return $save_content;
    }

    public function demo(Request $request)
    {
        $key = $request->key;

        $r = Rule::getRule($key);
        var_dump($r);
        if (!empty($r) && isset($r['mid'])) {

            switch ((int)$r['mt']) {

                case MEDIA_TYPE_MIXED:
                    $media = Media::find(intval($r['mid']));
                    $news = new News([
                        'title' => $media->title,
                        'description' => $media->summary,
                        'url' => url('/m/' . $media->id),
                        'image' => url($media->media_url)
                    ]);
                    return $news;
                    break;
                case MEDIA_TYPE_MIXED_MULTI:
                    $rows = Media::where(['bundle_id' => intval($r['mid'])])->orderBy('multi_order', 'asc')->get();
                    $arr = array();
                    foreach ($rows as $key => $value) {
                        $news = new News([
                            'title' => $value->title,
                            'description' => $value->summary,
                            'url' => url('/m/' . $value->id),
                            'image' => url($value->media_url)
                        ]);
                        $arr[$key] = $news;
                    }
                    return $arr;
                    break;
                case MEDIA_TYPE_IMAGE:
                case MEDIA_TYPE_AUDIO:
                case MEDIA_TYPE_VIDEO:
                case MEDIA_TYPE_TEXT:
                    $media = Media::find(intval($r['mid']));
                    return $media->content;
                    break;
                default:
                    # code...
                    break;
            }
        }
    }
}
