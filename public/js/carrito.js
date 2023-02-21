jQuery(($) => {
    $(window).scroll((e) => {
    let distance = ($('#ancla').offset().top - $(window).scrollTop());

    // console.log(distance + " " + ($('footer').height() + 150));

    if (distance >= ($('footer').height())) {
        $('#resumen').addClass('fijar');
        $('#producto').addClass('espacio');
    } else {
        $('#resumen').removeClass('fijar');
        $('#producto').removeClass('espacio');
    }
    })
})