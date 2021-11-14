<script>

$(function(){


    // Hide connected section 
    $('.connected').hide();

    // Facebook Integration
    window.fbAsyncInit = function() {FB.init({appId:"{{env('FAPI')}}",cookie: true,xfbml: true,version: 'v11.0'});};(function(d, s, id){var js, fjs = d.getElementsByTagName(s)[0];if (d.getElementById(id)) {return;}js = d.createElement(s); js.id = id;js.src = "https://connect.facebook.net/en_US/all.js";fjs.parentNode.insertBefore(js, fjs);}(document, 'script', 'facebook-jssdk'));

    
    // On click logout 
    $("#fb-logout").click(function(){
        showLoader();
        FB.getLoginStatus(function(response) {
            if (response.status === 'connected') 
                FB.logout(function(response) {
                    hideLoader();
                    $('.connected-section').slideUp();
                    $(".authorize-section").slideUp(function(){
                        $("#fb-login").show();
                        $('.connected').hide();
                        $(".authorize-section").slideDown();
                    });
                    $("#page-id option:not(:disabled)").remove();
                });            
        });
    });


    // On click login
    $("#fb-login").click(function(){
        fb_login();
    })


    // Functon to login facebook account 
    @if(isset($merchant->getMeta('social')->messenger_c))
        setTimeout(() => {
            fb_login(true);
        }, 500);
    @endif
    function fb_login(autoTrigger = false){
        FB.getLoginStatus(function(response) {
            if (response.status === 'connected') 
                is_connected(response, autoTrigger);            
            else {
                FB.login(function(response){
                        if(response.status === 'connected')
                            is_connected(response, autoTrigger)                    
                    },
                    {   scope:'pages_show_list, pages_messaging',
                        auth_type:'rerequest'
                    }
                );
            }
        });
    }

    // Function to check if is connected 
    function is_connected(response, autoTrigger){
        

        // Set global variable 
        var accessToken=response.authResponse.accessToken;
        var userID= response.authResponse.userID;

        //parse available page list
        if(!autoTrigger) showLoader();
        $.ajax({
            url: '/{{Lang::getLocale()}}/system/general/action',
            type: 'POST',
            data: {
                _token: CSRF_TOKEN,    
                token: accessToken,
                id: userID,               
                action: 'retrieve_account'
            },
            dataType: 'JSON',
            success: function (response) {  
                
                // Update input for form submission
                $("#messengerModal input[name='id']").val(userID);
                $("#messengerModal input[name='token']").val(accessToken);

                // Update page option 
                $.each(response,function(index,element){
                    if(element.id!=null)
                        $("#page-id").append(new Option(element.name, element.id, false, false));
                    else{
                        $("#page-id").append(new Option(element.name, element.id, false, true));
                        $('#page-id > option').attr('disabled', 'disabled');
                    }
                   
                });

                // Chekc if got updated before 
                @if(isset($merchant->getMeta('social')->messenger))
                    $("#page-id").val("{{$merchant->getMeta('social')->messenger}}").change();
                @endif

                //Feedback action 
                hideLoader();
                $('.connected-section').slideDown();
                $(".authorize-section").slideUp(function(){
                    $("#fb-login").hide();
                    $('.connected').show();
                    $(".authorize-section").slideDown();
                });
             
            }
        });

    }

});

</script>