<script>

$(document).ready(function(){

    // Form validation 
    $('#passwordForm').submit(function(e){
        if($(".pass").val() != $(".conf-pass").val())
        {
            setTimeout(function(){
                hideLoader();           
            },100) ;     
            swal('',"{{translate('password_not_match','Password not match')}}",'warning');            
            e.preventDefault();        
            return false;
        }
    });


    // Javascript to enable link to tab
    var hash = location.hash.replace(/^#/, '');  // ^ means starting, meaning only match the first hash
    if (hash) 
    $('.nav-pills a[href="#' + hash + '"]').tab('show');


    // Change hash for page-reload
    $('.nav-pills a').on('shown.bs.tab', function (e) {
        window.location.hash = e.target.hash;
        $(window).scrollTop(0);
    })


    // Google 2fa slider 
    $('.g2fa-slider').slick();


    // Confirmation prompt - droplet
    $(document).on('click','.update-droplet',function(){
        confirmationAlert(function(e){
            if(e)  $("#dropletForm").submit();
        },"{{translate('droplet_update_warning','You are about to change the Droplet code. All the invitation links that you shared before will become invalid. Are you sure you want to change your Droplet code?')}}","{{translate('warning_please_read','Warning ! Please read carefully !')}}")
    })


    // On update profile button 
    $(document).on('click','.profile-btn',function(){
        let method = $(this).val();
        $('#method').val(method);
        // Toggle input 
        $('.toggle-section').hide().prop('required', false);
        $("#" + method + "Toggle").show();
        $("#" + method + "Toggle input").show().prop('required', true);
        $('.disable-input').attr('disabled', false);

    })


    // On click update profile button 
    $(document).on('click', ".profile-action-btn", function(){
        
        var method = $("#method").val();
        
        var changeValue = $('input[name="' + method + '"]').val();
        var country_code = $('select[name="country_code"]').val();
        var errMessage = null;

        // Data validation
        if (!changeValue) 
            errMessage = (method == 'phone') ? "{{translate('new_phone_required','New phone is required')}}" : "{{translate('new_email_required','New email is required')}}"        
        if (method == 'phone' && !country_code) 
            errMessage = "{{translate('country_code_required','Country code is required')}}";
        else 
            changeValue = (method == 'phone')?country_code + changeValue:changeValue;
        if(errMessage)
            return swal('', errMessage, 'error');

        // Submit ajax form
        showLoader();
        $.ajax({
            url: '/{{Lang::getLocale()}}/account/action',
            type: 'POST',
            data: {
                _token: CSRF_TOKEN,                                            
                action: $(this).data('action'),    
                password: $('.password_input').val(),
                changeValue : changeValue,
                code: $('.verification_input').val(),
                method : method  
            },
            dataType: 'JSON',
            success: function (data) {      
                if (data.success) {
                    $('.disable-input').attr('disabled', true);
                    swal('', data.message, 'success');
                } 
                else 
                {
                    $('.disable-input').attr('disabled', false);
                    swal('', data.message, 'error');
                }
                hideLoader();
            }
        });

    });
 
});



   
</script>