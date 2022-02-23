$( document ).ready(function() {
    //https://www.jose-aguilar.com/blog/menu-desplegable-simple-con-jquery/
    $('ul li:has(ul)').hover(function(e) {
        $(this).find('ul').css({display: "block"});
    },function(e) {
        $(this).find('ul').css({display: "none"});
    });
    $("#vista").click(function(e){
        e.preventDefault();
    });
    $("#cascada").click(function(e){
        e.preventDefault();
        $('.slider').slick("unslick");
    });
    $("#paginada").click(function(e){
        e.preventDefault();
        $('.slider').slick({// Enables tabbing and arrow key navigation
            accessibility: true,
            adaptiveHeight: false,
            appendArrows: $("slider"),
            appendDots: $("slider"),
            arrows: true,
            asNavFor: null,
            prevArrow: '<button type="button" data-role="none" class="slick-prev">Previous</button>',
            nextArrow: '<button type="button" data-role="none" class="slick-next">Next</button>',
            autoplay: false,
            autoplaySpeed: 3000,
            centerMode: false,
            centerPadding: '50px',
            cssEase: 'ease',
            draggable: true,
            easing: 'linear',
            edgeFriction: 0.35,
            fade: false,
            focusOnSelect: false,
            focusOnChange: false,
            infinite: false,
            initialSlide: 0,
            lazyLoad: 'ondemand',
            mobileFirst: false,
            pauseOnHover: true,
            pauseOnFocus: true,
            pauseOnDotsHover: false,
            respondTo: 'window',
            responsive: null,
            rows: 1,
            rtl: false,
            slide: '',
            slidesToShow: 1,
            slidesPerRow: 1,
            slidesTo:'<a href="https://www.jqueryscript.net/tags.php?/Scroll/">Scroll</a>: 1',
            speed: 500,
            swipe: true,
            swipeToSlide: false,
            touchMove: true,
            touchThreshold: 5,
            useCSS: true,
            useTransform: true,
            variableWidth: false,
            vertical: false,
            verticalSwiping: false,
            waitForAnimate: true,
            zIndex: 1000});        
    });
});
 