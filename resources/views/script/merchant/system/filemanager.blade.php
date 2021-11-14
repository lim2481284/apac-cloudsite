<script>

    $(document).ready(function(){

        // On click delete button 
        $(document).on('click','.delete-button',function(){            
            confirmationAlert(function(d){
                if(d)   
                    $("#deleteForm").submit();
            },'{{translate("delete_file_warning","Delete file might affect your website store, which will be replaced by default cloudsite picture. Are you sure you want to delete ?")}}' , '{{translate("warning","Warning")}}')        
        });

        // On click select all
        $(document).on('click','.select-all-button',function(){            
            $('input[type="checkbox"]').click();            
        });


        // On check checkbox 
        $('input[type="checkbox"]').change(function(){
            
            // Toggle delete button 
            var checkToggle = ($('input[name="checked[]"]:checked').length > 0);
            $('.delete-button').toggleClass('active', checkToggle );
            $('.file-size-text').toggleClass('active', checkToggle );

            // Update total size 
            let total = 0;
            $('.checkbox:checked').each(function(){               
                total += parseFloat($(this).data('size') / 1e+6);
            });        
            $('.file-size-text').text("{{translate('total_file_selected','Total File Size Selected : ')}}" + (total).toFixed(2) + " MB");

        });


        // On click image file 
        $(document).on('click','.image-file', function(){
            $('#imgModal img').attr('src', $(this).attr('data-url'));
        })


        // On click video file 
        $(document).on('click','.video-file', function(){         
            $('#videoModal video').attr('src', $(this).attr("data-video")).load();
        })
        
      
    })

</script>