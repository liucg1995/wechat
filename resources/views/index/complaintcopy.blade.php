<html><head>
        <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<meta name="format-detection" content="telephone=no">
        <title>投诉文章抄袭</title>
        
<link rel="stylesheet" href="http://res.wx.qq.com/mmbizwap/zh_CN/htmledition/style/page/complain/w_complain304289.css">

    </head>
    <body class="zh_CN " ontouchstart="">
        
<div class="page_bd">
	
	<div id="tips" style="display: none; top: 14px;" class="top_tips warning"></div>
	
	<div id="step1" class="category_item">   
		<h3 class="category_title">投诉内容</h3>
		<div class="cell">
			<a id="content_url" href="javascript:void(0);" class="cell_link">
				<span class="avatar">
					<img src="{{$data->media_url}}">
				</span>
				<div class="cell_content">
					<p id="copyTitle" class="title">{{$data->title}}</p>
				</div>
			</a>
		</div>
		
		<h3 class="category_title">
			原创文章链接		</h3>
		<div class="frm_group">
			<div id="inputDiv" class="input_panel">
				<input style="outline: none;height:3.3em;width: 100%" id="sourceUrl" type="text" placeholder="输入公众号原创文章链接">
				<i id="sourceUrlTips" class="ic ic_warning ic_small"></i>
				
			</div>
			<p id="getSourceUrl" class="tips tr"><a href="http://mp.weixin.qq.com/mp/readtemplate?t=complain/faq_get_url_tmpl&uin=MTEzOTg2MDU%3D&key=cde9f53f8128acbdcaa34f44a905773181dd85a02b5164c9b9632fea3a73142289f75bfa018abb7f5d887cac9069f140a258733279181042be08a558bae87aadbda725273a91532f2a8f05de36db29ca&devicetype=iMac12%2C2+OSX+OSX+10.9.1+build(13B42)&version=11000005&lang=zh_CN&pass_ticket=kkiqsaA%2BjOr1mdVs0ESIGfLz9Qo2xFndM%2FD1pgi5lKU%3D">如何获取链接</a></p>
		</div>
		
		
		<h3 class="category_title">投诉描述</h3>
        <form>
			<div id="textareaDiv" class="textarea_panel">
				<textarea style="height: 75px;width:100%;outline: none;" id="reasonText" autofocus="autofocus"  maxlength="50" onchange="this.value=this.value.substring(0, 50)" onkeydown="this.value=this.value.substring(0, 50)" onkeyup="size(this);"  style="            display: block;
            width: 100%;
            outline: none;
            border: 0 #D7D7D7;
            padding: 10px 15px;
            height: 60px;"></textarea>
				<i id="reasonTextTips" class="ic ic_warning ic_small"></i>
				<span id="textareaLenSpan" class="frm_hint"><span id="textLen">0</span>/50</span>
			</div>
        </form>
        <div class="opr_area">
        	<a id="submitBtn" href="javascript:" class="btn btn_disabled btn_primary js_btn_submit">提交</a>
        </div>
    </div>
	<input  type="hidden" name="title" id="title" value="{{$title}}">
        <script>
            function size(par) { 

            var max = 51; 

            if (par.value.length < max) 

            var str = max - par.value.length; 
            var title = document.getElementById("title").value;
            var con = document.getElementById("reasonText").value;
            var submitBtn = document.getElementById("submitBtn");
            if(str > 0){
               document.getElementById("textLen").innerHTML = str.toString()-1;  
               submitBtn.setAttribute("href",'/m/complainttextcommit?content='+con+'&title='+title+'&aid={{$aid}}');
               submitBtn.style.color = "white";
            }
            if(par.value.length <1)
            {
               
               submitBtn.setAttribute("href",'');
               submitBtn.style.color = "#adf18f";
            }
        } 
        </script>

	<div id="success" style="display:none;">
		
		
<div class="page_msg">
	<div class="icon_area"><i class="icon_msg success"></i></div>
	<div class="text_area">
		<h2 class="title">投诉成功</h2>
		<p id="suc_desc" class="desc">感谢你的参与，微信坚决反对色情、暴力、欺诈等违规信息，我们会认真处理你的投诉，维护绿色、健康的网络环境。</p>
	</div>
	<div class="opr_area">
		<a id="successBtn_1" class="btn btn_primary" href="javascript:;">确定</a>
	</div>
</div>

		
	</div>    

	<div id="result" style="display:none;">
    <script type="text/html" id="result_tmpl">
		
<div class="page_msg">
	<div class="icon_area"><i class="icon_msg "></i></div>
	<div class="text_area">
		<h2 id="" class="title"><#=title#></h2>
		<p id="result_desc" class="desc"><#=desc#></p>
	</div>
	<div class="opr_area">
		<a id="successBtn_1" class="btn btn_primary" href="javascript:;">确定</a>
	</div>
</div>

	</script>
	</div>    

	
	
<div id="submit_confirm" style="display:none;" class="page_msg">
	<div class="icon_area"><i class="icon_msg warn"></i></div>
	<div class="text_area">
		<h2 class="title"></h2>
		<p class="desc">
        文章抄袭投诉将会以此公众帐号的主体身份<span id="contractor"></span>发起投诉。		</p>
		<p class="desc">平台规定只有内容的原作者或独家授权公众帐号才能发起抄袭侵权投诉，非权利人不得发起投诉。如发现非权利人发起的抄袭侵权投诉，将判定为恶意投诉，平台对恶意投诉的公众帐号进行封号处理。</p>
	</div>
	<div class="opr_area">
		<a id="confirm_ok" class="btn btn_primary" href="javascript:;">确定投诉</a>
		<a id="confirm_cancel" class="btn btn_default" href="javascript:;">取消</a>
	</div>
