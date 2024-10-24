<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // $this->_check_session();
        $this->load->model('HeatWave/Heatwave_graphical_model');
    }

    function _check_session() {
        if ($this->session->userdata('isLogin')) {
            // CHECK IF LOGIN
        } else {
            // REDIRECT TO LOGIN PAGE
            redirect('Login/login_form');
        }
    }

    public function index() {
        
        // load_block_data
        $data['blocks']=$this->Heatwave_graphical_model->getBlockName();

        // load forecast

        $fdata_query="SELECT block_id,temp_max FROM block_imd_gfs_forecast WHERE fcst_date='2019-05-02'";

        $data['block_tmax'] = $this->db->query($fdata_query)->result_array();

        // print_r($data['block_tmax']);


        $this->load->view('tests/test_tmax_view.php',$data);
    }

    public function imd(){
        $data = array();

        $this->load->view('imd.html',$data);
    }

    public function lightning(){
        error_reporting(E_ALL);
        date_default_timezone_set("Asia/Kolkata");
        $temp_h1 = new DateTime();
        $temp_h2 = new DateTime('+1 hour');
        //pr($temp_h1);
        $recent_file    = strtoupper(substr_replace($temp_h1->format('HdMY'),'Z',2,0));
        
        $today      = new DateTime();
        $today      = $today->format('Ymd');

        $lastday    = new DateTime('- 1day');
        $lastday    = $lastday->format('Ymd');
            
        //$file_link  =  'http://www.rimes.int/services/OSDMA/LTFCT/OUT/';
        $file_link  =  'https://satark.rimes.int/FC_LT_NCM/OUT/';

        $todays_dir         = $file_link.$today."/";
        $last_day_dir       = $file_link.$lastday."/";
        $todays_dir_check   = @get_headers($todays_dir);
        $last_day_dir_check = @get_headers($last_day_dir);
        //pr($last_day_dir_check);

        $data = array();
        //$data['hour_data'] = array();
        $now_time = DateTime::createFromFormat("H:i a",date("h:i a"));
        $_check_time = DateTime::createFromFormat("H:i a",'5:30 PM');
        if($today == date('Ymd') && $now_time < $_check_time) {
            //echo 'Show last days 12 records';
            /*if(strpos($last_day_dir_check[0],"200")){
                echo 'Here 1';*/
                $new_path = $last_day_dir."12/";
                $data['image_path'] = $new_path;
                /*$new_path_check = @get_headers($new_path);
                pr($new_path_check);
                if(strpos($new_path_check[0],"200")){*/
                    $data['recent_file'] = $new_path.$recent_file.'.png';
                /*}
            }      */   
        } else if($today == date('Ymd') && $now_time >= $_check_time){
            //echo 'Show todays 00 records.';
            $new_path = $todays_dir."00/";
            $data['image_path'] = $new_path;
            $data['recent_file'] = $new_path.$recent_file.'.png';
        }
        $this->load->view('lightning.html');
    }

    function get_image_path($path,$hour_file_names){
        $new_data = array();
        foreach($hour_file_names as $key=>$val){
            $new_data[$key] = $path.$val.".png";
        }
        return $new_data;
    }

    function modalf(){
        $this->load->view('modalf.html');
    }

}
