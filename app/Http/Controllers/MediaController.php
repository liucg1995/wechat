<?php

namespace Guo\Wechat\Http\Controllers;

use Guo\Wechat\Model\Media;
use Guo\Wechat\Model\MediaBundle;
use Guo\Wechat\Model\Link;
use Guo\Wechat\Model\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use WechatToken;
use EasyWeChat\Message\Article;

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
// Media type
define('MEDIA_TYPE_MIXED', 1);
define('MEDIA_TYPE_MIXED_MULTI', 2);
define('MEDIA_TYPE_IMAGE', 3);
define('MEDIA_TYPE_AUDIO', 4);
define('MEDIA_TYPE_VIDEO', 5);
define('MEDIA_TYPE_TEXT', 6);

class MediaController extends CommonController
{

    public $request;
    public $wechat;

    public function __construct(Request $request)
    {
        $this->request = $request;
//        $wechat = app('wechat');
//        $wechatToken = new WechatToken();
//        $accessToken = new AccessToken(config('wxconfig.wechatAppid'), config('wxconfig.wechatSecret'), $wechatToken);
//        $accessToken->prefix = config('wxconfig.redisKey.wechatToken');
//        $wechat['access_token'] = $accessToken;
        $this->wechat = $this->wechat();
    }

    public function index(Request $request)
    {
        $media_type = 1;
        if ($request->mt) {
            $media_type = $request->mt;
        }
        if ($_POST) {
            $is_edit = $request->is_edit;
            $id = $request->id;
            $media_type = $request->media_type;
            try {
                if (($is_edit === 'false' || empty($is_edit)) && $id == 0) {
                    $this->_create($media_type);
                } else {
                    $this->_modify($media_type);
                }
            } catch (Exception $e) {

            }
        }
        $emotions = config('wxconfig.emotions');
        $linkList = Link::get();
        return view('wechat::media.materialadd', [
            'emotions' => json_encode($emotions),
            'media_type' => $media_type,
            'linkList' => $linkList
        ]);
    }

