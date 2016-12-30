<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=0">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="format-detection" content="telephone=no">
    <script src="http://lib.sinaapp.com/js/jquery/2.0.3/jquery-2.0.3.min.js"></script>


    <title>{{$data->title}}</title>

    <style>html {
            -ms-text-size-adjust: 100%;
            -webkit-text-size-adjust: 100%;
            line-height: 1.6
        }

        body {
            -webkit-touch-callout: none;
            font-family: -apple-system-font, "Helvetica Neue", "PingFang SC", "Hiragino Sans GB", "Microsoft YaHei", sans-serif;
            background-color: #f3f3f3;
            line-height: inherit
        }

        body.rich_media_empty_extra {
            background-color: #fff
        }

        body.rich_media_empty_extra .rich_media_area_primary:before {
            display: none
        }

        h1, h2, h3, h4, h5, h6 {
            font-weight: 400;
            font-size: 16px
        }

        * {
            margin: 0;
            padding: 0
        }

        a {
            color: #607fa6;
            text-decoration: none
        }

        .rich_media_inner {
            font-size: 16px;
            word-wrap: break-word;
            -webkit-hyphens: auto;
            -ms-hyphens: auto;
            hyphens: auto
        }

        .rich_media_area_primary {
            position: relative;
            padding: 20px 15px 15px;
            background-color: #fff
        }

        .rich_media_area_primary:before {
            content: " ";
            position: absolute;
            left: 0;
            top: 0;
            width: 100%;
            height: 1px;
            border-top: 1px solid #e5e5e5;
            -webkit-transform-origin: 0 0;
            transform-origin: 0 0;
            -webkit-transform: scaleY(0.5);
            transform: scaleY(0.5);
            top: auto;
            bottom: -2px
        }

        .rich_media_area_primary .original_img_wrp {
            display: inline-block;
            font-size: 0
        }

        .rich_media_area_primary .original_img_wrp .tips_global {
            display: block;
            margin-top: .5em;
            font-size: 14px;
            text-align: right;
            width: auto;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
            word-wrap: normal
        }

        .rich_media_area_extra {
            padding: 0 15px 0
        }

        .rich_media_title {
            margin-bottom: 10px;
            line-height: 1.4;
            font-weight: 400;
            font-size: 24px
        }

        .rich_media_meta_list {
            margin-bottom: 18px;
            line-height: 20px;
            font-size: 0
        }

        .rich_media_meta_list em {
            font-style: normal
        }

        .rich_media_meta {
            display: inline-block;
            vertical-align: middle;
            margin-right: 8px;
            margin-bottom: 10px;
            font-size: 16px
        }

        .meta_original_tag {
            display: inline-block;
            vertical-align: middle;
            padding: 1px .5em;
            border: 1px solid #9e9e9e;
            color: #8c8c8c;
            border-top-left-radius: 20% 50%;
            -moz-border-radius-topleft: 20% 50%;
            -webkit-border-top-left-radius: 20% 50%;
            border-top-right-radius: 20% 50%;
            -moz-border-radius-topright: 20% 50%;
            -webkit-border-top-right-radius: 20% 50%;
            border-bottom-left-radius: 20% 50%;
            -moz-border-radius-bottomleft: 20% 50%;
            -webkit-border-bottom-left-radius: 20% 50%;
            border-bottom-right-radius: 20% 50%;
            -moz-border-radius-bottomright: 20% 50%;
            -webkit-border-bottom-right-radius: 20% 50%;
            font-size: 15px;
            line-height: 1.1
        }

        .meta_enterprise_tag img {
            width: 30px;
            height: 30px !important;
            display: block;
            position: relative;
            margin-top: -3px;
            border: 0
        }

        .rich_media_meta_text {
            color: #8c8c8c
        }

        span.rich_media_meta_nickname {
            display: none
        }

        .rich_media_thumb_wrp {
            margin-bottom: 6px
        }

        .rich_media_thumb_wrp .original_img_wrp {
            display: block
        }

        .rich_media_thumb {
            display: block;
            width: 100%
        }

        .rich_media_content {
            overflow: hidden;
            color: #3e3e3e
        }

        .rich_media_content * {
            max-width: 100% !important;
            box-sizing: border-box !important;
            -webkit-box-sizing: border-box !important;
            word-wrap: break-word !important
        }

        .rich_media_content p {
            clear: both;
            min-height: 1em;
            white-space: pre-wrap
        }

        .rich_media_content em {
            font-style: italic
        }

        .rich_media_content fieldset {
            min-width: 0
        }

        .rich_media_content .list-paddingleft-2 {
            padding-left: 30px
        }

        .rich_media_content blockquote {
            margin: 0;
            padding-left: 10px;
            border-left: 3px solid #dbdbdb
        }

        img {
            height: auto !important
        }

        @media (min-device-width: 375px) and (max-device-width: 667px) and (-webkit-min-device-pixel-ratio: 2) {
            .mm_appmsg .rich_media_inner, .mm_appmsg .rich_media_meta, .mm_appmsg .discuss_list, .mm_appmsg .rich_media_extra, .mm_appmsg .title_tips .tips {
                font-size: 17px
            }

            .mm_appmsg .meta_original_tag {
                font-size: 15px
            }
        }

        @media (min-device-width: 414px) and (max-device-width: 736px) and (-webkit-min-device-pixel-ratio: 3) {
            .mm_appmsg .rich_media_title {
                font-size: 25px
            }
        }

        @media screen and (min-width: 1024px) {
            .rich_media {
                width: 740px;
                margin-left: auto;
                margin-right: auto
            }

            .rich_media_inner {
                padding: 20px
            }

            body {
                background-color: #fff
            }
        }

        @media screen and (min-width: 1025px) {
            body {
                font-family: "Helvetica Neue", Helvetica, "Hiragino Sans GB", "Microsoft YaHei", Arial, sans-serif
            }

            .rich_media {
                position: relative
            }

            .rich_media_inner {
                background-color: #fff;
                padding-bottom: 100px
            }
        }

        .radius_avatar {
            display: inline-block;
            background-color: #fff;
            padding: 3px;
            border-radius: 50%;
            -moz-border-radius: 50%;
            -webkit-border-radius: 50%;
            overflow: hidden;
            vertical-align: middle
        }

        .radius_avatar img {
            display: block;
            width: 100%;
            height: 100%;
            border-radius: 50%;
            -moz-border-radius: 50%;
            -webkit-border-radius: 50%;
            background-color: #eee
        }

        .cell {
            padding: .8em 0;
            display: block;
            position: relative
        }

        .cell_hd, .cell_bd, .cell_ft {
            display: table-cell;
            vertical-align: middle;
            word-wrap: break-word;
            word-break: break-all;
            white-space: nowrap
        }

        .cell_primary {
            width: 2000px;
            white-space: normal
        }

        .flex_cell {
            padding: 10px 0;
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-align: center;
            -webkit-align-items: center;
            -ms-flex-align: center;
            align-items: center
        }

        .flex_cell_primary {
            width: 100%;
            -webkit-box-flex: 1;
            -webkit-flex: 1;
            -ms-flex: 1;
            box-flex: 1;
            flex: 1
        }

        .original_tool_area {
            display: block;
            padding: .75em 1em 0;
            -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
            color: #3e3e3e;
            border: 1px solid #eaeaea;
            margin: 20px 0
        }

        .original_tool_area .tips_global {
            position: relative;
            padding-bottom: .5em;
            font-size: 15px
        }

        .original_tool_area .tips_global:after {
            content: " ";
            position: absolute;
            left: 0;
            bottom: 0;
            right: 0;
            height: 1px;
            border-bottom: 1px solid #dbdbdb;
            -webkit-transform-origin: 0 100%;
            transform-origin: 0 100%;
            -webkit-transform: scaleY(0.5);
            transform: scaleY(0.5)
        }

        .original_tool_area .radius_avatar {
            width: 27px;
            height: 27px;
            padding: 0;
            margin-right: .5em
        }

        .original_tool_area .radius_avatar img {
            height: 100% !important
        }

        .original_tool_area .flex_cell_bd {
            width: auto;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
            word-wrap: normal
        }

        .original_tool_area .flex_cell_ft {
            font-size: 14px;
            color: #8c8c8c;
            padding-left: 1em;
            white-space: nowrap
        }

        .original_tool_area .icon_access:after {
            content: " ";
            display: inline-block;
            height: 8px;
            width: 8px;
            border-width: 1px 1px 0 0;
            border-color: #cbcad0;
            border-style: solid;
            transform: matrix(0.71, 0.71, -0.71, 0.71, 0, 0);
            -ms-transform: matrix(0.71, 0.71, -0.71, 0.71, 0, 0);
            -webkit-transform: matrix(0.71, 0.71, -0.71, 0.71, 0, 0);
            position: relative;
            top: -2px;
            top: -1px
        }

        .weui_loading {
            width: 20px;
            height: 20px;
            display: inline-block;
            vertical-align: middle;
            -webkit-animation: weuiLoading 1s steps(12, end) infinite;
            animation: weuiLoading 1s steps(12, end) infinite;
            background: transparent url(data:image/svg+xml;base64,PHN2ZyBjbGFzcz0iciIgd2lkdGg9JzEyMHB4JyBoZWlnaHQ9JzEyMHB4JyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZpZXdCb3g9IjAgMCAxMDAgMTAwIj4KICAgIDxyZWN0IHg9IjAiIHk9IjAiIHdpZHRoPSIxMDAiIGhlaWdodD0iMTAwIiBmaWxsPSJub25lIiBjbGFzcz0iYmsiPjwvcmVjdD4KICAgIDxyZWN0IHg9JzQ2LjUnIHk9JzQwJyB3aWR0aD0nNycgaGVpZ2h0PScyMCcgcng9JzUnIHJ5PSc1JyBmaWxsPScjRTlFOUU5JwogICAgICAgICAgdHJhbnNmb3JtPSdyb3RhdGUoMCA1MCA1MCkgdHJhbnNsYXRlKDAgLTMwKSc+CiAgICA8L3JlY3Q+CiAgICA8cmVjdCB4PSc0Ni41JyB5PSc0MCcgd2lkdGg9JzcnIGhlaWdodD0nMjAnIHJ4PSc1JyByeT0nNScgZmlsbD0nIzk4OTY5NycKICAgICAgICAgIHRyYW5zZm9ybT0ncm90YXRlKDMwIDUwIDUwKSB0cmFuc2xhdGUoMCAtMzApJz4KICAgICAgICAgICAgICAgICByZXBlYXRDb3VudD0naW5kZWZpbml0ZScvPgogICAgPC9yZWN0PgogICAgPHJlY3QgeD0nNDYuNScgeT0nNDAnIHdpZHRoPSc3JyBoZWlnaHQ9JzIwJyByeD0nNScgcnk9JzUnIGZpbGw9JyM5Qjk5OUEnCiAgICAgICAgICB0cmFuc2Zvcm09J3JvdGF0ZSg2MCA1MCA1MCkgdHJhbnNsYXRlKDAgLTMwKSc+CiAgICAgICAgICAgICAgICAgcmVwZWF0Q291bnQ9J2luZGVmaW5pdGUnLz4KICAgIDwvcmVjdD4KICAgIDxyZWN0IHg9JzQ2LjUnIHk9JzQwJyB3aWR0aD0nNycgaGVpZ2h0PScyMCcgcng9JzUnIHJ5PSc1JyBmaWxsPScjQTNBMUEyJwogICAgICAgICAgdHJhbnNmb3JtPSdyb3RhdGUoOTAgNTAgNTApIHRyYW5zbGF0ZSgwIC0zMCknPgogICAgPC9yZWN0PgogICAgPHJlY3QgeD0nNDYuNScgeT0nNDAnIHdpZHRoPSc3JyBoZWlnaHQ9JzIwJyByeD0nNScgcnk9JzUnIGZpbGw9JyNBQkE5QUEnCiAgICAgICAgICB0cmFuc2Zvcm09J3JvdGF0ZSgxMjAgNTAgNTApIHRyYW5zbGF0ZSgwIC0zMCknPgogICAgPC9yZWN0PgogICAgPHJlY3QgeD0nNDYuNScgeT0nNDAnIHdpZHRoPSc3JyBoZWlnaHQ9JzIwJyByeD0nNScgcnk9JzUnIGZpbGw9JyNCMkIyQjInCiAgICAgICAgICB0cmFuc2Zvcm09J3JvdGF0ZSgxNTAgNTAgNTApIHRyYW5zbGF0ZSgwIC0zMCknPgogICAgPC9yZWN0PgogICAgPHJlY3QgeD0nNDYuNScgeT0nNDAnIHdpZHRoPSc3JyBoZWlnaHQ9JzIwJyByeD0nNScgcnk9JzUnIGZpbGw9JyNCQUI4QjknCiAgICAgICAgICB0cmFuc2Zvcm09J3JvdGF0ZSgxODAgNTAgNTApIHRyYW5zbGF0ZSgwIC0zMCknPgogICAgPC9yZWN0PgogICAgPHJlY3QgeD0nNDYuNScgeT0nNDAnIHdpZHRoPSc3JyBoZWlnaHQ9JzIwJyByeD0nNScgcnk9JzUnIGZpbGw9JyNDMkMwQzEnCiAgICAgICAgICB0cmFuc2Zvcm09J3JvdGF0ZSgyMTAgNTAgNTApIHRyYW5zbGF0ZSgwIC0zMCknPgogICAgPC9yZWN0PgogICAgPHJlY3QgeD0nNDYuNScgeT0nNDAnIHdpZHRoPSc3JyBoZWlnaHQ9JzIwJyByeD0nNScgcnk9JzUnIGZpbGw9JyNDQkNCQ0InCiAgICAgICAgICB0cmFuc2Zvcm09J3JvdGF0ZSgyNDAgNTAgNTApIHRyYW5zbGF0ZSgwIC0zMCknPgogICAgPC9yZWN0PgogICAgPHJlY3QgeD0nNDYuNScgeT0nNDAnIHdpZHRoPSc3JyBoZWlnaHQ9JzIwJyByeD0nNScgcnk9JzUnIGZpbGw9JyNEMkQyRDInCiAgICAgICAgICB0cmFuc2Zvcm09J3JvdGF0ZSgyNzAgNTAgNTApIHRyYW5zbGF0ZSgwIC0zMCknPgogICAgPC9yZWN0PgogICAgPHJlY3QgeD0nNDYuNScgeT0nNDAnIHdpZHRoPSc3JyBoZWlnaHQ9JzIwJyByeD0nNScgcnk9JzUnIGZpbGw9JyNEQURBREEnCiAgICAgICAgICB0cmFuc2Zvcm09J3JvdGF0ZSgzMDAgNTAgNTApIHRyYW5zbGF0ZSgwIC0zMCknPgogICAgPC9yZWN0PgogICAgPHJlY3QgeD0nNDYuNScgeT0nNDAnIHdpZHRoPSc3JyBoZWlnaHQ9JzIwJyByeD0nNScgcnk9JzUnIGZpbGw9JyNFMkUyRTInCiAgICAgICAgICB0cmFuc2Zvcm09J3JvdGF0ZSgzMzAgNTAgNTApIHRyYW5zbGF0ZSgwIC0zMCknPgogICAgPC9yZWN0Pgo8L3N2Zz4=) no-repeat;
            -webkit-background-size: 100%;
            background-size: 100%
        }

        @-webkit-keyframes weuiLoading {
            0% {
                -webkit-transform: rotate3d(0, 0, 1, 0deg)
            }
            100% {
                -webkit-transform: rotate3d(0, 0, 1, 360deg)
            }
        }

        @keyframes weuiLoading {
            0% {
                -webkit-transform: rotate3d(0, 0, 1, 0deg)
            }
            100% {
                -webkit-transform: rotate3d(0, 0, 1, 360deg)
            }
        }

        .gif_img_wrp {
            display: inline-block;
            font-size: 0;
            position: relative;
            font-weight: 400;
            font-style: normal;
            text-indent: 0;
            text-shadow: none
        }

        .gif_img_wrp img {
            vertical-align: top
        }

        .gif_img_tips {
            background: rgba(0, 0, 0, 0.6) !important;
            filter: progid:DXImageTransform.Microsoft.gradient(GradientType=0, startColorstr='#99000000', endcolorstr='#99000000');
            border-top-left-radius: 1.2em 50%;
            -moz-border-radius-topleft: 1.2em 50%;
            -webkit-border-top-left-radius: 1.2em 50%;
            border-top-right-radius: 1.2em 50%;
            -moz-border-radius-topright: 1.2em 50%;
            -webkit-border-top-right-radius: 1.2em 50%;
            border-bottom-left-radius: 1.2em 50%;
            -moz-border-radius-bottomleft: 1.2em 50%;
            -webkit-border-bottom-left-radius: 1.2em 50%;
            border-bottom-right-radius: 1.2em 50%;
            -moz-border-radius-bottomright: 1.2em 50%;
            -webkit-border-bottom-right-radius: 1.2em 50%;
            line-height: 2.3;
            font-size: 11px;
            color: #fff;
            text-align: center;
            position: absolute;
            bottom: 10px;
            left: 10px;
            min-width: 65px
        }

        .gif_img_tips.loading {
            min-width: 75px
        }

        .gif_img_tips i {
            vertical-align: middle;
            margin: -0.2em .73em 0 -2px
        }

        .gif_img_play_arrow {
            display: inline-block;
            width: 0;
            height: 0;
            border-width: 8px;
            border-style: dashed;
            border-color: transparent;
            border-right-width: 0;
            border-left-color: #fff;
            border-left-style: solid;
            border-width: 5px 0 5px 8px
        }

        .gif_img_loading {
            width: 14px;
            height: 14px
        }

        i.gif_img_loading {
            margin-left: -4px
        }

        .rich_media_global_msg {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            padding: 1em 35px 1em 15px;
            z-index: 1;
            background-color: #c6e0f8;
            color: #8c8c8c;
            font-size: 13px
        }

        .rich_media_global_msg .icon_closed {
            position: absolute;
            right: 15px;
            top: 50%;
            margin-top: -5px;
            line-height: 300px;
            overflow: hidden;
            -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
            background: transparent no-repeat 0 0;
            width: 11px;
            height: 11px;
            vertical-align: middle;
            display: inline-block;
            -webkit-background-size: 100% auto;
            background-size: 100% auto
        }

        .rich_media_global_msg .icon_closed:active {
            background-position: 0 -17px
        }

        .preview_appmsg .rich_media_title {
            margin-top: 1.9em
        }

        @media screen and (min-width: 1024px) {
            .rich_media_global_msg {
                position: relative;
                margin: 0 20px
            }

            .preview_appmsg .rich_media_title {
                margin-top: 0
            }
        }</style>
    <style>

    </style>
    <!--[if lt IE 9]>
    <link rel="stylesheet" type="text/css"
          href="http://res.wx.qq.com/mmbizwap/zh_CN/htmledition/style/page/appmsg/page_mp_article_improve_pc2c9cd6.css">
    <![endif]-->

    <script nonce="808235210" src="" type="text/javascript" async=""></script>
    <link rel="stylesheet" type="text/css"
          href="/assets/css/wx.css">
