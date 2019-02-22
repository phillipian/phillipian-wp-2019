(function (jQuery) {
    window.$ = jQuery.noConflict();
})(jQuery);

$(".navbar-sections-hover").hover(function(){
    console.log("activated");
    $(".sections-dropdown").addClass("activated");
}, function(){
    $(".sections-dropdown").removeClass("activated");
});