<script>

    $(document).ready(function(){
        var discount_type = $("input[name="+{!! json_encode($metaConfig['discount_type']) !!}+"]");
        var number_name = {!! json_encode($metaConfig['discount_amount']) !!};
        var number_input = $("input[name="+number_name+"]");
        $(document).on('click','.modal-next-btn' ,function(e){ 
            min = number_input.attr('min');
            max = number_input.attr('max');
            value = number_input.val();
            if((max && max < parseInt(value)) || (min && min > parseInt(value))){
                swal('',"{{translate('field_min_or_max_','Minimum or maximum discount value doesnt valid')}}",'info');
                e.preventDefault();
                return false;     
            }
        });
        discount_type.on('change',function(){
            if($(this).val() == 'percent'){
                number_input.attr('max',"99");
            }else{
                number_input.removeAttr('max');
            }
        });

    })


    // Function to insert data 
    function dataInsert(data){      

        // Reset product
        var select = $("#plSelectTemplate").clone();
        $(select).html('');
        $(select).attr('id','product');
        $(select).attr('name',$(select).data('name'));
        $.each(data.productList, function(index, value) {
            $(select).append(`<option value='${index}' ${($.inArray(index, data.pl)!==-1)?'selected':''}>${value}</option`);  
        })
        
        // Reinit multiselect
        $("#plMultiselectSection").html('');
        $("#plMultiselectSection").append(select);
        multi(document.getElementById('product'), {
            non_selected_header: "{{translate('product_list','Product List')}}",
            selected_header: "{{translate('selected_product','Selected Product')}}"
        });

        // Insert value 
        $.each(data, function(index, value) {            
            if (value)
                $(target + " input[name='" + index + "'][type=radio][value='"+value+"']").click();
        });  
      
    }


</script>