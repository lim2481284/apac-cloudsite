// Hide is edit action if not editor 
@if(isset($isEditor) && !$isEditor)
    $('.editor-action').remove();
@endif


// On click share store button 
$(document).on('click', '.share-store-btn', function() {
    $('#shareStoreModal .likely').attr('data-url', $("#shareStoreURL").val()) ;
    $('#shareStoreModal .likely').attr('data-title', "{{getMerchant()->name}}") ;
    likely.initiate();
})

// On click copy button 
$(document).on('click', '.copy-btn', function() {
    copyClipboard($(this).data('target'));
})


//Nicescroll 
$("#main-menu").niceScroll({
    cursorwidth: '0px',
    cursorborder: 'none',
    cursorborderradius: '0px',
});      


// Progress bar animation   
$('.custom-progressbar').each(function(i, obj) {

    var id = $(obj).attr('id');

    // Progress bar - Init
    if (id) {
        window[id + "ProgressBar"] = new ProgressBar.Line("#" + id, {
            strokeWidth: 8,
            easing: 'easeInOut',
            duration: 4000,
            color: '#7678ed',
            trailColor: '#eee',
            trailWidth: 8,
            svgStyle: {
                width: '100%',
                height: '100%',
            },
            from: {
                color: '#FFEA82'
            },
            to: {
                color: '#ED6A5A'
            }
        });

        window[id + "ProgressBar"].animate(parseFloat($(obj).data('current') / $(obj).data('target')));
    }

});

// to display tooltip
$(function () {
    $('[data-toggle="tooltip"]').tooltip()
})
