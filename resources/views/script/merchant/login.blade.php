<script>
    $(document).ready(function(){

        // Nav handling
        $(".nav-pills .nav-link").on('shown.bs.tab', function (e) {
            $('.role-input').val(e.target.attributes.role.value);
        });

        // Forgot password popup
        $(document).on('click', '.forgot-link', function(){
            underDevelopment('Forgot Password', 'This function allows users who have forgotten their password to unlock, retrieve, or reset it.')
        })



    });

</script>