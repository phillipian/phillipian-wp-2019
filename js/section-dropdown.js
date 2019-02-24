(function (jQuery) {
    window.$ = jQuery.noConflict();
})(jQuery);

$('.navbar-sections-button').click(function(){
    $(".sections-dropdown").toggleClass("activated");
    $(".search-dropdown").removeClass("activated");
})

$('.navbar-search').click(function(){
    $(".search-dropdown").toggleClass("activated");
    $(".sections-dropdown").removeClass("activated");
})

/*

$(document).click(function(e){
    if ($(e.target).is(".navbar-sections-button span, .navbar-sections-button i") || $(e.target).is(".navbar-sections-button")){
        $(".sections-dropdown").toggleClass("activated");
    }
    else if ($(e.target).is()
    else{
        $(".sections-dropdown").removeClass("activated");
    }
    if ($(e.target).is(".navbar-search span i")){
        $(".search-dropdown").toggleClass("activated");
    }
    else{
        $(".search-dropdown").removeClass("activated");
    }
})

*/