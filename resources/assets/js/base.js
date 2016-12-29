function getURLParameter(name) {
    return decodeURI(
        (RegExp(name + '=' + '(.+?)(&|$)').exec(location.search)||[,null])[1]
    );
}

function HashTable(obj)
{
    this.length = 0;
    this.items = {};
    for (var p in obj) {
        if (obj.hasOwnProperty(p)) {
            this.items[p] = obj[p];
            this.length++;
        }
    }

    this.setItem = function(key, value)
    {
        var previous = undefined;
        if (this.hasItem(key)) {
            previous = this.items[key];
        }
        else {
            this.length++;
        }
        this.items[key] = value;
        return previous;
    };

    this.getItem = function(key) {
        return this.hasItem(key) ? this.items[key] : undefined;
    };

    this.hasItem = function(key)
    {
        return this.items.hasOwnProperty(key);
    };

    this.removeItem = function(key)
    {
        if (this.hasItem(key)) {
            previous = this.items[key];
            this.length--;
            delete this.items[key];
            return previous;
        }
        else {
            return undefined;
        }
    };

    this.keys = function()
    {
        var keys = [];
        for (var k in this.items) {
            if (this.hasItem(k)) {
                keys.push(k);
            }
        }
        return keys;
    };

    this.values = function()
    {
        var values = [];
        for (var k in this.items) {
            if (this.hasItem(k)) {
                values.push(this.items[k]);
            }
        }
        return values;
    };

    this.each = function(fn) {
        for (var k in this.items) {
            if (this.hasItem(k)) {
                fn(k, this.items[k]);
            }
        }
    };

    this.clear = function()
    {
        this.items = {};
        this.length = 0;
    };
}

$.widget('blueimp.fileupload', $.blueimp.fileupload, {
    options: {
        messages: {
            maxNumberOfFiles: '超出文件最大数',
            acceptFileTypes: '文件格式不符合要求',
            maxFileSize: '文件太大',
            minFileSize: '文件太小'
        }
    }
});


function Media()
{
    this.data = new HashTable();
    this.bundle = new HashTable();
    this.media_type = 0;

    this._renderList = function(data, node){
        var self = this,
            html = [];

        html.push('<table class="table table-striped table-hover">');
        $.each(data, function(index, obj){
            self.data.setItem(obj.id, obj);
            html.push('<tr>');
            html.push('<td width="40">'+obj.id+'</td>');
            html.push('<td>');

            html.push(this.media_type==4?'<audio src="'+obj.media_url+'" controls=""></audio> ':'');
            html.push(this.media_type==3?'<image src="'+obj.media_url+'" height="100"/> ':'');
            html.push(this.media_type==6?obj.content:obj.title);
            html.push('</td>');
            html.push('<td width="100"><!--a href="#modify">修改</a--> <a href="/media/'+obj.id+'/delete?mt='+this.media_type+'" class="action-del">删除</a></td>');
          html.push('</tr>');
        });
        html.push('<table>');
        $(html.join('')).appendTo(node);
    };

    this.loadList = function(node, loading_node, fn){
        var tabpane = $(node.attr('href'));
        if ($('.tablebox', tabpane).size() == 1){
            return false;
        }
        if (loading_node) {
           $('#loading').show();
        }
        this.media_type = node.data('type');
        var page = "";
        var type = "";
        if(node.data('page')){
            page="/?page="+node.data('page');
        }
        if(page != ""){
            type="&type="+this.media_type;
        }else{
            type="?type="+this.media_type;
        }
        var self = this;
        $.getJSON('/media/json'+page+type, function(json, textStatus) {
            if (json.status == 200) {

                if ($('.tablebox', tabpane).size() == 1) {
                    $('.tablebox', tabpane).html('');
                }else{
                    //<div><input type="text" name="q"><input type="button" value="搜索"></div>
                    tabpane.append('<div class="tablebox"></div>');
                }
                if ($.isFunction(fn)) {
                    // console.log('fn is defined');
                    fn(json.data, $('.tablebox', tabpane),json.page);
                }else{
                    self._renderList(json.data, $('.tablebox', tabpane),json.page);
                }
            }
        }).done(function(){
            if (loading_node) {
               $('#loading').hide();
            }
        });
    };
}



