<script>
    $(document).on("click", ".delete-btn", function() {
        var url = $(this).attr("href");
        $.confirm({
            content: "确认删除？",
            confirm: function() {
                $.loading();
                $.ajax({
                    url: url,
                    dataType: "json",
                    success: function(res) {
                        $.myAlert({
                            content: res.msg,
                            confirm: function(res) {
                                window.location.reload();
                            }
                        })
                        setTimeout(function() {
                            location.reload();
                        }, 2000)

                    }
                });
            }
        });
        return false;
    });
</script>