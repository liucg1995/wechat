@extends(config("wxconfig.extends"))

@section('content')
<script src="/assets/js/bootstrap-tokenfield.js"></script>
<script type="text/javascript" src="/assets/js/jquery.ui.widget.js"></script>
<script type="text/javascript" src="/assets/js/jquery.iframe-transport.js"></script>
<script type="text/javascript" src="/assets/js/jquery.fileupload.js"></script>
<script type="text/javascript" src="/assets/js/jquery.fileupload-ui.js"></script>
<script type="text/javascript" src="/assets/js/jquery.fileupload-jquery-ui.js"></script>
<script type="text/javascript" src="/assets/js/load-image.min.js"></script>
<script type="text/javascript" src="/assets/js/jquery.fileupload-process.js"></script>
<script type="text/javascript" src="/assets/js/jquery.fileupload-image.js"></script>
<script type="text/javascript" src="/assets/js/jquery.fileupload-audio.js"></script>
<script type="text/javascript" src="/assets/js/jquery.fileupload-video.js"></script>
<script type="text/javascript" src="/assets/js/jquery.fileupload-validate.js"></script>
<script type="text/javascript" src="/assets/js/jquery.serialize-object.min.js"></script>
<script>
    var _token='{{ csrf_token() }}';
</script>

<script src="/assets/js/underscore-min.js"></script>
<script src="/assets/js/chart.min.js"></script>
<!--<script type="text/javascript" src="/assets/js/app.js?<?php echo time() ?>"></script>-->
<script src="/assets/js/base.js?<?php echo time() ?>"></script>
<script type="text/javascript" src="/assets/js/base.js"></script>
<!-- 配置文件 -->
<script type="text/javascript" src="/assets/ueditor/ueditor.config.js"></script>
<!-- 编辑器源码文件 -->
<script type="text/javascript" src="/assets/ueditor/ueditor.all.min.js"></script>

