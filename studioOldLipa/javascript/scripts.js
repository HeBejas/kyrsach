$(function() {
    let header = $('header');
    let hederHeight = header.height(); // вычисляем высоту шапки
    console.log(hederHeight);

    $(window).scroll(function() {
        if ($(this).scrollTop() > 900) {
            // header.hide();
            // $("#main").css('margin-top',340);
            $(".header__block").css('margin-top',0);
            
            header.addClass('header_fixed');
            // $('content').css({
            //     'paddingTop': hederHeight + 'px' // делаем отступ у body, равный высоте шапки
            // });
        } else {
            // header.show();
            // $("#main").css('margin-top',0);
            $(".header__block").css('margin-top',157);
            header.removeClass('header_fixed');
            // $('content').css({
            //     'paddingTop': 0 // удаляю отступ у body, равный высоте шапки
            // })
        }

    });
});