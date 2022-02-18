$( document ).ready(function() {
    //https://www.jose-aguilar.com/blog/menu-desplegable-simple-con-jquery/
    $('ul li:has(ul)').hover(function(e) {
        $(this).find('ul').css({display: "block"});
    },
    function(e) {
        $(this).find('ul').css({display: "none"});
    });
    $("#vista").click(function(e){
        e.preventDefault();
    });
    $("#paginada").click(function(e){
        e.preventDefault();
        $('.slider').slick({// Enables tabbing and arrow key navigation
            accessibility: true,
          
            // Adapts slider height to the current slide
            adaptiveHeight: false,
          
            // Change where the navigation arrows are attached (Selector, htmlString, Array, Element, jQuery object)
            appendArrows: $("slider"),
          
            // Change where the navigation dots are attached (Selector, htmlString, Array, Element, jQuery object)
            appendDots: $("slider"),
          
            // Enable Next/Prev arrows
            arrows: true,
          
            // Sets the slider to be the navigation of other slider (Class or ID Name)
            asNavFor: null,
          
            // prev arrow
            prevArrow: '<button type="button" data-role="none" class="slick-prev">Previous</button>',
          
            // next arrow
            nextArrow: '<button type="button" data-role="none" class="slick-next">Next</button>',
          
            // Enables auto play of slides
            autoplay: false,
          
            // Auto play change interval
            autoplaySpeed: 3000,
          
            // Enables centered view with partial prev/next slides. 
            // Use with odd numbered slidesToShow counts.
            centerMode: false,
          
            // Side padding when in center mode. (px or %)
            centerPadding: '50px',
          
            // CSS3 easing
            cssEase: 'ease',
          
            // Custom paging templates. 
            customPaging: function(slider, i) {
              return '<button type="button" data-role="none">' + (i + 1) + '</button>';
            },
          
            // Current slide indicator dots
            dots: false,
          
            // Class for slide indicator dots container
            dotsClass: 'slick-dots',
          
            // Enables desktop dragging
            draggable: true,
          
            // animate() fallback easing
            easing: 'linear',
          
            // Resistance when swiping edges of non-infinite carousels
            edgeFriction: 0.35,
          
            // Enables fade
            fade: false,
          
            // Focus on select and/or change
            focusOnSelect: false,
            focusOnChange: false,
          
            // Infinite looping
            infinite: false,
          
            // Initial slide
            initialSlide: 0,
          
            // Accepts 'ondemand' or 'progressive' for lazy load technique
            lazyLoad: 'ondemand',
          
            // Mobile first
            mobileFirst: false,
          
            // Pauses autoplay on hover
            pauseOnHover: true,
          
            // Pauses autoplay on focus
            pauseOnFocus: true,
          
            // Pauses autoplay when a dot is hovered
            pauseOnDotsHover: false,
          
            // Target containet to respond to
            respondTo: 'window',
          
            responsive: null,
          
            // Setting this to more than 1 initializes <a href="https://www.jqueryscript.net/tags.php?/grid/">grid</a> mode. 
            // Use slidesPerRow to set how many slides should be in each row.
            rows: 1,
          
            // Change the slider's direction to become right-to-left
            rtl: false,
          
            // Slide element query
            slide: '',
          
            // # of slides to show at a time
            slidesToShow: 1,
          
            // With grid mode intialized via the rows option, this sets how many slides are in each grid row.
            slidesPerRow: 1,
          
            // # of slides to scroll at a time
            slidesTo:'<a href="https://www.jqueryscript.net/tags.php?/Scroll/">Scroll</a>: 1',
          
            // Transition speed
            speed: 500,
          
            // Enables touch swipe
            swipe: true,
          
            // Swipe to slide irrespective of slidesToScroll
            swipeToSlide: false,
          
            // Enables slide moving with touch
            touchMove: true,
          
            // To advance slides, the user must swipe a length of (1/touchThreshold) * the width of the slider.
            touchThreshold: 5,
          
            // Enable/Disable CSS Transitions
            useCSS: true,
          
            // Enable/Disable CSS Transforms
            useTransform: true,
          
            // Disables automatic slide width calculation
            variableWidth: false,
          
            // Vertical slide direction
            vertical: false,
          
            // hanges swipe direction to vertical
            verticalSwiping: false,
          
            // Ignores requests to advance the slide while animating
            waitForAnimate: true,
          
            // Set the zIndex values for slides, useful for IE9 and lower
            zIndex: 1000});        
    });
    $("#cascada").click(function(e){
        e.preventDefault();
        $('.slider').slick("unslick");
    });
});
 