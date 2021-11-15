

// On toggle tool list
$(document).on('click','.tools-button',function(){
    $(".notes-box").removeClass('active');
    $(".tool-list").toggleClass('active');
    $('.tool-overlay').toggle();
    $('.mobile-slidepane').removeClass('expand');
    $('.profile-overlay.mobile').removeClass('toggle');
})
$(document).on('click','.tool-overlay',function(){
    $(".tool-list, .notes-box").removeClass('active');
    $('.tool-overlay').hide();
})

