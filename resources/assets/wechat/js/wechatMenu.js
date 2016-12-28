var _token=$("input[name=_token]").val();
var def_data =eval('(' + $("#menu").val() + ')');
var menu = {
    top_level_limit: 3,     //父级菜单个数
    sub_level_limit: 5,     //子级菜单个数
    //[{name:'abc', type:'click', key|url:'', sub_button:[]}]
    data: [],
    types: ['click', 'view'],
    box: null,
    init: function ($box) {//初始化菜单
        var self = this;
        this.box = $box;//父级
        this.box.append('<ul id="topMenuList" class="list-unstyled box-body" style="list-style: none;"></ul>');
        var $top_menu_list = $("#topMenuList", this.box);
        var html = [];
        /**
         * 父级菜单
         */
        for (var i = 0; i < this.top_level_limit; i++) {
            html.push(' <li class="topMenu"><div class="input-lg"><input type="text" name="name" placeholder="菜单名称"> <select name="type"><option value="click">用户点按</option><option value="view">浏览网页</option></select> <input type="text" name="type_value" value="" placeholder="KEY"></div>');
            html.push(' <ul class="sub_menu_list" style="list-style: none;margin:10px;padding:0;">');
            /**
             * 子级菜单
             */
            for (var m = 0; m < this.sub_level_limit; m++) {
                html.push('<li class="subMenu" style="margin:5px;"><input type="text" name="name" placeholder="菜单名称"> <select name="type"><option value="click">用户点按</option><option value="view">浏览网页</option></select> <input type="text" name="type_value" value="" placeholder="KEY"></li>');
            }

            html.push('</ul>');
            html.push('</li>');
        }
        $top_menu_list.append(html.join(''));
        this.box.append('<button class="btn btn-primary" id="saveBtn">保存</button> <span style="display:none;" id="loading720">');
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
        /**
         * 显示之前数据
         */
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
                menu_button.name =  ($('[name=name]', this).val());
                menu_button.type = $('[name=type]', this).val();
                if (menu_button.type == 'click') {
                    menu_button.key =  ($('[name=type_value]', this).val());
                } else {
                    menu_button.url =  ($('[name=type_value]', this).val());
                }
                try {
                    $('li.subMenu', this).each(function (m, n) {
                        if ($('[name=name]', this).val() == '') {
                            return;
                        }

                        var _menu_button = {}; //new MenuButton();
                        _menu_button.name =  ($('[name=name]', this).val());
                        _menu_button.type = $('[name=type]', this).val();
                        if (_menu_button.type == 'click') {
                            _menu_button.key =  ($('[name=type_value]', this).val());
                            if (_menu_button.key.length === 0) {
                                throw new Error('请填写【' + $('[name=name]', this).val() + '】的关键字');
                            }
                        } else {
                            _menu_button.url =  ($('[name=type_value]', this).val());
                            if (_menu_button.url.length === 0) {
                                throw new Error('请填写【' + $('[name=name]', this).val() + '】网址');
                            }
                        }
                        menu_button.sub_button = menu_button.sub_button || [];
//                                alert(menu_button.sub_button);
                        menu_button.sub_button.push(_menu_button);
                    });
                } catch (err) {
                    throw err;
                }

                self.data.push(menu_button);
            });
        } catch (err) {
//                    alert(err.message);
            return false;
        }
        if (this.data.length > 0) {
            var $button = $(e.currentTarget);
            $button.prop('disabled', true).addClass('disabled');
            $('#loading720').show();
            console.log(self.data);
            $.ajax({
                type: "POST",
                url: "/wechat/setMenu",
                data: {button: {button: self.data},_token:_token},
//                        dataType: 'json',
                success: function (data) {
                    console.log(data);
                    // var json = JSON.parse(data);
                    if (data.errmsg == 'ok') {
                        alert("成功");
                    } else {
                        alert("失败");
                    }
//                     $button.prop('disabled', false).removeClass('disabled');
//                     $('#loading720').hide();
// //                            alert(data.msg);
                },
                // error: function (XMLHttpRequest, textStatus, errorThrown) {
                //     alert(XMLHttpRequest.status);
                //     alert(XMLHttpRequest.readyState);
                //     alert(textStatus);
                // },
            })

        } else {
            alert('不能提交空菜单');
        }
        return false;
    }
};
$(function () {
    //加载完毕后 根据 json 数据 生成 html
    menu.init($('#menubox'));
});