<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">警告</h4>
            </div>
            <div class="modal-body">
                你确定要删除么？
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
                <a class="btn btn-primary active btn-sm model_delete" data-val="" role="button">删除</a>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(".btn-delete").click(function(){
        $('.modal-footer .btn-primary').attr('href',$(this).data("val"));
    });
</script>