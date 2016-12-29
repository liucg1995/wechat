@extends(config("wxconfig.extends"))
@section('content')
    <section class="content-header">
        <h1>
            投票口令
            <small>修改投票口令</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li>微信设置</li>
            <li class="active">投票口令</li>
        </ol>
    </section>
    @include('wechat::layout.message')
    <section class="content-header">

        <!-- SELECT2 EXAMPLE -->
        <div class="box box-default">
            <form action="" enctype="application/x-www-form-urlencoded" method="post">
                {{ csrf_field() }}
                <div class="box-header with-border">
                    <h3 class="box-title">编辑投票口令</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-1">
                            <div class="form-group">
                                <label>id</label>
                                <input type="text" value="{{$command->id}}" class="form-control" placeholder="新增" disabled>
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-md-11">
                            <div class="form-group">
                                <label>关键词内容</label>
                                <input name="keyword" type="text" value="{{$command->keyword}}" class="form-control"
                                       placeholder="Enter ...">
                            </div>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <input type="hidden" name="id" value="{{$cid}}">
                    <input type="hidden" name="media_type" value="{{$commandType}}">
                    <input type="submit" value="提交" class="btn btn-primary pull-right">
                </div>
            </form>
        </div>
    </section>
    <!-- /.box -->
    <script>
        $(document).ready(function () {
        });
    </script>
@endsection
