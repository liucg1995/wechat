@extends(config("wxconfig.extends"))
@section('content')
    <section class="content-header">
        <h1>
            兑换口令
            <small>当用户发送"投票口令"时的回复</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li>微信设置</li>
            <li class="active">兑换口令</li>
        </ol>
    </section>
    @include('wechat::layout.message')

    <section class="content-header">
        <!-- SELECT2 EXAMPLE -->
        <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">当前口令<small> 兑换口令的回复要和投票口令一致</small></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    {{$command}}
                </div>
    </section>
    <section class="content-header">

        <!-- SELECT2 EXAMPLE -->
        <div class="box box-default">
            <form action="" enctype="application/x-www-form-urlencoded" method="post">
                {{ csrf_field() }}
                <div class="box-header with-border">
                    <h3 class="box-title">编辑兑换口令</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-1">
                            <div class="form-group">
                                <label>id</label>
                                <input type="text" value="{{$data->id}}" class="form-control" placeholder="新增" disabled>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>兑换关键词</label>
                                <input type="text" value="{{$text}}" class="form-control" placeholder="enter..." disabled>
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-md-9">
                            <div class="form-group">
                                <label>选择回复语</label>
                                {{ Form::select('media_id', $medias,$data->media_id,['class'=>'form-control']) }}
                            </div>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <input type="hidden" name="id" value="{{$id}}">
                    <input type="hidden" name="media_type" value="{{$type}}">
                    <input type="hidden" name="keyword" value="{{$data->keyword}}">
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
