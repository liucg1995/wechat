<?php

namespace Guo\Wechat\Http\Controllers;


use Guo\Wechat\Model\Message;
use App\Newuser as User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
class MessageController extends CommonController
{

    public function index(Request $request)
    {
        $key = User::$key;
        $table = User::$tables;
        $nickname= User::$nickname;
        $where = array();
        $like = array();
        $msg_type = $request->msg_type;
        $content = $request->content;
        $today = isset($request->today) ? $request->today : '今天';
        $yestoday = $request->yesterday;
        $day = $request->day;
        $table_type = '';
        if ($msg_type !== 0 && !empty($msg_type)) {
            $where['msg_type'] = $msg_type;
        }
        if (!empty($content)) {
            $where['content'] = $content;
        }
        if (strtotime($day) == strtotime(date("Y-m-d", time()))) {
            $today = '今天';
        }
        if (strtotime($day) == (strtotime(date("Y-m-d", time())) - 3600 * 24)) {
            $yestoday = '昨天';
        }

        if (!empty($today)) {
            $table_type = 'now';
        }
        if (!empty($yestoday)) {
            $day = date('Y-m-d', strtotime('-1 day'));
        }
        $where[] = array("message.from_user_name", "not like", '%gh_%');
        if ($table_type == 'now') {
            $where[] = array("message.created", ">=", date('Y-m-d 00:00:00', time()));
            $where[] = array("message.created", "<=", date('Y-m-d 23:59:59', time()));
        } else {
            $where[] = array("message.created", ">=", date('Y-m-d 00:00:00', strtotime($day)));
            $where[] = array("message.created", "<=", date('Y-m-d 23:59:59', strtotime($day)));
        }
        $list = User::where($where)->rightjoin("message", $table . "." . $key, "=", "message.from_user_name")->orderBy('message.id', 'desc')->paginate(20);
        $append = array();
        $re = $request->toArray();
        foreach ($re as $key => $value) {
            $append[$key] = $value;
        }
        $list->appends($append);
        return view('wechat::message.index', ['list' => $list,'nickname'=>$nickname]);
    }


}
