<html><head>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="format-detection" content="telephone=no">
    <script src="http://lib.sinaapp.com/js/jquery/2.0.3/jquery-2.0.3.min.js"></script>
    <title>投诉</title>

<!--    <script type="text/javascript">
        var id = 28308;
        var key = 12;
        (new Image()).src = '';
    </script>-->
    <link rel="stylesheet" href="http://res.wx.qq.com/mmbizwap/zh_CN/htmledition/style/page/complain/w_complain304289.css">

</head>
<body class="zh_CN " ontouchstart="">

<div class="page_bd">
    <div id="tips" style="display:none;" class="top_tips warning"></div>

    <div id="step1" class="category_item">
        <h3 class="category_title">请选择投诉原因</h3>
        <form id="form1">
            <ul class="checkbox_list">
                <li data-type="1" class="checkbox" data-txt="欺诈">
                    <input id="radio_1" name="complaintype" value="2" class="frm_checkbox" type="radio">
                    <label for="radio_1" class="frm_checkbox_label checkbox_title">
                        <div class="checkbox_label_inner">欺诈</div>
                    </label>
                </li>
                <li data-type="2" class="checkbox" data-txt="色情">
                    <input id="radio_2" name="complaintype" value="1" class="frm_checkbox" type="radio">
                    <label for="radio_2" class="frm_checkbox_label checkbox_title">
                        <div class="checkbox_label_inner">色情</div>
                    </label>
                </li>
                <li data-type="3" class="checkbox" data-txt="政治谣言">
                    <input id="radio_3" name="complaintype" value="16" class="frm_checkbox" type="radio">
                    <label for="radio_3" class="frm_checkbox_label checkbox_title">
                        <div class="checkbox_label_inner">政治谣言</div>
                    </label>
                </li>
                <li data-type="4" class="checkbox" data-txt="常识性谣言">
                    <input id="radio_4" name="complaintype" value="128" class="frm_checkbox" type="radio">
                    <label for="radio_4" class="frm_checkbox_label checkbox_title">
                        <div class="checkbox_label_inner">常识性谣言</div>
                    </label>
                </li>
                <li data-type="5" class="checkbox" data-txt="诱导分享">
                    <input id="radio_5" name="complaintype" value="1024" class="frm_checkbox" type="radio">
                    <label for="radio_5" class="frm_checkbox_label checkbox_title">
                        <div class="checkbox_label_inner">诱导分享</div>
                    </label>
                </li>
                <li data-type="6" class="checkbox" data-txt="恶意营销">
                    <input id="radio_6" name="complaintype" value="512" class="frm_checkbox" type="radio">
                    <label for="radio_6" class="frm_checkbox_label checkbox_title">
                        <div class="checkbox_label_inner">恶意营销</div>
                    </label>
                </li>
                <li data-type="7" class="checkbox" data-txt="隐私信息收集">
                    <input id="radio_7" name="complaintype" value="64" class="frm_checkbox" type="radio">
                    <label for="radio_7" class="frm_checkbox_label checkbox_title">
                        <div class="checkbox_label_inner">隐私信息收集</div>
                    </label>
                </li>
                <li data-type="8" data-article="1" class="checkbox" data-txt="抄袭公众号文章">
                    <input id="radio_8" name="complaintype" value="reportpage" class="frm_checkbox" type="radio">
                    <label for="radio_8" class="frm_checkbox_label checkbox_title">
                        <div class="checkbox_label_inner">抄袭公众号文章</div>
                    </label>
                </li>
                <li data-type="9" class="checkbox" data-txt="其他侵权类（冒名、诽谤、抄袭）">
                    <input id="radio_9" name="complaintype" value="other" class="frm_checkbox" type="radio">
                    <label for="radio_9" class="frm_checkbox_label checkbox_title">
                        <div class="checkbox_label_inner">其他侵权类（冒名、诽谤、抄袭）</div>
                    </label>
                </li>
                <li data-type="10" data-article="1" class="checkbox" data-txt="违规声明原创">
                    <input id="radio_10" name="complaintype" value="original_complain" class="frm_checkbox" type="radio">
                    <label for="radio_10" class="frm_checkbox_label checkbox_title">
                        <div class="checkbox_label_inner">违规声明原创</div>
                    </label>
                </li>
            </ul>
        </form>
        <div class="opr_area">
            <a id="nextBtn" href="
