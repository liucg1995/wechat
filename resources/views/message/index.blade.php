@extends(config("wxconfig.extends")) @section('content')
    <section class="content-header">
        <h1>
            粉丝消息
        </h1>
        <ol class="breadcrumb">
            <li><a href=""><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">粉丝消息</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">搜索</h3>
                        <div class="box-tools"></div>
                    </div>
                    <div class="box-body">
                        <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                    <form class="form-inline" role="form" method="get" id="frmSearch">
                        <input type="submit" name="today" class="btn  btn-success" value="今天">&nbsp;
                        <input type="submit" name="yesterday" class="btn  btn-success" value="昨天">&nbsp;
                        <div class="input-group date">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input class="form-control pull-right" name="day" id="datepicker" type="text" placeholder="日期">
                        </div>
                        <div class="form-group">
                            <select name="msg_type" class="form-control input-sm" style="width:7em">
                                <option value="0">全部消息</option>
                                <option value="text">文本</option>
                                <option value="image">图片</option>
                                <option value="voice">语音</option>
                                <option value="video">视频</option>
                                <option value="location">位置</option>
                                <option value="link">链接</option>
                                <option value="event">事件</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="text" name="content" class="form-control input-sm" style="width:9em" placeholder="消息内容">
                        </div>&nbsp;
                        <input type="submit" class="btn  btn-success" value="搜索">&nbsp;
                        <a href="/message" class="btn  btn-primary">重置搜索条件</a>
                    </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">用户</h3>
                        <div class="box-tools">
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                            <div class="row">
                                <div class="col-sm-6"></div>
                                <div class="col-sm-6"></div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <table id="example2" class="table table-bordered table-hover dataTable"
                                           role="grid" aria-describedby="example2_info">
                                        <tr role="row">
                                            <th>用户</th>
                                            <th>消息内容</th>
                                            <th>消息类型</th>
                                            <th>时间</th>
                                        </tr>
                                        @foreach($list as $val)
                                            <tr>
                                                <td>{{isset($val[$nickname])?$val['nickname']:$val['from_user_name']}}</td>
                                                @if($val['msg_type'] == 'event')
                                                <td>{{$val['event_key']}}</td>
                                                @else
                                                <td>{{$val['content']}}</td>
                                                @endif
                                                <td>{{$val['msg_type']}}</td>
                                                <td>{{$val['created']}}</td>
                                            </tr>
                                        @endforeach
                                    </table>
                                </div>
                            </div>
                            @include("wechat::pagination.tfoot",['paginator'=>$list])
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="{{url("/bower_components/AdminLTE/plugins/datepicker/bootstrap-datepicker.js")}}"></script>
    <script>
        
        $(function(){
            $('#datepicker').datepicker({
                format: 'yyyy-mm-dd',
                autoclose: true
            });
            var search = location.search.substring(1);
            if (search) {
                try {
                    var query = JSON.parse('{"' + decodeURIComponent(search).replace(/"/g, '\\"').replace(/&/g, '","').replace(/=/g, '":"') + '"}');

                    $.each(query, function(k, v) {
                        $('[name=' + k + ']').val(v);
                    });
                } catch (e) {
                    console.log(e);
                }

            }
        })
    </script>
@endsection
