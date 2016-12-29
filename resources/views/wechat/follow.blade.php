@extends('layouts.app') @section('content')
    <section class="content-header">
        <h1>
            关注回复
            <small>默认情况下关注公众号后的第一条回复</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li>微信设置</li>
            <li class="active">关注回复</li>
        </ol>
    </section>
    @include('wechat::layout.message')
    <section class="content-header">

        <!-- SELECT2 EXAMPLE -->
        <div class="box box-default">
            <form action="" enctype="application/x-www-form-urlencoded" method="post">
                {{ csrf_field() }}
                <div class="box-header with-border">
                    <h3 class="box-title">编辑关注回复</h3>
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
                        <!-- /.col -->
                        <div class="col-md-11">
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
