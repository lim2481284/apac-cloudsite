<script>

    if(location.hash.substr(1) == "manageBank")
    {
        setTimeout(function(){
            $("#bankModal").modal('show');
        },500)
    }


    // On add bank record 
    $(document).on('click','.add-bank-button', function(){

        // Validate data 
        let allAreFilled = true;
        document.getElementById("bankModal").querySelectorAll("[required]").forEach(function(i) {
            if (!allAreFilled) return;
            if (!i.value) allAreFilled = false;
        })
        if (!allAreFilled) {
            swal('','{{translate("fill_in_all","Please fill in all the required input field")}}','warning');
            return false;
        }


        showLoader();
        $.ajax({
            type: 'POST',
            url: '{{route("account.credit.bank.action")}}',
            data: {
                _token: CSRF_TOKEN,
                action: 'create',
                "{{$metaConfig['bank_name']}}": $("input[name='{{$metaConfig['bank_name']}}']").val(),
                "{{$metaConfig['bank_owner']}}": $("input[name='{{$metaConfig['bank_owner']}}']").val(),
                "{{$metaConfig['bank_account']}}": $("input[name='{{$metaConfig['bank_account']}}']").val(),
            },
            success: function(data) {
                
                // Hide modal & loader
                $("#bankModal").modal('hide');
                $(".no-bank").hide();
                hideLoader();

                // Refresh list animation 
                $('.right-item .bank-list').slideUp(function(){
                    // append bnak list item
                    $('.bank-list').append(`
                        <div class='bank-account bank-item${data.id}'>
                            <div class='bank-info'>
                                <h2>${data.bnm}</h2>
                                <p>${data.bow}</p>
                            </div>
                            <div class='bank-balance'>
                                <h3> ${data.bacc}
                            </div>
                            <div class='overlay'>
                                <button class='btn btn-danger delete-bank-acc' type='button' value="${data.id}">{{translate('delete','Delete')}}</button>
                                <div class='background'></div>
                            </div>
                        </div>
                    `);
                    $('.bank-list').slideDown();
                })
                
                toast("{{translate('bank_account_added','Added bank account.')}}");
            }
        });  
    })


    // On delete bank record 
    $(document).on('click','.delete-bank-acc',function(){
        var id = $(this).val();
        confirmationAlert(function(d){
            if(d){
                showLoader();
                $.ajax({
                    type: 'POST',
                    url: '{{route("account.credit.bank.action")}}',
                    data: {
                        _token: CSRF_TOKEN,
                        action: 'delete',
                        deleteID: id
                    },
                    success: function() {

                        // Refresh list animation 
                        if($('.right-item').length)
                        {
                            // Hide modal & loader
                            $("#bankModal").modal('hide');
                            hideLoader();
                            
                            $('.right-item .bank-list').slideUp(function(){
                                $(".bank-item"+id).remove();
                                $('.bank-list').slideDown();
                            })
                            if($('.bank-account').length <= 2) $(".no-bank").show();
                        }
                        else 
                        {

                            hideLoader();
                            $('.bank-list').slideUp(function(){
                                $(".bank-item"+id).remove();
                                $('.bank-list').slideDown();
                            })
                        }
             

                        toast("{{translate('bank_account_deleted','Bank account deleted.')}}");
                    }
                });  
            }
        })
    })

</script>