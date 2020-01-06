$('.imggallery').each(function(){
    images = $(this).children(".wp-caption");
    numimages = images.length;
    $(this).find(".gallery-index .total").text("/" + numimages);
    images.first().addClass('selected');
})

$('.gallery-next').on('click',function(){
    gallery = $(this).parent().parent();
    index = changeSlide(gallery,true);
})

$('.gallery-prev').on('click',function(){
    gallery = $(this).parent().parent();
    index = changeSlide(gallery,false);
})

function changeSlide(gallery,forward){
    index = gallery.find(".num").text();
    selected = gallery.find(".selected");
    selected.removeClass("selected");
    if (forward) changeTo = selected.next();
    else changeTo = selected.prev();
    if (changeTo.is(".wp-caption")) {
        changeTo.addClass("selected");
        if (forward) index = parseInt(index) + 1;
        else index = parseInt(index) - 1;
    }
    else {
        images = gallery.children(".wp-caption");
        if (forward){
            images.first().addClass("selected");
            index = 1;  
        }
        else{
            images.last().addClass("selected");
            index = images.length;
            console.log(index);
        }
    }
    gallery.find(".num").text(index);
}