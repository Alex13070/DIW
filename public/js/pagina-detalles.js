const settings = {
    loop: true,

    speed: 200,
    effect: 'fade',
    
    pagination: {
        el: ".swiper-pagination",
        type: "bullets"
    },
    
    
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev"
    }
};

const swiper = new Swiper(".mySwiper", settings);

$(function () {
    "use strict";
    
    $(".swiper-slide").click(function () {
        // console.log("Hola")
        var $src = $(this).children().children().attr('src');
        $(".show").fadeIn(0);
        $(".img-show img").attr("src", $src);
        // $('.show').css("display", "flex")
    });
    
    $(".wrapper-boton-cerrar").click(function () {
        $(".show").fadeOut(0);
        $(".img-show img").attr("src", "");
        //$('.show').css("display", "none")
    });

});


jQuery($ => {

    $('.sum').click(e => {
        $('#cantidad').val(+$('#cantidad').val() + 1);

        if (+$('#cantidad').val() == 10) {
            $('.sum').prop("disabled", true);
        }

        if (+$('#cantidad').val() > 1) {
            $('.rest').prop("disabled", false);
        }
    });

    $('.rest').click(e => {
        $('#cantidad').val(+$('#cantidad').val() - 1);

        if (+$('#cantidad').val() == 1) {
            $('.rest').prop("disabled", true);
        }

        if (+$('#cantidad').val() < 10) {
            $('.sum').prop("disabled", false);
        }
    });

})