<?php $this->load->view('default_template/header_css_js'); ?>
<?php $this->load->view('default_template/system_header'); ?>
<?php $this->load->view('default_template/sidebar_about_only'); ?>
<style>
    @import url(https://fonts.googleapis.com/css?family=Open+Sans:400,800);
    @import url(https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css);
    .cardbox {
        background-color: #000000;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.15);
        color: #ffffff;
        font-family: 'Open Sans', Arial, sans-serif;
        font-size: 16px;
        line-height: 1.6em;
        margin: 10px;
        max-width: 310px;
        min-width: 250px;
        overflow: hidden;
        position: relative;
        text-align: left;
        width: 100%;
    }

    .cardbox * {
        -webkit-box-sizing: border-box;
        box-sizing: border-box;
        -webkit-transition: all 0.25s ease;
        transition: all 0.25s ease;
    }

    .cardbox img {
        max-width: 100%;
        vertical-align: top;
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
        margin: 0;
        padding: 0;
    }

    .cardbox h3 {
        font-weight: 800;
        letter-spacing: -0.4px;
    }

    .cardbox .hover {
        position: absolute;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
        align-items: center;
        background-color: rgba(65, 105, 225, 0.75);
        display: flex;
        font-size: 65px;
        justify-content: center;
        opacity: 0;
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

    body {
        background-color: #212121;
    }

    #myBtn {
        display: none;
        position: fixed;
        bottom: 20px;
        right: 30px;
        z-index: 99;
        font-size: 18px;
        border: none;
        outline: none;
        background-color: #4169ff;
        color: white;
        cursor: pointer;
        padding: 15px;
        border-radius: 30px;
    }

    #myBtn:hover {
        background-color: #2f4184;
    }

    .txtbox {
        background: #fff;
        font-size: 16px;
        border-radius: 2px;
        display: inline-block;
        height: 220px;
        margin: 1rem;
        position: relative;
        width: 100%;
        padding: 100px 25px 25px 25px;
        box-shadow: 0 10px 20px rgba(0,0,0,0.19), 0 6px 6px rgba(0,0,0,0.23);
    }

    .rectangle {
        width: 300px;
        height: 60px;
        background: linear-gradient(-90deg, #d1ddeb, #a2bee5, #4d81ca);
        position: absolute;
        padding-left: 15px;
        box-shadow: 0 10px 20px rgba(0,0,0,0.19), 0 6px 6px rgba(0,0,0,0.23);
        margin-top: 20px;
        z-index: 5;
    }
</style>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <button onclick="topFunction()" id="myBtn" title="Go to top"><img src="<?php echo base_url(); ?>stylesheet/images/arr.png" width="25px"/></button>
        <!--        
                <h1>
                    <i>Choose module to proceed</i>
                    <small></small>
                </h1>-->
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-newspaper-o"></i> About </a></li>
            <li class="active">Dashboard</li>
        </ol>
    </section>

    <!--Body content-->
    <section class="content">
        <!--        <div class="row">            
                    <div class="col-md-12">
                        <div class="box box-success">
                            <div class="box-header with-border">
                                <h3 class="box-title"></h3>
                            </div>
                            <div class="box-body">
                                <p><i><img src="<?php echo base_url(); ?>stylesheet/images/satark_portal_image.PNG" align="right" class="img-responsive" alt=""/> The SATARK Portal is a one stop risk management decision support systems platform which intends to provide real time watch, alert, 
                                        and warning information for priority hazards in the state of Odisha. The portal with a rich database of historical events, 
                                        can generate disaster profile and with an interactive visualization platform for the forecasted events as well as generating advisories 
                                        in a user-friendly language.  The portal is developed using the Open-source software packages.
                                        The system is designed for priority hazards such as 
                                        Flood, Heat wave, Lightning, drought, Cyclones, Tsunami and Road Accidents. </i> </p>
                            </div>                   
                        </div>    
                    </div>            
                </div>-->

        <div class="rectangle">
            <h3><i>Choose module to proceed</i></h3>
        </div>

        <!--Topic description-->
        <div class="txtbox">

            <p><i>
                    <!--<img src="<?php echo base_url(); ?>stylesheet/images/satark_portal_image.PNG" align="right" class="img-responsive" alt=""/>--> 
                    The SATARK Portal is a one stop risk management decision support systems platform which intends to provide real time watch, alert, 
                    and warning information for priority hazards in the state of Odisha. The portal with a rich database of historical events, 
                    can generate disaster profile and with an interactive visualization platform for the forecasted events as well as generating advisories 
                    in a user-friendly language.  The portal is developed using the Open-source software packages.
                    The system is designed for priority hazards such as 
                    Flood, Heat wave, Lightning, drought, Cyclones, Tsunami and Road Accidents. </i> </p>   
        </div>

        <!--First row of menu card-->
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-3">
                <figure class="cardbox">
                    <img src="<?php echo base_url(); ?>stylesheet/images/hw_banner.png"  />
                    <!--<div class="date"><span class="day">28</span><span class="month">Apr</span></div>-->
                    <figcaption>
                        <h3>Heat Wave Advisory System</h3>
                        <!--<p>Provides health advisories based on anticipated heat wave condition based on the weather forecasts from the India Met.....</p>-->
                    </figcaption>
                    <div class="hover"><i class="ion-android-open"></i></div>
                    <a href="<?= site_url('HeatWave/Forecast/ecm'); ?>"></a>
                </figure>
            </div>

            <!--<div class="col-md-1"></div>-->


            <div class="col-md-3">
                <figure class="cardbox">
                    <img src="<?php echo base_url(); ?>stylesheet/images/drou_banner.png"  />
                    <!--<div class="date"><span class="day">28</span><span class="month">Apr</span></div>-->
                    <figcaption>
                        <h3>Drought Risk Monitoring and Management System</h3>
                        <!--<p>Archive and analyze data from observatories and satellite imageries to assess drought risks(meteorological,agricultural.....</p>--> 
                            
                    </figcaption>
                    <div class="hover"><i class="ion-android-open"></i></div>
                    <a href="<?= site_url('Drought/drought_wrf_district'); ?>"></a>
                </figure>
            </div>

<!--            <div class="col-md-1"></div>-->

            <div class="col-md-3">
                <figure class="cardbox">
                    <img src="<?php echo base_url(); ?>stylesheet/images/light_banner.png" />
                    <!--<div class="date"><span class="day">28</span><span class="month">Apr</span></div>-->
                    <figcaption>
                        <h3>Lightning Advisory system</h3>
                        <!--<p>Utilizes the Earth Networks Lightning sensor data and IMD’s nowcast information to provide advisory for dangerous thunderstorms....</p>--> 
                            
                    </figcaption>
                    <div class="hover"><i class="ion-android-open"></i></div>
                    <a href="<?= site_url('Lightning/overview'); ?>"></a>
                </figure>
            </div>

        </div>

        <!--Secound row of menu card-->
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-3">
                <figure class="cardbox">
                    <img src="<?php echo base_url(); ?>stylesheet/images/tsuna_banner.png"  />
                    <!--<div class="date"><span class="day">28</span><span class="month">Apr</span></div>-->
                    <figcaption>
                        <h3>Ocean State Information and Tsunami risk system</h3>
                        <!--<p>Integrates INSPIRE is a computer-based tsunami propagation and inundation risk assessment tool, the ESCAPE.....</p>-->
                    </figcaption>
                    <div class="hover"><i class="ion-android-open"></i></div>
                    <a href="<?= site_url('#'); ?>"></a>
                </figure>
            </div>

            <!--<div class="col-md-1"></div>-->

            <div class="col-md-3">
                <figure class="cardbox">
                    <img src="<?php echo base_url(); ?>stylesheet/images/floods_banner.png"  />
                    <!--<div class="date"><span class="day">28</span><span class="month">Apr</span></div>-->
                    <figcaption>
                        <h3>Flood monitoring system</h3>
                        <!--<p>Monitor river situation for possible flood and inflows for reservoir management and support decision making for effective water resource management.....</p>-->
                    </figcaption>
                    <div class="hover"><i class="ion-android-open"></i></div>
                    <a href="<?= site_url('flood/Home'); ?>"></a>
                </figure>
            </div>

            <!--<div class="col-md-1"></div>-->

            <div class="col-md-3">
                <figure class="cardbox">
                    <img src="<?php echo base_url(); ?>stylesheet/images/road_acc_banner.png"  />
                    <!--<div class="date"><span class="day">28</span><span class="month">Apr</span></div>-->
                    <figcaption>
                        <h3>Road Accident monitoring</h3>
                        <!--<p>A historical road accident database (crash database) with an infographic analysis platform and a real-time traffic monitoring system.....</p>-->
                    </figcaption>
                    <div class="hover"><i class="ion-android-open"></i></div>
                    <a href="<?= site_url('#'); ?>"></a>
                </figure>
            </div>            
        </div>        


        <!--        <div class="row">
                    <div class="col-md-3">
                        <div class="box box-primary box-solid">
                            <div class="box-header with-border">
                                <h3 class="box-title"><i>Heat Wave Advisory System</i></h3>
                            </div>
                            <div class="box-body">
                                <div class="hovereffect">
                                    <img class="img-responsive img-rounded" src="<?php echo base_url(); ?>stylesheet/images/hw_.png" alt="" style="vertical-align:middle" />
                                    <div class="overlay">
                                        <h2>Heat Wave Advisory System</h2>
                                        <a class="info" href="<?= site_url('HeatWave/Forecast/ecm'); ?>">Enter Section</a>
                                    </div>
                                </div>
                            </div>
                            <div class="box-body">
                                <p class="text-danger"><i>Provides health advisories based on anticipated heat wave condition based on the weather forecasts from the India Met. 
                                        Department and the European Center for Medium range weather forecast (ECMWF) during the summer season, 
                                        and differential vulnerabilities of at-risk people and livestock population.  The system is also designed to generate advisories 
                                        that are specific to disease-spreading scenarios, and to collect real-time surveillance data.</i></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-1">
                    </div>
                    <div class="col-md-3">
                        <div class="box box-primary box-solid">
                            <div class="box-header with-border">
                                <h3 class="box-title"><i>Drought Risk Monitoring and Management System</i></h3>
                            </div>
                            <div class="box-body">
                                <div class="hovereffect">
                                    <img class="img-responsive img-rounded" src="<?php echo base_url(); ?>stylesheet/images/drou_.png" alt="" />
                                    <div class="overlay">
                                        <h2>Drought Risk Monitoring and Management System</h2>
                                        <a class="info" href="<?php echo base_url(); ?>Drought/drought_overview">Enter Section</a>
                                    </div>
                                </div>
                            </div>
                            <div class="box-body">
                                <p class="text-danger"><i>Archive and analyze data from observatories and satellite imageries to assess drought risks (meteorological, 
                                        agricultural and hydrological droughts) and prepare drought impact outlook from seasonal (monthly and 3-monthly) forecasts. 
                                        Also provide crop and location specific advisories to farmers.</i></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-1">                
                    </div>
                    <div class="col-md-3">
                        <div class="box box-primary box-solid">
                            <div class="box-header with-border">
                                <h3 class="box-title"><i>Lightning Advisory system</i></h3>
                            </div>
                            <div class="box-body">
                                <div class="hovereffect">
                                    <img class="img-responsive img-rounded" src="<?php echo base_url(); ?>stylesheet/images/light.png" alt="" />
                                    <div class="overlay">
                                        <h2>Lightning Advisory system</h2>
                                        <a class="info" href="<?= site_url('Lightning/overview'); ?>">Enter Section</a>
                                    </div>
                                </div>
                            </div>
                            <div class="box-body">
                                <p class="text-danger"><i>Utilizes the Earth Networks Lightning sensor data and IMD’s nowcast information to provide advisory for dangerous 
                                        thunderstorms based on hazard threshold and locations. Also provides an infographic of the statistics of the event.</i></p>
                            </div>
                        </div>
                    </div>            
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="box box-primary box-solid">
                            <div class="box-header with-border">
                                <h3 class="box-title"><i>Ocean State Information and Tsunami risk system</i></h3>
                            </div>
                            <div class="box-body">
                                <div class="hovereffect">
                                    <img class="img-responsive img-rounded" src="<?php echo base_url(); ?>stylesheet/images/tsuna.png" alt="" />
                                    <div class="overlay">
                                        <h2>Ocean State Information and Tsunami risk system</h2>
                                        <a class="info" href="#">Enter Section</a>
                                    </div>
                                </div>
                            </div>
                            <div class="box-body">
                                <p class="text-danger"><i>Integrates INSPIRE is a computer-based tsunami propagation and inundation risk assessment tool, the ESCAPE, the evacuation root planning 
                                        tool and the ocean information from INCOIS into a single platform.  This provides modules for identifying tsunami sources, simulating 
                                        tsunami propagation and inundation, integrating exposure data, and performing tsunami loss estimation for tsunami risks. At the same time 
                                        also provides advisory for ocean state forecast for identifying potential fishing zones.</i></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-1">                
                    </div>
                    <div class="col-md-3">
                        <div class="box box-primary box-solid">
                            <div class="box-header with-border">
                                <h3 class="box-title"><i>Flood monitoring system</i></h3>
                            </div>
                            <div class="box-body">
                                <div class="hovereffect">
                                    <img class="img-responsive img-rounded" src="<?php echo base_url(); ?>stylesheet/images/floods_.png" alt="" />
                                    <div class="overlay">
                                        <h2>Flood monitoring system</h2>
                                        <a class="info" href="<?php echo base_url(); ?>flood/Home">Enter Section</a>
                                    </div>
                                </div>
                            </div>
                            <div class="box-body">
                                <p class="text-danger"><i>Monitor river situation for possible flood and inflows for reservoir management and support decision making for effective water resource management.
                                        The tool utilizes the real-time observations data with the rainfall forecast products from different centers (IMD, ECMWF) and integrated through a 
                                        hydrological modelling setup.</i></p>
                            </div>
                        </div>               
                    </div>
                    <div class="col-md-1">                
                    </div>
                    <div class="col-md-3">
                        <div class="box box-primary box-solid">
                            <div class="box-header with-border">
                                <h3 class="box-title"><i>Road Accident monitoring</i></h3>
                            </div>
                            <div class="box-body">
                                <div class="hovereffect">
                                    <img class="img-responsive img-rounded" src="<?php echo base_url(); ?>stylesheet/images/road_acc.png" alt="" />
                                    <div class="overlay">
                                        <h2>Road Accident monitoring</h2>
                                        <a class="info" href="#">Enter Section</a>
                                    </div>
                                </div>
                            </div>
                            <div class="box-body">
                                <p class="text-danger"><i>A historical road accident database (crash database) with an infographic analysis platform and a real-time traffic monitoring system, 
                                        which shall include data from the traffic control center, CCTV cameras, and receipt of crowdsourced data. The traffic accident analysis 
                                        system which includes evaluation of accident trends along with a response database, with data on locations and contact details of 
                                        hospitals/mobile trauma care and of police stations.</i></p>
                            </div>
                        </div>
                    </div>
                </div>    
        -->
       
    </section>
</div>
<?php $this->load->view('default_template/footer_js'); ?>
 <script>
// When the user scrolls down 20px from the top of the document, show the button
    window.onscroll = function () {
        scrollFunction()
    };

    function scrollFunction() {
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
            document.getElementById("myBtn").style.display = "block";
        } else {
            document.getElementById("myBtn").style.display = "none";
        }
    }

// When the user clicks on the button, scroll to the top of the document
    function topFunction() {
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
    }
</script>
<script>
    $(".hover").mouseleave(
            function () {
                $(this).removeClass("hover");
            }
    );
</script>
<?php $this->load->view('default_template/footer_html'); ?>