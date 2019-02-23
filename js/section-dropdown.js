(function (jQuery) {
    window.$ = jQuery.noConflict();
})(jQuery);

$(".navbar-sections-button").click(function(){
    $(".sections-dropdown").toggleClass("activated");
    $(".navbar-sections-button").toggleClass("activated");
});