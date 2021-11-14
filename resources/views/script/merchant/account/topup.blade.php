<script>

   $(document).on('change','[name="package"]', function(){
        if($(this).val() == '-1')
        {
            $('.custom-section').slideDown();
            $('input[name="amount"]').prop('required',true);
        }
        else 
        {
            $('.custom-section').slideUp();
            $('input[name="amount"]').prop('required',false);
        }
   })

</script>