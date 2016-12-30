<?php
namespace Guo\Wechat\Http\Controllers;

use Guo\Wechat\Model\Media;
use Guo\Wechat\Model\Complaint;
use Guo\Wechat\Model\Link;
use Illuminate\Http\Request;
use EasyWeChat\Core\Exception;
use WechatToken;

class WxmediaController extends CommonController
{

    public $wechat;

    public function __construct()
    {
        $wechat = $this->wechat();
        $this->wechat = $wechat;
//        if (!isset($_SESSION['is_base'])) {
//            $_SESSION["target_urls"] = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
//            header('location: /auth/base');
//            exit;
//        }
    }

    /**
     * 数据 详情页
     */
    public function media_detail(Request $request, $id)
    {
//        $options = config("app.options");
//        $app = new Application($options);
        $js = $this->wechat->js;
        $media = Media::find(intval($id));
        $media->num = $media->num + 1;
        $media->save();
        $msg = '';
        $code = !empty($_SESSION['code']) ? $_SESSION['code'] : "";//当前用户的CODE
        if (!$media) {
            $msg = "该文章不存在！";
        }

        $nextcode = !empty($request->code) ? $request->code : '';
        $href = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
        $href = explode('?', $href);
        /**
         * 判断是否有链接
         */
        if (!empty($media->link)) {
            $linkData = Link::find($media->link);
            $url = $this->initStr($linkData->url, $nextcode);//上一级的
            $link = '<a href="' . $url . '" style="' . $linkData->style . '" >' . $linkData->name . '</a>';
        } else {
            $link = '';
        }
        return view("wechat::index.media", [
            'data' => $media,
            'config' => $js,
            'msg' => $msg,
            'code' => $code, //当前用户的CODE
            'nextcode' => $nextcode,//上一个用户的CODE
            'url' => $href[0] . '?code=' . $code,
            'link' => $link,
//            'href'=>$href[0]
        ]);
    }

    /**
     * 处理动态链接
     * @param $str      所要处理的
     * @param $code     所要替换的数据
     * @return string   处理后的数据
     */
    function initStr($str, $code)
    {
        $pattern = '/^(.*)\<\{(.*)\}\>(.*)$/isU';//正则表达式匹配<{}>
        preg_match($pattern, $str, $match);
        $data = $match[1] . $code . $match[3];
        return $data;
    }

    public function update(Request $request)
    {

        $id = $request->id;
        $i = $request->i;
        $sign = $request->sign;
        if ($sign) {
            $praiseNum = $i + 1;
            $result = Media::where('id', $id)->update(['assist' => $praiseNum]);
            if ($result) {
                $response = array(
                    'errno' => 0,
                    'errmsg' => 'success',
                    'data' => true,
                );
            } else {
                $response = array(
                    'errno' => -1,
                    'errmsg' => 'fail',
                    'data' => false,
                );
            }
        } else {
            $praiseNum = $i - 1;
            $result = Media::where('id', $id)->update(['assist' => $praiseNum]);
            if ($result) {
                $response = array(
                    'errno' => 1,
                    'errmsg' => 'success',
                    'data' => true,
                );
            } else {
                $response = array(
                    'errno' => -1,
                    'errmsg' => 'fail',
                    'data' => false,
                );

            }
        }
        echo json_encode($response);
//        $media = Media::find(intval($id));
//        $media->assist = $media->assist +1;
//        $media->save();
//        echo $media->assist;
    }

    public function complaint(Request $request)
    {
        $aid = $request->aid;

        return view("wechat::index.complaint", [
            'aid' => $aid,
        ]);
    }

    public function tort(Request $request)
    {
        $aid = $request->aid;

        return view("wechat::index.complainttort", [
            'aid' => $aid,
        ]);
    }

    public function complaintcopy(Request $request)
    {
        $aid = $request->aid;
        $title = $request->title;
        $data = Media::where('id', $aid)->first();
        return view("wechat::index.complaintcopy", [
            'aid' => $aid,
            'title' => $title,
            'data' => $data
        ]);
    }

    public function complainttext(Request $request)
    {
        $title = $request->title;
        $aid = $request->aid;
        return view("index.complainttext", [
            'title' => $title,
            'aid' => $aid
        ]);
    }

    public function complainttextcommit(Request $request)
    {
        $aid = $request->aid;
        $title = $request->title;
        $content = $request->content;
        $complaint = new Complaint;
        $complaint->aid = $aid;
        $complaint->title = $title;
        $complaint->content = $content;
        $complaint->save();
        return redirect('/m/' . $aid);
    }

    public function qrcode(Request $request)
    {
//        $options = config("app.options");
//        $app = new Application($options);
        $qrcode = $this->wechat->qrcode;
        $id = $request->id;
        $result = $qrcode->forever($id);// 或者 $qrcode->forever("foo");
        $ticket = $result->ticket; // 或者 $result['ticket']
        $ticket = UrlEncode($ticket);
        $url = $result->url;
        $img = "https://mp.weixin.qq.com/cgi-bin/showqrcode?ticket=" . $ticket;
        echo $img;
        exit;
    }
}