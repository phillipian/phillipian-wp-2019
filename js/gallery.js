$('.imggallery').each(function(){
    firstimage = $(this).children().first();
    firstimage.addClass('selected');
})