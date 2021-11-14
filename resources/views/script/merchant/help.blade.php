<script>


    $(document).ready( function() {




        /*************************************************************************
        
                                    MESSENGER SETTING
        
        ************************************************************************ */


        // Init Facebook chat widget
        window.fbAsyncInit = function() {FB.init({appId: "{{env('FAPI')}}",autoLogAppEvents: true,xfbml: true,version: "v2.11"});};
        (function(d, s, id) {
            var js,fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) 
                return;            
            js = d.createElement(s);
            js.id = id;
            js.src = "https://connect.facebook.net/en_US/sdk.js";
            fjs.parentNode.insertBefore(js, fjs);
        })(document, "script", "facebook-jssdk");



        // Toggle messenger
        $("#facebook-chat").on("click", function(){
            if($("#fb-root").hasClass('active')){
                swal('','{{translate("click_messenger","Please click on the messenger icon on the bottom right to chat with us")}}','info');
            }

            $("#fb-root").addClass("active");            
        })     





        /*************************************************************************
        
                                    TAWK SETTING
        
        ************************************************************************ */


        
        // var Tawk_API = Tawk_API || {};
        // let Tawk_LoadStart = new Date();
        // let trigger = document.getElementById('livechat-trigger');
        
        // Tawk_API.visitor = {
        //     'name'  : '{{Auth::user()->name}}',
        //     'email' : '{{getMerchant()->email}}',
        // };

        // //Download the script and append to dom
        // trigger.addEventListener('click' , () => {
        //     showLoader();
        //     $('#assistanceModal').modal('toggle');
        //     try {
        //         let s1 = document.createElement("script"),
        //             s0 = document.getElementsByTagName("script")[0];
        //         s1.async = true;
        //         s1.src = 'https://embed.tawk.to/60efcf58649e0a0a5ccc4b87/1fakc3sdo';
        //         s1.charset = 'UTF-8';
        //         s1.setAttribute('crossorigin', '*');
        //         s0.parentNode.insertBefore(s1, s0);
        //     } catch (error){
        //         swal('','{{translate("help_msg_failed","Something is wrong. Please contact administrator")}}','info');
        //         return console.log(error);
        //     } finally {
        //         Tawk_API.onLoad = function(){
        //             $('.tools-button .btn').css('bottom', '100px');
        //             $('.tool-list').css('bottom', '150px');
        //             Tawk_API.toggle();
                    
        //             //Replaced the original download script button for expand button
        //         };  
        //         Tawk_API.onChatMaximized = function(){
        //             if ($('.tool-list.active').length) {
        //                 $('.tools-button .btn').click();   
        //             }
        //         };
        //         Tawk_API.onOfflineSubmit = function(data){
        //             swal('','{{translate("help_msg_sent","We will review your message as soon as possible")}}','success');
        //         };
                
        //         $('#livechat-trigger').attr("id", "livechat-retrigger");
                
        //         //expand the widget when reclick the initiate btn
        //         document.getElementById('livechat-retrigger').addEventListener('click', function (e) {
        //             e.preventDefault();
        //             Tawk_API.maximize();
        //         })
        //         setTimeout(function(){hideLoader()},500)
                
        //     }
        // });
        



    })
  

</script>