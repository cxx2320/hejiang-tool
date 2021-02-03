<div class="float-right">
    <?php
    $_customer_s = array_keys($search_array);
    $_s = array_merge(['page', 'per-page'], $_customer_s)
    ?>
    <form method="get">
        <?php foreach ($_GET as $_gi => $_gv) :
            if (in_array($_gi, $_s)) {
                continue;
            } ?>
            <input type="hidden" name="<?= $_gi ?>" value="<?= $_gv ?>">
        <?php endforeach; ?>

        <div class="input-group">
            <?php foreach ($search_array as $filed_name => $name) { ?>
                <input class="form-control" placeholder="<?= $name ?>" name="<?= $filed_name ?>" value="<?= $_GET[$filed_name] ?? '' ?>">
            <?php } ?>
            <div style="margin-left: 10px;">
                <button class="btn btn-primary">搜索</button>
                <div class="btn btn-primary rest-search">重置</div>
            </div>
        </div>
    </form>
    <script>
        $('.rest-search').click(function() {
            location.href = "<?= \Yii::$app->urlManager->createUrl([\Yii::$app->controller->getRoute()]) ?>";
        })
    </script>
</div>