<p>
<div class="row">
    <div class="col-md-2">
        <a href="/media" class="btn btn-success btn-block" id="btnNew"> 新建 </a><br>
        <div class="panel panel-default">
            <div class="panel-body">
                <ul class="nav nav-pills nav-stacked" id="media_nav">
                    <li><a href="#mixed" data-toggle="tab" data-type="1" data-page="1">单图文</a></li>
                    <li><a href="#mixed_multi" data-toggle="tab" data-type="2" data-page="1">多图文</a></li>
                    <!-- <li><a href="#image" data-toggle="tab" data-type="3">图片</a></li>
                    <li><a href="#audio" data-toggle="tab" data-type="4">语音</a></li>
                    <li><a href="#video" data-toggle="tab" data-type="5">视频</a></li> -->
                    <li><a href="#text" data-toggle="tab" data-type="6" data-page="1">文本</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="col-md-10">
        <?php if (isset($flash_session) && !empty($flash_session)): ?>
            <div class="alert alert-danger alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <?php echo $flash_session; ?>
        </div>
        <?php endif; ?>


        <div class="table-responsive">
            <!-- Tab panes -->
            <!--<div class="text-center" id="loading"><img src="/assets/images/wechat/loading.gif" width="40"></div>-->
            <div class="tab-content">
                <div class="tab-pane" id="mixed">
                    <div class="panel panel-default">
                        <div class="panel-body">
                    <div class="col-md-5" style="width: 350px;">
                        <div class="panel panel-default" id="mixed_preview">
                            <div class="panel-heading">标题</div>
                            <div class="panel-body"></div>
                            <div class="panel-footer">摘要</div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="cover_file_box">
                                    <span class="btn btn-success fileinput-button btn-xs">
                                        <span>选择题图</span>
                                        <!-- The file input field used as target for the file upload widget -->
                                        <input class="coverUpload" type="file" name="files[]" data-url="/wechat/upload">
                                    </span>
                                    <span class="help-inline">大图片建议尺寸：360像素 * 200像素</span>
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-success"></div>
                                    </div>
                                    <div class="preview"></div>
                                </div>
                                <form method="post">
                                    <input type="hidden" name="media_url" value="">
                                    <input type="hidden" name="id" value="0">
                                    <input type="hidden" name="media_type" value="1">
                                    <div class="form-group">
                                        <label for="mixedTitle">标题</label>
                                        <input type="text" class="form-control" id="mixedTitle" name="title">
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                          <input type="checkbox" name="show_cover_in_text" checked="checked"> 在内容中显示题图
                                        </label>
                                    </div>
                                    <div class="form-group">
                                        <label for="mixedAuthor">作者（选填）</label>
                                        <input type="text" class="form-control" id="mixedAuthor" name="author">
                                    </div>
                                    <div class="form-group">
                                        <label>摘要</label>
                                        <textarea class="form-control" name="summary"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>正文</label>
                                        <!-- 加载编辑器的容器 -->
                                        <script id="container" name="content" type="text/plain">
                                        </script>

                                        <!-- 实例化编辑器 -->
                                        <script type="text/javascript">
                                            var ue = UE.getEditor('container', {
                                                toolbars: [['source',
                                                            'undo',
                                                            'redo',
                                                            'bold',
                                                            'italic',
                                                            'underline',
                                                            'justifyleft', //居左对齐
                                                            'justifyright', //居右对齐
                                                            'justifycenter', //居中对齐
                                                            'forecolor',
                                                            'backcolor',
                                                            'removeformat',
                                                            '|',
                                                            'insertorderedlist',
                                                            'insertunorderedlist',
                                                            'simpleupload',
                                                            'link',
															'insertvideo'
                                                            ]],
                                                initialFrameHeight: 200
                                            });
                                        </script>
                                    </div>
                                    <input type="submit" class="btn btn-primary btn-sm" value="保存">
                                </form>
                            </div>
                        </div>
                    </div>
                        </div></div>
                </div>
                <div class="tab-pane" id="mixed_multi">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-5" style="width:350px;">
                                <div class="panel panel-default" id="mixed_multi_preview">
                                    <ul class="list-group">
                                        <li class="list-group-item">
                                            <div class="text-cneter preview_box head_preview_box">
                                                <div class="preview_cover text-center">图片</div>
                                                <div class="preview_title">标题</div>
                                                <div class="clearfix"></div>
                                            </div>
                                        </li>
                                        <li class="list-group-item">
                                            <div class="text-cneter preview_box normal_preview_box">
                                                <div class="preview_title">标题</div>
                                                <div class="preview_cover text-center">图片</div>
                                                <div class="clearfix"></div>
                                            </div>
                                        </li>
                                    </ul>
                                    <div class="panel-footer text-center"><a href="#add" class="addnew">增加一条</a></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="panel panel-default mixed_multi_editor">
                                    <div class="panel-body">
                                        <div class="cover_file_box">
                                            <span class="btn btn-success fileinput-button btn-xs">
                                                <span>选择题图</span>
                                                <!-- The file input field used as target for the file upload widget -->
                                                <input class="coverUpload" type="file" name="files[]" data-url="/wechat/upload">
                                            </span>
                                            <span class="help-inline">大图片建议尺寸：360x200 小图片建议 200x200</span>
                                            <div class="progress">
                                                <div class="progress-bar progress-bar-success"></div>
                                            </div>
                                            <div class="preview"></div>
                                        </div>
                                        <form method="post">
                                            <input type="hidden" name="media_url" value="">
                                            <input type="hidden" name="id" value="0">
                                            <input type="hidden" name="order" value="0">
                                            <input type="hidden" name="media_type" value="2">
                                            <input type="hidden" name="media_delete" class="media_delete" value="">
                                            <div class="form-group">
                                                <label>标题</label>
                                                <input type="text" class="form-control" name="title">
                                            </div>
                                            <div class="checkbox">
                                                <label>
                                                  <input type="checkbox" name="show_cover_in_text" checked="checked"> 在内容中显示题图
                                                </label>
                                            </div>
                                            <div class="form-group">
                                                <label>作者（选填）</label>
                                                <input type="text" class="form-control" name="author">
                                            </div>
                                            <div class="form-group">
                                                <label>正文</label>
                                                <!-- 加载编辑器的容器 -->
                                                <script id="mm_container" name="content" type="text/plain">
                                                </script>

                                                <!-- 实例化编辑器 -->
                                                <script type="text/javascript">
                                                    var ue_multi = UE.getEditor('mm_container', {
                                                        toolbars: [['source',
                                                                    'undo',
                                                                    'redo',
                                                                    'bold',
                                                                    'italic',
                                                                    'underline',
                                                                    'justifyleft', //居左对齐
                                                                    'justifyright', //居右对齐
                                                                    'justifycenter', //居中对齐
                                                                    'forecolor',
                                                                    'backcolor',
                                                                    'removeformat',
                                                                    '|',
                                                                    'insertorderedlist',
                                                                    'insertunorderedlist',
                                                                    'simpleupload',
                                                                    'link',
																	'insertvideo'
                                                                    ]],
                                                        initialFrameHeight: 200
                                                    });
                                                </script>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            </div>
                            <div class="row text-center">
                                <hr>
                                <input type="submit" class="btn btn-primary btn-sm" value="保存" id="saveMultiMixed">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="image">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="col-md-5">
                                <div class="panel panel-default" id="image_file_box">
                                    <div class="panel-body">
                                        <span class="btn btn-success fileinput-button btn-xs">
                                            <span>选择文件</span>
                                            <!-- The file input field used as target for the file upload widget -->
                                            <input id="imageUpload" type="file" name="files[]" data-url="/wechat/upload">
                                        </span>
                                        <span class="help-inline">最大1M，支持JPG格式</span>
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-success"></div>
                                        </div>
                                        <div class="preview"></div>
                                        <div id="image_preview"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                    <form method="post">
                                        <input type="hidden" name="media_url" value="">
                                        <input type="hidden" name="id" value="0">
                                        <input type="hidden" name="media_type" value="3">
                                        <div class="form-group">
                                            <label for="imageTitle">标题</label>
                                            <input type="text" class="form-control" id="imageTitle" name="title">
                                        </div>
                                        <input type="submit" class="btn btn-primary btn-sm" value="保存">
                                    </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="audio">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div id="audio_file_box">
                                <span class="btn btn-success fileinput-button btn-xs">
                                    <span>选择文件</span>
                                    <!-- The file input field used as target for the file upload widget -->
                                    <input id="audioUpload" type="file" name="files[]" data-url="/wechat/upload">
                                </span>
                                <span class="help-inline">最大2M，播放长度不超过60s，支持AMR\MP3格式</span>
                                <div class="progress">
                                    <div class="progress-bar progress-bar-success"></div>
                                </div>
                                <div class="preview"></div>
                                <div id="audio_preview"></div>
                            </div>
                            <form method="post">
                                <input type="hidden" name="media_url" value="">
                                <input type="hidden" name="id" value="0">
                                <input type="hidden" name="media_type" value="4">
                                <div class="form-group">
                                    <label for="audioTitle">标题</label>
                                    <input type="text" class="form-control" id="audioTitle" name="title">
                                </div>
                                <input type="submit" class="btn btn-primary btn-sm" value="保存">
                            </form>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="video">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="col-md-5">
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        <div id="video_file_box">
                                            <span class="btn btn-success fileinput-button btn-xs">
                                                <span>本地上传</span>
                                                <!-- The file input field used as target for the file upload widget -->
                                                <input id="videoUpload" type="file" name="files" data-url="/wechat/upload">
                                            </span>
                                            <span class="help-inline">最大10MB，支持MP4格式</span>
                                            <div class="progress">
                                                <div class="progress-bar progress-bar-success"></div>
                                            </div>
                                            <div class="preview"></div>
                                            <div id="video_preview"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        <form method="post">
                                            <input type="hidden" name="media_url" value="">
                                            <input type="hidden" name="id" value="0">
                                            <input type="hidden" name="media_type" value="5">
                                            <div class="form-group">
                                                <label for="videoTitle">标题</label>
                                                <input type="text" class="form-control" id="videoTitle" name="title">
                                            </div>
                                            <div class="form-group">
                                                <label for="videoTitle">简介（可选）</label>
                                                <textarea class="form-control" name="content" rows='3' placeholder=""></textarea>
                                            </div>
                                            <input type="submit" class="btn btn-primary btn-sm" value="保存">
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="text">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <form method="post">
                                <input type="hidden" name="id" value="0">
                                <input type="hidden" name="media_type" value="6">
                                <div class="form-group">
                                    <div class="emotions">
                                    <?php
                                    for ($i=0; $i <105 ; $i++) {
                                        printf('<img src="https://res.wx.qq.com/mpres/htmledition/images/icon/emotion/%s.gif" height="24">', $i);
                                    }
                                    ?>
                                    </div>
                                    <textarea class="form-control" name="content" rows='3' cols="50"></textarea>
                                </div>
                                <input type="submit" class="btn btn-primary btn-sm" value="保存">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="http://code.jquery.com/ui/1.11.0/jquery-ui.js"></script>
