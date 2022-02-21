$( document ).ready(function() {
    $('.nav-toggle').click(function(e) {
        e.preventDefault();
        $("html").toggleClass("openNav");
        $(".nav-toggle").toggleClass("active");
    });

    if($.cookie('darkMode') === 'on')
        $("body").addClass("darkMode");

    $('.darkModeButton').click(function(e) {
        e.preventDefault();
        
        if($.cookie('darkMode') === 'on')
            $.cookie('darkMode', 'off');
        else
            $.cookie('darkMode', 'on');
        $("body").toggleClass("darkMode");
    });
});