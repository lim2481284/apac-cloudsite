<script>


    $(document).ready(function(){

        // Onclick action btn 
        $(document).on('click','.action-btn',function(){

            // Check if edit button 
            var isEdit = $(this).hasClass('edit-btn');
            $("#passwordNote").toggle(isEdit);
            $('.password-section input').prop('required', !isEdit);
            if(isEdit)             
                $('.password-section p').removeClass('required');            
            else             
                $('.password-section p').addClass('required');      

        })

        // On toggle admin access
        $(document).on('change','input[name="full_access"]',function(){
            checkAccess();
        });

    })



    // Function to check access toggle
    function checkAccess()
    {
        if($('input[name="full_access"]').is(":checked"))
            $('.permission-section').slideUp();
        else
            $('.permission-section').slideDown();
    }


    // Function to insert data 
    function dataInsert(data) {
        $.each(data, function(index, value) {            
            if (value)
            {
                $(target + " input[name='" + index + "'][type=checkbox]").click();
                $(target + " input[name='" + index + "'][type=radio][value='"+value+"']").click();
            }                
        });
        checkAccess();
    }


</script>