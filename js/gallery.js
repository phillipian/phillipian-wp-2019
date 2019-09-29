$('.imggallery').each(function(){
    images = $(this).children(".single-image");
    numimages = images.length;
    
    index = 1;
    images.first().addClass('selected');
})