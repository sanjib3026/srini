// verif output for within, ets, fa
//    var verif_data = new Array();
    var verif_ecmwf_data = new Array();
    var verif_wrf_data = new Array();
    var verif_imd_data = new Array();

    var obj, i;
    if (json_verif_data !== null) {
        if(metric === "within"){
            for (i = 0; i < json_verif_data.length; i++) {
                obj = json_verif_data[i];

                var verif_date = new Date(obj.date);
                //var output_data = (obj.output!==null)?Number(obj.output):null;
                var output_ecmwf_data = (obj.ECMWF!==null)?Number(obj.ECMWF):null;
                var output_wrf_data = (obj.WRF!==null)?Number(obj.WRF):null;
                var output_imd_data = (obj.IMD!==null)?Number(obj.IMD):null;

                //var verif_data_tmp = new Array();
                //verif_data_tmp.push(verif_date.getTime(), output_data);
                //verif_data.push(verif_data_tmp); // 2D array
                verif_ecmwf_data.push([verif_date.getTime(), output_ecmwf_data]); // 2D array
                verif_wrf_data.push([verif_date.getTime(), output_wrf_data]); // 2D array
                verif_imd_data.push([verif_date.getTime(), output_imd_data]); // 2D array
            }  
        }
        else{
            for (i = 0; i < json_verif_data.length; i++) {
                obj = json_verif_data[i];

                var threshold_data = (obj.threshold!==null)?Number(obj.threshold):null;
                //var value_data = (obj.value!==null)?Number(obj.value):null;
                var output_ecmwf_data = (obj.ECMWF!==null)?Number(obj.ECMWF):null;
                var output_wrf_data = (obj.WRF!==null)?Number(obj.WRF):null;
                var output_imd_data = (obj.IMD!==null)?Number(obj.IMD):null;

//                var verif_data_tmp = new Array();
//                verif_data_tmp.push(threshold_data, value_data);
//                verif_data.push(verif_data_tmp);
                verif_ecmwf_data.push([threshold_data, output_ecmwf_data]); // 2D array
                verif_wrf_data.push([threshold_data, output_wrf_data]); // 2D array
                verif_imd_data.push([threshold_data, output_imd_data]); // 2D array
            }
        }
    }
    
    $(function () {
        if(metric === "within"){
            Highcharts.stockChart('varif_graph', {
                title: {
                    text: ''
                },
                legend: {
                    enabled: true,
                    layout: 'horizontal',
                    verticalAlign: 'bottom',
                    floating: false
                },
                colors: ['#FF0000', '#058DC7', '#009B0C'],
                series: [{
                        name: '% of forecasts (ECMWF)',
                        data: verif_ecmwf_data,
                        marker: {
                            enabled: true,
                            radius: 2
                        },
                        tooltip: {
                            valueDecimals: 2,
                            valueSuffix: '%'
                        }
                    }, {
                        name: '% of forecasts (WRF)',
                        data: verif_wrf_data,
                        marker: {
                            enabled: true,
                            radius: 2
                        },
                        tooltip: {
                            valueDecimals: 2,
                            valueSuffix: '%'
                        }
                    }, {
                        name: '% of forecasts (IMD)',
                        data: verif_imd_data,
                        marker: {
                            enabled: true,
                            radius: 2
                        },
                        tooltip: {
                            valueDecimals: 2,
                            valueSuffix: '%'
                        }
                    }
                ]
            });
        }
        else{
            Highcharts.chart('varif_graph', {
                chart: {
                    type: 'spline'
                },
                title: {
                    text: ''
                },
                xAxis: {
                    title: {
                        enabled: true,
                        text: 'RF (mm.)'
                    },
                    labels: {
                        format: '{value} mm.'
                    },
                    //maxPadding: 1,
                    showLastLabel: true
                },
                yAxis: {
                    title: {
                        text: metric.toUpperCase()
                    },
                    labels: {
                        format: '{value}'
                    },
                    lineWidth: 2
                },
                legend: {
                    enabled: true,
                    layout: 'horizontal',
                    verticalAlign: 'bottom',
                    floating: false
                },
                colors: ['#FF0000', '#058DC7', '#009B0C'],
                tooltip: {
                    headerFormat: '<b>{series.name}</b><br/>',
                    pointFormat: '<b>RF:</b> {point.y} (mm.), <b>'+metric.toUpperCase()+' (threshold):</b> {point.x}'
                },
                series: [{
                        name: 'ECMWF',
                        marker: {
                            enabled: true,
                            radius: 4
                        },
                        data: verif_ecmwf_data
                    }, {
                        name: 'WRF',
                        marker: {
                            enabled: true,
                            radius: 4
                        },
                        data: verif_wrf_data
                    }, {
                        name: 'IMD',
                        marker: {
                            enabled: true,
                            radius: 4
                        },
                        data: verif_imd_data
                    }
                ]
            });
        }
    });