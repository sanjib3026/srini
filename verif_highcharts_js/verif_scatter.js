// scatter
    var verif_scatter = new Array();
    var verif_ecmwf_scatter = new Array();
    var verif_wrf_scatter = new Array();
    var verif_imd_scatter = new Array();

    var obj, i;
    if (json_verif_data !== null) {
        for (i = 0; i < json_verif_data.length; i++) {
            obj = json_verif_data[i];
 
            var obj_data = (obj.obs!==null)?Number(obj.obs):null;
//          var fcst_data = (obj.fcst!==null)?Number(obj.fcst):null;
            var fcst_ecmwf_data = (obj.ECMWF!==null)?Number(obj.ECMWF):null;
            var fcst_wrf_data = (obj.WRF!==null)?Number(obj.WRF):null;
            var fcst_imd_data = (obj.IMD!==null)?Number(obj.IMD):null;
            
//            var verif_scatter_tmp = new Array();
//            verif_scatter_tmp.push(obj_data, fcst_data);
//            verif_scatter.push(verif_scatter_tmp); // 2D array
            verif_ecmwf_scatter.push([obj_data, fcst_ecmwf_data]);
            verif_wrf_scatter.push([obj_data, fcst_wrf_data]);
            verif_imd_scatter.push([obj_data, fcst_imd_data]);
        }
    }
    
    $(function () {
        Highcharts.chart('varif_graph', {
            chart: {
                type: 'scatter',
                zoomType: 'xy'
            },
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
            xAxis: {
                title: {
                    enabled: true,
                    text: 'Observation (mm.)'
                },
                startOnTick: true,
                endOnTick: true,
                showLastLabel: true
            },
            yAxis: {
                title: {
                    text: 'Forecast (mm.)'
                }
            },
            plotOptions: {
                scatter: {
                    marker: {
                        radius: 5,
                        lineColor: "#0000ff",
                        states: {
                            hover: {
                                enabled: true,
                                lineColor: '#0000ff'
                            }
                        }
                    },
                    states: {
                        hover: {
                            marker: {
                                enabled: false
                            }
                        }
                    },
                    tooltip: {
                        headerFormat: '<b>{series.name}</b><br>',
                        pointFormat: 'obs. {point.x} mm., fcst. {point.y} mm.'
                    }
                }
            },
            series: [{
//                regression: true ,
//                regressionSettings: {
//                    type: 'linear',
//                    color:  'rgba(40, 100, 255, .9)',
//                    name: "R2: %r2"
//                    /*name: "%eq | r2: %r"*/
//                },
//              color: '#25A825',
                    name: 'ECMWF',
                    data: verif_ecmwf_scatter

                }, {    
                    name: 'WRF',
                    data: verif_wrf_scatter

                }, {    
                    name: 'IMD',
                    data: verif_imd_scatter
                }
            ]
        });
    });

