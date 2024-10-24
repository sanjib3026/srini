<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Agro Advisory</title>
<meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
<!-- Bootstrap 3.3.2 -->
<link href="<?php echo base_url();?>bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<!-- Font Awesome Icons -->
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
<!-- Ionicons -->
<link href="http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" />
<!-- Morris chart -->
<link href="<?php echo base_url();?>bootstrap/plugins/morris/morris.css" rel="stylesheet" type="text/css" />
<!-- jvectormap -->
<link href="<?php echo base_url();?>bootstrap/plugins/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
<!-- Daterange picker -->
<link href="<?php echo base_url();?>bootstrap/plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
<!-- Theme style -->
<link href="<?php echo base_url();?>bootstrap/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
<!-- AdminLTE Skins. Choose a skin from the css/skins 
         folder instead of downloading all of them to reduce the load. -->
<link href="<?php echo base_url();?>bootstrap/dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>
<body class="skin-blue" onLoad="tm()">
<div class="wrapper">
  <header class="main-header">
        <!-- Logo -->
        <a href="<?php echo base_url();?>" class="logo"><!--<b>Agro </b>Advisory--><img src="<?php echo base_url();?>bootstrap/images/banner.png" width="140px" style="margin-top:10px;"></a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>          
        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header" style="margin-top:26px">MAIN NAVIGATION</li>
        <li class="treeview"> <a href="<?php echo base_url();?>index.php/home"> <i class="fa fa-dashboard"></i> <span>Overview</span> </a> </li>
        <li class="active treeview"> <a href="#"> <i class="fa fa-pie-chart"></i> <span>Advisory</span> <i class="fa fa-angle-left pull-right"></i> </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url();?>index.php/home/update_ecm"><i class="fa fa-circle-o"></i> 10 Days Outlook</a></li>
            <li class="active"><a href="<?php echo base_url();?>index.php/home/update_wrf"><i class="fa fa-circle-o"></i> 3 Days Forecast</a></li>
          </ul>
        </li>
        <li class="treeview"> <a href="#"> <i class="fa fa-building-o"></i> <span>Data Panel</span> <i class="fa fa-angle-left pull-right"></i> </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url();?>index.php/home/addcrops"><i class="fa fa-circle-o"></i>Add Crop</a> </li>
            <li><a href="<?php echo base_url();?>index.php/home/croplist"><i class="fa fa-circle-o"></i>Crop List</a></li>
            <li><a href="<?php echo base_url();?>index.php/home/do_upload2" ><i class="fa fa-circle-o"></i>Upload Station Data</a> </li>
            <li><a href="<?php echo base_url();?>index.php/home/upload_ndvi" ><i class="fa fa-circle-o"></i>Upload NDVI</a> </li>
            <li ><a href="<?php echo base_url();?>index.php/home/savecalendar" ><i class="fa fa-circle-o"></i>View Crop Calendar</a></li>
            <li><a href="<?php echo base_url();?>index.php/home/result_dekad" ><i class="fa fa-circle-o"></i>Add Crop Calendar</a> </li>
          </ul>
        </li>
        <li class="treeview"> <a href="#"> <i class="fa fa-laptop"></i> <span>Climate Monitoring</span> <i class="fa fa-angle-left pull-right"></i> </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url();?>index.php/home/load_obs"><i class="fa fa-circle-o"></i>Observation</a> </li>
            <li><a href="<?php echo base_url();?>index.php/home/ndvi"><i class="fa fa-circle-o"></i> NDVI</a></li>
          </ul>
        </li>
        <li class="treeview"> <a href="#"> <i class="fa fa-globe"></i> <span>Links</span> </a> </li>
        <li class="treeview"> <a href="<?php echo base_url();?>index.php/login"> <i class="fa fa-sign-out"></i> <span>Logout</span> </a> </li>
      </ul>
    </section>
    <!-- /.sidebar --> 
  </aside>
  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper"> 
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1> 3 Days Forecast </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-pie-chart"></i> Advisory</a></li>
        <li class="active">3 Days Forecast</li>
      </ol>
    </section>
    
    <!-- Main content -->
    <section class="content">
    <!-- Info boxes -->
    <div class="row">
      <div class="col-md-12"> 
        <!-- TABLE: LATEST ORDERS -->
        <div class="box box-success">
          <div class="box-body">
            <div class="table-responsive">
            <!--PUT FORM-->
            <form class="form-horizontal" role="form" action='<?php echo base_url();?>index.php/home/update_wrf' method="post">
              <div class="form-group">
                <label for="location_name" class="col-lg-3 control-label">Please Select Location Name :: </label>
                <div class="col-lg-6">
                  <?php 
								 echo "<select name='location_name' id='location_name'>";
									if (count($LOCATIONS)) {
									foreach ($LOCATIONS as $key => $list) {
										echo $list->location_name;

									echo "<option value='". $list->id . "' style='width:200px;'>" . $list->location_name . "</option>";
									}		
									}	
									echo "</select>";
									
							?>
                  &nbsp;&nbsp;&nbsp;
                  <input type="submit" name="submit" id="submit" value="submit" class="btn btn-success" >
                </div>
              </div>
              </div>
            </form>
          </div>
          <!-- /.table-responsive --> 
        </div>
        <!-- /.box-body --> 
        
      </div>
    </div>
    <!-- Main row -->
    <div class="row">
      <div class="col-md-12"> 
        <!-- TABLE: LATEST ORDERS -->
        <div class="box box-info">
          <div class="box-header with-border">
           <h3 class="box-title">3 Days Outlook of <font color="#0099FF"><?php echo $LOCATIONS_NAME['name'];?></font></h3>
                  
            <div class="box-tools pull-right">
              <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table class="table margin" style="border:thin groove dotted #06C;">
              <thead>
                <tr>
                  <th style="text-align:center">Date</th>
                 <!-- <th style="text-align:center">Temp min</th>
                  <th style="text-align:center">Temp max</th>
                  <th style="text-align:center">Temp Avg</th>-->
                  <th style="text-align:center">Wind Speed</th>
                  <th style="text-align:center">Rainfall</th>
                  <th style="text-align:center">Rain Days</th>
                  <th style="text-align:center">Spell</th>
                </tr>
              </thead>
              <tbody>
                <?php
				      $dt = explode("-", $dat['fc_st_date']); 
					  switch ($dat['spell_type']) {
								case "Very Dry" : $str_spell = "<img src='".base_url()."bootstrap/images/very_dry.png' width='43px' style='margin-left:7px; margin-top:10px;'>".'<div style="height:10px"></div>'."Very Dry"; break;
								case "Dry"      : $str_spell = "<img src='".base_url()."bootstrap/images/dry.png' width='46px' style='margin-left:5px; margin-top:10px;'>".'<div style="height:10px"></div>'."Dry"; break;
								case "Normal"   : $str_spell = "<img src='".base_url()."bootstrap/images/normal.png' width='39px' style='margin-left:9px; margin-top:10px;'>".'<div style="height:10px"></div>'."Wet"; break;
								case "Wet"      : $str_spell = "<img src='".base_url()."bootstrap/images/wet.png' width='47px' style='margin-left:11px; margin-top:10px;'>".'<div style="height:10px"></div>'."Wet"; break;
								case "Very Wet" : $str_spell = "<img src='".base_url()."bootstrap/images/very_wet.png' width='47px' style='margin-left:11px; margin-top:10px;'>".'<div style="height:10px"></div>'."Very Wet"; break;
					  }
					   echo '<tr><td align="center"><div style="height:8px;"></div> <time datetime="" class="icon">
                              <strong>'.$dt[0].'</strong>
                              <span>'.$dt[1]."-".$dt[2].'</span>
                            </time>'."</td>";
					   /*echo '<td align="center"><div style="height:8px;"></div>
									<div id="thermo1" class="thermometer" style="padding-bottom:10px">
										<div class="track">
											<div class="goal">
												<div class="amount"> 100 </div>
											</div>
											<div class="progress">
												<div class="amount">'.round($dat['temp_min']).' </div>
											</div>
										</div>
									</div><div style="height:10px"></div><font size="2px" style="padding:10px 0px 0 10px">'.round($dat['temp_min']).'°C&nbsp;</font>'." </td>";
					    echo '<td align="center"><div style="height:8px;"></div>
									<div id="thermo2" class="thermometer" style="padding-bottom:10px">
										<div class="track">
											<div class="goal">
												<div class="amount"> 100 </div>
											</div>
											<div class="progress">
												<div class="amount">'.round($dat['temp_max']).' </div>
											</div>
										</div>
									</div><div style="height:10px"></div><font size="2px" style="padding:10px 0px 0 10px">'.round($dat['temp_max']).'°C&nbsp;</font>'."</td>";
						 echo '<td align="center"><div style="height:8px;"></div>
									<div id="thermo3" class="thermometer" style="padding-bottom:10px">
										<div class="track">
											<div class="goal">
												<div class="amount"> 100 </div>
											</div>
											<div class="progress">
												<div class="amount">'.round($dat['temp_ave']).' </div>
											</div>
										</div>
									</div><div style="height:10px"></div><font size="2px" style="padding:10px 0px 0 10px">'.round($dat['temp_ave']).'°C&nbsp;</font>'." </td>";*/
						 echo '<td align="center"><br><br><br>'.$dat['windspeed']." m/s</td>";
						 echo '<td align="center"><br><br><br>'.round($dat['rain'],2)." mm.</td>";
						 echo '<td align="center"><br><div class="numberCircle">'.$dat['rainy_days'].'</div><div style="height:12px"></div>Days'."</td>";
						 echo '<td align="center">'.$str_spell."</td></tr>";?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12"> 
        <!-- TABLE: LATEST ORDERS -->
        <div class="box box-info">
          <div class="box-header with-border">
            <h3 class="box-title">Create Advisory</h3>
            <div class="box-tools pull-right">
              <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div>
          </div>
          <!-- /.box-header -->
          
          <div class="box-body">
            <div class="table-responsive">
            <h5 class="box-title">Enter Mobile Numbers seperated by Commas</h5>
            <form class="form-horizontal" role="form" action='<?=base_url();?>index.php/home/send_SMS' method="post">
              <div class="input-group"> <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                <input type="text" class="form-control" placeholder="Mobile Number" name='Email' id='Email' >
              </div>
              <h1></h1>
              <h1></h1>
              <textarea class="form-control" placeholder="Content" style='height:300px;' name='adv_content' id='adv_content'></textarea>
              <h1></h1>
              <input type="submit" name="Send" id="Send" value="Send" class="btn btn-success">
              <a href="<?=base_url();?>index.php/home" class="btn btn-primary">Cancel</a>
              </div>
            </form>
          </div>
          <!-- /.table-responsive --> 
        </div>
        <!-- /.box-body --> 
        
      </div>
    </div>
    <!-- /.col --> 
    
  </div>
  <!-- /.row -->
  
  </section>
  <!-- /.content --> 
  <!-- /.content --> 
