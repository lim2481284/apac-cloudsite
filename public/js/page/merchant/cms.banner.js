$(document).ready(function(){

    //Initial Upload Input Box
    initialUploadBox('banner-upload', 'banner-drag', 'banner-message', 'banner-label', 'banner-response', 'banner-message');

    //Current image toggle 
    $(".current-image-btn").hide();
    $(document).on('click','.add-btn',function(){
        $(".current-image-btn").hide();
        $("#manageModal .modal-body  input").val('');
    })


    // Onclick edit banner button 
    $(document).on('click','.edit-btn',function(){
       
        var id = $(this).val();
        showLoader();
        $.ajax({
            type: 'GET',
            url: '/system/cms/banner/get/'+ id,
            success: function (data) {
                $.each(data, function (index, value) {                    
                    $("[name='" + index + "']").val(value);
                });
                $(".current-image-btn").attr('href',data.imageURL).show();
            }
        }).done(function(){
            hideLoader();
        });

    });


})