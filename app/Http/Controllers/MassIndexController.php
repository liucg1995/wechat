<?php

namespace Guo\Wechat\Http\Controllers;

use Guo\Wechat\Model\Template;
use Illuminate\Http\Request;
use Guo\Wechat\Model\MassLog;
use Guo\Wechat\Model\Media;
use Validator;
use EasyWeChat\Core\AccessToken;
use DB;
use EasyWeChat\Foundation\Application;

/**
 * 群发模板页面
 * Class MassIndexController
 * @package App\Http\Controllers
 */
class MassIndexController extends CommonController
{
    public $wechat;

    public function __construct(Request $request)
    {
        $wechat=  $this->wechat();
        $this->wechat = $wechat;
    }

    /**
     * 群发正式模板
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function massIndex(Request $request)
    {
        $masslog = new MassLog;
        $resultData = $masslog->where('way','1')->orderBy('id', 'desc')->paginate(20);
        $result = $resultData->toArray();
        $result = $result['data'];
        $medias = Media::where(['multi_order' => '0'])->get(['id', 'content', 'title', 'media_type', 'bundle_id']);
        $mediasView = array();
        $mediasViewKf[] = '';
        foreach ($medias as $k => $v) {
            if ($v->media_type == 6) {
                //$mediasView[$v->id] = '[文本]'.$v->content;
                $mediasViewKf[$v->id] = '[文本]'.$v->content;
            } else if ($v->media_type == 3) {
                //$mediasView[$v->id] = '[图片]'.$v->title;
                $mediasViewKf[$v->id] = '[图片]'.$v->title;
            } else if ($v->media_type == 2) {
                $mediasView[$v->id . '#【多图文】' . $v->title] = '[多图文]' . $v->title;
                $mediasViewKf[$v->id . '#【多图文】' . $v->title] = '[多图文]' . $v->title;
            } else if ($v->media_type == 1) {
                $mediasView[$v->id . '#【单图文】' . $v->title] = '[单图文]' . $v->title;
                $mediasViewKf[$v->id . '#【单图文】' . $v->title] = '[单图文]' . $v->title;
            }

        }
        $tlist=Template::orderby("id","desc")->get();
        return view('wechat::mass.massTag', [
            'result' => $result,
            'resultData' => $resultData,
            'medias' => $mediasView,
            'mediaskf' => $mediasViewKf,
            'tlist'=>$tlist,
            'url' => '/mass/index'
        ]);
    }

    /**
     * 群发测试模板
     * @param Request $request
     * @return view
     */
    public function massTestIndex(Request $request)
    {
        $masslog = new MassLog;
        $resultData = $masslog->where('way','2')->orderBy('id', 'desc')->paginate(20);
        $result = $resultData->toArray();
        $result = $result['data'];
        $wechat = $this->wechat;
        $tag = $wechat->user_tag;
        $tags = $tag->lists();
        $tags = $tags['tags'];
        $userID = isset($request->userID) ? $request->userID : '';
        $medias = Media::where(['multi_order' => '0'])->get(['id', 'content', 'title', 'media_type', 'bundle_id']);
        $mediasView = array();
        $mediasViewKf[] = '';
        foreach ($medias as $k => $v) {
            if ($v->media_type == 6) {
                //$mediasView[$v->id] = '[文本]'.$v->content;
                $mediasViewKf[$v->id] = '[文本]'.$v->content;
            } else if ($v->media_type == 3) {
                //$mediasView[$v->id] = '[图片]'.$v->title;
                $mediasViewKf[$v->id] = '[图片]'.$v->title;
            } else if ($v->media_type == 2) {
                $mediasView[$v->id . '#【多图文】' . $v->title] = '[多图文]' . $v->title;
                $mediasViewKf[$v->id . '#【多图文】' . $v->title] = '[多图文]' . $v->title;
            } else if ($v->media_type == 1) {
                $mediasView[$v->id . '#【单图文】' . $v->title] = '[单图文]' . $v->title;
                $mediasViewKf[$v->id . '#【单图文】' . $v->title] = '[单图文]' . $v->title;
            }
        }
        $tlist=Template::orderby("id","desc")->get();
        return view('wechat::mass.mass', [
            'result' => $result,
            'resultData' => $resultData,
            'tags' => $tags,
            'userID' => $userID,
            'medias' => $mediasView,
            'tlist'=>$tlist,
            'mediaskf' => $mediasViewKf,
            'url' => '/mass/test'
        ]);
    }

}