<STYLE TYPE="text/css">
    #mixed_multi .preview_box{
        position: relative;
    }
    #mixed_multi .head_preview_box .preview_cover{
        height:160px;
        width: 290px;
        background:#ccc;
        line-height: 160px;
        text-align: center;
    }
    #mixed_multi .head_preview_box .preview_cover img{
        width: 290px;
        height: 160px;
    }
    #mixed_multi .head_preview_box .preview_title{
        min-height: 20px;
        width: 290px;
        background: #333;
        position: absolute;
        bottom: 0;
        z-index: 2;
        color: #fff;
        padding:4px;
    }
    #mixed_multi .normal_preview_box .preview_cover{
        width:78px;
        height:78px;
        background:#ccc;
        line-height:78px;
        float:right;
    }
    #mixed_multi .normal_preview_box .preview_cover img{
        width: 78px;
        height: 78px;
    }
    #mixed_multi .normal_preview_box .preview_title{
        width: 200px;
        float:left;
    }
    #mixed_multi .mixed_multi_editor{
        position: relative;
    }
    .preview_box .masklayer{
        background-color:rgba(229,229,229,0.85);
        position: absolute;
        top:0;
        left:0;
        width: 290px;
        height: 100%;
        z-index: 10;
        text-align: center;
        line-height: 5em;
    }
    #video_file_box video{
        width: 320px;
    }
    .progress{
        height: 8px;
        margin-top: 4px;
    }
    #mixed_preview .panel-heading,
    #mixed_preview .panel-footer{
        min-height: 20px;
    }

    #mixed_preview .panel-body{
        height: 200px;
        overflow: auto;
    }
    #mixed_preview .panel-body img{
        height: 160px;
        width: 290px;
    }

    #image_preview img{
        max-width: 320px;
    }
    .bundlebox{
        width:315px;
        padding:0 2px 0 0;
    }
    .bundlebox .list-group-item{
        padding: 10px;
    }

    .tablebox ul.list-inline li{
        margin: 0 2px 2px 0;
        background: #f4f4f4;
        text-align: center;
    }
    .tablebox .img-thumbnail{
        height: 100px;
    }
    .col-md-6{
        width: 61%;
    }
    .tablebox{
        float: left;
        width: 100%;
    }
