<html><head>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="format-detection" content="telephone=no">
    <script src="http://lib.sinaapp.com/js/jquery/2.0.3/jquery-2.0.3.min.js"></script>
    <title>投诉</title>

    <script type="text/javascript">
        var id = 28308;
        var key = 12;

    </script>

    <link rel="stylesheet" href="http://res.wx.qq.com/mmbizwap/zh_CN/htmledition/style/page/complain/w_complain304289.css">

</head>
<body class="zh_CN " ontouchstart="">

<div class="page_bd">
    <div id="tips" style="display: none; top: 0px;" class="top_tips warning"></div>





    <div id="step2" class="category_item">
        <h3 class="category_title">投诉描述</h3>
        <form>
            <div id="textareaDiv" class="textarea_panel">
                <textarea id="reasonText" autofocus="autofocus"  maxlength="50" onchange="this.value=this.value.substring(0, 50)" onkeydown="this.value=this.value.substring(0, 50)" onkeyup="size(this);"  style="            display: block;
            width: 100%;
            outline: none;
            border: 0 #D7D7D7;
            padding: 10px 15px;
            height: 60px;"></textarea>
                <i id="reasonTextTips" class="ic ic_warning ic_small"></i>
                <span id="textareaLenSpan" class="frm_hint"><span id="textLen">0</span>/50</span>
            </div>
        </form>
        
        
        <script>
//            $(function(){alert('1');
//                $("#reasonText").keyup(function(){
//                    alert('1');
//                });
//                if($('#reasonText').val().length >0){ alert('11');
//                    var title = $("#title").val();
//                    var con = $(this).val();
//                    $("#nextBtn").attr('href','/m/complainttextcommit?content='+con+'&title='+title).css("color","white");
//                }
//            });
        </script>
        <div class="opr_area">
            <a id="submitBtn" href="javascript:" class="btn btn_primary btn_disabled js_btn_submit">提交</a>
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
            if(str > 1){
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

    <div id="step3" style="display: none;">
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
<script>window.moon_map = {"biz_common/utils/respTypes.js":"http://res.wx.qq.com/mmbizwap/zh_CN/htmledition/js/biz_common/utils/respTypes2c57d0.js","biz_common/utils/url/parse.js":"http://res.wx.qq.com/mmbizwap/zh_CN/htmledition/js/biz_common/utils/url/parse2fb01a.js","biz_common/tmpl.js":"http://res.wx.qq.com/mmbizwap/zh_CN/htmledition/js/biz_common/tmpl2b3578.js","complain/tips.js":"http://res.wx.qq.com/mmbizwap/zh_CN/htmledition/js/complain/tips23a582.js","biz_wap/jsapi/core.js":"http://res.wx.qq.com/mmbizwap/zh_CN/htmledition/js/biz_wap/jsapi/core2ffa93.js","biz_wap/utils/ajax.js":"http://res.wx.qq.com/mmbizwap/zh_CN/htmledition/js/biz_wap/utils/ajax2f1747.js","biz_common/dom/class.js":"http://res.wx.qq.com/mmbizwap/zh_CN/htmledition/js/biz_common/dom/class275627.js","biz_common/dom/event.js":"http://res.wx.qq.com/mmbizwap/zh_CN/htmledition/js/biz_common/dom/event275627.js","biz_common/utils/string/html.js":""};</script><script type="text/javascript" src=""></script>
<script id="result_tmpl" type="text/html">


    <div class="page_msg">
        <div class="icon_area"><i class="icon_msg "></i></div>
        <div class="text_area">
            <h2 id="" class="title"></h2>
            <p id="result_desc" class="desc"></p>
        </div>
        <div class="opr_area">
            <a id="successBtn_1" class="btn btn_primary" href="javascript:;">确定</a>
        </div>
    </div>
    

</script>

<script id="success_text_tmpl" type="text/html">
    感谢你的参与，微信坚决反对色情、暴力、欺诈等违规信息，我们会认真处理你的投诉，维护绿色、健康的网络环境。</script>
<script id="ori_fail_text_tmpl" type="text/html">
    你投诉的文章未进行原创声明，感谢你的参与。微信坚决反对色情、暴力、欺诈等违规信息，我们会认真处理你的投诉，维护绿色、健康的网络环境。</script>

<script>
    var uin = "MTEzOTg2MDU=";
    var key = "cde9f53f8128acbd25cf8d705167c0457a4a82f5c1f37cb41b3dfc773e09c02ecdc06de13963dddde91dee00aaea11c9b8261e6c2739811c12be591301cc4a26b969f2343432e636a699d64b54dbbae7";
    var pass_ticket = "SiVybmLREEds9QO1O3k5t+JkhZ3vuQT4fHvPxMb4K8A=";
    window.cgiData = {
        from : "0"*1
    };

</script>
{{--<script type="text/javascript">--}}
    {{--//多行文本输入框剩余字数计算--}}
    {{--function checkMaxInput(obj, maxLen) {--}}
        {{--if (obj == null || obj == undefined || obj == "") {--}}
            {{--return;--}}
        {{--}--}}
        {{--if (maxLen == null || maxLen == undefined || maxLen == "") {--}}
            {{--maxLen = 100;--}}
        {{--}--}}

        {{--var strResult;--}}
        {{--var $obj = $(obj);--}}
        {{--var newid = $obj.attr("id") + 'msg';--}}

        {{--if (obj.value.length > maxLen) { //如果输入的字数超过了限制--}}
            {{--obj.value = obj.value.substring(0, maxLen); //就去掉多余的字--}}
            {{--strResult = '<span id="' + newid + '" class=\'Max_msg\' ><br/>剩(' + (maxLen - obj.value.length) + ')字</span>'; //计算并显示剩余字数--}}
        {{--}--}}
        {{--else {--}}
            {{--strResult = '<span id="' + newid + '" class=\'Max_msg\' ><br/>剩(' + (maxLen - obj.value.length) + ')字</span>'; //计算并显示剩余字数--}}
        {{--}--}}

        {{--var $msg = $("#" + newid);--}}
        {{--if ($msg.length == 0) {--}}
            {{--$obj.after(strResult);--}}
        {{--}--}}
        {{--else {--}}
            {{--$msg.html(strResult);--}}
        {{--}--}}
    {{--}--}}

    {{--//清空剩除字数提醒信息--}}
    {{--function resetMaxmsg() {--}}
        {{--$("span.Max_msg").remove();--}}
    {{--}--}}
{{--</script>--}}


<!--tailTrap<body></body><head></head><html></html>-->
</body><iframe id="ping_iframe" src=" weixinping://iframe " style="display: none;"></iframe><iframe id="__WeixinJSBridgeIframe_SetResult" src="" style="display: none;"></iframe><iframe id="__WeixinJSBridgeIframe" src="" style="display: none;"></iframe></html>