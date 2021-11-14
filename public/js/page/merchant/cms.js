$(document).ready(function(){

    $(document).on("mouseenter", ".cms-item", function() {
        $(this).addClass('active');
    });
    
    $(document).on("mouseleave", ".cms-item", function() {
        $(this).removeClass('active');
    });

});