" class="btn btn_primary btn_disabled js_btn_submit" style="color:#adf18f">下一步</a>
        </div>
        
        <script>
            $(function(){
                $(".frm_checkbox").click(function(){
                    var title = $(this).parent().attr('data-txt');
                    if(title == "其他侵权类（冒名、诽谤、抄袭）"){
                        $("#nextBtn").attr('href','/m/complainttort?title='+title+'&aid={{$aid}}').css("color","white");
                    }else if(title == "抄袭公众号文章"){
                        $("#nextBtn").attr('href','/m/complaintcopy?title='+title+'&aid={{$aid}}').css("color","white");
                    }else{
                          $("#nextBtn").attr('href','/m/complainttext?title='+title+'&aid={{$aid}}').css("color","white");
                    }
                  
//                    var con = $(this).parent().attr('data-txt');
//                    console.log(con);
                });
            });
        </script>
    </div>



    <div id="step2" class="category_item" style="display: none;">
        <h3 class="category_title">投诉描述</h3>
        <form>
            <div id="textareaDiv" class="textarea_panel">
                <textarea id="reasonText"></textarea>
                <i id="reasonTextTips" class="ic ic_warning ic_small"></i>
                <span id="textareaLenSpan" class="frm_hint"><span id="textLen">0</span>/50</span>
            </div>
        </form>
        <div class="opr_area">
            <a id="submitBtn" href="javascript:" class="btn btn_primary btn_disabled js_btn_submit">提交</a>
        </div>
    </div>


    <div id="step3" style="display: none;">
    </div>


</div>

<!--<script nonce="">
    var __DEBUGINFO = {
        debug_js : "http://res.wx.qq.com/mmbizwap/zh_CN/htmledition/js/biz_wap/debug/console2ca724.js",
        safe_js : "http://res.wx.qq.com/mmbizwap/zh_CN/htmledition/js/biz_wap/safe/moonsafe2f3e84.js",
        res_list: []
    };
</script>-->

<script nonce="">
//    (function() {
//        function _addVConsole(uri) {
//            var url = '//res.wx.qq.com/mmbizwap/zh_CN/htmledition/js/vconsole/' + uri;
//            document.write('<script nonce="" type="text/javascript" src="' + url + '"><\/script>');
//        }
//        if (
//                (document.cookie && document.cookie.indexOf('vconsole_open=1') > -1)
//                || location.href.indexOf('vconsole=1') > -1
//        ) {
//            _addVConsole('2.5.1/vconsole.min.js');
//            _addVConsole('plugin/vconsole-elements/1.0.2/vconsole-elements.min.js');
//            _addVConsole('plugin/vconsole-sources/1.0.1/vconsole-sources.min.js');
//            _addVConsole('plugin/vconsole-resources/1.0.0/vconsole-resources.min.js');
//            _addVConsole('plugin/vconsole-mpopt/1.0.0/vconsole-mpopt.js');
//        }
//    })();
</script>
<!--<script></script><script type="text/javascript" src=""></script>-->
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

<!--<script>
    var uin = "MTEzOTg2MDU=";
    var key = "cde9f53f8128acbdc66ede05f00cd3905be7cb214ce6817a8637ef66811d655fbf17b11a26ed4e1019cca4aeb7e45cc1886feadc59280f22de6bc800091d108570bc00727009a275726a46c71131da98";
    var pass_ticket = "SiVybmLREEds9QO1O3k5t+JkhZ3vuQT4fHvPxMb4K8A=";
    window.cgiData = {
        from : "0"*1
    };

</script>-->



