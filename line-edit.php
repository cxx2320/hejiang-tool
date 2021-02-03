<?php

/**
 * 行内编辑
 */
$urlManager = \Yii::$app->urlManager;
$base_url = $urlManager->createUrl([get_plugin_url()]);
?>

<div class="modal fade" id="line-edit-modal">
    <div style="width: auto;" class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">修改</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center">
                <div class="form-group row">
                    <div style="margin-right: 10px;" class="form-group-label col-sm-3 text-right">
                        <label class="col-form-label required">值</label>
                    </div>
                    <div class="col-sm-8">
                        <input class="form-control line-edit-value" value="">
                    </div>
                </div>
                <input style="display: none;" class="line-edit-id" name="line-edit-id" value="">
                <input style="display: none;" class="line-edit-field" name="line-edit-field" value="">
                <input style="display: none;" class="line-edit-url" name="line-edit-url" value="">
                <div class="form-group row">
                    <div class="form-group-label col-sm-2 text-right">
                    </div>
                    <div class="col-sm-6">
                        <a class="btn btn-primary update-line-edit" href="javascript:">保存</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // 弹框
    $(document).on("click", ".line-edit", function() {
        let id = $(this).data('id');
        let field = $(this).data('field');
        let value = $(this).data('value');
        let edit_url = $(this).data('edit-url');

        $('.line-edit-field').val(field);
        $('.line-edit-value').val(value);
        $('.line-edit-id').val(id);
        $('.line-edit-url').val(edit_url ? edit_url : '<?= $base_url ?>%2Fline-edit');
        $('#line-edit-modal').modal('show');
    });

    $(document).on('click', '.update-line-edit', function() {
        let value = $('.line-edit-value').val();
        if (!value) {
            $.myAlert({
                content: '请填写内容！',
            })
            return;
        }

        $('.update-line-edit').btnLoading('更新中');
        let href = $('.line-edit-url').val();
        $.ajax({
            url: href,
            type: "post",
            data: {
                id: $('.line-edit-id').val(),
                field: $('.line-edit-field').val(),
                value: value,
                _csrf: _csrf
            },
            dataType: "json",
            success: function(res) {
                $('.update-line-edit').btnReset();
                $.myAlert({
                    content: res.msg,
                    confirm: function() {
                        if (res.code == 0) {
                            location.reload();
                        }
                    }
                })
            }
        });
        return false;
    })
</script>