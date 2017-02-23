@extends(config("wxconfig.extends")) @section('content')
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

                        </div>
                    </div>


                    <div class="row">
                        <div class="col-sm-12">
                            <form action="/template/add" method="post">
                                {{ csrf_field() }}
                                <div class="">

                                    <div class="box-body">
                                        <div id="example2_wrapper">
                                            <div class="row">
                                                <div class="col-sm-12 template">
                                                    <div class="box-header with-border box-danger form-group">
                                                        <label class="col-sm-2 control-label lable"
                                                               style="height:34px;line-height:34px;margin-bottom: 0;padding-left:0px">模板消息标识:</label>
                                                        <div class="col-sm-10">
                                                            <input name="template_title" type="text"
                                                                   value="" required
                                                                   placeholder="用于群发时选择对应模板消息" class=" form-control"
                                                                   size="30">
                                                        </div>
                                                    </div>
                                                    <div class="box-header with-border box-danger form-group">
                                                        <label class="col-sm-2 control-label lable"
                                                               style="height:34px;line-height:34px;margin-bottom: 0;padding-left:0px">模板消息ID:</label>
                                                        <div class="col-sm-10">
                                                            <input name="template_id" type="text"
                                                                   value="" required
                                                                   placeholder="微信模板消息id" class=" form-control"
                                                                   size="30">
                                                        </div>
                                                    </div>

                                                    <div class="box-header with-border box-danger form-group">
                                                        <label class="col-sm-2 control-label right-lable">字段:</label>
                                                        <div class="col-sm-4">
                                                            <input name="key[]" type="text"
                                                                   value=""
                                                                   placeholder="请输入字段" class=" form-control" required
                                                                   size="30">
                                                        </div>
                                                        <label class="col-sm-1 control-label right-lable">描述:</label>
                                                        <div class="col-sm-4">
                                                            <input name="value[]" type="text" value=""
                                                                   placeholder="请输入描述"
                                                                   class=" form-control" required size="30">
                                                        </div>
                                                        <label class="col-sm-1 control-label right-lable"><i
                                                                    class="fa fa-plus-circle btn btn-success btn-md btn-add"></i></label>
                                                    </div>
                                                    <div class="form-group col-sm-12 form-submit" style="padding-bottom: 0">
                                                        <input type="submit" value="保存" name="resubmit" class="btn btn-primary"/>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
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
    <script>
        $(function () {
            $(".btn-add").bind("click",function () {
                var  str=' <div class="box-header with-border box-danger form-group">' +
                        '<label class="col-sm-2 control-label right-lable">字段:</label>' +
                        '<div class="col-sm-4"><input name="key[]" type="text" value="" placeholder="请输入字段" class=" form-control" required size="30"> ' +
                        '</div><label class="col-sm-1 control-label right-lable">描述:</label><div class="col-sm-4">' +
                        '<input name="value[]" type="text" value="" placeholder="请输入描述"class=" form-control" required size="30">' +
                        '</div></div>';
                $(".form-submit").before(str);
            });
        });
    </script>

@endsection