</head>
<body id="activity-detail" class="zh_CN mm_appmsg" ontouchstart="">

<script nonce="808235210" type="text/javascript">
    var write_sceen_time = (+new Date());
</script>

<div class="tankuang">
    <style type="text/css">
        body {
            margin: 0px;
        }

        #bg {
            width: 100%;
            height: 100%;
            top: 0px;
            left: 0px;
            position: absolute;
            filter: Alpha(opacity=50);
            opacity: 0.5;
            background: #000000;
            display: none;
            z-index: 10000000
        }

        #popbox {
            position: absolute;
            width: 400px;
            height: 420px;
            left: 50%;
            top: 50%;
            margin: -200px 0 0 -200px;
            display: none;
            background: white;
            z-index: 100000000;
            padding-bottom: 40px;
        }
        .hide{
            display: none;
        }
    </style>
    <script type="text/javascript">

    </script>

    <div id="bg"></div>
    <div id="popbox">
        <center>
            <img src="" class="popbox" style="width:100%">
            <h1>长按识别图中二维码可以关注</h1>
            <a href="#" onclick="pupclose()">点击关闭窗口</a>
        </center>
    </div>

</div>
<div id="js_article" class="rich_media">

    <div id="js_top_ad_area" class="top_banner">

    </div>


    <div class="rich_media_inner">
        <div id="page-content">
            <div id="img-content" class="rich_media_area_primary">
                <h2 class="rich_media_title" id="activity-name">
                    {{$data->title}}
                </h2>
                <div class="rich_media_meta_list">
                    <em id="post-date"
                        class="rich_media_meta rich_media_meta_text"><?php echo date('Y-m-d', strtotime($data->created)); ?></em>
                    <em class="rich_media_meta rich_media_meta_text">{{$data->author or null}}</em>

                    <a class="rich_media_meta rich_media_meta_link rich_media_meta_nickname"
                       href="javascript:fun({{$data->id}});" id="post-user">{{config('app.host_name')}}</a>
                    <span class="rich_media_meta rich_media_meta_text rich_media_meta_nickname">{{$data->title}}</span>
                    <div class="rich_media_thumb_wrp" id="media">
                        <?php if( $data->show_cover_in_text == 1){ ?>

                        <img class="rich_media_thumb" id="js_cover" onerror="this.parentNode.removeChild(this)"  style="visibility: visible !important; height: auto !important;" data-s="300,640" src="{{$data->media_url}}">

                        <?php }  ?>

                    </div>
                    <script>
                        function pupopen() {
                            document.getElementById("bg").style.display = "block";
                            document.getElementById("popbox").style.display = "block";
                        }

                        function pupclose() {
                            document.getElementById("bg").style.display = "none";
                            document.getElementById("popbox").style.display = "none";
                        }
                        function fun(id) {
                            pupopen();

                            $(function () {

                                $.ajax({
                                    url: '/m/qrcode',
                                    type: 'GET',
                                    data: {id: id},
                                    dataType: 'html',
                                    contentType: "application/x-www-form-urlencoded; charset=utf-8",
                                    error: function () {
                                        //alert('Error loading PHP document');
                                    },
                                    success: function (json) {

                                        $("img[src='']").attr("src", json);
                                    }
                                });
                            });
                        }


                    </script>
                    <div id="js_profile_qrcode" class="profile_container" style="display:none;">
                    <!-- <div class="profile_inner">
                                <strong class="profile_nickname">{{$data->title}}</strong>
                                <img class="profile_avatar" id="js_profile_qrcode_img" src="" alt="">

                                <p class="profile_meta">
                                <label class="profile_meta_label">微信号</label>
                                <span class="profile_meta_value">jmqyvip</span>
                                </p>

                                <p class="profile_meta">
                                <label class="profile_meta_label">功能介绍</label>
                                <span class="profile_meta_value">本号提供集团属下江门汽车站、新会汽车站、鹤山汽车站、台山汽车站、开平汽车站和恩平汽车站的班次查询、客运购票、会员账户充值等服务；并附有公交查询、业务简介等查询功能。</span>
                                </p>

                            </div>
                            <span class="profile_arrow_wrp" id="js_profile_arrow_wrp">
                                <i class="profile_arrow arrow_out"></i>
                                <i class="profile_arrow arrow_in"></i>
                            </span> -->
                    </div>
                </div>


                <div class="rich_media_content " id="js_content">{!!$data->content!!}</div>
                @if(!empty($code))
                    <div class="rich_media_content hide " id="js_content">您的邀请码是:{{$code}}</div>
                @endif
                @if(!empty($nextcode))
                    <div class="rich_media_content hide" id="js_content">您的上一位邀请码是:{{$nextcode}}</div>
                @endif
                @if(!empty($link))
                    <div class="rich_media_content" id="js_content">{!! $link !!}</div>
                    <div class="rich_media_content hide" id="js_content">链接地址明码:{{$link}}</div>
                @endif
                <script nonce="808235210" type="text/javascript">
                    var first_sceen__time = (+new Date());

                    if ("" == 1 && document.getElementById('js_content'))
                        document.getElementById('js_content').addEventListener("selectstart", function (e) {
                            e.preventDefault();
                        });

                    (function () {
                        if (navigator.userAgent.indexOf("WindowsWechat") != -1) {
                            var link = document.createElement('link');
                            var head = document.getElementsByTagName('head')[0];
                            link.rel = 'stylesheet';
                            link.type = 'text/css';
                            link.href = "http://res.wx.qq.com/mmbizwap/zh_CN/htmledition/style/page/appmsg/page_mp_article_improve_winwx31619e.css";
                            head.appendChild(link);
                        }
                    })();
                </script>


                <div class="ct_mpda_wrp" id="js_sponsor_ad_area" style="display:none;">

                </div>


                <div class="rich_media_tool" id="js_toobar3">
                    <?php if (!empty($data->ORurl)): ?>
                    <a href="<?php echo $data->ORurl; ?>">阅读原文</a>
                    <?php endif; ?>
                    <div id="js_read_area3" class="media_tool_meta tips_global meta_primary" style="display: block;">阅读
                        <span id="readNum3"><?php echo $data->num; ?></span></div>

                    <span style="display: inline;" class="media_tool_meta meta_primary tips_global meta_praise"
                          id="like3" like="0">
                          <a href="javascript:praise(1)"><i class="icon_praise_gray"></i></a><span class="praise_num"
                                                                                                   id="likeNum3"
                                                                                                   id="num"><?php echo $data->assist; ?></span>
                        </span>
                    <input type="hidden" name="media_id" value="<?php echo $data->id; ?>" id="media_id">
                    <a id="js_report_article3" class="media_tool_meta tips_global meta_extra"
                       href="/m/complaint?aid={{$data->id}}">投诉</a>

                </div>


            </div>

            <div class="rich_media_area_primary sougou" id="sg_tj" style="display:none">

            </div>

            <div class="rich_media_area_extra">


                <div class="mpda_bottom_container" id="js_bottom_ad_area">

                </div>

                <div id="js_iframetest" style="display:none;"></div>

                <div class="rich_media_extra" id="js_cmt_area" style="display: block;">

                    <!--                         <div class="discuss_container" id="js_cmt_main" style="display: none;">
                                                <div class="rich_tips with_line title_tips discuss_title_line">
                                                    <span class="tips">精选留言</span>
                                                </div>
                                                <p class="tips_global tc title_bottom_tips" id="js_cmt_nofans1" style="display:none;">该文章作者已设置需关注才可以留言</p>
                                                <p class="discuss_icon_tips title_bottom_tips tr" id="js_cmt_addbtn1" style="display:none">

                                                                                    <a href="#comment">写留言<img class="icon_edit" src="http://res.wx.qq.com/mmbizwap/zh_CN/htmledition/images/icon/appmsg/icon_edit25ded2.png" alt=""></a>
                                                                                </p>
                                                <ul class="discuss_list" id="js_cmt_list"></ul>
                                            </div> -->


                    <div class="tips_global rich_split_tips tc" id="js_cmt_nofans2" style="display:none;">
                        该文章作者已设置需关注才可以留言
                    </div>

                    <p class="discuss_icon_tips rich_split_tips tr" id="js_cmt_addbtn2" style="display:none;">

                        <a href="#comment">写留言<img class="icon_edit"
                                                   src="http://res.wx.qq.com/mmbizwap/zh_CN/htmledition/images/icon/appmsg/icon_edit25ded2.png"
                                                   alt=""></a>
                    </p>

                    <p class="rich_split_tips tc tips_global" id="js_cmt_tips" style="display: none;"></p>


                    <div class="rich_tips tips_global loading_tips" id="js_cmt_loading" style="display: none;">
                        <img src="http://res.wx.qq.com/mmbizwap/zh_CN/htmledition/images/icon/common/icon_loading_white2805ea.gif"
                             class="rich_icon icon_loading_white" alt="">
                        <span class="tips">加载中</span>
                    </div>

                    <div class="rich_tips with_line tips_global" id="js_cmt_statement" style="display: none;">
                        <span class="tips">以上留言由公众号筛选后显示</span>
                    </div>

                    <p class="rich_split_tips tc" id="js_cmt_qa" style="display: none;">
                        <a href="http://kf.qq.com/touch/sappfaq/150211YfyMVj150313qmMbyi.html?scene_id=kf264">
                            了解留言功能详情
                        </a>
                    </p>

                </div>
            </div>

        </div>
        <div id="js_pc_qr_code" class="qr_code_pc_outer" style="display:none;">
            <div class="qr_code_pc_inner">
                <div class="qr_code_pc">
                    <img id="js_pc_qr_code_img" class="qr_code_pc_img">
                    <p>微信扫一扫<br>关注该公众号</p>
                </div>
            </div>
        </div>

    </div>
