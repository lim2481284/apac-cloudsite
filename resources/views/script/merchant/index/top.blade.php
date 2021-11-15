function mobileMenuToggler () {
    const element = $('.mobile-slidepane');
    const tab = $('#mobile-bottom-tab');
    const content = $('.content-layout');
    const bodyElement = $('body');
    const pageElement = $('#pageContent');

    if (element.hasClass("expand")) {
        element.animate({"width":"0%"}, "slow").removeClass('expand');
        content.css('position', 'relative');
        bodyElement.css('overflow-y', 'auto');
        pageElement.css('border-top-right-radius', '30px');
        tab.slideDown();
    } else {
        element.animate({"width":"500px"}, "slow").addClass('expand');
        content.css('position', 'absolute');
        bodyElement.css('overflow-y', 'hidden');
        pageElement.css('border-top-right-radius', 0);
        tab.slideUp();
    }
}


//Profile toggle
$(document).on('click','#topProfileIcon, .profile-overlay',function(){
    $('.topnav-profile').toggleClass('toggle');
    $('.profile-overlay').toggleClass('toggle');
    $('#topProfileIcon').toggleClass('toggle');
    if ($('.mobile-slidepane').hasClass('expand')) {
        mobileMenuToggler();
    }
})


//Profile toggle for under development
$(document).on('click','.topnav-profile .under-development' ,function(){
    $('.profile-overlay').click();
})

//Top Notification
$("#topNav #topNotification, .top-notification-overlay, .close-notification-btn").click(function() {
    $('#topNav .top-notification-fab .wrap').toggleClass("ani");
    $('#topNav .top-notification').toggleClass("open");
    $('#topNav .top-notification-wrap').toggleClass("open");
    $('#topNav .top-notification-overlay').toggleClass("open");
    $('#topNotification').toggleClass("open");
    $('#topNav .top-notification.open').css({
        'height': (parseInt($('.notification-content-box').height() + 60)) + 'px'
    });
});


$(".view-notification").click(function(){

    $(".top-notification-overlay").click();
})


$(".mobile-notification").click(function() {
    mobileMenuToggler();
})
