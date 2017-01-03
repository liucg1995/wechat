@extends(config("wxconfig.extends"))
@section('content')

    <script src="http://malsup.github.io/jquery.form.js"></script>
    @include('wechat::layout.message')
    <link rel="stylesheet" href="{{url("/bower_components/AdminLTE/plugins/iCheck/all.css")}}">
    <section class="content-header">
        <h1>
            二维码
        </h1>
    </section>
    <div class="box-header with-border qrcode">
        <button data-type="fover" class="btn btn-primary active">永久</button>
        <button data-type="temporary" class="btn btn-primary">临时</button>
    </div>
    <section class="content">
        <div class="row fover">{{--二维码--}}
            <div class="col-sm-12">
                <div class="box">
                    <div class="box-body">
                        <div id="example2_wrapper" class="dataTables_wrapper  dt-bootstrap">
                            <div class="row">
                                <div class="col-sm-12 template">
                                    <div class="box-header with-border box-danger form-group">
                                        <label class="col-sm-2 control-label lable"
                                               style="height:34px;line-height:34px;margin-bottom: 0;padding-left:0px">自定义参数:</label>
                                        <div class="col-sm-5">
                                            <input name="f-data" type="text" value="" placeholder="请输入参数"
                                                   class=" form-control f-data" size="30">
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-12" style="padding-bottom: 0">
                                        <input type="submit" value="生成" name="resubmit" class="btn btn-primary f-btn"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row temporary" style="display: none">{{--二维码--}}
            <div class="col-sm-12">
                <div class="box">
                    <div class="box-body">
                        <div id="example2_wrapper" class="dataTables_wrapper  dt-bootstrap">
                            <div class="row">
                                <div class="col-sm-12 template">
                                    <div class="box-header with-border box-danger form-group">
                                        <label class="col-sm-2 control-label lable"
                                               style="height:34px;line-height:34px;margin-bottom: 0;padding-left:0px">自定义参数:</label>
                                        <div class="col-sm-5">
                                            <input name="t-data" type="text" value="" placeholder="请输入参数"
                                                   class=" form-control t-data" size="30">
                                        </div>
                                    </div>
                                    <div class="box-header with-border box-danger form-group">
                                        <label class="col-sm-2 control-label lable"
                                               style="height:34px;line-height:34px;margin-bottom: 0;padding-left:0px">有效时间:</label>
                                        <div class="col-sm-5">
                                            <input name="t-time" type="number" value="" placeholder="请输入有效时间"
                                                   class=" form-control t-time" size="30">
                                        </div>
                                    </div>

                                    <div class="form-group col-sm-12" style="padding-bottom: 0">
                                        <input type="submit" value="生成" name="resubmit" class="btn btn-primary t-btn"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="row qrcode-result" style="display: none">{{--二维码--}}
            <div class="col-sm-12">
                <div class="box">
                    <div class="box-body">
                        <div id="example2_wrapper" class="dataTables_wrapper  dt-bootstrap">
                            <div class="col-sm-12 ">
                                <div class="row form-group">
                                    <div class="col-sm-2 ">
                                        图片地址：
                                    </div>
                                    <div class="col-sm-8 imgurl">

                                    </div>
                                </div>
                                <div class="row form-group">
                                    <img src="" style="width: 200px; height:200px;"
                                         class="qrcodeimg"/>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <script src="{{url("/bower_components/AdminLTE/plugins/iCheck/icheck.min.js")}}"></script>
    <script src="{{url("/bower_components/AdminLTE/plugins/iCheck/icheck.js")}}"></script>
    <script>
        $(function () {
            $(".qrcode button").click(function () {
                var type = $(this).data("type");
                $(this).addClass("active").siblings().removeClass("active");
                if (type == 'fover') {
                    $(".fover").show();
                    $(".temporary").hide();
                } else {
                    $(".fover").hide();
                    $(".temporary").show();
                }
            })
            $(".f-btn").click(function () {
                var data = $(".f-data").val();
                $.ajax({
                    type: "GET",
                    url: "/qrcode/fover",
                    data: {data: data},
                    dataType: 'json',
                    success: function (data) {
                        if (data != "") {
                            $(".imgurl").text(data);
                            $(".qrcodeimg").prop("src", data);
                            $(".qrcode-result").show();
                        }
                    }
                })
            });
            $(".t-btn").click(function () {
                var data = $(".t-data").val();
                var time = $(".t-time").val();
                $.ajax({
                    type: "GET",
                    url: "/qrcode/temporary",
                    data: {data: data, time: time},
                    dataType: 'json',
                    success: function (data) {
                        if (data != "") {
                            $(".imgurl").text(data);
                            $(".qrcodeimg").prop("src", data);
                            $(".qrcode-result").show();
                        }
                    }
                })
            });
        });
    </script>

@endsection


