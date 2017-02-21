@extends(config("wxconfig.extends")) @section('content')
    <section class="content-header">
        <h1>
            规则列表
            <small>关键词回复规则管理</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li>微信设置</li>
            <li class="active">回复规则</li>
        </ol>
    </section>
    @include('wechat::layout.message', ['errors' => $errors])
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">规则列表</h3>
                        <div class="box-tools">
                            <a href="/wechat/setrule" class="pull-left"><label class="col-sm-1 control-label right-lable"><i class="fa fa-plus-circle btn btn-success btn-md btn-add"></i></label></a>
                            <a href="/wechat/resetrule" class="pull-right"><label class="col-sm-1 control-label right-lable"><i class="fa  btn btn-danger btn-md ">更新规则</i></label></a>

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
                                        <thead>
                                        <tr role="row">
                                            <th>id</th>
                                            <th>关键词内容</th>
                                            <th>关键词类型</th>
                                            <th>添加时间</th>
                                            <th>管理</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @if (count($rules) > 0) @foreach ($rules as $v)
                                            <tr role="row" class="even">
                                                <td class="sorting_1">
                                                    <div>{{ $v->id }}</div>
                                                </td>
                                                <td>
                                                    <div>{{ $v->keyword }}</div>
                                                </td>
                                                <td>
                                                    <div>
                                                        <?php
                                                        switch ($v->media_type){
                                                            case '1':
                                                                echo "单图文";break;
                                                            case '2':
                                                                echo "多图文";break;
                                                            case '3':
                                                                echo "图片";break;
                                                            case '6':
                                                                echo "文字";break;
                                                        }
                                                        ?>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div>{{ $v->created_at }}</div>
                                                </td>

                                                <td>
                                                    @if($v->id==config('app.ruleId.follow'))
                                                        <a href="/wechat/follow">修改关注回复</a>
                                                    @else
                                                        <a href="/wechat/setrule?id={{$v->id}}">修改</a> |
                                                        <a href="/wechat/deleterule?id={{$v->id}}">删除</a>
                                                    @endif

                                                </td>
                                            </tr>
                                        @endforeach @endif
                                        </tbody>
                                        <tfoot>
                                        <tr>
                                            <th>id</th>
                                            <th>关键词内容</th>
                                            <th>添加时间</th>
                                            <th>管理</th>
                                        </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                            <div class="row">
                                @include('wechat::pagination.tfoot', ['paginator' => $rules])
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <script>
        $(document).ready(function () {
            $(".nav-tabs li").click(function () {
                $(this).addClass("active").siblings().removeClass("active");
                var type = $(this).data("type");
                $(".text").hide();
                $(".single").hide();
                $(".pic").hide();
                $(".double").hide();
                $("." + type).show();
            });
        });
    </script>
@endsection
