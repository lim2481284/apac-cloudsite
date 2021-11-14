<script>



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
            }]
    },
    options:{
        responsive:true,
        maintainAspectRatio: false
    }
});
@endif




</script>