</div>


<script nonce="808235210">
    var __DEBUGINFO = {
        debug_js: "http://res.wx.qq.com/mmbizwap/zh_CN/htmledition/js/biz_wap/debug/console2ca724.js",
        safe_js: "http://res.wx.qq.com/mmbizwap/zh_CN/htmledition/js/biz_wap/safe/moonsafe2f3e84.js",
        res_list: []
    };
</script>

<script nonce="808235210">
    (function () {
        function _addVConsole(uri) {
            var url = '//res.wx.qq.com/mmbizwap/zh_CN/htmledition/js/vconsole/' + uri;
            document.write('<script nonce="808235210" type="text/javascript" src="' + url + '"><\/script>');
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

<script nonce="808235210" type="text/javascript">
    var not_in_mm_css = "http://res.wx.qq.com/mmbizwap/zh_CN/htmledition/style/page/appmsg/not_in_mm2c9cd6.css";
    var windowwx_css = "http://res.wx.qq.com/mmbizwap/zh_CN/htmledition/style/page/appmsg/page_mp_article_improve_winwx31619e.css";
    var article_improve_combo_css = "http://res.wx.qq.com/mmbizwap/zh_CN/htmledition/style/page/appmsg/page_mp_article_improve_combo31623d.css";
    var tid = "";
    var aid = "";
    var clientversion = "26031c33";
    var appuin = "MjM5MzIxNDQwOQ==" || "";

    var source = "0";
    var abtest_cookie = "";

    var scene = 75;

    var itemidx = "";

    var _copyright_stat = "0";
    var _ori_article_type = "";

    var nickname = "{{$data->title}}";
    var appmsg_type = "9";
    var ct = "1477637959";
    var publish_time = "2016-10-28" || "";
    var user_name = "gh_5fdf6f776fd0";
    var user_name_new = "";
    var fakeid = "MTEzOTg2MDU=";
    var version = "";
    var is_limit_user = "0";
    var round_head_img = "http://mmbiz.qpic.cn/mmbiz/4bqFlauuXhHOsmI8LpVfnJum18J0JJoWKQnXvoKicDK0P9Tvrv72KJwWgdQ6dicJCBbQxsvenBS89kjdH1ia9GicKQ/0";
    var msg_title = "你肯定没见过这样的“英雄”";
    var msg_desc = "相信大家都看过好莱坞的英雄大片你们脑中的英雄形象是不是都这样在美、日漫画的大浪潮下你是否曾幻想什么时候我们也";
    var msg_cdn_url = "http://mmbiz.qpic.cn/mmbiz_jpg/4bqFlauuXhGHJQO6BRTA9J6Kk1EmXv9T3GrKjLmNBVdx3Dlhav1y6YldpK6icnyJBBnahrHVYzaCNnpmaDb4tMw/0?wx_fmt=jpeg";
    var msg_link = "http://mp.weixin.qq.com/s?__biz=MjM5MzIxNDQwOQ==&amp;mid=2650944176&amp;idx=1&amp;sn=9ca4a67ee87f3c7ff52158967d2ac7a8&amp;chksm=bd6ce8168a1b610023e05575ccaaf0e14a80b1e05658a70e0836172a89dc9a0c85ac7715b7a4#rd";
    var user_uin = "11398605" * 1;
    var msg_source_url = '';
    var img_format = 'jpeg';
    var srcid = '1101XaTCrilLIjXtXHk3yfgz';
    var req_id = '0115SSVWhFIQlBNMCvXZemUY';
    var networkType;
    var appmsgid = '' || '2650944176' || "";
    var comment_id = "987670153" * 1;
    var comment_enabled = "" * 1;
    var is_need_reward = "0" * 1;
    var is_https_res = ("" * 1) && (location.protocol == "https:");
    var msg_daily_idx = "1" || "";

    var devicetype = "android-19";
    var source_encode_biz = "";


    var reprint_ticket = "";
    var source_mid = "";
    var source_idx = "";

    var show_comment = "0";
    var __appmsgCgiData = {
        can_use_page: "0" * 1,
        is_wxg_stuff_uin: "0" * 1,
        card_pos: "",
        copyright_stat: "0",
        source_biz: "",
        hd_head_img: "http://wx.qlogo.cn/mmhead/Q3auHgzwzM4GrOId3SWnPMaNkU7iaYqFnc9sLpmj5kdDZ5gcia3OHjJw/0" || (window.location.protocol + "//" + window.location.host + "http://res.wx.qq.com/mmbizwap/zh_CN/htmledition/images/pic/appmsg/pic_rumor_link.2x264e76.jpg")
    };
    var _empty_v = "http://res.wx.qq.com/mmbizwap/zh_CN/htmledition/images/pic/pages/voice/empty26f1f1.mp3";

    var copyright_stat = "0" * 1;

    var pay_fee = "" * 1;
    var pay_timestamp = "";
    var need_pay = "" * 1;

    var need_report_cost = "0" * 1;
    var use_tx_video_player = "0" * 1;

    var friend_read_source = "" || "";
    var friend_read_version = "" || "";
    var friend_read_class_id = "" || "";

    var is_only_read = "1" * 1;
    var read_num = "" * 1;
    var like_num = "" * 1;
    var liked = "" == 'true' ? true : false;
    var is_temp_url = "" ? 1 : 0;
    var send_time = "";
    var icon_emotion_switch = "http://res.wx.qq.com/mmbizwap/zh_CN/htmledition/images/icon/appmsg/emotion/icon_emotion_switch.2x2f1273.png";
    var icon_emotion_switch_active = "http://res.wx.qq.com/mmbizwap/zh_CN/htmledition/images/icon/appmsg/emotion/icon_emotion_switch_active.2x2f1273.png";
    var icon_loading_white = "http://res.wx.qq.com/mmbizwap/zh_CN/htmledition/images/icon/common/icon_loading_white2805ea.gif";
    var icon_audio_unread = "http://res.wx.qq.com/mmbizwap/zh_CN/htmledition/images/icon/appmsg/audio/icon_audio_unread26f1f1.png";
    var icon_qqmusic_default = "http://res.wx.qq.com/mmbizwap/zh_CN/htmledition/images/icon/appmsg/qqmusic/icon_qqmusic_default.2x26f1f1.png";
    var icon_qqmusic_source = "http://res.wx.qq.com/mmbizwap/zh_CN/htmledition/images/icon/appmsg/qqmusic/icon_qqmusic_source263724.png";

    var topic_default_img = 'http://res.wx.qq.com/mmbizwap/zh_CN/htmledition/images/icon/appmsg/topic/pic_book_thumb.2x2e4987.png';


    var ban_scene = "0" * 1;

    var svr_time = "1477987134" * 1;

    window.wxtoken = "482013994";
    window.__moon_initcallback = function () {
        if (!!window.__initCatch) {
            window.__initCatch({
                idkey: 27613,
                startKey: 0,
                limit: 128,
                badjsId: 43,
                reportOpt: {
                    uin: uin,
                    biz: biz,
                    mid: mid,
                    idx: idx,
                    sn: sn
                },
                extInfo: {
                    network_rate: 0.01,
                    badjs_rate: 0.1
                }
            });
        }
    }


</script>

<script nonce="808235210">window.__moon_host = 'res.wx.qq.com';
    window.__moon_mainjs = 'appmsg/index.js';
    window.moon_map = {
        "appmsg/emotion/caret.js": "http://res.wx.qq.com/mmbizwap/zh_CN/htmledition/js/appmsg/emotion/caret278965.js",
        "biz_wap/jsapi/cardticket.js": "http://res.wx.qq.com/mmbizwap/zh_CN/htmledition/js/biz_wap/jsapi/cardticket275627.js",
        "appmsg/emotion/map.js": "http://res.wx.qq.com/mmbizwap/zh_CN/htmledition/js/appmsg/emotion/map278965.js",
        "appmsg/emotion/textarea.js": "http://res.wx.qq.com/mmbizwap/zh_CN/htmledition/js/appmsg/emotion/textarea27cdc5.js",
        "appmsg/emotion/nav.js": "http://res.wx.qq.com/mmbizwap/zh_CN/htmledition/js/appmsg/emotion/nav278965.js",
        "appmsg/emotion/common.js": "http://res.wx.qq.com/mmbizwap/zh_CN/htmledition/js/appmsg/emotion/common278965.js",
        "appmsg/emotion/slide.js": "http://res.wx.qq.com/mmbizwap/zh_CN/htmledition/js/appmsg/emotion/slide2a9cd9.js",
        "": "http://res.wx.qq.com/mmbizwap/zh_CN/htmledition/js/pages/report3181da.js",
        "pages/music_player.js": "http://res.wx.qq.com/mmbizwap/zh_CN/htmledition/js/pages/music_player310e30.js",
        "pages/loadscript.js": "http://res.wx.qq.com/mmbizwap/zh_CN/htmledition/js/pages/loadscript30203e.js",
        "appmsg/emotion/dom.js": "http://res.wx.qq.com/mmbizwap/zh_CN/htmledition/js/appmsg/emotion/dom2f3ac3.js",
        "biz_wap/utils/hashrouter.js": "http://res.wx.qq.com/mmbizwap/zh_CN/htmledition/js/biz_wap/utils/hashrouter2805ea.js",
        "biz_common/utils/wxgspeedsdk.js": "http://res.wx.qq.com/mmbizwap/zh_CN/htmledition/js/biz_common/utils/wxgspeedsdk30bcdd.js",
        "a/sponsor.js": "http://res.wx.qq.com/mmbizwap/zh_CN/htmledition/js/a/sponsor3165da.js",
        "a/app_card.js": "http://res.wx.qq.com/mmbizwap/zh_CN/htmledition/js/a/app_card313f11.js",
        "a/ios.js": "http://res.wx.qq.com/mmbizwap/zh_CN/htmledition/js/a/ios275627.js",
        "a/android.js": "http://res.wx.qq.com/mmbizwap/zh_CN/htmledition/js/a/android2c5484.js",
        "a/profile.js": "http://res.wx.qq.com/mmbizwap/zh_CN/htmledition/js/a/profile311179.js",
        "a/sponsor_a_tpl.html.js": "http://res.wx.qq.com/mmbizwap/zh_CN/htmledition/js/a/sponsor_a_tpl.html31623d.js",
        "a/a_tpl.html.js": "http://res.wx.qq.com/mmbizwap/zh_CN/htmledition/js/a/a_tpl.html3162a6.js",
        "a/mpshop.js": "http://res.wx.qq.com/mmbizwap/zh_CN/htmledition/js/a/mpshop311179.js",
        "a/card.js": "http://res.wx.qq.com/mmbizwap/zh_CN/htmledition/js/a/card311179.js",
        "biz_wap/utils/position.js": "http://res.wx.qq.com/mmbizwap/zh_CN/htmledition/js/biz_wap/utils/position2f1750.js",
        "a/a_report.js": "http://res.wx.qq.com/mmbizwap/zh_CN/htmledition/js/a/a_report31623d.js",
        "biz_common/utils/respTypes.js": "http://res.wx.qq.com/mmbizwap/zh_CN/htmledition/js/biz_common/utils/respTypes2c57d0.js",
        "appmsg/my_comment_tpl.html.js": "http://res.wx.qq.com/mmbizwap/zh_CN/htmledition/js/appmsg/my_comment_tpl.html2f3f48.js",
        "appmsg/cmt_tpl.html.js": "http://res.wx.qq.com/mmbizwap/zh_CN/htmledition/js/appmsg/cmt_tpl.html3140a6.js",
        "sougou/a_tpl.html.js": "http://res.wx.qq.com/mmbizwap/zh_CN/htmledition/js/sougou/a_tpl.html2c6e7c.js",
        "appmsg/emotion/emotion.js": "http://res.wx.qq.com/mmbizwap/zh_CN/htmledition/js/appmsg/emotion/emotion2f3ac3.js",
        "biz_wap/utils/wapsdk.js": "http://res.wx.qq.com/mmbizwap/zh_CN/htmledition/js/biz_wap/utils/wapsdk315b3f.js",
        "biz_common/utils/report.js": "http://res.wx.qq.com/mmbizwap/zh_CN/htmledition/js/biz_common/utils/report275627.js",
        "appmsg/open_url_with_webview.js": "http://res.wx.qq.com/mmbizwap/zh_CN/htmledition/js/appmsg/open_url_with_webview3145f0.js",
        "biz_common/utils/http.js": "http://res.wx.qq.com/mmbizwap/zh_CN/htmledition/js/biz_common/utils/http30b871.js",
        "biz_common/utils/cookie.js": "http://res.wx.qq.com/mmbizwap/zh_CN/htmledition/js/biz_common/utils/cookie275627.js",
        "appmsg/topic_tpl.html.js": "http://res.wx.qq.com/mmbizwap/zh_CN/htmledition/js/appmsg/topic_tpl.html2f2e72.js",
        "pages/voice_tpl.html.js": "http://res.wx.qq.com/mmbizwap/zh_CN/htmledition/js/pages/voice_tpl.html2f2e72.js",
        "pages/voice_component.js": "http://res.wx.qq.com/mmbizwap/zh_CN/htmledition/js/pages/voice_component310e30.js",
        "pages/qqmusic_tpl.html.js": "http://res.wx.qq.com/mmbizwap/zh_CN/htmledition/js/pages/qqmusic_tpl.html2f2e72.js",
        "new_video/ctl.js": "http://res.wx.qq.com/mmbizwap/zh_CN/htmledition/js/new_video/ctl2d441f.js",
        "biz_common/utils/monitor.js": "http://res.wx.qq.com/mmbizwap/zh_CN/htmledition/js/biz_common/utils/monitor304edd.js",
        "a/testdata.js": "http://res.wx.qq.com/mmbizwap/zh_CN/htmledition/js/a/testdata31623d.js",
        "appmsg/reward_entry.js": "http://res.wx.qq.com/mmbizwap/zh_CN/htmledition/js/appmsg/reward_entry3004a4.js",
        "appmsg/comment.js": "http://res.wx.qq.com/mmbizwap/zh_CN/htmledition/js/appmsg/comment314108.js",
        "appmsg/like.js": "http://res.wx.qq.com/mmbizwap/zh_CN/htmledition/js/appmsg/like2eb52b.js",
        "pages/version4video.js": "http://res.wx.qq.com/mmbizwap/zh_CN/htmledition/js/pages/version4video3106ea.js",
        "a/a.js": "http://res.wx.qq.com/mmbizwap/zh_CN/htmledition/js/a/a31623d.js",
        "rt/appmsg/getappmsgext.rt.js": "http://res.wx.qq.com/mmbizwap/zh_CN/htmledition/js/rt/appmsg/getappmsgext.rt2c21f6.js",
        "biz_wap/utils/storage.js": "http://res.wx.qq.com/mmbizwap/zh_CN/htmledition/js/biz_wap/utils/storage2a74ac.js",
        "biz_common/tmpl.js": "http://res.wx.qq.com/mmbizwap/zh_CN/htmledition/js/biz_common/tmpl2b3578.js",
        "appmsg/img_copyright_tpl.html.js": "http://res.wx.qq.com/mmbizwap/zh_CN/htmledition/js/appmsg/img_copyright_tpl.html2a2c13.js",
        "biz_common/ui/imgonepx.js": "http://res.wx.qq.com/mmbizwap/zh_CN/htmledition/js/biz_common/ui/imgonepx275627.js",
        "biz_common/utils/string/html.js": "http://res.wx.qq.com/mmbizwap/zh_CN/htmledition/js/biz_common/utils/string/html29f4e9.js",
        "biz_wap/utils/ajax.js": "http://res.wx.qq.com/mmbizwap/zh_CN/htmledition/js/biz_wap/utils/ajax2f1747.js",
        "biz_wap/utils/log.js": "http://res.wx.qq.com/mmbizwap/zh_CN/htmledition/js/biz_wap/utils/log2fcb7c.js",
        "sougou/index.js": "http://res.wx.qq.com/mmbizwap/zh_CN/htmledition/js/sougou/index2fd671.js",
        "biz_wap/safe/mutation_observer_report.js": "http://res.wx.qq.com/mmbizwap/zh_CN/htmledition/js/biz_wap/safe/mutation_observer_report2fafd1.js",
        "appmsg/fereport.js": "http://res.wx.qq.com/mmbizwap/zh_CN/htmledition/js/appmsg/fereport315b3f.js",
        "appmsg/report.js": "http://res.wx.qq.com/mmbizwap/zh_CN/htmledition/js/appmsg/report304cae.js",
        "appmsg/report_and_source.js": "http://res.wx.qq.com/mmbizwap/zh_CN/htmledition/js/appmsg/report_and_source3165d9.js",
        "appmsg/page_pos.js": "http://res.wx.qq.com/mmbizwap/zh_CN/htmledition/js/appmsg/page_pos30c907.js",
        "appmsg/cdn_speed_report.js": "http://res.wx.qq.com/mmbizwap/zh_CN/htmledition/js/appmsg/cdn_speed_report3097b2.js",
        "appmsg/wxtopic.js": "http://res.wx.qq.com/mmbizwap/zh_CN/htmledition/js/appmsg/wxtopic31623d.js",
        "appmsg/voice.js": "http://res.wx.qq.com/mmbizwap/zh_CN/htmledition/js/appmsg/voice310e30.js",
        "appmsg/qqmusic.js": "http://res.wx.qq.com/mmbizwap/zh_CN/htmledition/js/appmsg/qqmusic31623d.js",
        "appmsg/iframe.js": "http://res.wx.qq.com/mmbizwap/zh_CN/htmledition/js/appmsg/iframe2ff82f.js",
        "appmsg/review_image.js": "http://res.wx.qq.com/mmbizwap/zh_CN/htmledition/js/appmsg/review_image309c11.js",
        "appmsg/outer_link.js": "http://res.wx.qq.com/mmbizwap/zh_CN/htmledition/js/appmsg/outer_link275627.js",
        "biz_wap/jsapi/core.js": "http://res.wx.qq.com/mmbizwap/zh_CN/htmledition/js/biz_wap/jsapi/core2ffa93.js",
        "biz_common/dom/event.js": "http://res.wx.qq.com/mmbizwap/zh_CN/htmledition/js/biz_common/dom/event275627.js",
        "appmsg/copyright_report.js": "http://res.wx.qq.com/mmbizwap/zh_CN/htmledition/js/appmsg/copyright_report2ec4b2.js",
        "appmsg/cache.js": "http://res.wx.qq.com/mmbizwap/zh_CN/htmledition/js/appmsg/cache2a74ac.js",
        "appmsg/async.js": "http://res.wx.qq.com/mmbizwap/zh_CN/htmledition/js/appmsg/async31623d.js",
        "biz_wap/ui/lazyload_img.js": "http://res.wx.qq.com/mmbizwap/zh_CN/htmledition/js/biz_wap/ui/lazyload_img309c11.js",
        "biz_common/log/jserr.js": "http://res.wx.qq.com/mmbizwap/zh_CN/htmledition/js/biz_common/log/jserr2805ea.js",
        "appmsg/share.js": "http://res.wx.qq.com/mmbizwap/zh_CN/htmledition/js/appmsg/share30b871.js",
        "appmsg/cdn_img_lib.js": "http://res.wx.qq.com/mmbizwap/zh_CN/htmledition/js/appmsg/cdn_img_lib30b785.js",
        "biz_common/utils/url/parse.js": "http://res.wx.qq.com/mmbizwap/zh_CN/htmledition/js/biz_common/utils/url/parse2fb01a.js",
        "appmsg/test.js": "http://res.wx.qq.com/mmbizwap/zh_CN/htmledition/js/appmsg/test314065.js",
        "biz_wap/utils/mmversion.js": "http://res.wx.qq.com/mmbizwap/zh_CN/htmledition/js/biz_wap/utils/mmversion2f1d97.js",
        "appmsg/max_age.js": "http://res.wx.qq.com/mmbizwap/zh_CN/htmledition/js/appmsg/max_age2fdd28.js",
        "biz_common/dom/attr.js": "http://res.wx.qq.com/mmbizwap/zh_CN/htmledition/js/biz_common/dom/attr275627.js",
        "appmsg/log.js": "http://res.wx.qq.com/mmbizwap/zh_CN/htmledition/js/appmsg/log300330.js",
        "biz_common/dom/class.js": "http://res.wx.qq.com/mmbizwap/zh_CN/htmledition/js/biz_common/dom/class275627.js",
        "biz_wap/utils/device.js": "http://res.wx.qq.com/mmbizwap/zh_CN/htmledition/js/biz_wap/utils/device2b3aae.js",
        "biz_wap/jsapi/a8key.js": "http://res.wx.qq.com/mmbizwap/zh_CN/htmledition/js/biz_wap/jsapi/a8key2a30ee.js",
        "appmsg/index.js": "http://res.wx.qq.com/mmbizwap/zh_CN/htmledition/js/appmsg/"
    };</script>
<script nonce="808235210" type="text/javascript">(function () {
        function c(a) {
            var b = document.createElement("script");
            document.getElementsByTagName("body")[0].appendChild(b);
            b.type = "text/javascript";
            b.async = "async";
            b.onload = function () {
                a && (localStorage.setItem("__WXLS__moon", String(__moonf__)), localStorage.setItem("__WXLS__moonarg", JSON.stringify({
                    version: "",
                    method: ""
                })))
            };
            b.src = ""
        }

        var a = !!top && !!top.window && top.window.user_uin || 0, d = 0 !== a && 1 > Math.floor(a / 100) % 100;
        if (2876363900 == a || 1506075 == a || 942807682 == a) d = !0;
        window.__wxgspeeds = {};
        window.__wxgspeeds.moonloadtime = +new Date;
        if (d && localStorage)try {
            var e = JSON.parse(localStorage.getItem("__WXLS__moonarg")) || {};
            if (e && "" == e.version) {
                var f = localStorage.getItem("__WXLS__moon");
                localStorage.setItem("__WXLS__moonarg", JSON.stringify({version: "", method: "fromls"}));
                eval(f);
                __moonf__()
            } else c(!0)
        } catch (g) {
            c(!0)
        } else c(!1)
    })();</script>
<script type="text/javascript" async="" src=""></script>
<script type="text/javascript" async="" src=""></script>

<script nonce="808235210" type="text/javascript">

    if (typeof getComputedStyle == 'undefined') {
        if (document.body.currentStyle) {
            window.getComputedStyle = function (el) {
                return el.currentStyle;
            }
        } else {
            window.getComputedStyle = {};
        }
    }
    var occupyImg = function () {
        var images = document.getElementsByTagName('img');
        var length = images.length;
        var container = document.getElementById('img-content');
        var max_width = container.offsetWidth;
        var container_padding = 0;
        var container_style = getComputedStyle(container);
        container_padding = parseFloat(container_style.paddingLeft) + parseFloat(container_style.paddingRight);
        max_width -= container_padding;
        if (!max_width) {
            max_width = window.innerWidth - 30;
        }
        for (var i = 0; i < length; ++i) {
            var src_ = images[i].getAttribute('data-src');
            if (!src_) continue;
            var width_ = 1 * images[i].getAttribute('data-w') || max_width;
            var ratio_ = 1 * images[i].getAttribute('data-ratio');
            var height = 100;
            if (ratio_ && ratio_ > 0) {
                var img_style = getComputedStyle(images[i]);
                var init_width = images[i].style.width;
                if (init_width) {
                    images[i].setAttribute('_width', init_width);
                    if (init_width != 'auto') width_ = parseFloat(img_style.width);
                }
                var parent_width = 0;
                var parent = images[i].parentNode;
                var outerWidth = 0;
                while (true) {
                    var parent_style = getComputedStyle(parent);
                    if (!parent || !parent_style) break;
                    parent_width = parent.clientWidth - parseFloat(parent_style.paddingLeft) - parseFloat(parent_style.paddingRight) - outerWidth;
                    if (parent_width > 0) break;
                    outerWidth += parseFloat(parent_style.paddingLeft) + parseFloat(parent_style.paddingRight) + parseFloat(parent_style.marginLeft) + parseFloat(parent_style.marginRight) + parseFloat(parent_style.borderLeftWidth) + parseFloat(parent_style.borderRightWidth);
                    parent = parent.parentNode;
                }
                parent_width = parent_width || max_width;
                var width = width_ > parent_width ? parent_width : width_;
                var img_padding_border = parseFloat(img_style.paddingLeft) + parseFloat(img_style.paddingRight) + parseFloat(img_style.borderLeftWidth) + parseFloat(img_style.borderRightWidth);
                var img_padding_border_top_bottom = parseFloat(img_style.paddingTop) + parseFloat(img_style.paddingBottom) + parseFloat(img_style.borderTopWidth) + parseFloat(img_style.borderBottomWidth);
                height = (width - img_padding_border) * ratio_ + img_padding_border_top_bottom;
                images[i].style.cssText += "width: " + width + "px !important;";
                images[i].src = "data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAIAAACQd1PeAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAyBpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuMC1jMDYwIDYxLjEzNDc3NywgMjAxMC8wMi8xMi0xNzozMjowMCAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RSZWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZVJlZiMiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENTNSBXaW5kb3dzIiB4bXBNTTpJbnN0YW5jZUlEPSJ4bXAuaWlkOkJDQzA1MTVGNkE2MjExRTRBRjEzODVCM0Q0NEVFMjFBIiB4bXBNTTpEb2N1bWVudElEPSJ4bXAuZGlkOkJDQzA1MTYwNkE2MjExRTRBRjEzODVCM0Q0NEVFMjFBIj4gPHhtcE1NOkRlcml2ZWRGcm9tIHN0UmVmOmluc3RhbmNlSUQ9InhtcC5paWQ6QkNDMDUxNUQ2QTYyMTFFNEFGMTM4NUIzRDQ0RUUyMUEiIHN0UmVmOmRvY3VtZW50SUQ9InhtcC5kaWQ6QkNDMDUxNUU2QTYyMTFFNEFGMTM4NUIzRDQ0RUUyMUEiLz4gPC9yZGY6RGVzY3JpcHRpb24+IDwvcmRmOlJERj4gPC94OnhtcG1ldGE+IDw/eHBhY2tldCBlbmQ9InIiPz6p+a6fAAAAD0lEQVR42mJ89/Y1QIABAAWXAsgVS/hWAAAAAElFTkSuQmCC";
            } else {
                images[i].style.cssText += "visibility: hidden !important;";
            }
            images[i].style.cssText += "height: " + height + "px !important;";
        }
    }
    if (document.addEventListener) {
        document.addEventListener('DOMContentLoaded', function () {
            occupyImg();
        });
    } else {

        document.onreadystatechange = function () {
            if (document.readyState === 'complete') {
                occupyImg();
            }
        }
    }
</script>
<script nonce="808235210" type="text/javascript">
    var real_show_page_time = +new Date();
    if (!!window.addEventListener) {
        window.addEventListener("load", function () {
            window.onload_endtime = +new Date();
        });
    }

</script>
<script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js" type="text/javascript"></script>

<style type="text/css">
    .icon_praise_gray1 {
        background-position-x: 0px;
        background-position-y: -18px;
    }

    .media_tool_meta i {
        vertical-align: 0;
        position: relative;
        top: 9px;
        margin-right: 3px;
    }
</style>
<input type="hidden" name="sign" id="sign" value="1">
<script type="text/javascript">
    function praise(j) {
        var sign = document.getElementById("sign").value;
        var i = document.getElementById('likeNum3').innerHTML;

        var url = "/m/update";
        var data = {"i": i, 'id': '{{$data->id}}', 'sign': sign};
        var success = function (response) {
            if (response.errno == 0) {
                n = parseInt(i) + 1;
                document.getElementById("sign").value = 0;
                document.getElementById('likeNum3').innerHTML = n;
            } else {
                n = parseInt(i) - 1;
                document.getElementById("sign").value = 1;
                document.getElementById('likeNum3').innerHTML = n;
            }
        }
        $.get(url, data, success, "json");
    }
    $(function () {
        var screen_width = $("body").width();
        $('img').load(function () {
            if ($(this).width() > screen_width) {
                var offset = $(this).position().left;
                $(this).css('max-width', screen_width - offset * 2);
            }
        });

        $('.icon_praise_gray').click(function () {
            $(this).toggleClass('icon_praise_gray1');
//                    var num = $("#num").text();
//                    var id = $("#media_id").val();
//                    $.get('/m/update', {'id': id, 'assist': num}, function(data) {
//                        $("#num").html(data);
//                    })
        })
        wx.config(<?php echo $config->config(array('onMenuShareTimeline', 'onMenuShareAppMessage'), false, true) ?>);
        wx.ready(function () {
            wx.onMenuShareTimeline({
                title: '{{$data->title}}', // 分享标题
                link: '{!! $url !!}', // 分享链接
                imgUrl: '{{url($data->media_url)}}', // 分享图标
                success: function () {

                },
                cancel: function () {
                    // 用户取消分享后执行的回调函数
                }
            });
            wx.onMenuShareAppMessage({
                title: '{{$data->title}}', // 分享标题
                desc: '{{$data->summary}}',// 分享描述
                link: '{!! $url !!}', // 分享链接
                imgUrl: '{{url($data->media_url)}}', // 分享图标

                success: function () {

                },
                cancel: function () {
                    // 用户取消分享后执行的回调函数
                }
            });
        });
    });

</script>