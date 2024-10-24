<?php $this->load->view('default_template/header_css_js'); ?>
<?php $this->load->view('default_template/system_header_home'); ?>
<?php $this->load->view('default_template/sidebar_about_only'); ?>
<style>
    @import url(https://fonts.googleapis.com/css?family=Open+Sans:400,800);
    @import url(https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css);
    
    .menu_card > table, .hazard_calendar {
        border-collapse: collapse;
        width: 80%;
    }

    .hazard_calendar > td, .hazard_calendar > td {
        text-align: center;  
    }

    th {
        text-align: left;
        padding: 5px;
        font-size: 16px;
        font-weight: 500;
    }

    tr:nth-child(even){background-color: #f2f2f2}

    /*to support table*/

    .center {
        display: block;
        margin-left: auto;
        margin-right: auto;
        width: 50%;
    }

    .cardbox {
        background-color: #ffffff;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.15);
        color: #ffffff;
        font-family: 'Open Sans', Arial, sans-serif;
        font-size: 16px;
        line-height: 1.6em;
        /*margin: 15px;*/
        /*max-width: 310px;*/
        /*max-width: 250px;*/
/*                max-width: 450px;
                min-width: 100px;*/
        width: 100%;
        overflow: hidden;
        position: relative;
        /*text-align: left;*/
        /*width: 100px;*/
    }

    .cardbox * {
        -webkit-box-sizing: border-box;
        box-sizing: border-box;
        -webkit-transition: all 0.25s ease;
        transition: all 0.25s ease;
    }

    /*change cover shadow of the box*/
    .cardbox img {
        max-width: 100%;
        vertical-align: middle;
        position: relative;
        opacity: 0.75;
    }

    .cardbox figcaption {
        padding: 25px 20px 25px;
        position: absolute;
        bottom: 0;
        z-index: 1;
    }

    .cardbox .date {
        background-color: #fff;
        color: #333;
        font-size: 18px;
        font-weight: 800;
        min-height: 48px;
        min-width: 48px;
        padding: 10px 0;
        position: absolute; 
        right: 15px;
        text-align: center;
        text-transform: uppercase;
        top: 0;
    }

    .cardbox .date span {
        display: block;
        line-height: 14px;
    }

    .cardbox .date .month {
        font-size: 11px;
    }

    .cardbox h3,
    .cardbox p {
        margin: 0px;
        padding: 0;
    }

    .cardbox h3 {
        /*margin: 25px;*/
        font-weight: 600;
        letter-spacing: -0.4px;
        letter-spacing: 0.5px;
    }

    .cardbox .hover {
        position: absolute;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
        align-items: center;
        /*Yellow*/
        /*background-color: rgba(219, 177, 59, 0.5);*/ 
        /*main blue*/
        /*background-color: rgba(65, 105, 225, 0.75);*/
        background-color: rgba(162, 190, 229, 0.5); 
        display: flex;
        /*font-size: 65px;*/
        /*justify-content: center;*/
        opacity: 0;
        max-width: 100%;
    }

    .cardbox a {
        left: 0;
        right: 0;
        top: 0;
        bottom: 0;
        position: absolute;
        z-index: 1;
    }

    .cardbox:hover .hover,
    .cardbox.hover .hover {
        -webkit-transition-delay: 0.1s;
        transition-delay: 0.1s;
        opacity: 1;
    }

    .cardbox:hover figcaption,
    .cardbox.hover figcaption {
        opacity: 0;
    }

    .cardbox:hover .date,
    .cardbox.hover .date {
        -webkit-transform: translateY(-100%);
        transform: translateY(-100%);
    }

    .txtbox {
        background: #fff;
        font-size: 16px;
        border-radius: 2px;
        display: inline-block;
        height: auto;
        /*margin: 2rem;*/
        margin: 15px 0px 0px 5px;
        position: relative;
        width: 99%;
        padding: 25px 25px 25px 25px;
        box-shadow: 0 10px 20px rgba(0,0,0,0.19), 0 6px 6px rgba(0,0,0,0.23);
        float: right;

    }

    .rectangle {
        width: 300px;
        height: 60px;
        background: linear-gradient(-90deg, #dbb13b, #e38337);
        /* position: absolute; */
        padding-left: 15px;
        box-shadow: 0 10px 20px rgba(0,0,0,0.19), 0 6px 6px rgba(0,0,0,0.23);
        margin: 0px -40px;
        z-index: 5;
    }
    
    .rectangle > h3 > i{
        text-align: center;
        vertical-align: middle;
        line-height: 60px;
    }

    .btn-weather {
	    background: linear-gradient(0deg, #dbb13b, #e38337);
        box-shadow: 0px 0px 1px black;
	    /*box-shadow: 0 10px 20px rgba(0,0,0,0.19), 0 6px 6px rgba(0,0,0,0.23);*/
	    /* margin: 0px -40px; */
	    z-index: 5;
	    color: white;
	    font-size: 15px;
	}


</style>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-home"></i> Home </a></li>
        </ol>
    </section>

    <!--Body content-->

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="txtbox">

                    <p align="justify"> SATARK is an one-stop risk management system with a simplified 
                        dashboard to monitor and evaluate the risk associated to different hazard forecasts using standard scientific basis. The tool allows advanced users to formulate advisories 
                        and disseminate to the line departments/end users, directly from the portal, after validation of the information. Further, the system enables operational users to feed 
                        real time data from the local context into the system through data panels, which allows the "Knowledge Base" of the portal to grow and assists the 
                        "systems learning algorithm" in providing improved advisory in every cycle. <br><p>
                        <font style="color:#0066a6;"><b>Hazard Calendar of Odisha</b></font>
                    </p>

                    <table style="margin-top: 15px;" align='center' class="hazard_calendar">
                        <tr>
                            <th style="color:white; background-color: #0066a6">
                                What – Hazard?
                            </th>
                            <th style="color:white; background-color: #0066a6">
                                When - it Occurs?
                            </th>
                            <th style="color:white; background-color: #0066a6">
                                Where - it Occurs?
                            </th>
                        </tr>

                        <tr>
                            <th>
                                Heatwaves
                            </th>
                            <th>
                                April - June
                            </th>
                            <th>
                                Widespread over the state
                            </th>
                        </tr>

                        <tr>
                            <th>
                                Floods
                            </th>
                            <th>
                                Monsoon season
                                (July-September) and during cyclone seasons 
                            </th>
                            <th>
                                Along the major
                                rivers and the tributaries
                            </th>
                        </tr>

                        <tr>
                            <th>
                                Cyclone
                            </th>
                            <th>
                                October-November
                                and April-May
                            </th>
                            <th>
                                Bay-of-Bengal,
                                East coast of India
                            </th>
                        </tr>

                        <tr>
                            <th>
                                Lightning
                            </th>
                            <th>
                                April- September 
                            </th>
                            <th>
                                Widespread over
                                the state
                            </th>
                        </tr>

                        <tr>
                            <th>
                                Drought
                            </th>
                            <th>
                                Months to even
                                multiple seasons
                            </th>
                            <th>
                                Widespread over
                                the state
                            </th>
                        </tr>
                    </table>

                    <!--Choose module to process box-->
                    <hr style="height:1px; border:none; color:#a7c2dd; background-color:#a7c2dd; margin-left: 10px; margin-top: 15px;">
                    <div class="row">
                        <div class="col-md-6">
 <!--<img src="<?php echo base_url(); ?>stylesheet/images/Choose-Mod3.png" style="margin-top: -15px; margin-left: 10px; box-shadow: 0 10px 20px rgba(0,0,0,0.19), 0 6px 6px rgba(0,0,0,0.23);"/>-->
                            <div class="rectangle" style="margin-top: -20px;" >
                                <h3><i>Choose Module to Proceed</i></h3>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="container-fluid" style="float: right; clear: right;">
                                <div class="btn-group">
                                    <table style="width:100%;">
                                        <tr>
                                            <td colspan="3">See Today's and Next 10 days Weather Forecast &rarr;</td>
                                        </tr>
                                        <tr>
                                            <td style="padding-right: 1%;">
                                                <a href="<?php echo base_url('Forecast/Imd_forecast/imd_rainfall_dly');?>"><button type="button" class="btn btn-block btn-weather"><strong>IMD-GFS</strong></button></a>
                                            </td>
                                            <!-- <td style="padding-right: 1%;">
                                                <a href="<?php echo base_url('Forecast/Rimes_forecast/rimes_rainfall_dly');?>"><button type="button" class="btn btn-block btn-weather"><strong>RIMES</strong></button></a>
                                            </td>
                                            <td style="padding-right: 1%;">
                                                <a href="<?php echo base_url('Forecast/Ecmwf_forecast/ec_rainfall_dly');?>"><button type="button" class="btn btn-block btn-weather"><strong>ECMWF</strong></button></a>
                                            </td> -->
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <br>
                    <br>
                    

                    <!--First row of menu card-->
                    <div class="row">         

                        <div class="col-md-4 menu_card">
                            <table style="width:100%;">
                                <tr>
                                    <td align='center' style="padding-bottom:5px">
                                        <figure class="cardbox">
                                            <img src="<?php echo base_url(); ?>stylesheet/images/home_menu_bt/normal_bt/hw_banner.png" width="100%" height="100%"/>
                                            <div class="hover">
                                               <img src="<?php echo base_url(); ?>stylesheet/images/home_menu_bt/hover_bt/hw_banner_h.png" width="100%"/>   
                                            </div>
                                            <a href="<?= site_url('HeatWave/Overview_new'); ?>"></a>
                                        </figure>
                                    </td>
                                </tr>

                                <tr style="background-color:#fff;">
                                    <td style="padding-bottom:5px">
                                        <figure class="cardbox">
                                            <img src="<?php echo base_url(); ?>stylesheet/images/home_menu_bt/normal_bt/drou_banner.png" width="100%" height="100%"/>
                                            <div class="hover">
                                                <!--<i class="ion-android-open"></i>-->
                                                <img src="<?php echo base_url(); ?>stylesheet/images/home_menu_bt/hover_bt/drou_banner_h.png" width="100%" />
                                            </div>
                                            
                                                <a href="<?= site_url('Drought/Drought_overview/index_week'); ?>"></a>                                   
                                        </figure>
                                    </td>
                                </tr>

                                <tr>
                                    <td style="padding-bottom:5px">
                                        <figure class="cardbox">
                                            <img src="<?php echo base_url(); ?>stylesheet/images/home_menu_bt/normal_bt/light_banner.png"  width="100%" height="100%"/>
                                            <div class="hover">
                                                <!--<i class="ion-android-open"></i>-->
                                                <img src="<?php echo base_url(); ?>stylesheet/images/home_menu_bt/hover_bt/light_banner_h.png"  width="100%"/>
                                            </div>
                                            <!-- <a href="<?= site_url('lightning/EN_overview/index'); ?>"></a> -->
                                            <a href="<?= site_url('lightning/IITM'); ?>"></a>
                                        </figure>
                                    </td>
                                </tr>

                            </table>
                        </div>


                        <!--Second row of menu card--> 

                        <div class="col-md-4 menu_card">
                            <table style="width:100%;">
                                <tr>
                                    <td style="padding-bottom:5px">
                                        <figure class="cardbox">
                                            <img src="<?php echo base_url(); ?>stylesheet/images/home_menu_bt/normal_bt/ocean_banner.png" width="100%" height="100%"/>
                                            <div class="hover">
                                                <!--<i class="ion-android-open"></i>-->
                                                <img src="<?php echo base_url(); ?>stylesheet/images/home_menu_bt/hover_bt/ocean_banner_h.png" width="100%" />
                                            </div>
                                            <!-- <a href="<?php echo base_url(); ?>Home/upcoming"></a> -->
                                            <a href="<?php echo base_url(); ?>ocean/overview/"></a>
                                            
                                        </figure>
                                    </td>
                                </tr>

                                <tr style="background-color:#fff;">
                                    <td style="padding-bottom:5px">
                                        <figure class="cardbox">
                                            <img src="<?php echo base_url(); ?>stylesheet/images/home_menu_bt/normal_bt/floods_banner.png" width="100%" height="100%"/>
                                            <div class="hover">
                                                <!--<i class="ion-android-open"></i>-->
                                                <img src="<?php echo base_url(); ?>stylesheet/images/home_menu_bt/hover_bt/floods_banner_h.png" width="100%"/>
                                            </div>
                                            <a href="<?= site_url('flood/Home'); ?>"></a>
                                        </figure>
                                    </td>
                                </tr>

                                <tr>
                                    <td style="padding-bottom:5px">
                                        <figure class="cardbox">
                                            <img src="<?php echo base_url(); ?>stylesheet/images/home_menu_bt/normal_bt/road_acc_banner.png" width="100%" height="100%"/>
                                            <div class="hover">
                                                <!--<i class="ion-android-open"></i>-->
                                                <img src="<?php echo base_url(); ?>stylesheet/images/home_menu_bt/hover_bt/road_acc_banner_h.png" width="100%"/>
                                            </div>
                                            <a href="<?= site_url('RoadAccident/Overview'); ?>"></a>
                                        </figure>
                                    </td>
                                </tr>

                            </table>
                        </div>

                        <!--Third row of menu card--> 

                        <div class="col-md-4 menu_card">
                            <table style="width:100%;">
                                <tr>
                                    <td style="padding-bottom:5px">
                                        <figure class="cardbox">
                                            <img src="<?php echo base_url(); ?>stylesheet/images/home_menu_bt/normal_bt/eq_banner.png" width="100%" height="100%"/>
                                            <div class="hover">
                                                <!--<i class="ion-android-open"></i>-->
                                                <img src="<?php echo base_url(); ?>stylesheet/images/home_menu_bt/hover_bt/eq_banner_h.png" width="100%" />
                                            </div>
                                            <a href="<?= site_url('earthquake/Recent'); ?>"></a>
                                        </figure>
                                    </td>
                                </tr>
                                
                                <tr>
                                    <td style="padding-bottom:5px">
                                        <figure class="cardbox">
                                            <img src="<?php echo base_url(); ?>stylesheet/images/home_menu_bt/normal_bt/cyclone_banner.png" width="100%" height="100%"/>
                                            <div class="hover">
                                                <!--<i class="ion-android-open"></i>-->
                                                <img src="<?php echo base_url(); ?>stylesheet/images/home_menu_bt/hover_bt/cyclone_banner_h.png" width="100%" />
                                            </div>
                                            <a href="<?= site_url('cyclone/Overview'); ?>"></a>
                                        </figure>
                                    </td>
                                </tr>
                                
                                <tr>
                                    <td style="padding-bottom:5px">
                                        <figure class="cardbox">
                                            <img src="<?php echo base_url(); ?>stylesheet/images/home_menu_bt/normal_bt/snake_banner.png" width="100%" height="100%"/>
                                            <div class="hover">
                                                <!--<i class="ion-android-open"></i>-->
                                                <img src="<?php echo base_url(); ?>stylesheet/images/home_menu_bt/hover_bt/snake_banner_h.png" width="100%" />
                                            </div>
                                            <a href="<?= site_url('SnakeBite/SnakeBite'); ?>"></a>
                                        </figure>
                                    </td>
                                </tr>



                            </table>
                        </div>

                    </div>

                </div>

            </div>
        </div>
    </section>
</div>

<!--<script>
    $(".hover").mouseleave(
            function () {
                $(this).removeClass("hover");
            }
    );
</script>-->
<?php $this->load->view('default_template/footer_js'); ?>
<?php $this->load->view('default_template/footer_html'); ?>