<!--tailTrap<body></body><head></head><html></html>-->
</body>
<!--<iframe id="ping_iframe" src=" weixinping://iframe " style="display: none;"></iframe><iframe id="__WeixinJSBridgeIframe_SetResult" src="weixin://private/setresult/SCENE_FETCHQUEUE&amp;eyJfX2pzb25fbWVzc2FnZSI6WyJ7XCJmdW5jXCI6XCJoaWRlT3B0aW9uTWVudVwiLFwicGFyYW1zXCI6e30sXCJfX21zZ190eXBlXCI6XCJjYWxsXCIsXCJfX2NhbGxiYWNrX2lkXCI6XCIxMDAwXCJ9Iiwie1wiZnVuY1wiOlwibG9nXCIsXCJwYXJhbXNcIjp7XCJtc2dcIjpcIl9ydW5PbjNyZEFwaUxpc3QgOiBtZW51OnNoYXJlOnRpbWVsaW5lLG1lbnU6c2hhcmU6YXBwbWVzc2FnZSxtZW51OnNoYXJlOnFxLG9uVm9pY2VSZWNvcmRFbmQsb25Wb2ljZVBsYXlCZWdpbixvblZvaWNlUGxheUVuZCxvbkxvY2FsSW1hZ2VVcGxvYWRQcm9ncmVzcyxvbkltYWdlRG93bmxvYWRQcm9ncmVzcyxvblZvaWNlVXBsb2FkUHJvZ3Jlc3Msb25Wb2ljZURvd25sb2FkUHJvZ3Jlc3Msb25WaWRlb1VwbG9hZFByb2dyZXNzLG9uTWVkaWFGaWxlVXBsb2FkUHJvZ3Jlc3MsbWVudTpzZXRmb250LG1lbnU6c2hhcmU6d2VpYm8sbWVudTpzaGFyZTplbWFpbCx3eGRvd25sb2FkOnN0YXRlX2NoYW5nZSx3eGRvd25sb2FkOnByb2dyZXNzX2NoYW5nZSxoZE9uRGV2aWNlU3RhdGVDaGFuZ2VkLGFjdGl2aXR5OnN0YXRlX2NoYW5nZSxvbldYRGV2aWNlQmx1ZXRvb3RoU3RhdGVDaGFuZ2Usb25XWERldmljZUxhblN0YXRlQ2hhbmdlLG9uV1hEZXZpY2VCaW5kU3RhdGVDaGFuZ2Usb25SZWNlaXZlRGF0YUZyb21XWERldmljZSxvblNjYW5XWERldmljZVJlc3VsdCxvbldYRGV2aWNlU3RhdGVDaGFuZ2Usb25OZmNUb3VjaCxvbkJlYWNvbk1vbml0b3Jpbmcsb25CZWFjb25zSW5SYW5nZSxtZW51OmN1c3RvbSxvblNlYXJjaERhdGFSZWFkeSxvblNlYXJjaEltYWdlTGlzdFJlYWR5LG9uVGVhY2hTZWFyY2hEYXRhUmVhZHksb25TZWFyY2hJbnB1dENoYW5nZSxvblNlYXJjaElucHV0Q29uZmlybSxvblNlYXJjaFN1Z2dlc3Rpb25EYXRhUmVhZHksb25NdXNpY1N0YXR1c0NoYW5nZWQsb25QdWxsRG93blJlZnJlc2gsb25QYWdlU3RhdGVDaGFuZ2Usb25HZXRLZXlib2FyZEhlaWdodCxvbkdldFNtaWxleSxvbkdldEE4S2V5VXJsLGRlbGV0ZUFjY291bnRTdWNjZXNzLG9uR2V0TXNnUHJvb2ZJdGVtcyxXTkpTSGFuZGxlckluc2VydCxXTkpTSGFuZGxlck11bHRpSW5zZXJ0LFdOSlNIYW5kbGVyRXhwb3J0RGF0YSxXTkpTSGFuZGxlckhlYWRlckFuZEZvb3RlckNoYW5nZSxXTkpTSGFuZGxlckVkaXRhYmxlQ2hhbmdlLFdOSlNIYW5kbGVyRWRpdGluZ0NoYW5nZSxXTkpTSGFuZGxlclNhdmVTZWxlY3Rpb25SYW5nZSxXTkpTSGFuZGxlckxvYWRTZWxlY3Rpb25SYW5nZSxzaG93TG9hZGluZyxnZXRTZWFyY2hFbW90aW9uRGF0YUNhbGxCYWNrLG9uTmF2aWdhdGlvbkJhclJpZ2h0QnV0dG9uQ2xpY2tcIn0sXCJfX21zZ190eXBlXCI6XCJjYWxsXCIsXCJfX2NhbGxiYWNrX2lkXCI6XCIxMDAxXCJ9Iiwie1wiZnVuY1wiOlwibG9nXCIsXCJwYXJhbXNcIjp7XCJtc2dcIjpcInNldCBmb250IHNpemUgd2l0aCB3ZWJraXRUZXh0U2l6ZUFkanVzdDogMlwifSxcIl9fbXNnX3R5cGVcIjpcImNhbGxcIixcIl9fY2FsbGJhY2tfaWRcIjpcIjEwMDJcIn0iLCJ7XCJmdW5jXCI6XCJzZXRGb250U2l6ZUNhbGxiYWNrXCIsXCJwYXJhbXNcIjp7XCJmb250U2l6ZVwiOlwiMlwifSxcIl9fbXNnX3R5cGVcIjpcImNhbGxcIixcIl9fY2FsbGJhY2tfaWRcIjpcIjEwMDNcIn0iXSwiX19zaGFfa2V5IjoiMzkwOTFkY2JmM2MzM2FjNGQ3ZmFiZTJkZjdjYWJmNTQ2ODJlYTA0NCJ9" style="display: none;"></iframe><iframe id="__WeixinJSBridgeIframe" src="weixin://dispatch_message/" style="display: none;"></iframe></html>-->