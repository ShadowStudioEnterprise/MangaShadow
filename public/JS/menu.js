$( document ).ready(function() {
    $('.nav-toggle').click(function(e) {
        e.preventDefault();
        $("html").toggleClass("openNav");
        $(".nav-toggle").toggleClass("active");
    });
    $('.darkModeButton').click(function(e) {
        e.preventDefault();
        $("body").toggleClass("darkMode");
    });
});