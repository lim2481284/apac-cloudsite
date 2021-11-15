<script>


$(document).ready(function() {
    
    // Update tooltips width
    $("#chatHeadTooltips p").css("width", $("#chatHeadTooltips p").width());
    $("#chatHeadTooltips").addClass("off");
    setTimeout(function() {
        $("#chatHeadTooltips").removeClass("off");
    }, 1500);

    // Adjust chathead item position
    var position = 65;
    $(".chathead-item").each(function(i, obj) {
        $(obj).css("top", "-" + position + "px");
        position += 65;
        $(obj).css("right", 20 + "px");
    });

    // On click chatHead button
    $(document).on("click", "#chatToggle", function() {
        $("#chatHeadTooltips").addClass("off");
        $("#chatOption").toggleClass("off");

        if ($("#chatOption").hasClass("off")) {
            $(".material-scrolltop").fadeIn(300);
        } else {
            $(".material-scrolltop").fadeOut(300);
        }
    });


});


</script>