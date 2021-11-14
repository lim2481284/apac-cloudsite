$(document).ready(function() {


    //Nicescroll
    $("#main-menu").niceScroll({
        cursorwidth: "0px",
        cursorborder: "none",
        cursorborderradius: "0px"
    });

    //Mobile look scroll for menu to horizontal scroll
    if (window.innerWidth < 992 && $(".mobile-drag-scroll").length) {
        new ScrollBooster({
            viewport: document.querySelector(".mobile-drag-scroll"),
            content: document.querySelector(
                ".mobile-drag-scroll .mobile-drag-content"
            ),
            scrollMode: "transform",
            direction: "horizontal"
        });
    }

});
