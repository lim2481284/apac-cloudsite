

<script defer>
$(document).ready(function() {

    @if(Auth::check())

        //Top nav setting
        @include('script.merchant.index.top')

        //General Setting
        @include('script.merchant.index.general')

        //Tool Setting
        @include('script.merchant.index.tool')

        // Tour setting
        @include('script.merchant.index.tour')    

    @endif

});


// Funtion to init tour guide
function initTour(introSetting){
    
    if (window.innerWidth > 992) {
          
        // Initial tour guide
        introJs()
        .setOptions(introSetting)
        .onafterchange(function(target) {
            
            @if(isNavActive(['dashboard']))
                if (target.id == 'sidebar') {
                    $('.introjs-helperLayer').css('top',0);
                    $('.introjs-tooltipReferenceLayer').css('top', '50%')
                }
                if (target.classList[1] == 'btn-primary') {
                    $('.introjs-helperLayer').css('height', '80px');
                }
            @endif
        })
        .start();
    }
    else {
        
        //to prevent steps indicator spoiled desktop intro has been hide
        introSetting.showProgress= false;

        // specially mobile tour guide which exclude the desktop navbar and sidebar
        introJs()
        .setOptions(introSetting)
        @if (isNavActive(['dashboard']))
            .onafterchange(function(target) {
                
                if (target.id == 'tool-list-btn') {
                    window.scrollTo({ top: 0, behavior: "smooth" });
                    $('.introjs-helperLayer').css('top', '5px');
                    $('.introjs-tooltipReferenceLayer').css('top', '5px');
                    
                    if (window.innerWidth < 578) 
                        $('.introjs-arrow').css('left','80%');                    
                }
                
                if (target.id == 'hamburger-trigger-bar') {
                    if (window.innerWidth < 578) 
                        $('.introjs-arrow').css('left','5%');                    
                }
                
                if (target.id == 'mobile-bottom-tab') {
                    $('.introjs-tooltipReferenceLayer').css('top', '90vh');
                }
                
            })
        @endif
        .start();

    }
}

</script>