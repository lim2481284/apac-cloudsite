$(document).ready(function(){

    //Get data
    $(document).on('click','.translatejs',function(){

        var id = $(this).data('id');
        $(".modal-title #id").val( id );

        var key = $(this).data('key');
        $(".modal-body #key").val( key );

        var en = $(this).data('en');
        $(".modal-body #en").val( en );

        var cn = $(this).data('cn');
        $(".modal-body #cn").val( cn );

        var index =$(this).data('index');
        $(".modal-title #check").val(index);
    })


    //AJAX update data
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    $(".update-translate").click(function(){
        showLoader();
        var en = $("#en").val();
        var cn = $("#cn").val()
        $.ajax({
            url: 'translate/update',
            type: 'POST',
            data: {
                _token: CSRF_TOKEN,
                id : $("#id").val(),
                value_en : en,
                "value_zh-CN" : cn,
                key:$("#key").val()
            },
            dataType: 'JSON',
            success: function (data) {
                swal('','Translate Updated','success');
                hideLoader();
                var index = $('#check').val();
                $(".tr_"+index).find('.en_td').html(en);
                $(".tr_"+index).find('.cn_td').html(cn);
            }
        });
    });
})