</STYLE>
<script type="text/javascript">
var HtmlUtil = {
    /*1.用浏览器内部转换器实现html转码*/
    htmlEncode:function (html){
        //1.首先动态创建一个容器标签元素，如DIV
        var temp = document.createElement ("div");
        //2.然后将要转换的字符串设置为这个元素的innerText(ie支持)或者textContent(火狐，google支持)
        (temp.textContent != undefined ) ? (temp.textContent = html) : (temp.innerText = html);
        //3.最后返回这个元素的innerHTML，即得到经过HTML编码转换的字符串了
        var output = temp.innerHTML;
        temp = null;
        return output;
    },
    /*2.用浏览器内部转换器实现html解码*/
    htmlDecode:function (text){
        //1.首先动态创建一个容器标签元素，如DIV
        var temp = document.createElement("div");
        //2.然后将要转换的字符串设置为这个元素的innerHTML(ie，火狐，google都支持)
        temp.innerHTML = text;
        //3.最后返回这个元素的innerText(ie支持)或者textContent(火狐，google支持)，即得到经过HTML解码的字符串了。
        var output = temp.innerText || temp.textContent;
        temp = null;
        return output;
    }
};
var str = HtmlUtil.htmlDecode('{{$emotions}}');
var emotions = eval('(' + str + ')');
$(function(){
    var mme = null, m=null;
    var def_media_type = '1';

    mme = new MMEditor();
    m = new Media();

    //渲染底部的多图文列表
    var render_list = function(data, node,page){
        var html = [];
        //console.log(data);
        if (m.media_type == 2) {
            m.bundle = new HashTable();
           $.each(data, function(index, obj){
                if (m.bundle.hasItem(obj['bundle_id']) == false) {
                    m.bundle.setItem(obj['bundle_id'], []);
                }
                var abundle = m.bundle.getItem(obj['bundle_id']);
                abundle[obj['multi_order']] = obj;
            });
           
            var b_data= new Array();
            $.each(m.bundle.items,function(k,v){
                var arr = new Array();
                arr['bid'] = k;
                arr['abundle'] = v;
                b_data[k] = arr;
            });
            b_data = b_data.sort(
                    function(a, b)
                    {
                        return b.bid-a.bid;
                    }
                );
        
            $.each(b_data,function(key, val){
                if(val != undefined){
                    var bid=val['bid'];
                    var abundle=val['abundle'];
                    
                    html.push('<div class="bundlebox col-md-5" data-id="'+bid+'">');
                    html.push('<ul class="list-group">');

                    html.push('<li class="list-group-item"><a href="#'+bid+'" class="action-modify-multi" data-bid="'+bid+'">修改</a> <a href="/bundle/'+bid+'/delete?mt='+m.media_type+'" class="action-del">删除</a></li>');

                    var idOrder = abundle.sort(
                        function(a, b)
                        {
                            if(a.multi_order != 0){
//                                idOrder=a.reverse();
                                return (b.id - a.id);
                            }
                        }
                    );
                    idOrder=idOrder.reverse();
                    var orlen=idOrder.length;
                    idOrder.unshift(idOrder[orlen-1]);
                    idOrder.pop();
                    $.each(idOrder, function(order, media){
                        if (media) {
                            html.push('<li class="list-group-item">');
                            if (media.multi_order == 0) {
                                html.push('<div class="head_preview_box">');
                                html.push('<div class="preview_cover center-block"><img src="'+media.media_url+'"></div>');
                                html.push('<div class="preview_title"><a href="/m/'+media.id+'" target="_blank">'+media.title+'</a></div>');
                                html.push('</div>');
                            }else{
                                html.push('<div class="normal_preview_box">');
                                html.push('<div class="preview_title"><a href="/m/'+media.id+'" target="_blank">'+media.title+'</a></div>');
                                html.push('<div class="preview_cover"><img src="'+media.media_url+'"></div>');
                                html.push('<div class="clearfix"></div>');
                                html.push('</div>');
                            }

                            html.push('</li>');
                        }
                    });
                    html.push('</ul>');
                    html.push('</div>');  
                }
            });
            html.push(page);
        }
        else if(m.media_type == 1 || m.media_type == 6){
            html.push('<table class="table table-striped table-hover">');
            $.each(data, function(index, obj){
                m.data.setItem(obj.id, obj);
                html.push('<tr>');
                html.push('<td width="40">'+obj.id+'</td>');

                switch (m.media_type){
                    case 1:
                        html.push('<td>');
                        html.push('<a href="/m/'+obj.id+'" target="_blank">'+obj.title+'</a>');
                        html.push('</td>');
                        break;
                    case 6:
                        html.push('<td>');
                        html.push(obj.content);
                        html.push('</td>');
                        break;
                }

                html.push('<td width="100">')
                html.push('<a href="#'+obj.id+'" class="action-modify" data-id="'+obj.id+'">修改</a> ');
                html.push('<a href="/media/'+obj.id+'/delete?mt='+m.media_type+'" class="action-del">删除</a>');
                html.push('</td>');
                html.push('</tr>');
            });
            html.push('</table>');
            html.push(page);
        }
        else{
            html.push('<ul class="list-inline">');
            $.each(data, function(index, obj){
                m.data.setItem(obj.id, obj);
                html.push('<li>');
                html.push('<dl>');
                html.push('<dt width="40">'+obj.id+' ' + obj.title+'</dt>');
                html.push('<dd>');
                switch (m.media_type){
                    case 3:
                        html.push('<image src="'+obj.media_url+'" height="100" class="img-thumbnail"/> ');
                        break;
                    case 4:
                        html.push('<audio src="'+obj.media_url+'" controls=""></audio> ');
                        break;
                    case 5:
                        html.push('<video src="'+obj.media_url+'" controls="" height="100"></video> ');
                        break;
                }


                html.push('<br><a href="#'+obj.id+'" class="action-modify" data-id="'+obj.id+'">修改</a> ');
                html.push('<a href="/media/'+obj.id+'/delete?mt='+m.media_type+'" class="action-del">删除</a>');
                html.push('</dd>');
                html.push('</dl>');
                html.push('</li>');
            });
            html.push('</ul>');
        }
        $(html.join('')).appendTo(node);
    };

    $('a[data-toggle="tab"]', '#media_nav').on('shown.bs.tab', function (e) {
        // e.target // activated tab
        if($(this).data('type')==''){
            $(this).attr('data-page','');
        }
        m.loadList($(e.target), $('#loading'), render_list);
    });

    $('a[data-type='+def_media_type+']', '#media_nav').tab('show');

    $('#btnNew').click(function(){
        $(this).attr('href', '/media?mt='+$("li.active a", '#media_nav').data('type'));
    });

    // 所有表单的提交验证 不包括多图文
    $('form', '.tab-pane').submit(function(event) {
        $('[type=submit]', this).prop('disabled', true);

        var media_type = parseInt($('[name=media_type]', this).val());

        var msg = "";
        var obj = "";
        switch (media_type){
            case 3:
            case 1:
                if ($('[name=title]', this).val() == "") {
                    msg = "请填写标题";
                    obj = $('[name=title]', this);
                }else if ($('[name=media_url]', this).val() == "") {
                    msg = "该素材需要一张图片";
                    obj = $('[name=media_url]', this);
                }
                break;
            case 4:
                if ($('[name=title]', this).val() == "") {
                    msg = "请填写标题";
                    obj = $('[name=title]', this);
                }else if ($('[name=media_url]', this).val() == "") {
                    msg = "请先上传语音文件";
                    obj = $('[name=media_url]', this);
                }
                break;
            case 5:
                if ($('[name=title]', this).val() == "") {
                    msg = "请填写标题";
                    obj = $('[name=title]', this);
                }else if ($('[name=media_url]', this).val() == "") {
                    msg = "请先上传视频文件";
                    obj = $('[name=media_url]', this);
                }
                break;
            case 6:
                if ($('[name=content]', this).val() == "") {
                    msg = "请填写内容";
                    obj = $('[name=content]', this);
                }else{
                    $len = $('[name=content]', this).val().length;
                    if($len >697){
                      msg = "内容太长超过字符限制";
                      obj = $('[name=content]', this);  
                    }
                }
                break;
        }
        if (msg!='') {
            alert(msg);
            obj.focus();
            $('[type=submit]', this).prop('disabled', false);
            return false;
        }
        return true;
    });

    $('.tab-pane').on('click', 'a.action-del', function(){
        var ret = confirm("删除后不可恢复，真的要删除么？");
        if (ret) {
            return true;
        }
        return false;
    }).on('click', '.action-modify-multi', function(event) {
        event.preventDefault();
        /* Act on the event */

        var bid = $(this).data('bid');
        if (m.bundle.hasItem(bid) == false) {
            alert('修改素材时发生系统错误，请联系管理员');
            return false;
        }

        var data = m.bundle.getItem(bid);
        // mme.is_edit = true;
        // mme.bundle_id = bid
        mme.loadData(bid, data);
    }).on('click', '.action-modify', function(event) {
        event.preventDefault();
        /* Act on the event */
        var id = $(this).data('id');
        // console.log(m.data.getItem(id), id);

        if (m.data.hasItem(id) == false){
            alert('修改素材时发生系统错误，请联系管理员');
            return false;
        }
        var _media = m.data.getItem(id);
        switch(_media.media_type){
            case '1':
                $('.panel-heading', '#mixed_preview').text(_media.title);
                $('.panel-body', '#mixed_preview').html('<img src="'+_media.media_url+'">');
                $('.panel-footer', '#mixed_preview').text(_media.summary);
                break;
            case '3':
                $('#image_preview').html('<img src="'+_media.media_url+'">');
                break;
            case '4':
                $('#audio_preview').html('<audio src="'+_media.media_url+'" controls="">');
                break;
            case '5':
                $('#video_preview').html('<video src="'+_media.media_url+'" controls="">');
                break;
        }
        var tabPane = $(this).parents('.tab-pane');
        $.each(_media, function(k, v) {
            // console.log(k, v);
            if (k == 'content' && _media.media_type<=2) {
                ue.setContent(v);
            }else if(k == 'show_cover_in_text'){
                $('form [name='+k+']', tabPane).prop('checked', v==1);
            }else{
                $('form [name='+k+']', tabPane).val(v);
            }
        });

    });

    var uploadButton = $('<button/>')
            .addClass('btn btn-primary btn-sm upload')
            .prop('disabled', true)
            .text('处理中...')
            .on('click', function () {
                var $this = $(this),
                    data = $this.data();
                $this.off('click').text('中止').on('click', function () {
                        $this.remove();
                        data.abort();
                });
                data.submit().always(function () {
                    $this.remove();
                });
            });

    var cancelButton = $('<button/>').addClass('btn btn-sm btn-default').text('取消').on('click', function(){
        $(this).parents('.preview').empty();
    });

    var fileuploadadd = function(ele, e, data){
        if ($('.preview', ele).size()==0) {
            $(ele).append('<div class="preview"></div>');
        }
        data.context = $('.preview', ele);
        $.each(data.files, function (index, file) {
            var node = $('<p/>')
                    .append($('<span/>').text(file.name));
            if (!index) {
                node
                    .append('<br>')
                    .append(uploadButton.clone(true).data(data))
                    .append(' ')
                    .append(cancelButton.clone(true));
            }
            node.appendTo(data.context);
        });
    };

    var fileuploadprocessalways = function(e, data){
        var index = data.index,
            file = data.files[index],
            node = $(data.context.children()[index]);
        if (file.preview) {
            node
                .prepend('<br>')
                .prepend(file.preview);
        }
        if (file.error) {
            node
                .append('<br>')
                .append($('<span class="text-danger"/>').text(file.error));
        }
        if (index + 1 === data.files.length) {
            data.context.find('button.upload')
                .text('上传')
                .prop('disabled', !!data.files.error);
        }
    };

    var fileuploaddone= function(ele, e, data){
        $('.progress-bar', ele).css('width', '0');
        $('input[name=media_url]', ele).val(data.result.files[0].url);
        // $.each(data.result.files, function (index, file) {
        //     if (file.url) {
        //         var link = $('<a>')
        //             .attr('target', '_blank')
        //             .prop('href', file.url);
        //         $(data.context.children()[index])
        //             .wrap(link);
        //     } else if (file.error) {
        //         var error = $('<span class="text-danger"/>').text(file.error);
        //         $(data.context.children()[index])
        //             .append('<br>')
        //             .append(error);
        //     }
        // });
    };

    var fileuploadfail = function(e, data){
        $.each(data.files, function (index, file) {
            var error = $('<span class="text-danger"/>').text('文件上传失败');
            $(data.context.children()[index])
                .append('<br>')
                .append(error);
        });
    };

    var progressall = function (ele, e, data) {
        var progress = parseInt(data.loaded / data.total * 100, 10);
        $('.progress-bar', ele).css('width', progress + '%');
    };

    $('#videoUpload').fileupload({
        dataType: 'json',
        acceptFileTypes: /(\.|\/)(mp4)/i,
        maxFileSize: 10000000
    }).on('fileuploadprogressall', function(e, data){
        progressall('#video_file_box', e, data);
    }).on('fileuploadadd', function(e, data){
        fileuploadadd('#video_file_box', e, data);
    }).on('fileuploadprocessalways', function(e, data) {
        fileuploadprocessalways(e, data);
    }).on('fileuploaddone', function (e, data) {
        fileuploaddone('#video', e, data);

        var files = data.result.files;
        $('#video_preview').html('<video src="'+files[0].url+'" controls="">');
    }).on('fileuploadfail', function (e, data) {
        fileuploadfail(e, data);
    }).prop('disabled', !$.support.fileInput).parent().addClass($.support.fileInput ? undefined : 'disabled');

    // for upload audio file.
    $('#audioUpload').fileupload({
        dataType: 'json',
        // autoUpload: false,
        acceptFileTypes: /(\.|\/)(mp3|amr)/i,
        maxFileSize: 2000000
    }).on('fileuploadprogressall', function(e, data){
        progressall('#audio_file_box', e, data);
    }).on('fileuploadadd', function(e, data){
        fileuploadadd('#audio_file_box', e, data);
    }).on('fileuploadprocessalways', function(e, data) {
        fileuploadprocessalways(e, data);
    }).on('fileuploaddone', function (e, data) {
        fileuploaddone('#audio', e, data);
        var files = data.result.files;
        $('#audio_preview').html('<audio src="'+files[0].url+'" controls="">');
    }).on('fileuploadfail', function (e, data) {
        fileuploadfail(e, data);
    }).prop('disabled', !$.support.fileInput).parent().addClass($.support.fileInput ? undefined : 'disabled');

    // for upload image file.
    $('#imageUpload').fileupload({
        dataType: 'json',
        // autoUpload: false,
        acceptFileTypes: /(\.|\/)(jpg|jpeg|png)/i,
        maxFileSize: 1000000,
        previewMaxWidth: 320,
        previewMaxHeight: 480
    }).on('fileuploadprogressall', function(e, data){
        progressall('#image_file_box', e, data);
    }).on('fileuploadadd', function(e, data){
        fileuploadadd('#image_file_box', e, data);
    }).on('fileuploadprocessalways', function(e, data) {
        fileuploadprocessalways(e, data);
    }).on('fileuploaddone', function (e, data) {
        fileuploaddone('#image', e, data);

        var files = data.result.files;
        $('#image_preview').html('<img src="'+files[0].url+'">');

    }).on('fileuploadfail', function (e, data) {
        fileuploadfail(e, data);
    }).prop('disabled', !$.support.fileInput).parent().addClass($.support.fileInput ? undefined : 'disabled');

    // for upload cover image file.
    $('.coverUpload').fileupload({
        dataType: 'json',
        // autoUpload: false,
        acceptFileTypes: /(\.|\/)(jpg|jpeg|png)/i,
        maxFileSize: 1000000,
        previewMaxWidth: 360,
        previewMaxHeight: 200
    }).on('fileuploadprogressall', function(e, data){
        progressall($(this).parents('.cover_file_box'), e, data);
    }).on('fileuploadadd', function(e, data){
        fileuploadadd($(this).parents('.cover_file_box'), e, data);
    }).on('fileuploadprocessalways', function(e, data) {
        fileuploadprocessalways(e, data);
    }).on('fileuploaddone', function (e, data) {

        var files = data.result.files;
        var mt = $(this).parents(".panel-body").find('[name=media_type]').val();
        if (mt == 1) {
            fileuploaddone('#mixed', e, data);
            // $(".panel-body", '#mixed_preview').css({'background-image':'url('+files[0].url+')', 'background-repeat':'no-repeat no-repeat', 'background-position':"center center"});
            $(".panel-body", '#mixed_preview').html('<img src="'+files[0].url+'">');
        }else if (mt == 2) {
            fileuploaddone('#mixed_multi', e, data);
            // var order_id = $(this).parents(".panel-body").find('[name=order]').val();
            var preview_box = $('.list-group-item', '#mixed_multi_preview').eq(mme.selected_index);
            $('.preview_cover', preview_box).html('<img src="'+files[0].url+'">');
        }
    }).on('fileuploadfail', function (e, data) {
        fileuploadfail(e, data);
    }).prop('disabled', !$.support.fileInput).parent().addClass($.support.fileInput ? undefined : 'disabled');

    // When change input render preview
    $('#mixed').on('keyup', 'input[name=title]', function(){
        if ($(this).val() == "") {
            $('.panel-heading').html("标题");
        }else{
            $('.panel-heading').html($(this).val());
        }
    }).on('keyup', 'textarea[name=summary]', function(){
        $('.panel-footer').html($(this).val());
    });

    $('.emotions', '#text').on('click', 'img', function(){
         console.log(emotions[$(this).index()]);
        $('textarea', '#text').val($('textarea', '#text').val() + " /" + emotions[$(this).index()]);
    });
});
</script>
            </div>
            <!-- Bootstrap core JavaScript -->
            <script type="text/javascript">
                var str = window.location.pathname,
                        strs = new Array();
                strs = str.split('/');
                if (strs[1] != '')
                    $("#" + strs[1]).addClass('active');
                else
                    $("#dashboard").addClass('active');
            </script>
    </body>
@endsection