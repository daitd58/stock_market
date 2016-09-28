/**
 * Created by daitd on 9/28/2016.
 */

(function ($) {
    function appendResults(text) {
        var results = document.getElementById('results');
        results.appendChild(document.createElement('P'));
        results.appendChild(document.createTextNode(text));
    }

    /**
     * Print the names and majors of students in a sample spreadsheet:
     * https://docs.google.com/spreadsheets/d/1BxiMVs0XRA5nFMdKvBdBZjgmUUqptlbs74OgvE2upms/edit
     */
    function listMajors() {
        var id = $('#myChart').data('id');
        var range = $('#myChart').data('range');
        var title = $('#myChart').data('title');
        gapi.client.sheets.spreadsheets.values.get({
            spreadsheetId: id,
            range: range,
        }).then(function(response) {
            var range = response.result;
            var data = [];
            $('#myChart').removeClass('chart_loading');
            if (range.values.length > 0) {
                for (i = 0; i < range.values.length; i++) {
                    data[i] = range.values[i];
                }

                var ctx = document.getElementById("myChart");
                var myChart = new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: data[0],
                        datasets: [{
                            label: '# of Votes',
                            data: data[1],
                            backgroundColor: 'rgba(255, 99, 132, 0.2)',
                            borderColor: 'rgba(255,99,132,1)',
                            borderWidth: 1
                        }]
                    },
                    options: {
                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero:true
                                },
                                scaleLabel: {
                                    display: true,
                                    labelString: 'Price'
                                }
                            }],
                            xAxes: [{
                                ticks: {
                                    beginAtZero:true
                                },
                                scaleLabel: {
                                    display: true,
                                    labelString: 'Date'
                                }
                            }]
                        },
                        title: {
                            display: true,
                            text: title
                        }
                    }
                });
            } else {
                appendPre('No data found.');
            }
        }, function(response) {
            appendPre('Error: ' + response.result.error.message);
        });
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