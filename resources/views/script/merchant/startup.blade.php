<script>


    $(document).ready(function() {



        /*                       GENERAL SECTION                        */

        // Startup overflow optimizaiton 
        $("#emptyLayout").niceScroll({
            cursorwidth: '0px',
            cursorborder: 'none',
            cursorborderradius: '0px',
        });




        /*                       SLICK SECTION                        */

        // Slick initialize
        $('#startupList').slick({
            dots: false,
            infinite: false,
            adaptiveHeight: true,
            slidesToShow: 1,
            swipe: false,
            slidesToScroll: 1,
            arrows: false
        });

        //Sumbit button 
        $(document).on('click', '.startup-submit', function() {
            $("#startupSubmitForm").submit();
        })

        // Next button 
        $(document).on('click', '.startup-next', function() {
            slickNext();
        })

        // Prev button 
        $(document).on('click', '.startup-prev', function() {
            slickPrev();
        })

        // Bind key - key press handling 
        document.onkeydown = function(e) {
            switch (e.which) {
                
                case 13:  
                    if ((parseInt($("#slideCount").val()) + 2) < $('.startup-content-box').length)
                        $(".startup-next").click();
                    else
                        $(".startup-submit").click();
                    e.preventDefault();
                    return false;
                    break;
                default:
                    return; // exit this handler for other keys
            }
            e.preventDefault(); // prevent the default action (scroll / move caret)
        };


        // SLick callback event - update progress bar
        $('#startupList').on('afterChange', function(event, slick, currentSlide, nextSlide) {
            var progress = parseFloat(currentSlide / (slick.slideCount - 1));
            bar.animate(progress);
            $("#slideCount").val(currentSlide - 1);
            setTimeout(function() {
                $("#emptyLayout").getNiceScroll().resize();
            }, 300);

            // Focus fist input 
            $('.question-content:eq(' + (currentSlide - 1) + ')').find('input').focus();
        });
        $('#startupList').on('beforeChange', function(event, slick, currentSlide, nextSlide) {

            // Update progress bar
            var progress = parseFloat(currentSlide / (slick.slideCount - 1));
            bar.animate(progress);

            // Update title & type desc             
            if (currentSlide == 0 && nextSlide == 1) {
                $('.slide-overlay').attr('class', 'slide-overlay');
                $('.slide-overlay').addClass('righttoleft');
                setTimeout(function() {
                    $('.slide-overlay').addClass('righttoleftclose');
                    slick.setPosition()
                }, 800)

            } else if (currentSlide == 1 && nextSlide == 0) {
                $('.slide-overlay').attr('class', 'slide-overlay');
                $('.slide-overlay').addClass('lefttoright');
                setTimeout(function() {
                    $('.slide-overlay').addClass('lefttorightclose');
                    slick.setPosition()
                }, 500)

            }
        });




        /*                       PROGRESS BAR SECTION                        */


        // Progress bar 
        var bar = new ProgressBar.Line(progressBar, {
            strokeWidth: 4,
            easing: 'easeInOut',
            duration: 700,
            color: '#7678ed',
            trailColor: '#eee',
            trailWidth: 4,
            svgStyle: {
                width: '100%',
                height: '100%',
            },
            text: {
                style: {
                    color: '#999',
                    fontSize: "12px",
                    position: 'absolute',
                    right: '-35px',
                    top: '2px',
                    padding: 0,
                    margin: 0,
                    transform: null
                },
                autoStyleContainer: false
            },
            from: {
                color: '#FFEA82'
            },
            to: {
                color: '#ED6A5A'
            },
           
        });


        // Limit industry number
        $("input:checkbox[name='idt[]']").on('change', function() {
            var count = $("input:checked[name='idt[]']").length
            if (count > parseInt("{{getConfig('system.merchant_config.max_industry')}}") ) {
                $(this).prop('checked', false);
                $('#requestModal').modal('show');
            }
        });


    })


    // Slick next function 
    function slickNext() {


        // Validate question before slick next 
        if ($("#slideCount").val() >= 0) {
            var currentContent = $('.question-content:eq(' + ($("#slideCount").val()) + ')');
            var questionType = currentContent.find('.startup-question-type').val();
            var check = true;            

            switch (questionType) {
                case "other":
                    check = findRequired(currentContent);
                    break;

                case "domain":
                    check = findRequired(currentContent);
                    var available = currentContent.find('.domainExist').attr('data-availability');
                    if (available == "false"){
                        check = false;
                    }
                    break;

                case "checkbox":
                
                    if (currentContent.find('.isRequired').val() == 'required') {
                        var name = currentContent.find('.isRequired').attr('data-name');
                        if (!check) return;
                        let radioValueCheck = false;
                        $(`input[type='checkbox'][name='${name}[]']`).each(function(r, obj) {
                            if (obj.checked) radioValueCheck = true;
                        });
                        check = radioValueCheck;
                    }
                    break;              
            }

            if (!check) {
                swal('', "{{translate('startup_required','This question is required to answer')}}", 'info');
                event.preventDefault();
                event.stopPropagation();
                event.stopImmediatePropagation();
                return false;
            }
        }
        $("#startupList").slick('slickNext');
    }


    // SLick prev function 
    function slickPrev() {
        $("#startupList").slick('slickPrev');

    }    


    // Funciton to find required input 
    function findRequired(content) {
        var check = true;
        content.find("[required]").each(function() {
            if (!check) return;
            if (!this.value) check = false;
        });
        return check;
    }


</script>