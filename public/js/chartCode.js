






//   Donuth chart
const chartDoughnut  = function(data_label, data_value, title, id){

    var ctxx = document.getElementById(id).getContext('2d');
    var myDoughnutChart = new Chart(ctxx, {
        type: 'doughnut',
        data:{
            datasets: [{
                data: data_value ,
                backgroundColor: ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'
                    // 'rgb(211,15,52)',
                    // 'rgb(16,155,92)',
                    // 'rgb(238,213,22)',
                    // 'rgb(24,105,172)',
                    // 'rgb(92,151,155)',

                ],
            }],
            labels: data_label,
        },
        // options: options
    });
}


const chartPie  = function(data_label, data_value, title, id){

    var ctxx = document.getElementById(id).getContext('2d');
    var myDoughnutChart = new Chart(ctxx, {
        type: 'pie',
        data:{
            datasets: [{
                data: data_value ,
                backgroundColor: ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de',
                    'rgb(211,15,52)',
                    'rgb(160,15,92)',
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

// Line Chart
const chartLine = function(data_label, data_value, title, id){

    var ctx = document.getElementById(id).getContext('2d');
    var myLineCharts = new Chart(ctx, {
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


// Bar chart
const chartBar = function(data_label,  title, id, data_value, data_value2){
    var ctx = document.getElementById(id).getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: data_label,
            datasets: [
                {
                    label: title,
                    data: data_value,
                    backgroundColor: [
                        // '#00c0ef',
                        // '#39d37f',
                        // '#d91f21',
                        // '#2b2b2b',
                        // '#1869ac',
                        // '#eed516',
                        'rgb(51,211,111, 0.1)',
                        'rgb(211,15,52, 0.1)',
                        'rgb(43,43,43, 0.1)',
                        'rgb(24,105,172, 0.1)',
                        'rgb(2,155,130, 0.1)',
                        'rgb(51,211,111, 0.1)',
                        'rgb(51,211,111, 0.1)',
                        'rgb(51,211,111, 0.1)',
                        'rgb(51,211,111, 0.1)',
                        'rgb(51,211,111, 0.1)',
                        'rgb(51,211,111, 0.1)',

                    ],
                    borderColor: [
                        'rgb(51,211,111)',
                        'rgb(211,15,52)',
                        'rgb(43,43,43)',
                        'rgb(24,105,172)',
                        'rgb(2,155,130)',
                        'rgb(51,211,111)',
                        'rgb(51,211,111)',
                        'rgb(51,211,111)',
                        'rgb(51,211,111)',
                        'rgb(51,211,111)',
                        'rgb(51,211,111)'

                    ],
                    borderWidth: 1
                },


            ],
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });

}