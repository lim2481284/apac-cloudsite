
// Detect if tour parameter exists in request
@if($tourKey = isset(\Request::route()->getAction()['guide']) ? \Request::route()->getAction()[
    'guide'] : null)

// Get tour item 
if ($(".tour-{{$tourKey}}").length) {
    
    let tourPage = [];
    
    
    let indexKey = (window.innerWidth > 992)?'index':'mobile-index';
    $.each($(".tour-{{$tourKey}}"), function(i, v) {
        var obj = {};
        if ($(v).data('intro-title')) obj['title'] = $(v).data('intro-title');
        if ($(v).data('intro')) obj['intro'] = $(v).data('intro');
        if ($(v).attr('data-element') !== undefined) obj['element'] = $(v)[0];
        tourPage[$(v).data(indexKey)] = obj
    })

    // Detect screen size 
    var introSetting = {
        showBullets: false,
        steps: tourPage,
        nextLabel: "{{translate('next','Next')}}",
        prevLabel: "{{translate('prev','Prev')}}",
        doneLabel: "{{translate('done','Done')}}",
        showProgress: true,
    };
    
    if(typeof stopTour !== 'undefined' && !stopTour) 
      tourSetting = introSetting;   
    else 
        initTour(introSetting);   
    
    
} 


@endif