//多图文编辑器
function MMEditor(){
    // this.tmp_data = new HashTable();

    this.data = [{}, {}];
    this.is_edit = false;

    //编辑状态时，需要记录多图文的bundle_id
    this.bundle_id = 0;

    //当前选中的图文所在列表索引
    this.selected_index = 0;

    this.editor_node = $('.mixed_multi_editor');
    this.save_button = $('#saveMultiMixed');
    this.preview_node = $("#mixed_multi_preview");
    this.preview_list = $("ul.list-group", "#mixed_multi_preview");

    this.preview_list.sortable();
    this.preview_list.disableSelection();

    this.init();
}

MMEditor.prototype.init = function() {
    var self = this;

    //用来存放switch时的初始order
    var from_order = null;

    this.preview_list.on('sortstart', function(event, ui){
        from_order = ui.item.index();
        self.editor_node.hide();
    }).on('sortstop', function(event, ui){
        self.drag(ui.item, from_order, ui.item.index());
        self.editor_node.show();
    });

    this.preview_node.on('mouseenter', '.list-group-item', function(event) {
        event.preventDefault();
        /* Act on the event */
        if ($('.masklayer', this).size()===0) {
            var html = '<a href="#modify" class="modify btn btn-xs btn-success">编辑</a>';
            if ($(this).index()>1) {
                //增加删除按钮
                html += ' <a href="#delete" class="delete btn btn-xs btn-success">删除</a>';
            }
            $('.preview_box', this).append('<div class="masklayer">'+html+'</div>');
        }

        $('.masklayer', this).show();

    }).on('mouseleave', '.list-group-item', function(event) {
        event.preventDefault();
        /* Act on the event */
        if ($('.masklayer', this).size()==1) {
            $('.masklayer', this).hide();
        }
    }).on('click', '.addnew', function(event) {
        event.preventDefault();
        /* Act on the event */

        self.preview_list.append('<li class="list-group-item"><div class="text-cneter preview_box normal_preview_box"><div class="preview_title">标题</div><div class="preview_cover text-center">图片</div><div class="clearfix"></div></div></li>');

    }).on('click', '.modify', function(event) {
        event.preventDefault();
        /* Act on the event */

        //保存form内容到 selected_index
        var current_index = $(this).parents('li.list-group-item').index();
        // console.log("current_index:%s, last:%s", current_index, self.selected_index);
        if (current_index != self.selected_index) {
            var form_data = $('form', self.editor_node).serializeObject();
            form_data.content = ue_multi.getContent();
            self.data[self.selected_index] = form_data;

            $('form', self.editor_node)[0].reset();
            ue_multi.execCommand('cleardoc');

            self.reset_form(current_index);
        }
    }).on('click', '.delete', function(event) {
        event.preventDefault();
        /* Act on the event */
        //TODO 需要删除已经上传的文件，包括题图和ueditor中得图片
        var list_group_item = $(this).parents('.list-group-item');
        var index=list_group_item.index();
        console.log(index);
        self.data[index]['media_delete']=1;
        list_group_item.remove();
        self.reset_form(0);
    });

    this.editor_node.on('keyup', '[name=title]', function(event) {
        event.preventDefault();
        /* Act on the event */
        // var order_id = $('[name=order]', self.editor_node).val();

        var preview_box = $('.list-group-item', self.preview_node).eq(self.selected_index);
        $('.preview_title', preview_box).text($(this).val()==""?"标题":$(this).val());
    });

    this.save_button.click(function(event) {
        /* Act on the event */
        return self.save(this);
    });
};
MMEditor.prototype.drag = function(obj, from_order, to_order) {
    // console.log(obj, from_order, to_order);

    //重新整理显示
    this.preview_list.find('.masklayer').remove();
    this.preview_list.find('li').each(function(k, v){

        if (k == 0) {
            $(v).find('div.normal_preview_box').addClass('head_preview_box').removeClass('normal_preview_box');
        }else{
            $(v).find('div.head_preview_box').addClass('normal_preview_box').removeClass('head_preview_box');
        }
    });
    if (to_order == 0) {
        this.preview_node.find('div.head_preview_box').addClass('normal_preview_box').removeClass('head_preview_box');
        if (obj.find('div.normal_preview_box').size()==1) {
            //换成头条class
            obj.find('div.normal_preview_box').addClass('head_preview_box').removeClass('normal_preview_box');
            obj.find('a.delete').remove();
        }
    }

    this.data.splice(to_order, 0, this.data.splice(from_order, 1)[0]);
    this.reset_form(0);
};

