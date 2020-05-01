$(document).ready(function () {
    // Обработка клика
    $(".like").bind("click", function () {
        // Переменные кнопки
        var link = $(this);
        var ans = link.data('ans');
        var usr = link.data('usr');

        $.ajax({
            // Здесь обработка php
            url: "/func/like.php",
            type: "POST",
            data: {
                ans: ans,
                usr: usr
            },
            // JSON
            dataType: "json",
            success: function (result) {
                // Здесь меняется активность кнопки
                if (result.isActive) {
                    link.addClass('active');
                } else {
                    link.removeClass('active');
                }
                // Здесь меняется количество лайков
                $('#count_like', link).html(result.count);
            }
        });
    });
});