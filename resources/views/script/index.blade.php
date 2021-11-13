

<script>

    @if($errors->any())
        swal('', "{{$errors->all()[0]}}", 'warning')
    @elseif(Session::has('err'))
        swal('', "{{Session::get('err')}}", 'warning');
    @elseif($errors->has('email') || $errors->has('password'))
        swal('', "用户名或密码错误", 'warning');
    @elseif($errors->has('captcha'))
        swal('', "验证码错误", 'warning');
    @endif

    @if(Session::has('success'))
        swal('', "{{Session::get('success')}}", 'success');
    @endif

    function confirmationAlert(callback) {
        swal({
            text: "{{translate('are_sure','Are you sure?')}}",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                callback(true);
                return true;
            }
            callback(false);
            return false;
        });
    }
</script>