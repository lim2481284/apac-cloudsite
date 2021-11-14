<script>



    $(document).ready(function() {


        
       $("#slider-target-amount").slider({
            min:1000,
            max:5000,
          slide: function( event, ui ) {
             $("#target-amount").val(ui.value);
             calculateReward();
          }
       });

       $("#slider-duration").slider({
            min:7,
            max:100,
          slide: function( event, ui ) {
             $("#duration").val(ui.value);
             calculateReward();
          }
       });
      
       //Insert Default value
       insertValue('target-amount',2000);
       insertValue('duration',10);
       calculateReward();
    });

    $("#target-amount").change(function() {
        insertValue('target-amount',$(this).val());
        calculateReward();
        
    });

    $("#duration").change(function() {
        insertValue('duration',$(this).val());
        calculateReward();
        
    });

    
    function insertValue(type,data_value){
        $("#slider-" + type).slider({
            value:data_value
        });
        $("#"+type).val($("#slider-" + type).slider("value"));
    }

    function calculateReward(){
        var target_amount = $("#target-amount").val();
        var duration = $("#duration").val();

        var rate1 = ((target_amount - 100) * 0.9 / 4900) + 0.05;
        var rate2 = 0.95 - ((duration - 7) * 0.9 / 93);
        var rate = rate1 + rate2;

        if (rate > 1){
            rate = 1;
        }
            
        var reward = target_amount * rate / 100;
        $("#reward").val(Math.round(reward));
    }
 </script>