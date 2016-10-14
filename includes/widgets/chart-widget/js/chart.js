/**
 * Created by daitd on 9/28/2016.
 */

(function ($) {
    $(document).ready(function () {
        $.getJSON( baseUrl + '/wp-content/themes/stock_market/jsonp.php?filename=data.json&callback=?', function (data) {
            var first = data[0];
            var firstDate = moment(first[0]);
            var last = data[data.length - 1];
            var lastDate = moment(last[0]);
            var duubli = last[1];
            $('#value').html(lastDate.format('DD.MM.YYYY') + ' <span> - Giá trị đơn vị đầu tư: ' + duubli.toLocaleString() + '</span>');
            Highcharts.setOptions({
                lang: {
                    thousandsSep: ',',
                    decimalPoint: ','
                }
            });
            $('#first_chart').highcharts('StockChart', {
                chart: {
                    type: 'spline',
                },
                credits: {
                    enabled: false
                },
                rangeSelector: {
                    enabled: true,
                    selected: 2,
                },
                title: {
                    text: ''
                },
                tooltip: {
                    dateTimeLabelFormats: {
                        day: '%e/%m/%Y',
                        week: '%e/%m/%Y',
                        month: '%M/%Y',
                        year: '%Y'
                    }
                },
                scrollbar: {
                    enabled: true
                },
                xAxis: {
                    title: {
                        text: '',
                        style: {
                            display: 'none'
                        }
                    },
                    type: 'datetime',
                    dateTimeLabelFormats: {
                        day: '%e/%y/%Y',
                        week: '%e/%m/%Y',
                        month: '%m/%Y',
                        year: '%Y'
                    },
                    gridLineWidth: 1
                },
                yAxis: [{ // Primary yAxis
                    opposite: false,
                    labels: {
                        format: '{value}',
                        style: {
                            color: Highcharts.getOptions().colors[1]
                        },
                        formatter: function () {
                            return Highcharts.numberFormat(this.value, 0, '.', ',');
                        }
                    },
                    title: {
                        text: '<span style="font-family: arial,helvetica,sans-serif;">Giá trị đơn vị đầu tư</span>',
                        style: {
                            color: Highcharts.getOptions().colors[1]
                        }
                    }
                }],
                plotOptions: {
                    area: {
                        fillColor: {
                            linearGradient: {
                                x1: 0,
                                y1: 0,
                                x2: 0,
                                y2: 1
                            },
                            stops: [
                                [0, Highcharts.getOptions().colors[0]],
                                [1, Highcharts.Color(Highcharts.getOptions().colors[0]).setOpacity(0).get('rgba')]
                            ]
                        },
                        marker: {
                            radius: 2
                        },
                        lineWidth: 1,
                        states: {
                            hover: {
                                lineWidth: 1
                            }
                        },
                        threshold: null
                    }
                },
                navigator: {
                    enabled: true
                },
                legend: {
                    enabled: true
                },
                series: [{
                    type: 'area',
                    name: 'Giá trị đơn vị đầu tư',
                    data: data,
                    marker: {
                        enabled: true,
                        radius: 2
                    },
                }]
            });
        });

        $.getJSON( baseUrl + '/wp-content/themes/stock_market/jsonp.php?filename=data_compare.json&callback=?', function (data) {
            var data1 = [];
            var data2 = [];
            for (i = 0; i < data.length; i++) {
                time = data[i][0];
                pi = data[i][1];
                vni = data[i][2];
                data1[i] = [time, pi];
                data2[i] = [time, vni];
            }
            var first = data[0];
            var firstDate = moment(first[0]);

            var last = data[data.length - 1];
            var lastDate = moment(last[0]);
            var duubli = last[1];
            $('#value2').html(lastDate.format('DD.MM.YYYY') + ' - <span> Tăng trưởng đầu tư: ' + duubli.toFixed(2) + '%</span>');
            Highcharts.setOptions({
                lang: {
                    thousandsSep: ',',
                    decimalPoint: ','
                }
            });
            var width = $('.content-tabs').width();
            $('#second_chart').highcharts({
                chart: {
                    type: 'spline',
                    width: width,
                },
                rangeSelector: {
                    enabled: true,
                    selected: 2
                },
                credits: {
                    enabled: false
                },
                title: {
                    text: '',
                },
                tooltip: {
                    dateTimeLabelFormats: {
                        day: '%e/%m/%Y',
                        week: '%e/%m/%Y',
                        month: '%M/%Y',
                        year: '%Y'
                    },
                    valueSuffix: ' %',
                    shared: true
                },
                xAxis: {
                    title: {
                        style: {
                            display: 'none'
                        }
                    },
                    type: 'datetime',
                    dateTimeLabelFormats: {
                        day: '%e/%y/%Y',
                        week: '%e/%m/%Y',
                        month: '%m/%Y',
                        year: '%Y'
                    },
                    gridLineWidth: 1
                },
                yAxis: [{ // Primary yAxis
                    labels: {
                        format: '{value} Tr',
                        style: {
                            color: Highcharts.getOptions().colors[1]
                        },
                        formatter: function () {
                            return Highcharts.numberFormat(this.value, 0, '.', ',');
                        }
                    },
                    title: {
                        text: '<span style="font-family: arial,helvetica,sans-serif;">Tăng trưởng đơn vị đầu tư</span>',
                        style: {
                            color: Highcharts.getOptions().colors[1]
                        }
                    }
                }],
                plotOptions: {
                    area: {
                        marker: {
                            radius: 2
                        },
                        lineWidth: 1,
                        states: {
                            hover: {
                                lineWidth: 1
                            }
                        },
                        threshold: null
                    }
                },
                navigator: {
                    enabled: true
                },
                scrollbar: {
                    enabled: true
                },
                series: [{
                    type: 'area',
                    name: 'Tăng trưởng đơn vị đầu tư ',
                    data: data1,
                    color: '#00a651',
                },
                    {
                        type: 'area',
                        name: 'VNindex',
                        data: data2,
                        color: '#0088FF',
                    }
                ]
            });
        });

        $('.nav-tabs a').on('click', function (e) {
            e.preventDefault();
            var id = $(this).attr('href');
            $('.nav-tabs a').removeClass('active');
            $(this).addClass('active');
            $('.content-tabs > div').removeClass('active');
            $(id).addClass('active');
        });
    });
})(jQuery);