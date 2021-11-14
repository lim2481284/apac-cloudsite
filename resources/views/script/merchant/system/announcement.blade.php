<script>
    $(document).ready(function() {

        // Function to switch input on change  type 
        checkType();
        $(document).on('change', 'input[name="announcement_type"]', function() {
            $('input[name="announcement_type"]').prop('disabled',true);
            checkType();
        })

        // Onclick row 
        $(document).on('click','tbody tr',function(){
            $(this).find('.view-btn').click();
        })

        // Prevent view button trigger parent 
        $(document).on('click','.view-btn',function(e){
            e.stopPropagation();
        })

        checkMerchantSelect();
        $(document).on('change',".portal-select",function(){
            checkMerchantSelect();
        });

           
        // On change color     
        let colorPickerObj = function(name){
            return {
                template: `
                    <div class="colorpicker">
                        <div class="colorpicker-saturation"><i class="colorpicker-guide"></i></div>
                        <div class="colorpicker-hue"><i class="colorpicker-guide"></i></div>
                        <div class="colorpicker-alpha">
                            <div class="colorpicker-alpha-color"></div> 
                            <i class="colorpicker-guide"></i>
                        </div>
                        <div class="colorpicker-bar">
                            <input type='text' class='form-control colorpicker-input' data-target='${name}'>
                        </div>
                    </div>
                `,
                extensions: [
                    {
                        name: 'swatches', // extension name to load
                        options: { // extension options
                            colors: {
                                '#000000': '#000000',
                                '#212121': '#212121',
                                '#606060': '#606060',
                                '#767676': '#767676',
                                '#B9B9B9': '#B9B9B9',
                                '#F7F7F7': '#F7F7F7',
                                '#ffffff': '#ffffff',
                                '#F23C3C': '#F23C3C',                 
                                '#F2AD3C': '#F2AD3C',                 
                                '#F0ED42': '#F0ED42',                 
                                '#3CF28B': '#3CF28B',                 
                                '#3C67F2': '#3C67F2',                 
                                '#5E3CF2': '#5E3CF2',                 
                                '#F23CA7': '#F23CA7',                 
                            },
                            namesAsValues: true
                        },
                    }
                ]
            }
        };   
        if($('.color-picker').length){
            $.each($('.color-picker'), function(i, v){
                $(v).colorpicker(colorPickerObj($(v).attr('name'))).on('colorpickerChange colorpickerShow', function (e) {
                    $(this).css('background-color', e.color.toString());
                    $('.colorpicker-input').val( e.color.toString());
                })
            })
        }


        // On change color  input     
        var timer;
        $(document).on('keyup', '.colorpicker-input', function(){
            var code = $(this).val();
            var target = $(this).attr('data-target');
            clearTimeout(timer);
            timer = setTimeout(function() {
                $("[name='"+ target +"']").colorpicker('setValue', code);
            }, 400);
        }); 
    })


    // Function to check merchant selec 
    function checkMerchantSelect()
    {
        if($(".portal-select").val() == "{{getConfig('system.portal.merchant')}}")
            $('.merchant-group').slideDown();
        else 
            $('.merchant-group').slideUp();
    }

    
    // Function to insert view data
    function viewData(data) {
        $("#announcementViewContent").html('');
        if(data.notification_type == "simple")
        {
            $("#announcementViewContent").append(`
                <div class='col-12 form-group' >
                    <section>
                        <div class='announcement-picture'>
                            <img src='${data.attachment}'/>
                        </div>
                        <h1 class='announcement-title'> ${data.title}  </h1>
                        <p class='announcement-description'> ${data.description?data.description:''} </p>
            `);
            if(data.meta.link)
            {
                $("#announcementViewContent").append(`
                        <a href='${data.meta.link}'><button class='btn btn-primary'> {{translate('link')}} </button></a>
                    </section>
                </div>
                `);
            }
            else 
            {
                $("#announcementViewContent").append(`
                        <button class='btn btn-primary rounded'> {{translate('aye_captain','Aye Captain')}} </button>
                    </section>
                </div>
                `);
            }
        }
        else 
        {
            $("#announcementViewContent").append(`
                <div class='col-12 form-group'>
                    <section >                                
                        <h1 class='announcement-title'> ${data.title}  </h1>
                        <p class='announcement-description'>  ${data.description?data.description:''}</p>
                        <div class='announcement-content'>  ${data.content?data.content:''}</div>
                    </section>
                </div>
            `);
            tinymce.init({
                selector: '.announcement-content',
                readonly : 1,
                menubar: false,
                statusbar: false,
                toolbar: false ,        
                plugins: ['autoresize'],
                content_style: 'img {max-width: 100%;height:auto}'                              
            });     
        }
    }




    // Function to insert data 
    function dataInsert(data) {
        
        // Check type         
        if(data.notification_type == "simple")                    
            $(".checkbox-tools[data-value='simple']").prop('checked',true);        
        else 
            $(".checkbox-tools[data-value='long']").prop('checked',true);
        checkType();

        // Insert data         
        $.each(data.meta, function( index, value ) {          
            $(target + " input[name='"+index+"']").val(value);     
            if(value)
                $(target + " input[name='"+index+"']").click();                    
        });
        $.each(data.access, function( index, value ) {          
            $(target + " input[name='filter_"+index+"']").val(value);                 
            if(value)
                $(target + " input[name='"+index+"']").click();                    
        });
    }


    // Function to check  type 
    function checkType() {
        var type = $('.checkbox-tools:checked').attr('data-value');    
        $("input[name='notification_type']").val(type);    
        if (type == 'simple')
            $('.long-section, .top-section').slideUp(function() {
                $('.simple-section').slideDown(function(){
                    $('input[name="announcement_type"]').prop('disabled',false);
                });
                $('input[name="announcement_type"]').prop('disabled',false);
            });
        else if (type == 'long')
            $('.simple-section, .top-section').slideUp(function() {
                $('.long-section').slideDown(function(){
                    $('input[name="announcement_type"]').prop('disabled',false);
                });
            });  
        else if (type == 'top')
            $('.simple-section, .long-section').slideUp(function() {
                $('.top-section').slideDown(function(){
                    $('input[name="announcement_type"]').prop('disabled',false);
                });
            });  
    }



</script>