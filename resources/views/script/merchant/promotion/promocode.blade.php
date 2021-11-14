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

        // Reinit multiselect
        insertMultiselect(data.ul, "{{$metaConfig['user_list']}}", "{{translate('selected_user','Selected User')}}", "{{translate('user_list','User List')}}");
        insertMultiselect(data.pl, "{{$metaConfig['product_list']}}", "{{translate('selected_product','Selected Product')}}", "{{translate('product_list','Product List')}}");

        // Insert value 
        $.each(data, function(index, value) {      

            if (value){
                $(target + " input[name='" + index + "'][type=checkbox]").click();
                $(target + " input[name='" + index + "'][type=radio][value='"+value+"']").click();
            }
        });  

    }


    // Function to custom init multiselect 
    function customInitMultiselect()
    {
        // Initial Multiselect 
        cleanMultiselect(true, "{{$metaConfig['user_list']}}", "{{translate('selected_user','Selected User')}}", "{{translate('user_list','User List')}}");
        cleanMultiselect(true, "{{$metaConfig['product_list']}}", "{{translate('selected_product','Selected Product')}}", "{{translate('product_list','Product List')}}");

    }


</script>