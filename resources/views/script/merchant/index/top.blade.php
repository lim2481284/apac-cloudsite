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


//toggle sidebar
$(document).on('click', '.hamburger-btn, .feedback-btn-mobile', function() {
    mobileMenuToggler();
    $('.profile-overlay.mobile').toggleClass('toggle');
});

//Mobile Notification
$(".mobile-notification, .mobile-mode .close-notification-btn").click(function() {
    $('.top-notification-fab .wrap').toggleClass("ani");
    $('.top-notification').toggleClass("open");
    $('.top-notification-wrap.mobile-mode').toggleClass("open");
    $('.top-notification-overlay').toggleClass("open");
    $('#topNotification').toggleClass("open");
    $('.top-notification.open').css({
        'height': (parseInt($('.notification-content-box').height() + 60)) + 'px'
    });
    if (!$('.top-notification-wrap.mobile-mode').hasClass('open')) {
        $('.profile-overlay.mobile').toggleClass('toggle');
    }
});

$(".mobile-notification").click(function() {
    mobileMenuToggler();
})

//Onclick unread notificaiton - mark as read
$(document).on('click', '.unread-notification', function() {
    var href = $(this).attr('data-href');
    $.ajax({
        url: '/{{Lang::getLocale()}}/notification/read',
        type: 'POST',
        data: {
        _token: CSRF_TOKEN,
        uid: $(this).data('uid')
    },
    dataType: 'JSON',
    success: function(data) {
        location.href = href;
    }
    });
})


// Guideline content fetching API
$.ajax({
    url: '/{{Lang::getLocale()}}/guideline',
    type: 'POST',
    data: {
        _token: CSRF_TOKEN,
        route: $("#moduleHelp").data("route")
    },
    dataType: 'JSON',
    success: function(data) {
    if (data.data.length > 0) {
        var html = '';
        $.each(data.data, function(index, value) {
            html += `
            <div class='col-12 form-group'>
                <h1 class='guideline-title'> ${value.title} </h1>
                <p class='guideline-description'> ${value.description} </p>
                <div class='guideline-content'> ${value.content} </div>
            </div>
            `;
        });
        $("#guidelineContent").html(html);
        $('#guidelineContent').slick({
            dots: true,
            infinite: true,
            slidesToShow: 1,
        });
        tinymce.init({
            selector: '.guideline-content',
            readonly: 1,
            menubar: false,
            statusbar: false,
            toolbar: false,
            plugins: ['autoresize'],
            content_style: 'img {max-width: 100%;height:auto}'
        });
        $('#helpbox').addClass('show');
        }
    }
});

$('#guidelineModal').on('shown.bs.modal', function(e) {
    $('#guidelineContent')[0].slick.setPosition()
    $('#guidelineContent').addClass('open');
});


// Feedback emoji
document.querySelectorAll('.feedback li').forEach(entry => entry.addEventListener('click', e => {
    if(!entry.classList.contains('active')) {
        document.querySelector('.feedback li.active').classList.remove('active');
        entry.classList.add('active');
        $(".feedback input[name='emotion']").removeAttr('checked')
        $('.feedback li.active').find("input[name='emotion']").attr('checked','checked');
    }
    e.preventDefault();
}));

// On click feedback button hide
$(document).on('click','.feedback-btn',function(){
    $("#topProfileIcon").click();
})