MMEditor.prototype.save = function(button) {
    var self = this;
    var $button = $(button);
    $button.prop('disabled', true);

    var form_data = $('form', this.editor_node).serializeObject();
    form_data.content = ue_multi.getContent();
    // this.tmp_data.setItem($('input[name=order]', this.editor_node).val(), form_data);
    this.data[this.selected_index] = form_data;

    // console.log(this.data);
    if (this.data.length < 2) {
        alert("请先编辑内容，多图文至少要包含两篇文章。");
        $button.prop('disabled', false);
        return false;
    }

    //遍历每篇文章的标题和正文以及图片
    var msg = "";
    for (var i = 0; i < this.data.length; i++) {
        var v = this.data[i];
        if (v['title'] == "") {
            msg = "标题不能为空";
        }else if (v['content'] == "") {
            msg = "内容不能为空";
        }else if (v['media_url'] == ""){
            msg = "必须上传一张图片";
        }
        if (msg != "") {
            $('.modify', this.preview_node).eq(i).click();

            alert(msg);
            $button.prop('disabled', false);
            break;
        }
    }
    if (msg == "") {
        $.ajax({
            url: '/media',
            type: 'POST',
            dataType: 'json',
            data: {data: self.data, media_type:2, is_edit:self.is_edit, bundle_id:self.bundle_id,_token:_token}
        })
        .done(function() {
            //console.log("success");
            alert('保存成功');
            // self.tmp_data.clear();
            self.data = [{}, {}];
            location.href="/media?mt=2";
        })
        .fail(function() {
            //console.log("error");
            alert('保存失败，请稍后再试！');
            $button.prop('disabled', false);
        })
        .always(function() {
            // console.log("complete");
            $button.prop('disabled', false);
        });
    }

    return false;
};

MMEditor.prototype.loadData = function(bundle_id, data) {
    var self = this;

    self.bundle_id = bundle_id;
    self.is_edit = true;
    // self.tmp_data.clear();
    self.data = [];
    self.preview_list.empty();

    $.each(data, function(k, media){

        self.data.push({
            id:media.id,
            media_type: media.media_type,
            media_url: media.media_url,
            order: media.multi_order,
            title: media.title,
            author: media.author,
            content: media.content,
            show_cover_in_text: media.show_cover_in_text,
            media_delete:media.id,
            link:media.link,
        });
        if (k==0) {
            self.preview_list.append('<li class="list-group-item"><div class="text-cneter preview_box head_preview_box"><div class="preview_title">'+media.title+'</div><div class="preview_cover text-center"><img src="'+media.media_url+'"></div><div class="clearfix"></div></div></li>');
        }else if(k>0){
            self.preview_list.append('<li class="list-group-item"><div class="text-cneter preview_box normal_preview_box"><div class="preview_title">'+media.title+'</div><div class="preview_cover text-center"><img src="'+media.media_url+'"></div><div class="clearfix"></div></div></li>');
        }
    });

    this.reset_form(0);
};

MMEditor.prototype.reset_form = function(index) {
    // console.log('reset_form %s', index);
    var self = this;

    if (self.data[index]!=undefined) {
        $.each(self.data[index], function(k, v){
            if (k == 'content') {
                ue_multi.setContent(v);
            }else if(k == 'show_cover_in_text'){
                $('form [name='+k+']', self.editor_node).prop('checked', v=='on'||v=='1');
            }else{
                $('[name='+k+']', self.editor_node).val(v);
            }
        });
    }else{
        $('[name=media_url]', self.editor_node).val('');
        $('[name=id]', self.editor_node).val('0');
    }

    $('input[name=order]', self.editor_node).val(index);
    self.selected_index = index;

    //处理表单的位置，跟随当前的图文位置
    var list_group_item = self.preview_list.find('.list-group-item').eq(index);

    // self.preview_list.find('.list-group-item').removeClass('list-group-item-info');
    // list_group_item.addClass('list-group-item-info');
    
    if (index == 0) {
        self.editor_node.css('top', 0).parent().css('margin-bottom', 0);
    }else{
        self.editor_node.css('top', list_group_item.position().top).parent().css('margin-bottom', list_group_item.position().top);
    }
};
