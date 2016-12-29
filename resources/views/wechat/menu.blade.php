@extends(config("wxconfig.extends"))
@section('content')
    @include('wechat::layouts.error', ['errors' => $errors])
    <section class="content-header">
        <h1>
            菜单设置
            <small>自定义菜单设置</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="/login"><i class="fa fa-dashboard"></i> Home</a></li>
            <li>微信设置</li>
            <li class="active">菜单设置</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">设置菜单</h3>
                        <div class="box-tools">
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="well">
                                        <form action="" enctype="application/x-www-form-urlencoded" method="post">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="data" value="">
                                            <div id="menubox" style="text-align:center;">
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
    <script>
        var def_data = {!! $data !!};

        var menu = {
            top_level_limit: 3,
            sub_level_limit: 5,

            //[{name:'abc', type:'click', key|url:'', sub_button:[]}]
            data: [],

            types: ['click', 'view'],

            box: null,

            init: function ($box) {
                var self = this;

                this.box = $box;

                this.box.append('<ul id="topMenuList" class="list-unstyled box-body" ></ul>');

                var $top_menu_list = $("#topMenuList", this.box);
                var html = [];
                for (var i = 0; i < this.top_level_limit; i++) {
                    html.push('<li class=" " style="list-style:none"><div class="input-lg"><input type="text" name="name" placeholder="菜单名称"> <select name="type"><option value="click">用户点按</option><option value="view">浏览网页</option></select> <input type="text" name="type_value" value="" placeholder="KEY"></div>');
                    html.push('<ul class="sub_menu_list " style="margin:10px;padding:0;">');

                    for (var m = 0; m < this.sub_level_limit; m++) {
                        html.push('<li class="subMenu" style="list-style:none;margin:5px;"><div class=""><input type="text" name="name" placeholder="菜单名称"> <select name="type"><option value="click">用户点按</option><option value="view">浏览网页</option></select> <input type="text" name="type_value" value="" placeholder="KEY"></div></li>');
                    }

                    html.push('</ul>');
                    html.push('</li>');
                }
                $top_menu_list.append(html.join(''));
                this.box.append('<input class="btn btn-primary" value="保存" id="saveBtn"> <span style="display:none;" id="loading720"></span>');

                this.box.on('change', 'select[name=type]', function () {
                    var $type_value = $(this).parent().find('[name=type_value]').eq(0);
                    if ($(this).val() == 'view') {
                        $type_value.prop('placeholder', 'URL');
                    } else {
                        $type_value.prop('placeholder', 'KEY');
                    }
                }).on('click', '#saveBtn', function (e) {
                    self.save(e, self);
                    return false;
                });

                // $("#topMenuList").sortable().disableSelection();
                // $(".sub_menu_list").sortable({}).disableSelection();

                if (def_data.button) {
                    //初始化现有表单
                    $.each(def_data.button, function (k1, top_menu) {
                        // console.log(k1, top_menu);
                        var node = $('.topMenu').eq(k1);
                        node.find('[name=name]').eq(0).val(top_menu.name);
                        node.find('[name=type]').eq(0).val(top_menu.type);

                        if (top_menu.type == 'click') {
                            node.find('[name=type_value]').eq(0).val(top_menu.key);
                        } else {
                            node.find('[name=type_value]').eq(0).val(top_menu.url);
                        }

                        if (top_menu.sub_button && top_menu.sub_button.length > 0) {
                            $.each(top_menu.sub_button, function (k2, sub_menu) {
                                // console.log(k2, sub_menu);
                                $('.subMenu', node).eq(k2).find('[name=name]').val(sub_menu.name);
                                $('.subMenu', node).eq(k2).find('[name=type]').val(sub_menu.type);

                                if (sub_menu.type == 'click') {
                                    $('.subMenu', node).eq(k2).find('[name=type_value]').val(sub_menu.key);
                                } else {
                                    $('.subMenu', node).eq(k2).find('[name=type_value]').val(sub_menu.url);
                                }
                            });
                        }
                    });
                }
            },
            save: function (e, o) {
                var self = this;
                self.data = [];

                try {
                    $('li.topMenu', '#topMenuList').each(function (k, v) {
                        if ($('[name=name]', this).val() == '') {
                            return;
                        }

                        var menu_button = {};
                        menu_button.name = encodeURIComponent($('[name=name]', this).val());
                        menu_button.type = $('[name=type]', this).val();
                        if (menu_button.type == 'click') {
                            menu_button.key = encodeURIComponent($('[name=type_value]', this).val());
                        } else {
                            menu_button.url = encodeURIComponent($('[name=type_value]', this).val());
                        }
                        try {
                            $('li.subMenu', this).each(function (m, n) {
                                if ($('[name=name]', this).val() == '') {
                                    return;
                                }

                                var _menu_button = {}; //new MenuButton();
                                _menu_button.name = encodeURIComponent($('[name=name]', this).val());
                                _menu_button.type = $('[name=type]', this).val();
                                if (_menu_button.type == 'click') {
                                    _menu_button.key = encodeURIComponent($('[name=type_value]', this).val());
                                    if (_menu_button.key.length === 0) {
                                        throw new Error('请填写【' + $('[name=name]', this).val() + '】的关键字');
                                    }
                                } else {
                                    _menu_button.url = encodeURIComponent($('[name=type_value]', this).val());
                                    if (_menu_button.url.length === 0) {
                                        throw new Error('请填写【' + $('[name=name]', this).val() + '】网址');
                                    }
                                }

                                menu_button.sub_button = menu_button.sub_button || [];
                                menu_button.sub_button.push(_menu_button);
                            });
                        } catch (err) {
                            throw err;
                        }

                        self.data.push(menu_button);
                    });
                } catch (err) {
                    alert(err.message);
                    return false;
                }
                if (this.data.length > 0) {
                    var $button = $(e.currentTarget);
                    $button.prop('disabled', true).addClass('disabled');
                    console.log(JSON.stringify({button: self.data}));
                    $("input[name='data']").val(JSON.stringify({button: self.data}));
                    $("form").submit();
                    /*
                     $('#loading720').show();

                     $.ajax({
                     type: "POST",
                     url: "/index/setup/save_menu",
                     data: {button: {button: self.data}},
                     success: function (data, textStatus, xhr) {
                     console.log(data);

                     $button.prop('disabled', false).removeClass('disabled');
                     $('#loading720').hide();
                     alert(data.msg);
                     },
                     dataType: 'json'
                     }).always(function () {
                     $button.prop('disabled', false).removeClass('disabled');
                     $('#loading720').hide();
                     });
                     */
                } else {
                    alert('不能提交空菜单');
                }
            }
        };

        $(function () {
            menu.init($('#menubox'));
        });
    </script>
@endsection
