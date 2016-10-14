/**
 * Created by daitd on 12/10/2016.
 */

(function ($) {
    var label = [];
    var data = [];
    for (var i = 0; i < pie_data.length; i++) {
        label[i] = pie_data[i].title;
        data[i] = pie_data[i].percent;
    }
    var ctx = document.getElementById('pieChart');
    var myPieChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: label,
            datasets: [
                {
                    data: data,
                    backgroundColor: [
                        "#00a651",
                        "#0088FF",
                        "#FFCE56"
                    ],
                    hoverBackgroundColor: [
                        "#00a651",
                        "#0088FF",
                        "#FFCE56"
                    ]
                }
            ]
        },
        options: {
            tooltips: {
                callbacks: {
                    label: function (tooltipItem, data) {
                        var allData = data.datasets[tooltipItem.datasetIndex].data;
                        var tooltipLabel = data.labels[tooltipItem.index];
                        var tooltipData = allData[tooltipItem.index];
                        var total = 0;
                        for (var i in allData) {
                            total += parseInt(allData[i]);
                        }
                        var tooltipPercentage = Math.round((tooltipData / total) * 10000) / 100;
                        return tooltipLabel + ': ' + tooltipData + ' (' + tooltipPercentage + '%)';
                    }
                }
            },
            responsive: true,
            maintainAspectRatio: true,
            legend: {
                position: 'bottom'
            }
        }
    });
})(jQuery)