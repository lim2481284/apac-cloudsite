<script defer>


$(document).ready(function(){



    /**********************************************************************
    
                                GENERAL SETTING 

    ***********************************************************************/

    // On click dropoff select
    $(document).on('click', '.dropoff-select, .pickup-select', function(e) {
        e.stopPropagation();
    });



    // On change dropoff / pickup select
    $(document).on('change  ', '.dropoff-select', function(e) {
        $("input[name='send_point']").val($(this).val());
    });
    $(document).on('change  ', '.pickup-select', function(e) {
        $("input[name='pick_point']").val($(this).val());
    });
    

    // On change country - update state based on country
    $(document).on('change', "select[name='send_country']", function(e) {
        detectState('send');
        $("[name='send_state'] optgroup[label='"+ $("[name='send_country']").val() +"'] option:first").prop('selected',true);
    });
    $(document).on('change', "select[name='pick_country']", function(e) {
        detectState('pick');
        $("[name='pick_state'] optgroup[label='"+ $("[name='pick_country']").val() +"'] option:first").prop('selected',true);
    });
    $('#shippingModel').on('show.bs.modal', function (e) {
        detectState('send');
        detectState('pick');
    })

    // Slim Select plugin
    new SlimSelect({select: $('select[name="userID"]')[0]})
    $('.ss-main .ss-single-selected').each(function (i) { $(this).css('border', 0); });
    



    /**********************************************************************
    
                                ACTION SETTING 

    ***********************************************************************/



    //Change delivery status
    $(document).on('change','.edit-delivery-status',function(){
        shippingAction('update_delivery_status', $(this).attr('data-id'), $(this).val())
    })
    

    //Change delivery type
    $(document).on('change','.edit-delivery-type',function(){
        shippingAction('update_delivery_type', $(this).attr('data-id'), $(this).val())
    })

        
    // On click check order shipping details 
    $(document).on('click', '.check-shipping-order-btn', function() {                
        shippingAction('get_shipping_detail', $(this).val(), null)
    });








    /**********************************************************************
    
                        EASY PARCEL SETTING 

    ***********************************************************************/


    // Update default sender data 
    @php($merchantMeta = getMerchant()->getMeta())
    @foreach(getConfig('easyparcel.sender_form_input') as $name=>$v)
        @if(isset($merchantMeta->default_sender))
            $("[name='{{$name}}']").val("{{ $merchantMeta->default_sender->{$name} }}")
        @endif
    @endforeach



    // On click check rate - continue button
    $(document).on('click', '.check-rate-btn', function() {

        //Check if all required field filled in 
        let allAreFilled = true, rateInput={}, defaultInput={};
        document.getElementById("deliveryOrderForm").querySelectorAll("[required]").forEach(function(i) {
            if (!i.value) allAreFilled = false;
        })
        if (allAreFilled) {
            
            // Get rate
            $.each($('#deliveryOrderForm .rate-input'), function(i,v){
                rateInput[$(v).attr('name')] = $(v).val();
            })
            shippingAction('check_rate', null , rateInput)

            // Update default address
            var pickList = @json(getConfig('easyparcel.sender_form_input'));
            $.each(pickList, function(i,v){
                defaultInput[i] = $("[name='"+i+"']").val();
            })
            if($('#updateDefault').is(":checked"))
                shippingAction('update_default_address', null , defaultInput, false)
        }
        else 
            swal('','Please fill in all the required field','warning');
    });
    

    // On click shipping item 
    $(document).on('click', '.shipping-service-item', function() {
        
        if(!$(this).hasClass('active'))
        {
            // Toggle input 
            $(".shipping-service-item").removeClass('active');
            $(this).addClass('active');
            $(".dropoff-select").val('').change();
            $('.hidden-section').slideUp();
            $('.hidden-section', this).slideDown();

            // Update input value 
            $("input[name='service_id']").val($(this).data('service'));
            $("input[name='delivery_fee']").val($(this).data('fee'));
            $("input[name='service_type']").val($(this).data('servicetype'));
            $("input[name='service_name']").val($(this).data('courier'));
            $("#serviceCourier").val($(this).data('courier'));
            $("input[name='pick_point_select']").val('');
            $("input[name='drop_point_select']").val('');                  
        }
        
    });



    // On click process transaction order
    $(document).on('click', '.process-transaction-btn', function(e) {     

        // Check minimunm deposit 
        // @if(!$withMinimumDeposit)
        //     swal('{{translate("minimum_deposit_notice","Minimum Deposit Notice")}}','{{translate("minimum_deposit_notice_desc","Due to Misdeclared Parcel Weight issues, you are required to deposit minimum amount of - RM").$minDeposit}}','warning');
        //     e.preventDefault();
        //     return false;
        // @endif

        showLoader();
        $("#shippingModel").modal('show');
        $(".clear-input").val('');
        $('[name="transaction_id"]').val($(this).val());
        $.ajax({
            type: 'GET', //THIS NEEDS TO BE GET
            url: '/{{Lang::getLocale()}}/order/get/' +  $(this).val(),
            success: function(data) {
                $.each(data, function(i,v){
                    $("input[name='"+i+"']").val(v).change();
                })
                $.each(data.shipping_address, function(i,v){
                    $("input[name='send_"+i+"']").val(v);
                })
                hideLoader();
            }
        });
    });

    
    // On click create order button - create shippign order
    $(document).on('click', '.create-order-btn', function() {

        // Validate service 
        var err = null
        if(!$("input[name='service_id']").val() || !$("input[name='delivery_fee']").val())
            err ='{{translate("delivery_select_err","Please select delivery service , delivery type (if any ) & dropoff point ( if any )")}}';
              
        // Validate service for Pgeon only
        if(($("#serviceCourier").val() == "Pgeon" && $('select','.shipping-service-item.active').length !== 0 && (!$("input[name='pick_point']").val() && !$("input[name='send_point']").val())) )
            err ='{{translate("delivery_select_err","Please select delivery service , pick point or dropoff point ( if any )")}}';
      
        // Check credit         
        if( parseFloat($("input[name='delivery_fee']").val()) >  parseFloat("{{getMerchantCredit()}}")  )
            err ='{{translate("insufficient_credit", "Insufficient Credit")}}';

        // Check error 
        if(err !== null){
            swal('', err,'warning');
            return false;
        }

        // Submit Form 
        confirmationAlert(function(e){
            if(e) 
                $("#deliveryOrderForm").submit();
        },
            "{{translate('create_order_warning','Are you sure you want to create order? This action will deduct your Account Credit and cannot be undo.')}}",
            "{{translate('create_order','Create Order')}}"
        )
     
    });

})







