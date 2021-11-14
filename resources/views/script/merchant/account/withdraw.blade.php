<script>


    // On click manage bnak account 
    $(document).on('click','#bankManagement',function(){
        confirmationAlert(function(d){
            if(d) window.location.href = "/account/credit#manageBank";
        },"{{translate('leaving_desc','You are about to leave this page and redirecting to another page. Would you like to leave this page now ?')}}","{{translate('bank_manange_redirect','Redirect to Bank Management')}}")
    })



    // On delete bank record 
    $(document).on('click','.delete-bank-btn',function(e){
        var id = $(this).val();
        e.stopPropagation();
        confirmationAlert(function(d){
            if(d){
                $.ajax({
                    type: 'POST',
                    url: '{{route("account.credit.bank.action")}}',
                    data: {
                        _token: CSRF_TOKEN,
                        action: 'delete',
                        deleteID: id
                    },
                    success: function() {
                        $("li[data-id='"+id+"']").remove();
                        toast("{{translate('bank_account_deleted','Bank account deleted.')}}");
                    }
                });  
            }
        },
            "{{translate('are_sure_delete_bank_acc','Are you sure you want to delete this bank account record ?')}}",
            "{{translate('delete_bank_acc','Delete Bank Account')}}"
        );  
    })


    // On click confirm withdraw button 
    $(document).on('click','.confirm-withdraw',function(){

        // Validate bank info
        let allAreFilled = true;
        document.getElementById("addSection").querySelectorAll("[required]").forEach(function(i) {
            if (!allAreFilled) return;
            if (!i.value) allAreFilled = false;
        })
        if (!allAreFilled) {
            swal('','{{translate("fill_in_all","Please fill in all the required input field")}}','warning');
            return false;
        }

        // Doubel confirm alert
        confirmationAlert(function(d){
            if(d) $("#withdrawForm").submit();
        },"{{translate('withdrawal_confirmation__desc','You are about to create a withdrawal request, which will take approximately 1 - 4 working days for the bank to process. Do you want to continue with the withdrawal ?')}}","{{translate('withdrawal_confirmation','Withdrawal Confirmation')}}")
    })


    // On click bank select
    $(document).on('click','.dropdown-menu li',function(){

        // Manually trigger select bar 
        $(".text-right").click();
        $("input[name='bankID']").val($(this).attr('data-id'));

        // Select bank & update text 
        if($(this).attr('data-id') == "-1")   {
            $('.select-text').html($(this).text());
            $('.new-bank-section').slideDown();       
            $('#addSection input').prop('required',true);
        }     
        else {
            $('.select-text').html($(this).find("h3").text());
            $('.new-bank-section').slideUp();
            $('#addSection input').prop('required',false);
        }
    })


    // Check if custom package
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


   // Validate credit before withdraw
   $(document).on('click','.withdraw-btn', function(){

       var amount = ($('[name="package"]:checked').val() == "-1")?$("input[name='amount']").val():$('[name="package"]:checked').val();
       if(!amount) {
           swal("","{{translate('invalid_amount','Invalid Amount')}}","warning");
           return false;
       }
       
       amount = parseFloat(amount).toFixed(2);
       var balance = parseFloat("{{getMerchantCredit()}}") - amount;
       if(balance<0){
           swal("","{{translate('insufficient_credit','Isufficient Credit')}}","warning");
           return false;    
       }

       $("#bankModal").modal('show');
       $("#withdrawAmount").html("- "+amount);
       $("input[name='amount']").val(amount);
       $("#withdrawBalance").html(balance.toFixed(2));

   })

</script>