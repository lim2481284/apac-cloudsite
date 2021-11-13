
//Function to show loader
function showLoader() {
    $(".page-loader").fadeIn("slow");
}


//Function to hide Loader
function hideLoader() {
    $(".page-loader").fadeOut("slow");
}


$(document).ready(function() {

    //Onsubmit form - auto show loader 
    $("form").submit(function() {
        showLoader();
    });

    //If hide-form class is added will not show loader onsumbit 
    $(".hide-form").submit(function() {
        hideLoader();
    });

    //localization
    $(".language-select").change(function() {
        showLoader();
        location.href = $(this).val();
    });

    //Lazy loader 
    $('.lazy').lazy();

    //Page loader
    hideLoader();

});
