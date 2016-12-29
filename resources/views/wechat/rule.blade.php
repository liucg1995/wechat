@extends(config("wxconfig.extends")) @section('content')
    <section class="content-header">
        <h1>
            回复规则
            <small>关键词回复规则管理</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li>微信设置</li>
            <li class="active">回复规则</li>
        </ol>
    </section>
    @include('wechat::layouts.error', ['errors' => $errors])
    <section class="content-header">

        <!-- SELECT2 EXAMPLE -->
        <div class="box box-default">
            <form action="" enctype="application/x-www-form-urlencoded" method="post">
                {{ csrf_field() }}
                <div class="box-header with-border">
                    <h3 class="box-title">编辑规则</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-1">
                            <div class="form-group">
                                <label>id</label>
                                <input type="text" value="{{$rule->id}}" class="form-control" placeholder="新增" disabled>
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-md-8">
                            <div class="form-group">
                                <label>关键词内容</label>
                                <input name="keyword" type="text" value="{{$rule->keyword}}" class="form-control"
                                       placeholder="Enter ...">
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>类型</label>
                                {{ Form::select('cate_id', $cates,$rule->cate_id,['class'=>'form-control']) }}
                            </div>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>选择回复语</label>
                                {{ Form::select('media_id', $medias,$rule->media_id,['class'=>'form-control']) }}
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <input type="hidden" name="id" value="{{$id}}">
                    <input type="hidden" name="media_type" value="{{$textType}}">
                    <input type="submit" value="提交" class="btn btn-primary pull-right"> 
                </div>
            </form>
        </div>
    </section>
    <!-- /.box -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">规则列表</h3>
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
                                        <thead>
                                        <tr role="row">
                                            <th>id</th>
                                            <th>关键词内容</th>
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
                                                    <div>{{ $v->created_at }}</div>
                                                </td>

                                                <td>
                                                    @if($v->id==config('app.ruleId.follow'))
                                                        <a href="/wechat/follow">修改关注回复</a>
                                                    @else
                                                        <a href="?id={{$v->id}}">修改</a>
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
        });
    </script>
@endsection
