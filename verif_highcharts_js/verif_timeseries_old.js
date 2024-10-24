// timeseries
    var verif_obs = new Array();
    var verif_fcst = new Array();
    
    var obj, i;
    if (json_verif_data !== null) {
        for (i = 0; i < json_verif_data.length; i++) {
            obj = json_verif_data[i];
            
            var verif_date = new Date(obj.date);
            var obj_data = (obj.obs!==null)?Number(obj.obs):null;
            var fcst_data = (obj.fcst!==null)?Number(obj.fcst):null;
            
            var verif_obs_arr_tmp = new Array();
            var verif_fcst_arr_tmp = new Array();
            
            verif_obs_arr_tmp.push(verif_date.getTime(), obj_data);
            verif_fcst_arr_tmp.push(verif_date.getTime(), fcst_data);
            verif_obs.push(verif_obs_arr_tmp); // 2D array
            verif_fcst.push(verif_fcst_arr_tmp); // 2D array
        }
    }
    $(function () {
        Highcharts.stockChart('varif_graph', {
            title: {
                text: ''
            },
            colors: ['#058DC7', '#B9B9B9'],
            series: [{
                name: 'fcst',
                data: verif_fcst,
                lineWidth: 0,
                marker: {
                    enabled: true,
                    radius: 2
                },
                tooltip: {
                    valueDecimals: 2,
                    valueSuffix: ' mm.'
                },
                states: {
                    hover: {
                        lineWidthPlus: 0
                    }
                }
            },{
                name: 'obs',
                data: verif_obs,
                tooltip: {
                    valueSuffix: ' mm.'
                }
            }
            ]
        });
    });