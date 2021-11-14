<script>

$(document).ready(function(){

    

    //Change trending only input 
    $(document).on('change','.action-btn',function(){
        showLoader();
        $.ajax({
            url: '/{{Lang::getLocale()}}/product/category/action',
            type: 'POST',
            data: {
                _token: CSRF_TOKEN,
                action: $(this).attr('data-name'),
                actionID:$(this).attr('data-id'),                 
                checked:($(this).is(":checked"))?1:0
            },
            dataType: 'JSON',
            success: function (data) { 
                toast('{{translate("category_status_updated","Product Category status updated")}}');
                hideLoader();
            }
        }); 
    });


})


// Function to insert data into modal
function dataInsert(data)
{      
    insertMultiselect(data.productArr);
}

</script>
