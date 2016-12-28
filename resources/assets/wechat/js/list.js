var Initialization = (function (mod) {
    /**
     * 显示用户设置
     */
    var btn = $('input[type=checkbox]');
    var sub_list = $("#sub_list").val();
    mod.run = function () {
        var data = JSON.parse(sub_list)
        btn.each(function () {
            for (var i = 0; i < data.length; i++) {
                if (data[i].tag_id == $(this).data("id")) {
                    $(this).attr("checked", true)
                }
            }
        });
    }
    mod.run();
    return mod;
})(window.Initialization || {})
var converse = (function (mod) {
    var btn = $('input[type=checkbox]');
    btn.on("change", function () {
        var id = $(this).data("id");
        var type = $(this)[0].checked ? 1 : 0;
        console.log(type);
        $.ajax({
            type: "post",
            data: {_token: _token, id: id, type: type},
            url: "/converse",
            success: function (data) {
                if (data.errcode == '0') {
                    // $("#message").text(data.errmsg).show();
                } else {
                    $("#message").text(data.errmsg).show();
                }
                var clear = setTimeout(function () {
                    $("#message").text('').hide();
                }, 2000)
            }
        })
    })
    return mod;
})(window.converse || {})