</div>

	

	
	<div id="no_manager" style="display:none;" class="page_msg">
		<div class="icon_area"><i class="icon_msg success warn"></i></div>
		<div class="text_area">
			<h2 class="title">未绑定管理员微信号</h2>
			<p class="desc">
			抄袭投诉需要原创文章的公众号进行手机微信确认，由于此公众号并无绑定管理员微信号，无法进行确认。如需投诉，请上公众平台侵权投诉页面进行投诉。				<a id="mpComplainGuidUrl" href="javascript:void(0);">如何进入侵权投诉页面</a>
			</p>
		</div>
		<div class="opr_area">
			<a id="successBtn_2" class="btn btn_primary" href="javascript:;">确定</a>
		</div>
	</div>
	
	
	
	
	
	
	
</div>

        <script nonce="">
    var __DEBUGINFO = {
        debug_js : "http://res.wx.qq.com/mmbizwap/zh_CN/htmledition/js/biz_wap/debug/console2ca724.js",
        safe_js : "http://res.wx.qq.com/mmbizwap/zh_CN/htmledition/js/biz_wap/safe/moonsafe2f3e84.js",
        res_list: []
    };
</script>

<script nonce="">
(function() {
	function _addVConsole(uri) {
		var url = '//res.wx.qq.com/mmbizwap/zh_CN/htmledition/js/vconsole/' + uri;
		document.write('<script nonce="" type="text/javascript" src="' + url + '"><\/script>');
	}
	if (
		(document.cookie && document.cookie.indexOf('vconsole_open=1') > -1)
		|| location.href.indexOf('vconsole=1') > -1
	) {
		_addVConsole('2.5.1/vconsole.min.js');
		_addVConsole('plugin/vconsole-elements/1.0.2/vconsole-elements.min.js');
		_addVConsole('plugin/vconsole-sources/1.0.1/vconsole-sources.min.js');
		_addVConsole('plugin/vconsole-resources/1.0.0/vconsole-resources.min.js');
		_addVConsole('plugin/vconsole-mpopt/1.0.0/vconsole-mpopt.js');
	}
})();
</script>
        <script>window.moon_map = {"biz_common/utils/respTypes.js":"http://res.wx.qq.com/mmbizwap/zh_CN/htmledition/js/biz_common/utils/respTypes2c57d0.js","biz_common/utils/url/parse.js":"http://res.wx.qq.com/mmbizwap/zh_CN/htmledition/js/biz_common/utils/url/parse2fb01a.js","biz_common/tmpl.js":"http://res.wx.qq.com/mmbizwap/zh_CN/htmledition/js/biz_common/tmpl2b3578.js","complain/tips.js":"http://res.wx.qq.com/mmbizwap/zh_CN/htmledition/js/complain/tips23a582.js","complain/localstorage.js":"http://res.wx.qq.com/mmbizwap/zh_CN/htmledition/js/complain/localstorage23a582.js","biz_wap/jsapi/core.js":"http://res.wx.qq.com/mmbizwap/zh_CN/htmledition/js/biz_wap/jsapi/core2ffa93.js","biz_wap/utils/ajax.js":"http://res.wx.qq.com/mmbizwap/zh_CN/htmledition/js/biz_wap/utils/ajax2f1747.js","biz_common/dom/class.js":"http://res.wx.qq.com/mmbizwap/zh_CN/htmledition/js/biz_common/dom/class275627.js","biz_common/dom/event.js":"http://res.wx.qq.com/mmbizwap/zh_CN/htmledition/js/biz_common/dom/event275627.js","biz_common/utils/string/html.js":"http://res.wx.qq.com/mmbizwap/zh_CN/htmledition/js/biz_common/utils/string/html29f4e9.js","complain/droit.js":"http://res.wx.qq.com/mmbizwap/zh_CN/htmledition/js/complain/droit2c060f.js"};</script><script type="text/javascript" src=""></script>
<script id="not_the_same_suc_tpl" type="text/html">
投诉需原创文章公众帐号管理员进行确认，已向该管理员发送通知，确认后投诉生效。</script>
<script id="reject_tpl" type="text/html">
感谢你的参与，经过原创文章的公众帐号管理员确认，已拒绝对抄袭文章发起投诉，投诉单已被退回。</script>
<script id="the_same_suc_tpl" type="text/html">
感谢你的参与，微信坚决反对色情、暴力、欺诈等违规信息，我们会认真处理你的投诉，维护绿色、健康的网络环境。</script>
<script>
var copyTitle ="你肯定没见过这样的“英雄”";
var content_url = "http://mp.weixin.qq.com/s?__biz=MjM5MzIxNDQwOQ==&amp;mid=2650944176&amp;idx=1&amp;sn=9ca4a67ee87f3c7ff52158967d2ac7a8&amp;chksm=bd6ce8168a1b610023e05575ccaaf0e14a80b1e05658a70e0836172a89dc9a0c85ac7715b7a4#rd";
var uin = "MTEzOTg2MDU=";
var key = "cde9f53f8128acbdadb9500c88a15af79395c9ee800d33ca69e2098c3f197a9433d947d91c64a8d18f2eba732983a0f7b09934ec0ddd5154b508abfe7d8840e2b99835c76174867b4b72a248c46cf394";
var pass_ticket = "kkiqsaA+jOr1mdVs0ESIGfLz9Qo2xFndM/D1pgi5lKU=";

</script>

    

<!--tailTrap<body></body><head></head><html></html>-->
</body></html>
