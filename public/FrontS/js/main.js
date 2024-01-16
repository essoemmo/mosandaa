// category nice select


$(document).ready(function() {

    $("#jobs").on('change', function() {

        if ($(this).val() == 'training') {

            $(".jobData").addClass('d-none')
        } else {
            $(".jobData").removeClass('d-none')
        }
    })


    $("#se-other").on('change', function() {

        if ($(this).val() == 'other') {
console.log("asd")
            $(".se-show").removeClass('d-none')
        } else {
            $(".se-show").addClass('d-none')
        }
    })
  $("#se-other2").on('change', function() {

        if ($(this).val() == 'other') {
console.log("asd")
            $(".se-show2").removeClass('d-none')
        } else {
            $(".se-show2").addClass('d-none')
        }
    })


    $('.check-in').click(function() {
        if ($(this).prop("checked") == true) {
            $('.uploud-flile').removeClass("disac")
        } else if ($(this).prop("checked") == false) {
            $('.uploud-flile').addClass("disac")
        }
    });

    if ($(window).width() < 992) {
        $('.footer_menu').slideUp();
        $(".heading-list").on('click', function() {
            $(this).siblings(".footer_menu").slideToggle();


        });
    }

    // slider of home
    $(".slider-partner").slick({

        // normal options...
        infinite: false,
        slidesToShow: 8,
        infinite: true,
        slidesToscroll: 1,
        dots: true,
        autoplay: true,
        autoplaySpeed: 2000,
        arrows: true,
        prevArrow: "<button type='button' class='slick-prev pull-left'><i class='fa fa-angle-left' aria-hidden='true'></i></button>",
        nextArrow: "<button type='button' class='slick-next pull-right'><i class='fa fa-angle-right' aria-hidden='true'></i></button>",
        rtl: (document.querySelector("html").getAttribute('lang') == 'ar') ? true : false,
        // the magic
        responsive: [{

            breakpoint: 1024,
            settings: {
                slidesToShow: 4,
                dots: true,
                infinite: true,
            }

        }, {

            breakpoint: 600,
            settings: {
                slidesToShow: 4,
                dots: true,
            }

        }, {

            breakpoint: 300,
            settings: "unslick" // destroys slick

        }]
    });



    $('select.nice-select').niceSelect();
});

// sidebar menu toggle

$(document).on('click', '.mmenu', function() {
    $('.mmenu').hide();
    $('.sidebar-wrapper').addClass('sidebar-show');
    $('.mob-overlay').addClass('active');
});

$(".close-men").on('click', function() {
    $('.sidebar-wrapper').removeClass('sidebar-show');
    $('.mob-overlay').removeClass('active');
    $('.mmenu').show();
});






setTimeout(function() {
    $('.loader-container').fadeOut('slow');
}, 4000);

//cart  plus and minus
var numberSpinner = (function() {
    $('.number-spinner>.ns-btn>a').click(function() {
        var btn = $(this),
            oldValue = btn.closest('.number-spinner').find('input').val().trim(),
            newVal = 0;

        if (btn.attr('data-dir') === 'up') {
            newVal = parseInt(oldValue) + 1;
        } else {
            if (oldValue > 1) {
                newVal = parseInt(oldValue) - 1;
            } else {
                newVal = 1;
            }
        }
        btn.closest('.number-spinner').find('input').val(newVal);
    });

})();

// remove product
$(document).on('click', '.remove_product', function() {
    $(this).parents('tr').remove();

});

// scroll top button
$(function() {

    var scrollButton = $('.go-top');

    $(window).scroll(function() {

        if ($(window).scrollTop() >= 500) {
            scrollButton.show();
        } else {
            scrollButton.hide();
        }
    });

    scrollButton.click(function() {
        $('html, body').animate({ scrollTop: 0 });
    })
});


// toggle call us section

$(document).on('click', '.toggle-call-list', function() {
    $('.toggle-call-list .fa').toggleClass('fa-commenting-o').toggleClass('fa-times').css('transform', 'rotate(360deg)');
    $('.call-list').fadeToggle();
});
var swiper = new Swiper(".mySwiper", {
    slidesPerView: 3,
    spaceBetween: 10,
    pagination: {
        el: ".swiper-pagination",
        clickable: true,

    },
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
    autoplay: {
        delay: 2000,
    },
    loop: true,

    breakpoints: {

        // when window width is >= 320px
        320: {
            slidesPerView: 1,
            spaceBetween: 20
        },
        // when window width is >= 480px
        480: {
            slidesPerView: 1,
            spaceBetween: 30
        },
        // when window width is >= 640px
        991: {
            slidesPerView:1 ,
            spaceBetween: 40
        }
,
          992: {
            slidesPerView:3 ,
            spaceBetween: 40
        }
    }
});
var swiper = new Swiper(".mySwiperfour", {
    slidesPerView: 1,
    spaceBetween: 10,
    pagination: {
        el: ".swiper-pagination",
        clickable: true,

    },
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
    autoplay: {
        delay: 2000,
    },
    loop: true,

    breakpoints: {

        // when window width is >= 320px
        320: {
            slidesPerView: 1,
            spaceBetween: 20
        },
        // when window width is >= 480px
        480: {
            slidesPerView: 1,
            spaceBetween: 30
        },
        // when window width is >= 640px
        992: {
            slidesPerView: 5,
            spaceBetween: 40
        }
    }
});


var swiper = new Swiper(".mySwipertwo", {
    slidesPerView: 1,
    spaceBetween: 10,
    pagination: {
        el: ".swiper-pagination",
        clickable: true,

    },
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
    autoplay: {
        delay: 2000,
    },
    loop: true,

    breakpoints: {
        // when window width is >= 320px
        320: {
            slidesPerView: 1,
            spaceBetween: 20
        },
        // when window width is >= 480px
        480: {
            slidesPerView: 1,
            spaceBetween: 30
        },
        // when window width is >= 640px
        640: {
            slidesPerView: 1,
            spaceBetween: 40
        }
    }
});