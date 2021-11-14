<script>
    $('.add-row-btn').click(function() {
        var iteration = parseInt($('table tr:last').find('.row-iteration').text()) + 1;
        var config = ['handler',
            'name_en',
            'name_cn',
            'content_en',
            'content_cn',
            'cover_image',
            'image1',
            'image2',
            'image3',
            'image4',
            'image5',
            'image6',
            'image7',
            'image8',
            'image9',
            'variation_name1',
            'variation_value1',
            'variation_name2',
            'variation_value2',
            'variation_name3',
            'variation_value3',
            'def_lang',
            'length',
            'height',
            'width',
            'weight',
            'weight_unit',
            'stock',
            'price'
        ];
        var row_input = '<th scope="row" class="row-iteration">'+iteration+'</th>';


        $.each(config, function(key,value) { 
            row_input += '<td><input type="text" class="form-control" name="${value}[${iteration}]"></td>';
        });

        $('.table').append('<tr>'+row_input+'</tr>');
        
    });
</script>