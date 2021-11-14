<script>



    // Shipping calculation chart
    $(function () {
        if($("#ctx").length){
            var chart = new Chart(ctx, {
                type: 'horizontalBar',
                data: {
                    labels: [""],
                    datasets: [{
                        label: '0 - 25',
                        data: [5],
                        backgroundColor: "rgba(63,103,126,1)",
                    }, {
                        label: '25.01 - 50',
                        data: [30],
                        backgroundColor: "rgba(163,103,126,1)",
                    }, {
                        label: '50.01 - ∞',
                        data: [120],
                        backgroundColor: "rgba(63,203,226,1)",
                    }]
                },
                options: {
                    responsive: false,
                    legend: false,
                    scales: {
                        xAxes: [{
                            stacked: true,
                        }],
                        yAxes: [{
                            stacked: true
                        }]
                    }
                }
            });
        }
    })



    // On change shipping method 
    toggleShippingMethod();
    $(document).on('change','input[name="shipping_method"]', function(){
        var type = $('.checkbox-tools:checked').attr('data-value');    
        $("input[name='{{$shippingMeta['shipping_method']}}']").val(type);    
        toggleShippingMethod();
    })


    // On add unit 
    $('#addUnit').click(function(){
        addUnitInput();
        updateRate();
    });


    // On change rate input 
    $(document).on('change',"input[name='{{$shippingMeta['to_condition']}}[]']", function(){
       updateRate();
    })


    // On delete unit 
    $(document).on('click','.delete-unit-btn',function(){
        if($("#unitBox .unit-group").length <= 2){
            swal('',"{{translate('required_least_two_unit','Required at least two unit')}}","warning");
            return false;
        }
        $(this).closest('.unit-group').remove();
        updateRate();
    });



    // Function to insert data into modal
    function dataInsert(data)
    {      
        // Insert data         
        $.each(data.meta, function( index, value ) {          
            $(target + " input[name='"+index+"']").val(value);     
            if(value)
                $(target + " input[name='"+index+"']").click();                    
        });
        $(".checkbox-tools[data-value='"+data.meta.sm+"']").prop('checked',true);        
        toggleShippingMethod();

        // Insert shipping option 
        $.each(data.meta.fc, function(index, value){ if(index>=2) addUnitInput(); });
        $.each(data.meta.fc, function(index, value){
            $("input[name='{{$shippingMeta['from_condition']}}[]']", '.unit-group:eq('+index+')').val(value);
            $("input[name='{{$shippingMeta['to_condition']}}[]']", '.unit-group:eq('+index+')').val(data.meta.tc[index]);
            $("input[name='{{$shippingMeta['fee']}}[]']", '.unit-group:eq('+index+')').val(data.meta.f[index]);
        })

        // Reset state
        var select = $("#stateSelectTemplate").clone();
        $(select).html('');
        $(select).attr('id','state');
        $(select).attr('name',$(select).data('name'));
        $.each(data.available_state, function(index, value) {
            $(select).append(`<option value='${index}' ${($.inArray(index, data.state)!==-1)?'selected':''}>${value}</option`);  
        })

        // Reinit multiselect
        $("#stateMultiselectSection").html('');
        $("#stateMultiselectSection").append(select);
        multi(document.getElementById('state'), {
            non_selected_header: "{{translate('state_list','State List')}}",
            selected_header: "{{translate('selected_state','Selected State')}}"
        });
       
    }


    // Function to toggle shipping method input display 
    function toggleShippingMethod()
    {
        // Set default rate
        $('.unit-group').first().find("input[name='{{$shippingMeta['from_condition']}}[]']").val('0.00');
        var secondUnit = $('.unit-group').first().find("input[name='{{$shippingMeta['to_condition']}}[]']");
        if(!secondUnit.val()){
            secondUnit.val('25.00');
            $('.unit-group').first().find("input[name='{{$shippingMeta['fee']}}[]']").val('5.00')
        }
        updateRate()

        // Toggle shipping method
        var select_method = $('input[name="shipping_method"]:checked').attr('data-toggle');
        $('.method-toggle').slideUp(function(){
            
            $('.toggle').hide();
            $('.toggle input').prop('required', false);
            $('.' + select_method + '-toggle').show();
            $('.' + select_method + '-toggle input').prop('required', true);
            $('.method-toggle').slideDown();
        })
    }


    // Function to add unit input
    function addUnitInput()
    {
        //Check total unit
        if($("#unitBox .unit-group").length > 10){
            swal('',"{{translate('reach_maximum_unit','Reach maximum unit')}}","warning");
            return false;
        }

        //Get last value and clone
        var cloneUnitInput =  $('.unit-group:nth-last-child(2)').clone();
        var data_value = $('.unit-group:nth-last-child(2)').find("input[name='{{$shippingMeta['to_condition']}}[]']").val();
        if(!data_value){
            swal('',"{{translate('rate_unit_required','Rate unit required')}}","warning");
            return false;
        }
        
        $("input[name='{{$shippingMeta['from_condition']}}[]']", cloneUnitInput).val(Number(data_value)+0.01);
        $("input[name='{{$shippingMeta['to_condition']}}[]']", cloneUnitInput).val(Number(data_value)+10.00);
        $("input[name='{{$shippingMeta['fee']}}[]']", cloneUnitInput).val("");
        cloneUnitInput.insertAfter($('.unit-group:nth-last-child(2)'));
    }



    // Function to auto detect rate input on change
    function updateRate()
    {
        $("#unitBox .unit-group").map(function(i){
            var prev_ru = $(this).prev().find("input[name='{{$shippingMeta['to_condition']}}[]']").val();
            if(i == 0)
                $("input[name='{{$shippingMeta['from_condition']}}[]']", this).val('0.00');
            else {
                var new_fru = Number(prev_ru)+0.01;
                $("input[name='{{$shippingMeta['from_condition']}}[]']", this).val(new_fru);
            }
            if(($("#unitBox .unit-group").length - 1) !== i){
                var current_ru = $(this).find("input[name='{{$shippingMeta['to_condition']}}[]']").val();
                var new_current_ru = (new_fru >= current_ru)? Number(prev_ru)+10.00 : current_ru;
                $(this).find("input[name='{{$shippingMeta['to_condition']}}[]']").val(new_current_ru);
            }
            else {
                $(this).find("input[name='{{$shippingMeta['to_condition']}}[]']").val("∞");
                var current_rp = $(this).find("input[name='{{$shippingMeta['fee']}}[]']");
                if(!current_rp.val())
                    current_rp.val('5.00');                
            }
        });
    }



    // FUnction to handle on open create shipping modal 
    function initCreate(){
        cleanMultiselect();
        toggleShippingMethod();
        updateRate();
    }


    

</script>