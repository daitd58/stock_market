/**
 * Created by daitd on 9/28/2016.
 */

(function ($) {
    /**
     * Print the names and majors of students in a sample spreadsheet:
     * https://docs.google.com/spreadsheets/d/1BxiMVs0XRA5nFMdKvBdBZjgmUUqptlbs74OgvE2upms/edit
     */
    function listMajors() {
        if ($('.chart_loading').is('#lineChart')) {
            var id = $('#lineChart').data('id');
            var range = $('#lineChart').data('range');
            gapi.client.sheets.spreadsheets.values.get({
                spreadsheetId: id,
                range: range,
            }).then(function (response) {
                var range = response.result;
                var data = [];
                $('#lineChart').removeClass('chart_loading');
                if (range.values.length > 0) {
                    for (i = 0; i < range.values.length; i++) {
                        data[i] = range.values[i];
                    }

                    var ctx = document.getElementById("lineChart");
                    var myChart = new Chart(ctx, {
                        type: 'line',
                        data: {
                            labels: data[0],
                            datasets: [{
                                label: 'a',
                                data: data[1],
                                backgroundColor: 'rgba(255, 99, 132, 0)',
                                borderColor: 'rgba(255,99,132,1)',
                                borderWidth: 1
                            }, {
                                label: 'b',
                                data: data[2],
                                backgroundColor: 'rgba(255, 199, 132, 0)',
                                borderColor: '#36A2EB',
                                borderWidth: 1
                            }]
                        },
                        options: {
                            scales: {
                                yAxes: [{
                                    ticks: {
                                        beginAtZero: true
                                    },
                                    scaleLabel: {
                                        display: true,
                                        labelString: 'Price'
                                    }
                                }],
                                xAxes: [{
                                    ticks: {
                                        beginAtZero: true
                                    },
                                    scaleLabel: {
                                        display: true,
                                        labelString: 'Date'
                                    }
                                }]
                            }
                        }
                    });
                }
            }, function (response) {
                console.log(response);
            });
        }
        if ($('.chart_loading').is('#pieChart')) {
            var id = $('#pieChart').data('id');
            var range = $('#pieChart').data('range');
            gapi.client.sheets.spreadsheets.values.get({
                spreadsheetId: id,
                range: range,
            }).then(function (response) {
                var range = response.result;
                var data = [];
                $('#pieChart').removeClass('chart_loading');
                if (range.values.length > 0) {
                    for (i = 0; i < range.values.length; i++) {
                        data[i] = range.values[i];
                    }

                    var ctx = document.getElementById("pieChart");
                    var myChart = new Chart(ctx, {
                        type: 'pie',
                        data: {
                            labels: data[0],
                            datasets: [{
                                data: data[1],
                                backgroundColor: [
                                    "#FF6384",
                                    "#36A2EB",
                                    "#FFCE56"
                                ],
                                hoverBackgroundColor: [
                                    "#FF6384",
                                    "#36A2EB",
                                    "#FFCE56"
                                ]
                            }]
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
                            }
                        }
                    });
                }
            }, function (response) {
                console.log(response);
            });
        }

    }

    /**
     * Append a pre element to the body containing the given message
     * as its text node.
     *
     * @param {string} message Text to be placed in pre element.
     */

    function appendPre(message) {
        var pre = document.getElementById('output');
        var textContent = document.createTextNode(message + '\n');
        console.log(textContent);
        pre.appendChild(textContent);
    }

    function init() {
        gapi.client.setApiKey('AIzaSyCrMb05vl6LW4ZCwwHK7TYNTde1zMkLApE');
        gapi.client.load('https://sheets.googleapis.com/$discovery/rest?version=v4').then(listMajors);
    }

    gapi.load('client', init);
})(jQuery);