<script>

    

    // On click payment checkout button 
    $(document).on('click','.payment-btn',function(){    
        $.ajax({
            type: 'POST',
            url: '/api/payment/status/update',
            data: {
                _token: CSRF_TOKEN,
                transaction_code: "{{$transaction->transaction_code}}",
                new_transaction_code: "{{$orderRef}}",
                uid: "{{getUserUID()}}"
            },
            success: function(data, textStatus, xhr) {
                $("#paymentForm").submit();                                      
            }
        });              
    })

</script>