$(document).ready(function () {
    $(".lotw-interactive-descript").hide();
    currentIndex = 0;
});

$(".lotw-interactive-marker").on('click', function () {
    $this = $(this);
    index = $this.attr('data-ind');
    console.log(index);
    if (index != currentIndex) {
        currentIndex = index;
        justDisabled = false;
        $(".lotw-interactive-marker").removeClass("selected");
        $this.addClass("selected");
        markerTop = $this.css("top");
        markerLeft = parseInt($this.css("left"));
        selector = ".lotw-interactive-descript[data-ind='" + index + "']";
        newdescript = $(selector);
        thisWidth = newdescript.width();
        console.log(markerLeft, thisWidth);
        if (markerLeft - thisWidth / 2 < 0) {
            markerLeft = thisWidth / 2 + 16;
        }
        windowWidth = $(window).width();
        if (markerLeft + thisWidth / 2 > windowWidth) {
            markerLeft = windowWidth - thisWidth / 2 - 16;
        }
        $(".lotw-interactive-descript").hide();
        $(selector).show().css("top", "calc(72px + " + markerTop + ")").css("left", markerLeft);
    }
});

$(".lotw-interactive-close").on('click', function () {
    console.log("test");
    thisdescript = $(this).parent();
    thisdescript.hide();
    index = $this.attr('data-ind');
    selector = ".lotw-interactive-marker[data-ind='" + index + "']";
    $(selector).removeClass('selected');
    currentIndex = 0;
});