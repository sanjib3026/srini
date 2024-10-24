// obsfcst => timesheet
    var verif_obs = new Array();
//    var verif_fcst = new Array();
    
    var verif_fcst_ecmwf = new Array();
    var verif_fcst_wrf = new Array();
    var verif_fcst_imd = new Array();
    
    var obj, i;
    if (json_verif_data !== null) {
        for (i = 0; i < json_verif_data.length; i++) {
            obj = json_verif_data[i];
            
            var verif_date = new Date(obj.date);
            var obj_data = (obj.obs!==null)?Number(obj.obs):null;
            //var fcst_data = (obj.fcst!==null)?Number(obj.fcst):null;
            var fcst_ecmwf_data = (obj.ECMWF!==null)?Number(obj.ECMWF):null;
            var fcst_wrf_data = (obj.WRF!==null)?Number(obj.WRF):null;
            var fcst_imd_data = (obj.IMD!==null)?Number(obj.IMD):null;
            
            if(obj.obs !== null && obj.fcst !== null){
                verif_obs.push([verif_date.getTime(), obj_data]); // 2D array
                // verif_fcst.push([verif_date.getTime(), fcst_data]);
                verif_fcst_ecmwf.push([verif_date.getTime(), fcst_ecmwf_data]); // 2D array
                verif_fcst_wrf.push([verif_date.getTime(), fcst_wrf_data]); // 2D array
                verif_fcst_imd.push([verif_date.getTime(), fcst_imd_data]); // 2D array
            }
        }
    }
    $(function () {
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
            colors: ['#000000', '#FF0000', '#058DC7', '#009B0C'],
            series: [{
                    name: 'Observation',
                    data: verif_obs,
                    tooltip: {
                        valueSuffix: ' mm.'
                    }
                }, {
                    name: 'ECMWF',
                    data: verif_fcst_ecmwf,
                    tooltip: {
                        valueDecimals: 2,
                        valueSuffix: ' mm.'
                    }
                }, {
                    name: 'WRF',
                    data: verif_fcst_wrf,
                    tooltip: {
                        valueDecimals: 2,
                        valueSuffix: ' mm.'
                    }
                }, {
                    name: 'IMD',
                    data: verif_fcst_imd,
                    tooltip: {
                        valueDecimals: 2,
                        valueSuffix: ' mm.'
                    }
                }
            ]
        });
    });