    function _create($media_type)
    {

        $request = $this->request;
        switch ($media_type) {
            case MEDIA_TYPE_TEXT:
                $content = $request->content;
                if (empty($content)) {
                    return redirect('/media')
                        ->withErrors(array("0" => "内容不能为空"))
                        ->withInput();
                }
                $material = new Media;
                $material->media_type = $media_type;
                $material->multi_order = '0';
                $material->bundle_id = '0';
                $material->author = '';
                $material->summary = '';
                $material->content = $content;
                $material->media_url = '';
                $material->created = date('Y-m-d H:i:s', time());
                $material->update_at = date('Y-m-d H:i:s', time());
                $material->show_cover_in_text = '0';
                $material->upload_error = '';
                $material->ORurl = '';
                $material->num = '0';
                $material->assist = '0';
                $material->save();

                return $material->id;
                break;
            case MEDIA_TYPE_IMAGE:
                $title = $request->title;
                if (empty($title)) {
                    return redirect('/media')
                        ->withErrors(array("0" => "标题不能为空"))
                        ->withInput();
                }
                $url = $request->media_url;
                $url = parse_url($url);
                $media_url = $url['path'];
                $material = new Media;
                $material->media_type = $media_type;
                $material->multi_order = '0';
                $material->bundle_id = '0';
                $material->author = '';
                $material->summary = '';
                $material->title = $title;
                $material->content = '';
                $material->media_url = $media_url;
                $material->created = date('Y-m-d H:i:s', time());
                $material->update_at = date('Y-m-d H:i:s', time());
                $material->show_cover_in_text = '0';
                $material->upload_error = '';
                $material->ORurl = '';
                $material->num = '0';
                $material->assist = '0';
                $material->save();
                $insert_id = $material->id;
                if ($insert_id > 0) {
                    $file_path = public_path($url['path']);
                    try {
//                            $options = config("app.options");
//                            $app = new Application($options);
                        // 永久素材
                        $material = $this->wechat->material;
                        $result = $material->uploadImage($file_path);  // 请使用绝对路径写法！除非你正确的理解了相对路径（好多人是没理解对的）！
                        Redis::set(sprintf(config('wxconfig.redisKey.KEY_WEIXIN_MEDIA'), $insert_id), $result['media_id']);
                    } catch (Exception $e) {

                    }

                }
                break;
            case MEDIA_TYPE_AUDIO:
            case MEDIA_TYPE_VIDEO:
            case MEDIA_TYPE_MIXED:
                $content = $request->content;
                $title = $request->title;
                $author = $request->author;
                $summary = $request->summary;
                $link = $request->link;
                $show_cover_in_text = $request->show_cover_in_text;
                if ($show_cover_in_text == 'on') {
                    $show_cover_in_text = 1;
                } else {
                    $show_cover_in_text = 0;
                }
                $url = $request->media_url;
                $url = parse_url($url);
                $media_url = $url['path'];

                $material = new Media;
                $material->media_type = $media_type;
                $material->multi_order = '0';
                $material->bundle_id = '0';
                $material->author = $author;
                $material->summary = $summary;
                $material->content = $content;
                $material->title = $title;
                $material->media_url = $media_url;
                $material->created = date('Y-m-d H:i:s', time());
                $material->update_at = date('Y-m-d H:i:s', time());
                $material->show_cover_in_text = $show_cover_in_text;
                $material->upload_error = '';
                $material->ORurl = '';
                $material->num = '0';
                $material->assist = '0';
                $material->link = $link;
                $material->save();
                $insert_id = $material->id;
                if ($insert_id > 0) {
                    $file_path = public_path($url['path']);
                    try {

                        // 永久素材
                        $app_material = $this->wechat->material;
                        $result = $app_material->uploadImage($file_path);  // 请使用绝对路径写法！除非你正确的理解了相对路径（好多人是没理解对的）！
                        Redis::set(sprintf(config('wxconfig.redisKey.KEY_WEIXIN_MEDIA'), $insert_id), $result['media_id']);
                        //添加永久但图文素材
                        $article = new Article([
                            'title' => $title,
                            'thumb_media_id' => $result['media_id'],
                            'author' => $author,
                            'digest' => $summary,
                            'show_cover' => $show_cover_in_text,
                            'content' => $content,
                            'source_url' => $material->ORurl
                        ]);
                        $mixde_result = $app_material->uploadArticle($article);
                       echo sprintf(config('wxconfig.redisKey.KEY_WEIXIN_MIXED'), $insert_id);
                        Redis::set(sprintf(config('wxconfig.redisKey.KEY_WEIXIN_MIXED'), $insert_id), $mixde_result->media_id);
                       echo Redis::get(sprintf(config('wxconfig.redisKey.KEY_WEIXIN_MIXED'), $insert_id));
                    dd($insert_id,$mixde_result);
                    } catch (Exception $e) {

                    }

                }
                return $insert_id;
                break;
            case MEDIA_TYPE_MIXED_MULTI:
                $mediabundle = new MediaBundle;
                $mediabundle->created = date('Y-m-d H:i:s', time());
                $mediabundle->save();
                $bid = $mediabundle->id;
                $forms = $request->data;
                $bundle_id = &$bid;
//                $options = config("app.options");
//                $app = new Application($options);
                // 永久素材
                $app_material = $this->wechat->material;
                $articles = array();
                foreach ($forms as $key => $form) {
                    $content = $form['content'];
                    $title = $form['title'];
                    $author = $form['author'];
                    $multi_order = $form['order'];
                    $link = $form['link'];

                    $show_cover_in_text = $request->show_cover_in_text;
                    if ($show_cover_in_text != '0' || $show_cover_in_text != 0) {
                        $show_cover_in_text = 1;
                    } else {
                        $show_cover_in_text = 0;
                    }
                    //$show_cover_in_text = isset($form['show_cover_in_text']) ? $form['show_cover_in_text'] : 0;
                    $url = $form['media_url'];
                    $url = parse_url($url);
                    $media_url = $url['path'];

                    $material = new Media;
                    $material->media_type = $media_type;
                    $material->multi_order = $multi_order;
                    $material->bundle_id = $bundle_id;
                    $material->author = $author;
                    $material->summary = '';
                    $material->content = $content;
                    $material->title = $title;
                    $material->media_url = $media_url;
                    $material->created = date('Y-m-d H:i:s', time());
                    $material->update_at = date('Y-m-d H:i:s', time());
                    $material->show_cover_in_text = $show_cover_in_text;
                    $material->upload_error = '';
                    $material->ORurl = '';
                    $material->num = '0';
                    $material->assist = '0';
                    $material->link = $link;
                    $material->save();
                    $insert_id = $material->id;
                    if ($insert_id > 0) {
                        $file_path = public_path($url['path']);
                        try {

                            $result = $app_material->uploadImage($file_path);  // 请使用绝对路径写法！除非你正确的理解了相对路径（好多人是没理解对的）！
                            Redis::set(sprintf(config('wxconfig.redisKey.KEY_WEIXIN_MEDIA'), $insert_id), $result['media_id']);
                            //添加永久但图文素材
                            $article = new Article([
                                'title' => $title,
                                'thumb_media_id' => $result['media_id'],
                                'author' => $author,
                                'digest' => $material->summary,
                                'show_cover' => $show_cover_in_text,
                                'content' => $content,
                                'source_url' => $material->ORurl
                            ]);
                            $articles[$key] = $article;
                        } catch (Exception $e) {

                        }
                    }
                }
                $mixde_result = $app_material->uploadArticle($articles);
                Redis::set(sprintf(config('wxconfig.redisKey.KEY_WEIXIN_MIXED_MULTI'), $bid), $mixde_result->media_id);
                echo json_encode(array());
                exit;
                break;
            default:
                return redirect('/media')
                    ->withErrors(array("0" => "缺少类型"))
                    ->withInput();
                break;
        }
    }

