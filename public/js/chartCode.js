






//   Donuth chart
const chartDoughnut  = function(data_label, data_value, title, id){

    let ctxx = document.getElementById(id).getContext('2d');
    var myDoughnutChart = new Chart(ctxx, {
        type: 'doughnut',
        data:{
            datasets: [{
                data: data_value ,
                backgroundColor: [
                    'rgb(211,15,52)',
                    'rgb(16,155,92)',
                    'rgb(238,213,22)',
                    'rgb(24,105,172)',
                    'rgb(92,151,155)',

                ],
            }],
            labels: data_label,
        },
        // options: options
    });
}


const chartLine = function(data_label,data_value ,title , id){

    var ctx = document.getElementById(id).getContext('2d');
    var myLineChart = new Chart(ctx, {
        type: 'line',
        data:{
            labels: data_label,
            datasets: [
                {
                    label: title,
                    data: data_value,
                    backgroundColor: [
                        'rgba(72, 155, 23, 0.1)',
                    ],
                    borderColor: [
                        'rgba(72, 155, 23, 1)',
                    ],
                    borderWidth: 1
                }
            ],

        }
        ,
        // options: options
    });
}