</div>
<!-- /.content-wrapper -->

<footer class="main-footer"> <strong>Power by  :: <a href="http://rimes.int">Regional Integrated Multi-Hazard Early Warning System for Africa and Asia (RIMES)</a>. </strong> All rights reserved. </footer>
</div>
<!-- ./wrapper -->
<div id="chartdiv2"  style="height: 350px; width:670px;"></div>
<script src="<?php echo base_url();?>bootstrap/plugins/jQuery/jQuery-2.1.3.min.js"></script> 
<!-- Bootstrap 3.3.2 JS --> 
<script src="<?php echo base_url();?>bootstrap/js/bootstrap.min.js" type="text/javascript"></script> 
<!-- FastClick --> 
<script src="<?php echo base_url();?>bootstrap/plugins/fastclick/fastclick.min.js"></script> 
<!-- AdminLTE App --> 
<script src="<?php echo base_url();?>bootstrap/dist/js/app.min.js" type="text/javascript"></script> 
<!-- Sparkline --> 
<script src="<?php echo base_url();?>bootstrap/plugins/sparkline/jquery.sparkline.min.js" type="text/javascript"></script> 
<!-- jvectormap --> 
<script src="<?php echo base_url();?>bootstrap/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js" type="text/javascript"></script> 
<script src="<?php echo base_url();?>bootstrap/plugins/jvectormap/jquery-jvectormap-world-mill-en.js" type="text/javascript"></script> 
<!-- daterangepicker --> 
<script src="<?php echo base_url();?>bootstrap/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script> 
<!-- datepicker --> 
<script src="<?php echo base_url();?>bootstrap/plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script> 
<!-- iCheck --> 
<script src="<?php echo base_url();?>bootstrap/plugins/iCheck/icheck.min.js" type="text/javascript"></script> 
<!-- SlimScroll 1.3.0 --> 
<script src="<?php echo base_url();?>bootstrap/plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script> 
<!-- ChartJS 1.0.1 --> 
<script src="<?php echo base_url();?>bootstrap/plugins/chartjs/Chart.min.js" type="text/javascript"></script> 

