<?php

namespace Guo\Wechat\Http\Controllers;

use Guo\Wechat\Model\Media;
use Guo\Wechat\Model\RuleSpecial;
use Guo\Wechat\Model\Rule;
use Guo\Wechat\Model\RuleCate;
use Guo\Wechat\Model\WechatToken;
use Validator;
use EasyWeChat\Core\AccessToken;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

/**
 * Class WechatController
 * @package App\Http\Controllers
 *
 * 规则中有一些特殊规则的id限定死,安排如下
 * 1,关注回复
 * 2.默认回复(暂时未启用)
 * 3.投票口令 跟随投票口令一起修改,用户输入"投票口令",公众号返回具体的投票口令内容
 * 4.实际的投票口令内容
 */

define('MEDIA_TYPE_MIXED', 1);
define('MEDIA_TYPE_MIXED_MULTI', 2);
define('MEDIA_TYPE_IMAGE', 3);
define('MEDIA_TYPE_AUDIO', 4);
define('MEDIA_TYPE_VIDEO', 5);
define('MEDIA_TYPE_TEXT', 6);


class WechatController extends CommonController
{
    public $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function rule()
    {
        $textType = config('wxconfig.mediaType.text');

        //规则列表数据准备
        $rules = Rule::orderBy('id', 'desc')->paginate(15);
        $ruleCates = RuleCate::all(['id', 'label']);

        $cates = array();
        foreach ($ruleCates as $k => $v) {
            $cates[$v->id] = $v->label;
        }
        //所有media准备
        $medias = Media::where(['multi_order' => '0'])->get(['id', 'content', 'title', 'media_type',"bundle_id"]);
        $mediasView = array();
        foreach ($medias as $k => $v) {
            if ($v->media_type == 6) {
                $mediasView['text'][$v->id] = $v->content;
            } else if ($v->media_type == 3) {
                $mediasView['pic'][$v->id] =  $v->title;
            } else if($v->bundle_id=='0') {
                $mediasView['single'][$v->id] = $v->title;
            } else {
                $mediasView['double'][$v->id] = $v->title;
            }

        }
//        dd($mediasView);

        //单个规则数据准备
        $r = $this->request;
        $id = $r->id ? $r->id : 0;

        if ($id > 0) {
            $rule = Rule::find($id);
            if ($rule) {
                if ($rule->media_type == 2) {
                    $media = Media::where(['bundle_id' => $rule->media_id])->orderBy('multi_order', 'asc')->get();
                    $rule->media_id = $media[0]->id;
                }
            }
        }
        if (empty($rule)) {
            $rule = (object)array('id' => '新增', 'keyword' => '', 'cate_id' => 0, 'media_id' => 0);
        }

        //模版
        return view('wechat::wechat.rule', [
            'rules' => $rules,
            'cates' => $cates,
            'id' => $id,
            'rule' => $rule,
            'medias' => $mediasView,
            'textType' => $textType
        ]);
    }

    public  function addrule(){
        $textType = config('wxconfig.mediaType.text');
        $ruleCates = RuleCate::all(['id', 'label']);

        $cates = array();
        foreach ($ruleCates as $k => $v) {
            $cates[$v->id] = $v->label;
        }
        //所有media准备
        $medias = Media::where(['multi_order' => '0'])->get(['id', 'content', 'title', 'media_type',"bundle_id"]);
        $mediasView = array();
        foreach ($medias as $k => $v) {
            if ($v->media_type == 6) {
                $mediasView['text'][$v->id] = $v->content;
            } else if ($v->media_type == 3) {
                $mediasView['pic'][$v->id] =  $v->title;
            } else if($v->bundle_id=='0') {
                $mediasView['single'][$v->id] = $v->title;
            } else {
                $mediasView['double'][$v->id] = $v->title;
            }

        }
//        dump($mediasView);
        //单个规则数据准备
        $r = $this->request;
        $id = $r->id ? $r->id : 0;

        if ($id > 0) {
            $rule = Rule::find($id);
            if ($rule) {
                if ($rule->media_type == 2) {
                    $media = Media::where(['bundle_id' => $rule->media_id])->orderBy('multi_order', 'asc')->get();
                    $rule->media_id = $media[0]->id;
                }
            }
        }
        if (empty($rule)) {
            $rule = (object)array('id' => '新增', 'keyword' => '', 'cate_id' => 0, 'media_id' => 0,'media_type' => "");
        }
        //模版
        return view('wechat::wechat.addrule', [
            'cates' => $cates,
            'id' => $id,
            'rule' => $rule,
            'medias' => $mediasView,
            'textType' => $textType
        ]);
    }