// Shipping action AJAX function 
function shippingAction(action, id, data, withLoader=true)
{
    if(withLoader) showLoader();
    $.ajax({
        type: 'POST',
        url: '/{{Lang::getLocale()}}/order/shipping/action',
        data: {
            _token: CSRF_TOKEN, 
            data: data, 
            id: id, 
            action: action
        },
        success: function (data) {                   

            // Callback based on action
            switch(action){

                case "update_delivery_status":
                    toast("{{translate('delivery_status_updated','Delivery Status Updated')}}");
                    break;

                case "update_delivery_type":
                    swal('',"{{translate('delivery_type_updated','Delivery Type Updated')}}","success");
                    hideLoader();
                    location.reload();
                    break;

                case "get_shipping_detail" : 
                    $.each(data, function (index, value) {
                        $("[data-name='" + index + "']").val(value??'-');
                        $("a[data-name='" + index + "']").attr('href',value);
                    });   
                    $.each(data.order_details, function (index, value) {
                        $("input[data-name='" + index + "']").val(value??'-');
                        $("select[data-name='" + index + "']").val(value).change();                  
                    });   
                    $("a[data-name='tracking']").attr('href',"/order/shipping/tracking/awb/" + data.awb);
                    break;


                case "check_rate" : 
                    var rateList = data.result[0].rates;
                    $('.shipping-service-section').html('');
                    $.each(rateList,function(index,value){

                        // Clone template and update info
                        var template = $("#rateTemplate").clone().removeClass('hide').attr('id','');
                        $(".shipping-service-item", template).attr( { 'data-service':value.service_id, 'data-fee':value.price, 'data-servicetype':value.service_detail, 'data-courier' : value.courier_name } );
                        $(".courier_logo", template).attr('src', value.courier_logo);
                        $(".service-type", template).html(((value.service_detail=="pickup")?"<i class='ti-truck'></i> ":"<i class='ti-import'></i> ") + value.service_detail);
                        $(".service-title", template).html(value.service_name);
                        $(".service-requirement", template).html("{{translate('min_order','Min. Order')}} : " + value.require_min_order);
                        $(".service-duration", template).html("{{translate('delivery_duration','Delivery Duration')}} : " + value.delivery);
                        $(".service-pickupdate", template).html("{{translate('pickupdate','Pickup Date')}} : " + value.pickup_date);
                        $(".service-schedule", template).html("{{translate('delivery_schedule','Scheduled Start Date')}} : " + value.scheduled_start_date);
                        $(".service-rate", template).html( value.price + " <img src='/img/icon/coin.png' />");

                        // Remove select based on courier
                        if(value.courier_name != "Pgeon")
                            $('.dropoff-select-hide, .pickup-select-hide', template).remove();
                        else {
                            
                            // Check select option based on type 
                            if(value.service_detail == 'dropoff'){
                                if( value.dropoff_point.length === 0)
                                    $('.dropoff-select-hide', template).remove();
                                if( value.pickup_point.length === 0)
                                    $('.pickup-select-hide', template).remove();
                            }
                            else 
                                $('.dropoff-select-hide, .pickup-select-hide', template).remove();
                        }
                        
                        // Update select option
                        $.each(value.dropoff_point,function(index,dropoff){
                            $('.dropoff-select', template).append( `
                                <option value="${dropoff.point_id}">
                                    ${dropoff.point_addr1} ${dropoff.point_addr2} ${dropoff.point_addr3} ${dropoff.point_addr4}                                    
                                </option>
                            `)
                        });
                        $.each(value.pickup_point,function(index,pickup){
                            $('.pickup-select', template).append( `
                                <option value="${pickup.point_id}">
                                    ${pickup.point_addr1} ${pickup.point_addr2} ${pickup.point_addr3} ${pickup.point_addr4}                                    
                                </option>
                            `)
                        });

                        // Update template
                        $('.shipping-service-section').append(template);    
                        
                    })
                    $("#shippingModel").modal('hide');
                    $("#rateModel").modal('show');
                    break;

            }
            
            // Slim plugin setting
            $('.shipping-service-section select').each(function (i) {
                new SlimSelect({ select: $(this)[0]})
            })            
            $('.ss-main .ss-single-selected').each(function (i) {
                $(this).css('border', 0); 
            });
            
            if(withLoader) hideLoader();
        },
        error: function(data) {
            hideLoader();
        }
    });

}


// Function to detect state by coutnry
function detectState(type){
    $("[name='"+type+"_state'] optgroup").hide();
    $("[name='"+type+"_state'] optgroup[label='"+ $("[name='"+type+"_country']").val() +"']").show();
}




</script>