<!-- AdminLTE dashboard demo (This is only for demo purposes) --> 
<script src="<?php echo base_url();?>bootstrap/dist/js/pages/dashboard2.js" type="text/javascript"></script> 

<!-- AdminLTE for demo purposes --> 
<script src="<?php echo base_url();?>bootstrap/dist/js/demo.js" type="text/javascript"></script> 
<script src="<?php echo base_url();?>bootstrap/amcharts/amcharts.js" type="text/javascript"></script> 
<script src="<?php echo base_url();?>bootstrap/amcharts/serial.js" type="text/javascript"></script> 
<script src="<?php echo base_url();?>bootstrap/amcharts/exporting/amexport.js" type="text/javascript"></script> 
<script src="<?php echo base_url();?>bootstrap/amcharts/exporting/canvg.js" type="text/javascript"></script> 
<script src="<?php echo base_url();?>bootstrap/amcharts/exporting/rgbcolor.js" type="text/javascript"></script> 
<script src="<?php echo base_url();?>bootstrap/amcharts/exporting/filesaver.js" type="text/javascript"></script> 
<script>

function formatCurrency(n, c, d, t) {
    "use strict";

    var s, i, j;

    c = isNaN(c = Math.abs(c)) ? 2 : c;
    d = d === undefined ? "." : d;
    t = t === undefined ? "," : t;

    s = n < 0 ? "-" : "";
    i = parseInt(n = Math.abs(+n || 0).toFixed(c), 10) + "";
    j = (j = i.length) > 3 ? j % 3 : 0;

    return s + (j ? i.substr(0, j) + t : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + t) + (c ? d + Math.abs(n - i).toFixed(c).slice(2) : "");
}


function thermometer(id, goalAmount, progressAmount, animate) {
    "use strict";
    var $thermo = $("#"+id),
        $progress = $(".progress", $thermo),
        $goal = $(".goal", $thermo),
        percentageAmount,
        isHorizontal = $thermo.hasClass("horizontal"),
        newCSS = {};

    goalAmount = goalAmount || parseFloat( $goal.text() ),
    progressAmount = progressAmount || parseFloat( $progress.text() ),
    percentageAmount =  Math.min( Math.round(progressAmount / goalAmount * 1000) / 10, 100); //make sure we have 1 decimal point

    $progress.find(".amount").hide();

    newCSS[ isHorizontal ? "width" : "height" ] = percentageAmount + "%";
    
	if (animate !== false) {        
	$progress.animate( newCSS, 1200, function(){
            $(this).find(".amount").fadeIn(500);
        });
    }
    else {
		$progress.css( newCSS );
        $progress.find(".amount").fadeIn(500);
    }
}


function tm(){
    thermometer("thermo1");
	thermometer("thermo2");
	thermometer("thermo3");
}



    </script>
</body>
</html>