    public function setRule()
    {
        $r = $this->request;
        $arr=$r->toArray();
        $validator=Validator::make($arr, [
            'keyword' => 'required|string',
            'cate_id' => 'required|integer',
            'media_id' => 'required|integer',
            'media_type' => 'required|integer',
        ]);
        if ($validator->fails()) {
            return redirect('wechat/rule')
                ->withErrors($validator)
                ->withInput();
        }

        //判断是否有重复
        $ruleRepeat = Rule::where('keyword', $r->keyword)->first();
        $dbDR = 0;
        if (!empty($ruleRepeat)) {
            //不能与系统关键词冲突
            $ruleId = config('wxconfig.ruleId');
            if (in_array($ruleRepeat->id, $ruleId)) {
                return redirect('wechat/rule')->withErrors(array(
                    '输入关键词与系统保留关键词冲突:' . array_search($ruleRepeat->id, $ruleId)
                ));
            } else {
                $dbDR = $ruleRepeat->delete();
            }
        }

        //插入操作
        if ($r->id > 0) {
            $rule = Rule::find($r->id);
            if (empty($rule)) {
                $rule = new Rule();
            }
        } else {
            $rule = new Rule();
        }
        $media = Media::find(intval($r->media_id));
        $rule->keyword = $r->keyword;
        $rule->cate_id = $r->cate_id;
        $rule->media_id = $r->media_id;
        $rule->media_type = $media->media_type;
        if ($media->media_type == 2) {
            $rule->media_id = $media->bundle_id;
        }

        $dbR = $rule->save();

        if ($r->cate_id == '12') {//默认回复
            $special = new RuleSpecial();
            $where = array(
                "special_title" => 'default-rule',
                "rule_id" => $rule->id
            );
            $res = $special->where($where)->first();
            if (!empty($res)) {
                $res->rule_id = $rule->id;
                $special->save();
            } else {
                $special->special_title = "default-rule";
                $special->rule_id = $rule->id;
                $special->save();
            }

        }

        //存redis
        $redisR = $rule->setRule($r->keyword, array('mt' => $rule->media_type, 'mid' => $rule->media_id));

        return redirect('wechat/rule')->with('messages',
            array('数据库插入结果:' . $dbR, '数据库去重结果:' . $dbDR, 'redis结果:' . $redisR));
    }

    /*
     * 删除规则
     */
    public function deleteRule()
    {
        $r = $this->request;
        if ($r->id > 0) {
            $rule = Rule::find($r->id);
            //删redis
            $redisR = Rule::delRule($rule->keyword);
            $dbR=Rule::destroy($r->id);
        }
        return redirect('wechat/rule')->with('messages', array('数据库删除结果:' . $dbR, 'redis删除结果:' . $redisR));
    }

    /**
     * 重置规则
     */

    public function reset_rule()
    {
        $data = Rule::reset_rule();
        if(empty($data)){
            return redirect('wechat/rule')->with('messages', array('规则重置成功'));
        }else{
            $info[]="规则重置失败";
            if(!empty($data["delete"])){
                $info[]="redis 数据删除失败";
            }
            if(!empty($data["add"])){
                $info[]="redis 数据添加失败";
            }
            return redirect('wechat/rule')->withErrors($info);
        }
    }

