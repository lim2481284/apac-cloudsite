<script>
    $(document).ready(function(){

        @if(Session::has('community'))
            swal('', "{{Session::get('community')}}", 'info');
        @endif

        $(".nav-pills .nav-link").on('shown.bs.tab', function (e) {
            $('.role-input').val(e.target.attributes.role.value);
        });

    });

</script>