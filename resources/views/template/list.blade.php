

@extends(config("wxconfig.extends"))
@section('content')
    <section class="content-header">
        <h1>
            模板列表
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">模板列表</li>
        </ol>
    </section>
    @include('wechat::layout.message', ['errors' => $errors])
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">模板列表</h3>
                        <div class="box-tools">
                            <a href="/template/add" class="pull-left">
                                <label class="col-sm-1 control-label right-lable">
                                    <i class="fa fa-plus-circle btn btn-success btn-md btn-add"></i>
                                </label>
                            </a>

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
                                            <th>模板标题</th>
                                            <th>添加时间</th>
                                            <th>管理</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @if (count($list) > 0) @foreach ($list as $v)
                                            <tr role="row" class="even">
                                                <td class="sorting_1">
                                                    <div>{{ $v->id }}</div>
                                                </td>
                                                <td>
                                                    <div>{{ $v->title }}</div>
                                                </td>
                                                <td>
                                                    <div>{{ $v->created_at }}</div>
                                                </td>

                                                <td>
                                                    <a href="/template/update?id={{$v->id}}">修改</a> |
                                                    <a href="/template/delete?id={{$v->id}}">删除</a>
                                                </td>
                                            </tr>
                                        @endforeach @endif
                                        </tbody>

                                    </table>
                                </div>
                            </div>
                            <div class="row">
                                @include('wechat::pagination.tfoot', ['paginator' => $list])
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
@endsection