    public function command()
    {
        $cid = config('wxconfig.ruleId.command');
        $commandType = config('wxconfig.mediaType.command');

        $command = Rule::find($cid);
        if (empty($command)) {
            $command = (object)array('id' => $cid, 'keyword' => '', 'cate_id' => 0, 'media_id' => 0);
        }

        //模版
        return view('wechat::wechat.command', [
            'command' => $command,
            'cid' => $cid,
            'commandType' => $commandType
        ]);
    }

    public function setCommand()
    {
        $cid = config('wxconfig.ruleId.command');
        $commandType = config('wxconfig.mediaType.command');
        $r = $this->request;

        $command = Rule::find($cid);
        if (empty($command)) {
            $command = new Rule();
        } else {
            //删旧redis
            Rule::delRule($command->keyword);
        }
        $command->media_id = 0;
        $command->media_type = $commandType;
        $command->id = $cid;
        $command->keyword = $r->keyword;
        $command->cate_id = 0;
        $dbR = $command->save();
        //存redis
        $redisR = $command->setRule($r->keyword, array('mt' => $commandType, 'mid' => 0));

        return redirect('wechat/command')->with('messages', array('数据库存储结果:' . $dbR, 'redis存储结果:' . $redisR));
    }

    public function follow()
    {
        $id = config('wxconfig.ruleId.follow');
        $type = config('wxconfig.mediaType.text');

        //关注回复,关键词默认为follow
        $text = config('wxconfig.keyword.follow');

        $data = Rule::find($id);
        if (empty($data)) {
            $data = (object)array('id' => $id, 'keyword' => $text, 'cate_id' => 0, 'media_id' => 0);
        }

        //所有media准备
        $medias = Media::where(['multi_order' => '0'])->get(['id', 'content', 'title', 'media_type']);
        $mediasView = array();
        foreach ($medias as $k => $v) {
            if ($v->media_type == 6) {
                $mediasView[$v->id] = '[文本]' . $v->content;
            } else if ($v->media_type == 3) {
                $mediasView[$v->id] = '[图片]' . $v->title;
            } else {
                $mediasView[$v->id] = '[图文]' . $v->title;
            }

        }

        //模版
        return view('wechat::wechat.follow', [
            'data' => $data,
            'id' => $id,
            'type' => $type,
            'medias' => $mediasView
        ]);
    }

    public function setFollow()
    {
        $r = $this->request;

        $id = config('wxconfig.ruleId.follow');
        $type = config('wxconfig.mediaType.text');
        $keyword = config('wxconfig.keyword.follow');

        $rule = Rule::find($id);
        if (empty($rule)) {
            $rule = new Rule();
        }
        $media = Media::find(intval($r->media_id));
        $rule->media_id = $r->media_id;
        $rule->media_type = $media->media_type;
        if ($media->media_type == 2) {
            $rule->media_id = $media->bundle_id;
        }
        $rule->id = $id;
        $rule->keyword = $keyword;
        $rule->cate_id = 0;
        $dbR = $rule->save();
        //存redis
        $redisR = $rule->setRule($r->keyword, array('mt' => $rule->media_type, 'mid' => $rule->media_id));

        return redirect('wechat/follow')->with('messages', array('数据库存储结果:' . $dbR, 'redis存储结果:' . $redisR));
    }

    public function gain()
    {
        $id = config('wxconfig.ruleId.gain');
        $type = config('wxconfig.mediaType.text');

        //关键词为"投票口令"
        $text = config('wxconfig.keyword.gain');

        $data = Rule::find($id);
        if (empty($data)) {
            $data = (object)array('id' => $id, 'keyword' => $text, 'cate_id' => 0, 'media_id' => 0);
        }

        //所有media准备
        $medias = Media::where('media_type', $type)->get(['id', 'content']);
        $mediasView = array();
        foreach ($medias as $k => $v) {
            $mediasView[$v->id] = $v->content;
        }

        //当前口令
        $command = Rule::find(config('wxconfig.ruleId.command'));

        //模版
        return view('wechat::wechat.gain', [
            'data' => $data,
            'id' => $id,
            'type' => $type,
            'medias' => $mediasView,
            'text' => $text,
            'command' => empty($command) ? '无' : $command->keyword
        ]);
    }

