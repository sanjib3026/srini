// verif output for alphaindex, bias, corr, fcst, mae, obs, rmse, diff 
    //var verif_output = new Array();
    var verif_ecmwf_output = new Array();
    var verif_wrf_output = new Array();
    var verif_imd_output = new Array();
    var verif_obs_data = new Array();
    
    var suffix_unit = '';
    
    if(metric === 'fcst' || metric === 'mae' || metric === 'obs'){
        suffix_unit = ' mm.';
    }
    
    var obj, i;
    if(metric !== 'obs'){
        if (json_verif_data !== null) {
            for (i = 0; i < json_verif_data.length; i++) {
                obj = json_verif_data[i];

                var verif_date = new Date(obj.date);
                //var output_data = (obj.output!==null)?Number(obj.output):null;
                var output_ecmwf_data = (obj.ECMWF!==null)?Number(obj.ECMWF):null;
                var output_wrf_data = (obj.ECMWF!==null)?Number(obj.WRF):null;
                var output_imd_data = (obj.ECMWF!==null)?Number(obj.IMD):null;

                verif_ecmwf_output.push([verif_date.getTime(), output_ecmwf_data]); // 2D array
                verif_wrf_output.push([verif_date.getTime(), output_wrf_data]); // 2D array
                verif_imd_output.push([verif_date.getTime(), output_imd_data]); // 2D array
            }
        }
    }
    else if(metric === 'obs'){
        if (json_obs_data !== null) {
            for (i = 0; i < json_obs_data.length; i++) {
                obj = json_obs_data[i];

                var verif_date = new Date(obj.date);
                var output_obs_data = (obj.obs!==null)?Number(obj.obs):null;
                
                verif_obs_data.push([verif_date.getTime(), output_obs_data]); // 2D array
            }
        }
    }
    
    
    
    
    $(function () {
        if(metric !== 'obs'){
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
                        //name: metric,
                        name: 'ECMWF',
                        data: verif_ecmwf_output,
                        marker: {
                            enabled: true,
                            radius: 2
                        },
                        tooltip: {
                            valueDecimals: 2,
                            valueSuffix: suffix_unit
                        }
                    }, {
                        name: 'WRF',
                        data: verif_wrf_output,
                        marker: {
                            enabled: true,
                            radius: 2
                        },
                        tooltip: {
                            valueDecimals: 2,
                            valueSuffix: suffix_unit
                        }
                    }, {
                        name: 'IMD',
                        data: verif_imd_output,
                        marker: {
                            enabled: true,
                            radius: 2
                        },
                        tooltip: {
                            valueDecimals: 2,
                            valueSuffix: suffix_unit
                        }
                    }
                ]
            });
        }
        else if(metric === 'obs'){
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
                colors: ['#000000'],
                series: [{
                        name: 'Observation',
                        data: verif_obs_data,
                        marker: {
                            enabled: true,
                            radius: 2
                        },
                        tooltip: {
                            valueDecimals: 2,
                            valueSuffix: suffix_unit
                        }
                    }
                ]
            });
        }
        
    });