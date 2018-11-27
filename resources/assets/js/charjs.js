var ctx = $("#chart_TI");
var myChart = new Chart(ctx, {
    type: 'horizontalBar',
    data: {
        labels:['janeiro'],
        datasets: [{
            data: [12],
            backgroundColor: [
        'rgba(75, 192, 192, 1)',
                /*'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'*/
            ],
           
            borderWidth: 3  
        }
    
    ],
    
    },
    options: {

        legend: {display:false},

       scales: {
        xAxes: [{
            gridLines: {
               display: false
            },

            ticks: {display:false}
        }],
        yAxes: [{
            gridLines: {
               display: false
            },
            line: {
               display: false
            },

            ticks: {display:false}
        }]
    }
    }
});