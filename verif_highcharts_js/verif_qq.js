// qq
    var verif_obs = new Array();
    var verif_fcst_ecmwf = new Array();
    var verif_fcst_wrf = new Array();
    var verif_fcst_imd = new Array();
    
    var verif_sorted_ecmwf_data = new Array();
    var verif_sorted_wrf_data = new Array();
    var verif_sorted_imd_data = new Array();

    var obj, i;
    if (json_verif_data !== null) {
        for (i = 0; i < json_verif_data.length; i++) {
            obj = json_verif_data[i];       
            
            var obj_data = (obj.obs!==null)?Number(obj.obs):null;
            //var fcst_data = (obj.fcst!==null)?Number(obj.fcst):null;
            var fcst_ecmwf_data = (obj.ECMWF!==null)?Number(obj.ECMWF):null;
            var fcst_wrf_data = (obj.WRF!==null)?Number(obj.WRF):null;
            var fcst_imd_data = (obj.IMD!==null)?Number(obj.IMD):null;
            
            if(obj_data!==0 || fcst_ecmwf_data!==0){
                verif_obs.push(obj_data);
                verif_fcst_ecmwf.push(fcst_ecmwf_data);
                verif_fcst_wrf.push(fcst_wrf_data);
                verif_fcst_imd.push(fcst_imd_data);
            }
            
        }
        
        var verif_obs_sort = verif_obs.sort(function(a, b){ return a - b; });
        var verif_fcst_ecmwf_sort = verif_fcst_ecmwf.sort(function(a, b){ return a - b; });
        var verif_fcst_wrf_sort = verif_fcst_wrf.sort(function(a, b){ return a - b; });
        var verif_fcst_imd_sort = verif_fcst_imd.sort(function(a, b){ return a - b; });
        
        for(j = 0; j < verif_obs_sort.length; j++){
            var verif_sorted_tmp = new Array();
            //verif_sorted_tmp.push(verif_obs_sort[j], verif_fcst_ecmwf_sort[j]);
            verif_sorted_ecmwf_data.push([verif_obs_sort[j], verif_fcst_ecmwf_sort[j]]);
            verif_sorted_wrf_data.push([verif_obs_sort[j], verif_fcst_wrf_sort[j]]);
            verif_sorted_imd_data.push([verif_obs_sort[j], verif_fcst_imd_sort[j]]);
        }
    }
    
    $(function () {
        Highcharts.chart('varif_graph', {
            chart: {
                type: 'spline'
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
                    text: 'Sorted Observation (mm.)'
                },
                labels: {
                    format: '{value} mm.'
                },
                //maxPadding: 1,
                showLastLabel: true
            },
            yAxis: {
                title: {
                    text: 'Sorted Forecast (mm.)'
                },
                labels: {
                    format: '{value} mm.'
                },
                lineWidth: 2
            },
            tooltip: {
                headerFormat: '<b>{series.name}</b><br/>',
                pointFormat: '<b>Obs:</b> {point.x} mm. <b>Fcst:</b>{point.y} mm.'
            },
            series: [{
                name: 'ECMWF',
                marker: {
                    enabled: true,
                    radius: 4
                },
                data: verif_sorted_ecmwf_data
            }, {
                name: 'WRF',
                marker: {
                    enabled: true,
                    radius: 4
                },
                data: verif_sorted_wrf_data
            }, {
                name: 'IMD',
                marker: {
                    enabled: true,
                    radius: 4
                },
                data: verif_sorted_imd_data
            }
        ]
        });
    });