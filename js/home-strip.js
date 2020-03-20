var submenus = document.querySelectorAll('ul.sub-menu');
var homeCat = document.querySelector('.home-cat');

// display submenus as inline on load as necessary
$(function(){
    if (checkOverflow(homeCat)) {
        makeSubmenusInline(submenu);
    }
});

// display submenus as inline on resize as necessary
$(window).resize(function() {
    var submenusAreInline = submenus[0].classList.contains("inline-sub-menu");

    if (checkOverflow(homeCat)) {
        if (!submenusAreInline) {
            makeSubmenusInline(submenus);
        }
    } else {
        if (submenusAreInline) {
            expandSubmenusVertically(submenus);
        }
    }
});

function makeSubmenusInline(submenus) {
    for (var i = 0; i < submenus.length; i++) {
        submenus[i].classList.add("inline-sub-menu");
        submenus[i].classList.remove("sub-menu");
        submenus[i].parentElement.style.display = 'flex';
    }
}

function expandSubmenusVertically(submenus) {
    for (var i = 0; i < submenus.length; i++) {
        submenus[i].classList.remove("inline-sub-menu");
        submenus[i].classList.add("sub-menu");
        submenus[i].parentElement.style.display = 'list-item';
    }
}

function checkOverflow(el)
{
   var curOverflow = el.style.overflow;

   if ( !curOverflow || curOverflow === "visible" )
      el.style.overflow = "hidden";

   var isOverflowing = el.clientWidth < el.scrollWidth
      || el.clientHeight < el.scrollHeight;

   el.style.overflow = curOverflow;

   return isOverflowing;
}

// show submenus on hover over parent
$('.sub-menu').parent().hover(function() {
    $(this).children('.sub-menu').fadeIn(200);
}, function() {
    $(this).children('.sub-menu').fadeOut(200);
});
