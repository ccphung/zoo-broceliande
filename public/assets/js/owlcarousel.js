$(document).ready(function() {
    $(".owl-carousel").owlCarousel({
        items: 1,
        loop: true,
        margin: 10,
        autoplay: true,
        autoplayTimeout: 3000,
        autoplayHoverPause: true,
        autoplaySpeed: 1000,
        nav: false,
        smartSpeed: 1000,
        responsive: {
            0: {
                items: 1
            },
            992: {
                items: 1.5
            },
            1200: {
                items: 2.5
            }
        }
    });
});