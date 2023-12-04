$(document).ready(function() {
    $('.owl-carousel').owlCarousel({
        loop: true,
        margin: 10,
        autoplay:true,
        responsiveClass: true,
        responsive: {
            0: {
                items: 1.5,
                nav: true
            },
            600: {
                items: 2,
                nav: false,
            },
            1000: {
                items: 2.5,
                nav: true,
                loop: true,
                margin: 20
            }
        }
    })
});