/**
 * 处理fastadmin的时间选取器
 * @link https://www.cnblogs.com/HKKILL/p/12209810.html
 */
$(document).ready(function () {
    $.datetimepicker.setLocale('zh');
    $('.datetimepicker').each(function () {
        $($(this)).datetimepicker(
            $.extend({
                value: $(this).val(),
                datepicker: true,
                timepicker: true,
                format: 'Y-m-d H:i:s',
                dayOfWeekStart: 1,
                scrollMonth: false,
                scrollTime: false,
                scrollInput: false,
            }, $(this).data())
        );
    });
});

/**
 * 多图移动组件
 */
$(document).ready(function() {
    const elements = document.getElementsByClassName('images-sort-list');
    for (let index = 0; index < elements.length; index++) {
        const element = elements[index];
        Sortable.create(element, {
            animation: 250,
        });
    }
})