    function _modify($media_type)
    {
        $request = $this->request;
        $id = $request->id;
        switch ($media_type) {
            case MEDIA_TYPE_TEXT:
                $content = $request->content;

                if (empty($content)) {
                    return redirect('/media')
                        ->withErrors(array("0" => "内容不能为空"))
                        ->withInput();
                }
                $material = Media::find((int)$id);
                $material->media_type = $media_type;
                $material->multi_order = '';
                $material->bundle_id = ' ';
                $material->author = '';
                $material->summary = '';
                $material->content = $content;
                $material->media_url = '';
                $material->update_at = date('Y-m-d H:i:s', time());
                $material->show_cover_in_text = ' ';
                $material->upload_error = '';
                $material->ORurl = '';
                $material->num = '';
                $material->assist = '';
                return $material->save();
                break;
            case MEDIA_TYPE_IMAGE:
                $title = $request->title;
                $url = $request->media_url;
                $url = parse_url($url);
                $media_url = $url['path'];
                $material = Media::find((int)$id);
                $material->media_type = $media_type;
                $material->multi_order = '';
                $material->bundle_id = ' ';
                $material->author = '';
                $material->summary = '';
                $material->title = $title;
                $material->content = '';
                $material->media_url = $media_url;
                $material->update_at = date('Y-m-d H:i:s', time());
                $material->show_cover_in_text = ' ';
                $material->upload_error = '';
                $material->ORurl = '';
                $material->num = '';
                $material->assist = '';
                $material->save();

                $file_path = public_path($url['path']);
                try {
//                    $options = config("app.options");
//                    $app = new Application($options);
                    // 永久素材
                    $material = $this->wechat->material;
                    $result = $material->uploadImage($file_path);  // 请使用绝对路径写法！除非你正确的理解了相对路径（好多人是没理解对的）！
                    Redis::set(sprintf(config('wxconfig.redisKey.KEY_WEIXIN_MEDIA'), $id), $result['media_id']);
                } catch (Exception $e) {

                }
                break;
            case MEDIA_TYPE_AUDIO:
            case MEDIA_TYPE_VIDEO:
            case MEDIA_TYPE_MIXED:
                $content = $request->content;
                $title = $request->title;
                $author = $request->author;
                $summary = $request->summary;
                $link = $request->link;
                $show_cover_in_text = $request->show_cover_in_text;
                if ($show_cover_in_text == 'on') {
                    $show_cover_in_text = 1;
                } else {
                    $show_cover_in_text = 0;
                }
                $url = $request->media_url;
                $url = parse_url($url);
                $media_url = $url['path'];

                $material = Media::find((int)$id);
                $material->media_type = $media_type;
                $material->multi_order = '';
                $material->bundle_id = ' ';
                $material->author = $author;
                $material->summary = $summary;
                $material->content = $content;
                $material->title = $title;
                $material->media_url = $media_url;
                $material->update_at = date('Y-m-d H:i:s', time());
                $material->show_cover_in_text = $show_cover_in_text;
                $material->upload_error = '';
                $material->ORurl = '';
                $material->link = $link;
                $material->num = '';
                $material->assist = '';
//                $options = config("app.options");
//                $app = new Application($options);
                // 永久素材
                $app_material = $this->wechat->material;

                $file_path = public_path($url['path']);
                try {

                    $result = $app_material->uploadImage($file_path);  // 请使用绝对路径写法！除非你正确的理解了相对路径（好多人是没理解对的）！
                    Redis::set(sprintf(config('wxconfig.redisKey.KEY_WEIXIN_MEDIA'), $id), $result['media_id']);
                    //添加永久但图文素材
                    $article = new Article([
                        'title' => $title,
                        'thumb_media_id' => $result['media_id'],
                        'author' => $author,
                        'digest' => $summary,
                        'show_cover' => $show_cover_in_text,
                        'content' => $content,
                        'source_url' => $material->ORurl
                    ]);
                    $mediaId = Redis::GET(sprintf(config('wxconfig.redisKey.KEY_WEIXIN_MIXED'), $id));
                    if ($mediaId) {
                        $mixde_result = $app_material->updateArticle($mediaId, $article);
                        //Redis::set(sprintf(config('wxconfig.redisKey.KEY_WEIXIN_MIXED'), $id), $mixde_result->media_id);
                    }

                } catch (Exception $e) {

                }

                return $material->save();
                break;
            case MEDIA_TYPE_MIXED_MULTI:
                $forms = $request->data;
                $bundle_id = $request->bundle_id;
                foreach ($forms as $form) {
                    $content = $form['content'];
                    $title = $form['title'];
                    $author = $form['author'];
                    $multi_order = $form['order'];
                    $mt = $form['media_type'];
                    //$show_cover_in_text = isset($form['show_cover_in_text']) ? $form['show_cover_in_text'] : 0;
                    $show_cover_in_text = $request->show_cover_in_text;

                    if ($show_cover_in_text != '0' || $show_cover_in_text != 0) {
                        $show_cover_in_text = 1;
                    } else {
                        $show_cover_in_text = 0;
                    }
                    $url = $form['media_url'];
                    $url = parse_url($url);
                    $media_url = $url['path'];
                    $id = $form['id'];
                    $link = isset($form['link']) ? $form['link'] : 0;
                    $material = Media::find((int)$id);
                    if ($id == '0') {
                        $material = new Media;
                    }
                    $material->bundle_id = $bundle_id;
                    $material->media_type = $mt;
                    $material->multi_order = $multi_order;
                    $material->author = $author;
                    $material->summary = '';
                    $material->content = $content;
                    $material->title = $title;
                    $material->media_url = $media_url;
                    $material->update_at = date('Y-m-d H:i:s', time());
                    $material->show_cover_in_text = $show_cover_in_text;
                    $material->upload_error = '';
                    $material->ORurl = '';
                    $material->num = '';
                    $material->assist = '';
                    $material->link = $link;
                    $material->save();
                    if ($id == '0') {
                        $id = $material->id;
                    }
//                    $options = config("app.options");
//                    $app = new Application($options);
                    // 永久素材
                    $app_material = $this->wechat->material;

                    $file_path = public_path($url['path']);
                    try {

                        $result = $app_material->uploadImage($file_path);  // 请使用绝对路径写法！除非你正确的理解了相对路径（好多人是没理解对的）！
                        Redis::set(sprintf(config('wxconfig.redisKey.KEY_WEIXIN_MEDIA'), $id), $result['media_id']);
                        //添加永久但图文素材
                        $article = new Article([
                            'title' => $title,
                            'thumb_media_id' => $result['media_id'],
                            'author' => $author,
                            'digest' => $material->summary,
                            'show_cover' => $show_cover_in_text,
                            'content' => $content,
                            'source_url' => $material->ORurl
                        ]);
                        $mediaId = Redis::GET(sprintf(config('wxconfig.redisKey.KEY_WEIXIN_MIXED_MULTI'), $bundle_id));
                        if ($mediaId) {
                            $app_material->updateArticle($mediaId, $article, $multi_order);
                        }

                    } catch (Exception $e) {

                    }
                }
                echo json_encode(array());
                exit;
                break;
            default:
                return redirect('/media')
                    ->withErrors(array("0" => "缺少类型"))
                    ->withInput();
                break;
        }
    }

    function json(Request $request)
    {
        $type_id = $request->type;
        $page = $request->page;
        $data['data'] = Media::where(['media_type' => $type_id])->get();
        $data['status'] = '200';
        $data['page'] = '';
        echo json_encode($data);
    }

    public function upload()
    {
        new \Guo\Wechat\Model\UploadHandler();
    }

    public function delete(Request $request)
    {
        $id = $request->id;
        $type = isset($request->mt) ? $request->mt : '1';
        if ($type == '2') {
            $rows = Media::where(['bundle_id' => $id])->get();
            Rule::where(['media_id' => $id])->update(['media_id' => 0]);
            foreach ($rows as $value) {
                if (!empty($value->media_url)) {
                    @unlink(public_path($value->media_url));
                }
            }
            Media::where(['bundle_id' => $id])->delete();
            MediaBundle::where(['id' => $id])->delete();
        } else {
            $data = Media::find((int)$id);
            Rule::where(['media_id' => $id])->update(['media_id' => 0]);
            if (!empty($data->media_url)) {
                @unlink(public_path($data->media_url));
            }
            Media::where(['id' => $id])->delete();
        }
        return redirect("/media?mt=$type");
    }
}
