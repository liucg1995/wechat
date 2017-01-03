@extends(config("wxconfig.extends"))
@section('content')
    @include('wechat::uploadpicture.upload_img')
    <style>
        .lable {
            height: 34px;
            line-height: 34px;
            margin-bottom: 0;
            padding-left: 0px
        }

        .right-lable {
            height: 34px;
            line-height: 34px;
            margin-bottom: 0;
            padding-left: 0px;
            text-align: right;
        }
    </style>
    <script src="http://malsup.github.io/jquery.form.js"></script>
    @include('wechat::layout.message')
    <section class="content-header">
        <h1>
            测试群发
            <small>用于群发内容编辑样式的测试</small>
        </h1>
    </section>
    <div class="box-header with-border">
        <button data-type="text" class="btn btn-primary active">文字</button>
        <button data-type="picture" class="btn btn-primary">图片</button>
        <button data-type="picturetext" class="btn btn-primary">图文</button>
        <button data-type="pretemplate" class="btn btn-primary">模板消息</button>
        <button data-type="precustomer" class="btn btn-primary">客服消息</button>
    </div>
    <section class="content">
        <div class="row text">
            <div class="col-sm-12">
                <form action="/mass/presendtext" method="post" name="mass" id="mass">
                    {{ csrf_field()}}
                    <div class="box">
                        <div class="box-header with-border box-danger">
                            <h3 class="box-title"><label for='test'></label> <input type='hidden' name='select'
                                                                                    value='test' id='tset'>
                                <div class="box-header with-border box-danger form-group">
                                    <label class="col-sm-2 control-label"
                                           style="height:34px;line-height:34px;margin-bottom: 0;padding-left:0px">userid</label>
                                    <div class="col-sm-10">
                                        <input name="userId" type="text" value="{{$userID or old('userId')}}"
                                               placeholder="请输入userid" class=" form-control" size="30">
                                    </div>
                                </div>
                            </h3>
                        </div>
                        <div class="box-body">
                            <div id="example2_wrapper" class="dataTables_wrapper  dt-bootstrap">
                                <div class="row">
                                    <div class="col-sm-6"></div>
                                    <div class="col-sm-6"></div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="text">
                                            <div class="form-group col-sm-12" style="padding-left: 0">
                                                <textarea name="text" rows="20" class="form-control"
                                                          placeholder="请输入文字">{{ old('text') }}</textarea>
                                                <input type="submit" value="测试群发" onclick="return confirm('确定要群发?')"
                                                       name="resubmit"
                                                       class="btn btn-primary"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row picture">
            <div class="col-sm-12">
                <form action="/mass/presendpicture" method="post" name="masspicture" id="mass">
                    <input type="hidden" name="media_id" id="media_id" value="">
                    <div class="box">
                        <div class="box-header with-border box-danger">
                            <h3 class="box-title"><label for='test'></label>
                                <input type='hidden' name='select' value='test' id='tset'>
                                <div class="box-header with-border box-danger form-group">
                                    <label class="col-sm-2 control-label"
                                           style="height:34px;line-height:34px;margin-bottom: 0;padding-left:0px">userid</label>
                                    <div class="col-sm-10">
                                        <input name="userId" type="text" value="{{$userID or old('userId')}}"
                                               placeholder="请输入userid" class=" form-control" size="30">
                                    </div>
                                </div>
                            </h3>
                        </div>
                        <div class="box-body">
                            <div id="example2_wrapper" class="dataTables_wrapper  dt-bootstrap">
                                <div class="row">
                                    <div class="col-sm-12">
                                        {{ csrf_field()}}
                                        <div class="form-group row">
                                            <label class="col-md-2 control-label">缩略图</label>
                                            <div class="col-md-4 thumb-wrap">
                                                <div class="pic-upload btn btn-block btn-info btn-flat"
                                                     title="点击上传">点击上传
                                                </div>
                                                <img id="logo" class="pic" src="">
                                                <input type="hidden" name="logo" class="picvalue" value="">
                                            </div>
                                        </div>
                                        <div class="form-group col-sm-12"
                                             style="padding-left: 0;margin-bottom: 15px">
                                            <input type="submit" value="测试群发" onclick="return confirm('确定要群发?')"
                                                   name="resubmit"
                                                   class="btn btn-primary"/>
                                        </div>
                                        <style>
                                            #logo {
                                                width: 100%;
                                            }
                                        </style>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row picturetext">
            <div class="col-sm-12">
                <form action="/mass/presendpicturetext" method="post" name="masspicturetext" id="mass">
                    <input type="hidden" name="media_id" id="media_id" value="">
                    <div class="box">
                        <div class="box-header with-border box-danger" style="padding: 0">
                            <h3 class="box-title"><label for='test'></label>
                                <input type='hidden' name='select' value='test' id='tset'>
                                <div class="box-header with-border box-danger form-group">
                                    <label class="col-sm-2 control-label"
                                           style="height:34px;line-height:34px;margin-bottom: 0;padding-left:10px">userid</label>
                                    <div class="col-sm-10">
                                        <input name="userId" type="text" value="{{$userID or old('userId')}}"
                                               placeholder="请输入userid" class=" form-control" size="30">
                                    </div>
                                </div>
                            </h3>
                            <div class="form-group">
                                {{ csrf_field()}}
                                <label class="col-sm-1 control-label"
                                       style="margin-bottom: 0;padding-left:15px">选择图文</label>
                                <div class="col-sm-8">
                                    {{ Form::select('media_id', $medias,['class'=>'form-control selectpicker show-tick','data-style'=>"btn-info"]) }}
                                    {{--<select id="usertype" name="media_id" class="selectpicker show-tick form-control"  data-style="btn-info">--}}
                                    {{--@foreach($res as $key=>$value){--}}
                                    {{--<option value="{{$key}}#{{$value}}">{{$value}}</option>--}}
                                    {{--}--}}
                                    {{--@endforeach--}}
                                    {{--</select>--}}
                                </div>
                                <div class="form-group col-sm-12" style="padding-bottom: 0">
                                    <input type="submit" value="测试群发" name="resubmit" onclick="return confirm('确定要群发?')"
                                           class="btn btn-primary"/>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row pretemplate">{{--模板消息--}}
            <div class="col-sm-12">
                <form action="/mass/pretemplate" method="post" name="masspicture" id="mass">
                    {{ csrf_field() }}
                    <div class="box">
                        <div class="box-header with-border box-danger">
                            <h3 class="box-title"><label for='test'></label>
                                <input type='hidden' name='select' value='test' id='tset'>
                                <div class="box-header with-border box-danger form-group">
                                    <label class="col-sm-2 control-label"
                                           style="height:34px;line-height:34px;margin-bottom: 0;padding-left:0px">userid:</label>
                                    <div class="col-sm-10">
                                        <input name="userId" type="text" value="{{$userID or old('userId')}}"
                                               placeholder="请输入userid" class=" form-control" required
                                               size="30">
                                    </div>
                                </div>
                            </h3>
                        </div>
                        <div class="box-body">
                            <div id="example2_wrapper" class="dataTables_wrapper  dt-bootstrap">
                                <div class="row">
                                    <div class="col-sm-12 template">
                                        <div class="box-header with-border box-danger form-group">
                                            <label class="col-sm-2 control-label lable"
                                                   style="height:34px;line-height:34px;margin-bottom: 0;padding-left:0px">头部说明:</label>
                                            <div class="col-sm-10">
                                                <input name="first" type="text"
                                                       value=""
                                                       placeholder="请输入头部说明" class=" form-control" size="30">
                                            </div>
                                        </div>
                                        <div class="box-header with-border box-danger form-group">
                                            <label class="col-sm-2 control-label lable" >模板ID:</label>
                                            <div class="col-sm-10">
                                                <input name="templateid" type="text" value=""
                                                       placeholder="请输入模板ID" class=" form-control" required size="30">
                                            </div>
                                        </div>
                                        <div class="box-header with-border box-danger form-group">
                                            <label class="col-sm-2 control-label lable"
                                            >点击跳转地址:</label>
                                            <div class="col-sm-10">
                                                <input name="url" type="url" value="{{$userID or old('url')}}"
                                                       placeholder="请输入点击跳转地址" class=" form-control" required size="30">
                                            </div>
                                        </div>
                                        <div class="box-header with-border box-danger form-group">
                                            <label class="col-sm-2 control-label right-lable">字段:</label>
                                            <div class="col-sm-4">
                                                <input name="key[]" type="text"
                                                       value=""
                                                       placeholder="请输入字段" class=" form-control" required size="30">
                                            </div>
                                            <label class="col-sm-1 control-label right-lable">值:</label>
                                            <div class="col-sm-4">
                                                <input name="value[]" type="text" value="" placeholder="请输入数据"
                                                       class=" form-control" required size="30">
                                            </div>
                                            <label class="col-sm-1 control-label right-lable"><i class="fa fa-plus-circle btn btn-success btn-md btn-add"></i></label>
                                        </div>

                                        <div class="box-header with-border box-danger form-group remark">
                                            <label class="col-sm-2 control-label lable"
                                                   style="height:34px;line-height:34px;margin-bottom: 0;padding-left:0px">备注:</label>
                                            <div class="col-sm-10">
                                                <input name="remark" type="text"
                                                       value=""
                                                       placeholder="请输入备注" class=" form-control" size="30">
                                            </div>
                                        </div>
                                        <div class="form-group col-sm-12" style="padding-bottom: 0">
                                            <input type="submit" value="测试群发" onclick="return confirm('确定要群发?')"
                                                   name="resubmit"
                                                   class="btn btn-primary"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row precustomer">{{--客服消息--}}
            <div class="col-sm-12">
                <form action="/mass/precustomer" method="post" name="masspicture" id="mass">
                    <input type="hidden" name="url" value="{{$url}}"/>
                    {{ csrf_field() }}
                    <div class="box">
                        <div class="box-header with-border box-danger form-group">客服消息接受者必需在28小时内与公众号沟通过才能接收到消息</div>
                        <div class="box-header with-border box-danger">
                            <h3 class="box-title"><label for='test'></label>
                                <input type='hidden' name='select' value='test' id='tset'>
                                <div class="box-header with-border box-danger form-group">
                                    <label class="col-sm-2 control-label"
                                           style="height:34px;line-height:34px;margin-bottom: 0;padding-left:0px">userid</label>
                                    <div class="col-sm-10">
                                        <input name="userId" type="text" value="{{$userID or old('userId')}}"
                                               placeholder="请输入userid" class=" form-control" size="30">
                                    </div>
                                </div>
                            </h3>
                            <div class="form-group">
                                <label class="col-sm-1 control-label"
                                       style="margin-bottom: 0;padding-left:15px">文本消息</label>
                                <div class="col-sm-8">
                                    <textarea name="text" class=" form-control"></textarea>
                                </div>
                            </div>
                            <div style="clear:both;height:20px;"></div>
                            <div class="form-group">
                                <label class="col-sm-1 control-label"
                                       style="margin-bottom: 0;padding-left:15px">选择消息</label>
                                <div class="col-sm-8 aselect">
                                    {{ Form::select('media_id', $mediaskf,['class'=>'form-control selectpicker show-tick','data-style'=>"btn-info"]) }}
                                </div>
                                <div class="form-group col-sm-12" style="padding-bottom: 0">
                                    <input type="submit" value="测试群发" name="resubmit" onclick="return confirm('确定要群发?')"
                                           class="btn btn-primary"/>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="box" id="list">
            <div class="box-body">
                <div id="example2_wrapper" class="dataTables_wrapper  dt-bootstrap">
                    <div class="row">
                        <div class="col-sm-12">
                            <div>

                                <div>
                                    <div class='body-box'>
                                        @if (count($result) > 0)
                                            <table id="example2"
                                                   class="table table-bordered table-hover dataTable"
                                                   role="grid" aria-describedby="example2_info">
                                                <thead>
                                                <tr role="row">
                                                    <th class="sorting" tabindex="0"
                                                        aria-controls="example2" rowspan="1"
                                                        colspan="1"
                                                        aria-label="Browser: activate to sort column ascending">
                                                        id
                                                    </th>
                                                    <th class="sorting" tabindex="0"
                                                        aria-controls="example2" rowspan="1"
                                                        colspan="1"
                                                        aria-label="Browser: activate to sort column ascending">
                                                        消息id
                                                    </th>
                                                    <th class="sorting" tabindex="0"
                                                        aria-controls="example2" rowspan="1"
                                                        colspan="1"
                                                        aria-label="Browser: activate to sort column ascending">
                                                        接收者
                                                    </th>
                                                    <th class="sorting" tabindex="0"
                                                        aria-controls="example2" rowspan="1"
                                                        colspan="1"
                                                        aria-label="Browser: activate to sort column ascending">
                                                        内容
                                                    </th>
                                                    <th class="sorting" tabindex="0"
                                                        aria-controls="example2" rowspan="1"
                                                        colspan="1"
                                                        aria-label="Browser: activate to sort column ascending">
                                                        结果
                                                    </th>
                                                    <th class="sorting" tabindex="0"
                                                        aria-controls="example2" rowspan="1"
                                                        colspan="1"
                                                        aria-label="Browser: activate to sort column ascending">
                                                        人数
                                                    </th>
                                                    <th class="sorting" tabindex="0"
                                                        aria-controls="example2" rowspan="1"
                                                        colspan="1"
                                                        aria-label="Browser: activate to sort column ascending">
                                                        方式
                                                    </th>
                                                    <th class="sorting" tabindex="0"
                                                        aria-controls="example2" rowspan="1"
                                                        colspan="1"
                                                        aria-label="Browser: activate to sort column ascending">
                                                        时间
                                                    </th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($result as $data)
                                                    <tr role="row" class="odd">
                                                        <td class="sorting_1">{{$data['id']}}</td>
                                                        <td class="sorting_1">{{$data['msgId']}}</td>
                                                        <td class="sorting_1 col-sm-2">{!! urldecode($data['receiver']) !!}</td>
                                                        <td class="sorting_1">{{$data['contents']}}</td>
                                                        <td class="sorting_1">{{$data['result']}}</td>
                                                        <td class="sorting_1">{{$data['number']}}</td>
                                                        <td class="sorting_1">{{$data['way']=='1'?'正式群发':"测试群发"}}</td>
                                                        <td class="sorting_1">{{$data['updated_at']}}</td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        @endif
                                    </div>
                                </div>
                                @include('wechat::layout.page', ['paginator' => $resultData])
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        $(function () {
            $(".picture").hide();
            $(".picturetext").hide();
            $(".pretemplate").hide();
            $(".precustomer").hide();
            $("button").click(function () {
                $(this).addClass("active").siblings().removeClass("active");
                var type = $(this).data("type");
                $(".text").hide();
                $(".picture").hide();
                $(".picturetext").hide();
                $(".pretemplate").hide();
                $(".precustomer").hide();
                $("." + type).show();
            });
            $(".btn-add").bind("click",function () {
                 var  str=' <div class="box-header with-border box-danger form-group"><label class="col-sm-2 control-label right-lable">字段:</label><div class="col-sm-4"><input name="key[]" type="text" value="" placeholder="请输入字段" class=" form-control" required size="30"> </div><label class="col-sm-1 control-label right-lable">值:</label><div class="col-sm-4"><input name="value[]" type="text" value="" placeholder="请输入数据"class=" form-control" required size="30"></div></div>';
                $(".remark").before(str);
            });
        });
    </script>

@endsection


