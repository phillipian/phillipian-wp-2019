var submenu = document.querySelector('ul.sub-menu');
var homeCat = document.querySelector('.home-cat');

// display submenus as inline on load as necessary
$(function(){
    if (checkOverflow(homeCat)) {
        makeSubmenuInline(submenu);
    }
});

// display submenus as inline on resize as necessary
$(window).resize(function() {
    var submenuIsInline = submenu.classList.contains("inline-sub-menu");

    if (checkOverflow(homeCat)) {
        if (!submenuIsInline) {
            makeSubmenuInline(submenu);
        }
    } else {
        if (submenuIsInline) {
            expandSubmenuVertically(submenu);
        }
    }
});

function makeSubmenuInline(submenu) {
    submenu.classList.add("inline-sub-menu");
    submenu.parentElement.style.display = 'flex';
}

function expandSubmenuVertically(submenu) {
    submenu.classList.remove("inline-sub-menu");
    submenu.parentElement.style.display = 'list-item';
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
    var isInline = $('.sub-menu').hasClass('inline-sub-menu');
    if (!isInline) {
        $('.sub-menu').fadeIn(200);
    }
}, function() {
    var isInline = $('.sub-menu').hasClass('inline-sub-menu');
    if (!isInline) {
        $('.sub-menu').fadeOut(200);
    }
});

