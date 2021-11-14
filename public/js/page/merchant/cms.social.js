$(document).ready(function(){


    // Onclick edit banner button 
    $(document).on('click','.edit-btn',function(){
       
        var id = $(this).val();
        showLoader();
        $.ajax({
            type: 'GET',
            url: '/system/cms/social/get/'+ id,
            success: function (data) {
                $.each(data, function (index, value) {                    
                    $("[name='" + index + "']").val(value);
                });
            }
        }).done(function(){
            hideLoader();
        });

    });


})