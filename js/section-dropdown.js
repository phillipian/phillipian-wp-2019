(function (jQuery) {
    window.$ = jQuery.noConflict();
})(jQuery);

$('.navbar-sections-button').click(function(){
    $(".sections-dropdown").toggleClass("activated");
    $(".search-dropdown").removeClass("activated");
}).keydown(function(e){
    var code = e.which;
    if ((code === 13) || (code === 32)) {
        $(this).click();
    }
});

$('.navbar-search').click(function(){
    $(".search-dropdown").toggleClass("activated");
    $(".sections-dropdown").removeClass("activated");
}).keydown(function (e) {
    var code = e.which;
    if ((code === 13) || (code === 32)) {
        $(this).click();
    }
});

$('label.submit-button').keydown(function (e) {
    var code = e.which;
    if ((code === 13) || (code === 32)) {
        console.log("button-click");
        var labelID = $(this).attr('for');
        $('#' + labelID).trigger('click');
    }
});