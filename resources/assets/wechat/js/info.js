var code = (function (mod) {
    var box = $("#code");
    mod.show = function () {
        box.find("div.weui-mask").css("opacity", "1").show();
        box.find("input.weui-input").val('');
        box.find("div.weui-actionsheet").addClass("weui-actionsheet_toggle");
    }

    mod.hide = function () {
        box.find("div.weui-mask").css("opacity", "0").hide();
        box.find("div.weui-actionsheet").removeClass("weui-actionsheet_toggle");
    }

    $("#btn-sub").on("touchend", function () {
        var val = box.find("input.weui-input").val();
        if (val.length > 1) {
            $.ajax({
                type: "post",
                url: "/updCode",
                data: {val: val, _token: _token},
                success: function (data) {
                    console.log(data);
                    if (data.errcode == 0) {
                        $(".codeval").text(val);
                    } else {
                        $("#message").text(data.errmsg).show();
                    }
                    var clear = setTimeout(function () {
                        $("#message").text('').hide();
                    }, 2000)
                    mod.hide();
                }
            });
        } else {
            mod.hide();
        }
    });
    $("#iosMask").on("touchend", function () {
        mod.hide();
    })

    return mod;
})(window.code || {});