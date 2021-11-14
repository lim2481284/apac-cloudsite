<script>

    let stopTour = true, tourSetting = null;
    $(document).ready(function(){
        
    
        // Check if got onboarding row
        if($(".onboarding-row").length){

            // On click hide onboarding 
            $(document).on('click','#closeOnboarding',function(){
                $("#progress-parent").slideUp();
            })

            // Move all completed onboaridng to back 
            $(".completed").remove().appendTo($(".onboarding-row"));

            //slick onboarding
            $('.onboarding-row').slick({
                infinite: false,
                dots: false,
                slidesToShow: 3,
                slidesToScroll: 2,
                prevArrow: $(".arrow-container.prev"),
                nextArrow: $(".arrow-container.next"),
                responsive: [
                    {
                        breakpoint: 1024,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 2,
                            infinite: true,
                            dots: true
                        }
                    },
                    {
                        breakpoint: 767,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 2
                        }
                    },
                    {
                        breakpoint: 578,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1
                        }
                    }
                ]
            }).on('setPosition', function (event, slick) {
                slick.$slides.css('height', slick.$slideTrack.height() + 'px');
            });
            

        }
        
    })

    
</script>