    public function setGain()
    {
        $r = $this->request;

        $id = config('wxconfig.ruleId.gain');
        $type = config('wxconfig.mediaType.text');
        $keyword = config('wxconfig.keyword.gain');

        $rule = Rule::find($id);
        if (empty($rule)) {
            $rule = new Rule();
        }
        $rule->media_id = $r->media_id;
        $rule->media_type = $type;
        $rule->id = $id;
        $rule->keyword = $keyword;
        $rule->cate_id = 0;
        $dbR = $rule->save();
        //存redis
        $redisR = $rule->setRule($r->keyword, array('mt' => $type, 'mid' => $r->media_id));

        return redirect('wechat/gain')->with('messages', array('数据库存储结果:' . $dbR, 'redis存储结果:' . $redisR));
    }

    function menu()
    {
        $menu = Redis::GET(config('wxconfig.redisKey.wechatMenu'));
        $data = json_encode(array());
        if ($menu != null) {
            $data = $menu;
        }

        return view('wechat::wechat.menu', [
            'data' => $data
        ]);
    }

    function setMenu()
    {
        $r = $this->request;
        $redisR = Redis::set(config('wxconfig.redisKey.wechatMenu'), urldecode($r->data));

        $wechat = app('wechat');
        $wechatToken = new WechatToken();
        $accessToken = new AccessToken(config('wxconfig.wechatAppid'), config('wxconfig.wechatSecret'), $wechatToken);
        $accessToken->prefix = config('wxconfig.redisKey.wechatToken');
        $wechat['access_token'] = $accessToken;

        $data = json_decode(urldecode($r->data), true);
        $wechatR = $wechat->menu->add($data['button']);

        return back()->with('messages', array('redis结果:' . $redisR, '接口提交结果:' . $wechatR));
    }

    public function materialIndex()
    {
        $material = new Media;
        $resultData = $material->orderBy('id', 'desc')->paginate(10);
        $result = $resultData->toArray();


        $result = $result['data'];
        //$url = url('news/') . '/';
        //return view('material.material')->withArticles(\App\Article::all());
        return view('wechat::wechat.material', [
            'materials' => $result,
            'materialData' => $resultData,
        ]);
    }

    public function materialEdit(Request $request)
    {
        $material = new Media;
        $id = $request->id;

        $resultData = $material->where('id', $id)->get();
        $result = $resultData->toArray();
        $result[0]['created'] = date('Y-m-d H:i:s', time());
        return view('wechat::wechat.materialedit', [
            'material' => $result[0]
        ]);
    }

    public function materialUpdate(Request $request)
    {
        $material = new Media;
        $id = $request->id;
        $time = $request->time;
        $content = $request->content;
        // str_replace('', $content, $author)
        $result = $material->where('id', $id)->update(['content' => $content, 'update_at' => $time]);
        if ($result) {
            return redirect('/wechat/material');
        } else {
            return redirect('wechat/materialedit?id=' . $id);
        }
    }

    public function materialAdd(Request $request)
    {
        // $material = new Media;
        // $material->media_type = 6;
        // $material->multi_order = '';
        // $material->bundle_id = ' ';
        // $material->author = '';
        // $material->summary = '';
        // $material->content = '';
        // $material->media_url = '';
        // $material->created = date('Y-m-d H:i:s',time());
        // $material->update_at = date('Y-m-d H:i:s',time());
        // $material->show_cover_in_text = ' ';
        // $material->upload_error = '';
        // $material->ORurl = '';
        // $material->num = '';
        // $material->assist = '';
        $emotions = config('wxconfig.emotions');
        return view('wechat::wechat.materialadd', [
            'emotions' => json_encode($emotions)
        ]);

        // $result = $material->save();
        // if ($result) {
        //     $data = $material->orderBy('id', 'desc')->first()->toArray();
        //     return redirect('wechat/materialadd?id=' . $data['id']);
        // } else {
        //     echo '创建失败';
        //     die();
        // }

    }

    public function upload()
    {
        new \Guo\Wechat\Model\UploadHandler();

    }
}
