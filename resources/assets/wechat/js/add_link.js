var addLink = (function () {
    var btn = $("#btn");
    var parameter = $("#parameter").html();
    btn.on("click", function () {
        var parent = $(".box-body").children();
        parent.last().before(parameter)
    });
})(window.addLink || {})