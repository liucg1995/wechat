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
    @include('wechat::layout.message', ['errors' => $errors])
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
                            </div>
                        </div>
                    </div>
                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs">
                            <li @if($rule->media_type=='1' || $rule->media_type=="") class="active" @endif  data-type="single"><a>单图文</a></li>
                            <li @if($rule->media_type=='2') class="active" @endif data-type="double"><a>多图文</a></li>
                            <li @if($rule->media_type=='3') class="active" @endif data-type="pic"><a>图片</a></li>
                            <li @if($rule->media_type=='6') class="active" @endif data-type="text"><a>文字</a></li>
                        </ul>
                        <!-- /.tab-content -->
                    </div>

                    <div class="row">
                        <div class="col-md-12 single"  @if($rule->media_type!='1' && $rule->media_type!='' ) style="display: none;" @endif >
                            <div class="form-group">
                                <div class="tablebox">
                                    <table class="table table-striped table-hover">
                                        <tbody>
                                        @if(!empty($medias["single"]))
                                            @foreach($medias["single"] as  $key => $val)
                                                @if(!empty($medias["single"]))
                                                <tr>
                                                    <td width="40">
                                                        @if($rule->media_id==$key)
                                                            {{ Form::radio('media_id', $key , true) }}
                                                        @else
                                                            {{ Form::radio('media_id', $key) }}
                                                        @endif
                                                    </td>
                                                    <td>{{$val}}</td>
                                                </tr>
                                                @endif
                                            @endforeach
                                        @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 double" @if($rule->media_type!='2') style="display: none;" @endif>
                            <div class="form-group">
                                <div class="tablebox">
                                    <table class="table table-striped table-hover">
                                        <tbody>
                                        @if(!empty($medias["double"]))
                                            @foreach($medias["double"] as  $key => $val)
                                                <tr>
                                                    <td width="40">
                                                        @if($rule->media_id==$key)
                                                            {{ Form::radio('media_id', $key , true) }}
                                                        @else
                                                            {{ Form::radio('media_id', $key) }}
                                                        @endif
                                                    </td>
                                                    <td>{{$val}}</td>
                                                </tr>
                                            @endforeach
                                        @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 pic" @if($rule->media_type!='3') style="display: none;" @endif>
                            <div class="form-group">
                                <div class="tablebox">
                                    <table class="table table-striped table-hover">
                                        <tbody>
                                        @if(!empty($medias["pic"]))
                                            @foreach($medias["pic"] as  $key => $val)
                                                <tr>
                                                    <td width="40">
                                                        @if($rule->media_id==$key)
                                                            {{ Form::radio('media_id', $key , true) }}
                                                        @else
                                                            {{ Form::radio('media_id', $key) }}
                                                        @endif
                                                    </td>
                                                    <td>{{$val}}</td>
                                                </tr>
                                            @endforeach
                                        @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 text" @if($rule->media_type!='6') style="display: none;" @endif>
                            <div class="form-group">
                                <div class="tablebox">
                                    <table class="table table-striped table-hover">
                                        <tbody>
                                        @if(!empty($medias["text"]))
                                            @foreach($medias["text"] as  $key => $val)
                                                <tr>
                                                    <td width="40">
                                                        @if($rule->media_id==$key)
                                                            {{ Form::radio('media_id', $key , true) }}
                                                        @else
                                                            {{ Form::radio('media_id', $key) }}
                                                        @endif
                                                    </td>
                                                    <td>{{$val}}</td>
                                                </tr>
                                            @endforeach
                                        @endif
                                        </tbody>
                                    </table>
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
