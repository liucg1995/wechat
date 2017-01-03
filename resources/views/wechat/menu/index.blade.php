@extends(config("wxconfig.extends"))
@section('content')
    <section class="content-header">
        <h1>
            菜单设置
            <small>自定义菜单设置</small>
        </h1>
    </section>
    @include("wechat::layout.message")
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">设置菜单</h3>
                        <div class="box-tools">
                        </div>
                    </div>
                    <div class="box-body">
                        <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="well">
                                        <form action="" enctype="application/x-www-form-urlencoded" method="post">
                                            {{ csrf_field() }}
                                            <input type="hidden" id="menu" name="data" value={{$menu}}>{{--旧数据--}}
                                            <div id="menubox" style="text-align:center;">
                                                {{--容器--}}
                                            </div>
                                        </form>
                                    </div>
                                </div>
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
    <script type="text/javascript" src="{{url("assets/wechat/js/wechatMenu.js")}}"></script>
@endsection
