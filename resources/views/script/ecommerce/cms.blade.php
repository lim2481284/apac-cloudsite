<script>

    $(document).ready(function(){


        // CMS Banner SLick
        if($('.banner-slick').length)
        {
            $('.banner-slick').slick({
                arrows: false,
                dots: true,
                infinite: true,
                autoplay: true,
                autoplaySpeed: 6000,
                adaptiveHeight: true
            });
        }


        // CMS Product  SLick
        if($('.product-slick').length)
        {
            $('.product-slick').slick({
                arrows: false,
                dots: true,
                infinite: true,
                autoplay: true,
                autoplaySpeed: 6000,
                slidesToShow: 3,
                adaptiveHeight: true
            });
        }

        // CMS Collection - Mix it up plugin 
        if($('.collection-container').length)
        {
            var mixer = mixitup('.collection-container', {
                selectors: { 
                    target: '.collection-mix',
                    control: '[data-mixitup-control]'
                },
            });

            // Hash detection
            if (location.hash) {
                var hash = location.hash.replace('#', '.')
                mixer.filter(hash)
            }
        }


      
 
    })
   

</script>