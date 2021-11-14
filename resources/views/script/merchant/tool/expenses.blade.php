<script>

    $(document).ready(function(){

        // Revenue Chart setting
        @if(!($totalInflow == 0 && $totalOutflow == 0))
        var pieChart = new Chart($("#revenueChart"), {            
            type: 'doughnut',
            data: {                
                labels: [
                    "Inflow",
                    "Outflow",               
                ],
                datasets: [
                    {
                        data: [{{$totalInflow}}, {{$totalOutflow}}],
                        backgroundColor: [
                            "#4BEC71",
                            "#E9564D",                      
                        ]
                    }
                ]
            },
            options:{
                responsive:true,
                maintainAspectRatio: false
            }
        });
        @endif


        // Action button function
        $(document).on('click','.action-btn',function(e){
            $('#addModal .action-btn').toggle(!$(this).hasClass('create-btn'));
        })
    })


    // Function to insert update modal value
    function updateActionModal(data)
    {
        $(".delete-btn").val(data['uid'] + "||delete");
    }

</script>