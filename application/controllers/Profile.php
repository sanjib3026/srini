<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->_check_session();
        $this->load->model('lightning/Lightning_Profile_Model');
        $this->load->model('lightning/Lightning_model');
        $this->load->model('flood/Casualties_model');
        $this->load->model('HeatWave/ProfileModel');
        $this->load->model('Drought/Drought_profile_model');
        $this->load->model('SnakeBite/Information_model');
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
        // THIS FOR ROLE ID OF USER
        //$data['role'] = $this->session->userdata('role');

        $fstSegement = $sndSegement = '';
        $fstSegement = $this->uri->segment('3'); 
        if($fstSegement == '' || empty($fstSegement) || $fstSegement == null ){
            $activeTab = 'lightning';
        } else {
            $activeTab = $fstSegement;
        }
        
        $data['activeTab'] = $activeTab;
    
        // Fetch Deaths per Year - End

        $this->load->view('profile',$data);
    }

    function valid_level($level){
        $valid_levels = array('district','block','districts');
        if(!in_array($level,$valid_levels)){
            $this->form_validation->set_message('valid_level', 'The data for {field} is invalid');
            return false;
        } else {
            return true;
        }
    }

    public function lightning(){
        $data['nodata'] = false;
        $no_error = false;
        $data['impact_name']  = $data['impact'] = $data['dataLevel']   = '';
        $data['impact_types'] = $this->Lightning_Profile_Model->get_impact_type();
        if(!empty($_POST)){
            $this->form_validation->set_rules('impact','impact','trim|required|is_natural');
            $this->form_validation->set_rules('data_level','data level','trim|required|callback_valid_level');
            if ($this->form_validation->run() == FALSE) { 
                $no_error = false;
            } else {
                $no_error = true;
                $data['impact']         = $this->input->post('impact',true);
                $data['dataLevel']      = $this->input->post('data_level',true);
                $data['impact_name']    = $this->Lightning_Profile_Model->get_impact_name($data['impact']);
            }
        } else {
            $no_error = true;
            $data['impact']         = 3;
            $data['impact_name']    = $this->Lightning_Profile_Model->get_impact_name($data['impact']);
            $data['dataLevel']      = 'district';
        }
        if($no_error){
            if($data['impact'] == '3'){
                if($data['dataLevel'] == 'district'){
                    $data['districtWiseDeath']  = $this->Lightning_Profile_Model->impactsPerDistrict();
                    $data['yearWiseDeath']      = $this->Lightning_Profile_Model->impactsPerYear();
                    $data['year_json_data'] = json_encode($data['yearWiseDeath']);
                } else {
                    $data['nodata'] = true;
                }
            } else {
                $data['nodata'] = true;
            }        
        }else {
            $data['nodata'] = true;
        }
        $year_group_death_data = $this->Lightning_Profile_Model->fetch_year_group_death_data();
        if(!empty($year_group_death_data)){
            $dist_death = $tot_death = array();
            $year_id = $year_group_death_data[0]['period'];
            $info = $this->Lightning_Profile_Model->fetch_district_wise_lightning_death($year_id);
            if(!empty($info)){
                foreach($info as $key => $val){
                    array_push($dist_death,$val['district_name']);
                    array_push($tot_death,$val['deaths']);
                }
                if(!empty($dist_death)){
                    $data['dist_death'] = json_encode($dist_death);
                }
                if(!empty($tot_death)){
                    $data['tot_death'] = json_encode($tot_death,JSON_NUMERIC_CHECK);
                }
                $data['information_exit'] = true;
                $data['year_id'] = $year_id;
            }
        }
        $data['year_group_death_data']  = $year_group_death_data;
        //pr($data);
        $this->load->view('profile/lightning',$data);
    }

    public function fetch_district_wise_death_ajax(){
        $dist_death = $tot_death =  $data = array();
        $year_id = $this->input->post('year_id',true);
        $info = $this->Lightning_Profile_Model->fetch_district_wise_lightning_death($year_id);
        //pr($info);
        if(!empty($info)){
            foreach($info as $key => $val){
                array_push($dist_death,$val['district_name']);
                array_push($tot_death,$val['deaths']);
            }
            if(!empty($dist_death)){
                $data['dist_death'] = json_encode($dist_death);
            }
            if(!empty($tot_death)){
                $data['tot_death'] = json_encode($tot_death,JSON_NUMERIC_CHECK);
            }
            $data['information_exit'] = true;
        }
        echo json_encode(array('data'=>$data));
    }

    public function deathRatePerEachYearByDistrict(){
        if(!empty($_POST)){
            $districtId = $this->input->post('districtId',true);
            $dName = $this->Lightning_Profile_Model->get_district_name($districtId);
            $yearWiseDeath = $this->Lightning_Profile_Model->impactsPerYearAgainestADistrict($districtId);
            $ret_ = json_encode(array('dName'=>$dName,'deathData'=>$yearWiseDeath),JSON_NUMERIC_CHECK);
            echo $ret_; exit;
        } else {
            redirect('Home');
        }
    }

    public function flood(){
        $data['nodata'] = false;
        $data['casualties_type'] = $this->Casualties_model->getAllCasualtiesType();
        /*
            casualties
                1: death
                2: injuries
                ...
        
            hazard
                1: flood
                2: heat wave
                ...

            casualtiesPerYear(1[flood],casualties_id,level) .....
        */ 
        if(!empty($_POST)){
            $boundary_level = $this->input->post('boundary_level',true);
            $casualties_id  = $this->input->post('casualties_id',true);
            $this->form_validation->set_rules('casualties_id','casualties','trim|required|is_natural');
            $this->form_validation->set_rules('boundary_level','level','trim|required|callback_valid_level');
            if ($this->form_validation->run() !== FALSE) { 
                if ($boundary_level && $casualties_id){
                    if($boundary_level=='districts'){
                        // print_r($this->input->post('casualties_id'));
                        $data['cas_type_id'] = $casualties_id;
                        $data['level'] = $boundary_level;
                        $data['cas_type'] = $this->Casualties_model->getCasName($this->db->escape($casualties_id))['name'];    
                        $data['yearly_cas'] = $this->Casualties_model->casualtiesPerYear(1,$this->db->escape($casualties_id),$boundary_level);
                        $data['dist_cas'] = $this->Casualties_model->casualtiesPerDist(1,$this->db->escape($casualties_id),$boundary_level);
                        if (sizeof($data['yearly_cas']) >0 & sizeof($data['dist_cas'])>0 ){
                            //$this->load->view('profile/flood',$data);
                        }
                        else{
                            $data['nodata'] = true;
                            //$this->load->view('profile/flood',$data);
                        }
                    }else{
                        $data['nodata'] = true;
                        $data['cas_type'] = 'Death';
                    	$data['cas_type_id'] = $casualties_id;
                        $data['level'] = $boundary_level;
                        //$this->load->view('profile/flood',$data);
                    }
                }
            } else {
                $data['cas_type_id'] = $casualties_id;
                $data['level'] = $boundary_level;
            }
        } else {
            $data['cas_type'] = 'Death';
            $data['cas_type_id'] = 1;
            $data['level'] = 'districts';
            $data['yearly_cas'] = $this->Casualties_model->casualtiesPerYear(1,1,'districts');
            $data['dist_cas'] = $this->Casualties_model->casualtiesPerDist(1,1,'districts');
            //$this->load->view('profile/flood',$data);
        }
        $year_group_death_data = $this->Casualties_model->fetch_year_group_death_data(1,$data['cas_type_id']);
        if(!empty($year_group_death_data)){
            $dist_death = $tot_death = array();
            $year_id = $year_group_death_data[0]['period'];
            $info = $this->Casualties_model->fetch_district_wise_lightning_death(1,$data['cas_type_id'],$year_id);
            if(!empty($info)){
                foreach($info as $key => $val){
                    array_push($dist_death,$val['district_name']);
                    array_push($tot_death,$val['value']);
                }
                if(!empty($dist_death)){
                    $data['dist_death'] = json_encode($dist_death);
                }
                if(!empty($tot_death)){
                    $data['tot_death'] = json_encode($tot_death,JSON_NUMERIC_CHECK);
                }
                $data['information_exit'] = true;
                $data['year_id'] = $year_id;
            }
        }
        $data['year_group_death_data']  = $year_group_death_data;
        $this->load->view('profile/flood',$data);
    }

    public function fetch_district_wise_death_ajax_flood(){
        $dist_death = $tot_death =  $data = array();
        $year_id = $this->input->post('year_id',true);
        $hazard_id = $this->input->post('hazard_id',true);
        $cas_id = $this->input->post('cas_id',true);
        $info = $this->Casualties_model->fetch_district_wise_lightning_death($hazard_id,$cas_id,$year_id);
        
        if(!empty($info)){
            foreach($info as $key => $val){
                array_push($dist_death,$val['district_name']);
                array_push($tot_death,$val['value']);
            }
            if(!empty($dist_death)){
                $data['dist_death'] = json_encode($dist_death);
            }
            if(!empty($tot_death)){
                $data['tot_death'] = json_encode($tot_death,JSON_NUMERIC_CHECK);
            }
            $data['information_exit'] = true;
        }
        echo json_encode(array('data'=>$data));
    }
    public function fetch_district_wise_death_ajax_heatwave(){
        $dist_death = $tot_death =  $data = array();
        $year_id = $this->input->post('year_id',true);
        $hazard_id = $this->input->post('hazard_id',true);
        $cas_id = $this->input->post('cas_id',true);
        $info = $this->Casualties_model->fetch_district_wise_lightning_death($hazard_id,$cas_id,$year_id);
        
        if(!empty($info)){
            foreach($info as $key => $val){
                array_push($dist_death,$val['district_name']);
                array_push($tot_death,$val['value']);
            }
            if(!empty($dist_death)){
                $data['dist_death'] = json_encode($dist_death);
            }
            if(!empty($tot_death)){
                $data['tot_death'] = json_encode($tot_death,JSON_NUMERIC_CHECK);
            }
            $data['information_exit'] = true;
        }
        echo json_encode(array('data'=>$data));
    }
    public function HeatWave(){

        $data['nodata'] = false;
        $data['casualties_type'] = $this->Casualties_model->getAllCasualtiesType();

        /*
            see flood() {..} for ids
         */ 

        if(!empty($_POST)){
            $boundary_level = $this->input->post('boundary_level',true);
            $casualties_id  = $this->input->post('casualties_id',true);
            $this->form_validation->set_rules('casualties_id','casualties','trim|required|is_natural');
            $this->form_validation->set_rules('boundary_level','level','trim|required|callback_valid_level');
            if ($this->form_validation->run() !== FALSE) { 
                if ($boundary_level && $casualties_id){
                    if($boundary_level=='districts'){
                        // print_r($this->input->post('casualties_id'));
                        $data['cas_type_id'] = $casualties_id;
                        $data['level'] = $boundary_level;
                        $data['cas_type'] = $this->Casualties_model->getCasName($this->db->escape($casualties_id))['name'];    
                        $data['yearly_cas'] = $this->Casualties_model->casualtiesPerYear(2,$this->db->escape($casualties_id),$boundary_level);
                        $data['dist_cas'] = $this->Casualties_model->casualtiesPerDist(2,$this->db->escape($casualties_id),$boundary_level);
                        if (sizeof($data['yearly_cas']) >0 & sizeof($data['dist_cas'])>0 ){
                            //$this->load->view('profile/heat_wave',$data);
                        }
                        else{
                            $data['nodata'] = true;
                            //$this->load->view('profile/heat_wave',$data);
                        }
                    }else{
                        $data['nodata'] = true;
                        $data['cas_type'] = 'Death';
                        $data['cas_type_id'] = $casualties_id;
                        $data['level'] = $boundary_level;
                        //$this->load->view('profile/heat_wave',$data);
                    }
                }
            } else {
                $data['cas_type_id'] = $casualties_id;
                $data['level'] = $boundary_level;
            }
        } else {
            $data['cas_type'] = 'Death';
            $data['cas_type_id'] = 1;
            $data['level'] = 'districts';
            $data['yearly_cas'] = $this->Casualties_model->casualtiesPerYear(2,1,'districts');
            $data['dist_cas'] = $this->Casualties_model->casualtiesPerDist(2,1,'districts');
        }
        $year_group_death_data = $this->Casualties_model->fetch_year_group_death_data(2,$data['cas_type_id']);
        if(!empty($year_group_death_data)){
            $dist_death = $tot_death = array();
            $year_id = $year_group_death_data[0]['period'];
            $info = $this->Casualties_model->fetch_district_wise_lightning_death(2,$data['cas_type_id'],$year_id);
            if(!empty($info)){
                foreach($info as $key => $val){
                    array_push($dist_death,$val['district_name']);
                    array_push($tot_death,$val['value']);
                }
                if(!empty($dist_death)){
                    $data['dist_death'] = json_encode($dist_death);
                }
                if(!empty($tot_death)){
                    $data['tot_death'] = json_encode($tot_death,JSON_NUMERIC_CHECK);
                }
                $data['information_exit'] = true;
                $data['year_id'] = $year_id;
            }
        }
        $data['year_group_death_data']  = $year_group_death_data;

        $this->load->view('profile/heat_wave',$data);



        /*if ($this->input->post('boundary_level') && $this->input->post('casualties_id')){
            
            // print_r($this->input->post('casualties_id'));
            if($this->input->post('boundary_level')=='districts'){
                // print_r($this->input->post('casualties_id'));

                $data['cas_type']       = $this->Casualties_model->getCasName($this->input->post('casualties_id'))['name'];
                $data['cas_type_id']    = $this->input->post('casualties_id');
                $data['yearly_cas']     = $this->Casualties_model->casualtiesPerYear(2,$this->input->post('casualties_id'),$this->input->post('boundary_level'));

                $data['dist_cas']       = $this->Casualties_model->casualtiesPerDist(2,$this->input->post('casualties_id'),$this->input->post('boundary_level'));

                if (sizeof($data['yearly_cas']) >0 & sizeof($data['dist_cas'])>0 ){

                    $this->load->view('profile/heat_wave',$data);
                }
                else{
                    $data['nodata'] = true;
                    $this->load->view('profile/heat_wave',$data);
                }
                
            }else{
                $data['nodata'] = true;
                $this->load->view('profile/heat_wave',$data);
            }

        }else{
            $data['cas_type'] = 'Death';
            $data['cas_type_id'] = 1;
            $data['yearly_cas'] = $this->Casualties_model->casualtiesPerYear(2,1,'districts');

            $data['dist_cas'] = $this->Casualties_model->casualtiesPerDist(2,1,'districts');

            
            $this->load->view('profile/heat_wave',$data);
        }*/

    }

    public function deathRatePerYearByDistrict(){
        if(!empty($_POST)){
            $districtId = $this->input->post('districtId',true);
            $dName = $this->Casualties_model->get_district_name($districtId);
            $yearWiseDeath = $this->Casualties_model->impactsPerYearAgainestADistrict($districtId);
            $ret_ = json_encode(array('dName'=>$dName,'deathData'=>$yearWiseDeath),JSON_NUMERIC_CHECK);
            echo $ret_; exit;
        } else {
            redirect('Home');
        }
    }
    public function rainfall(){
        $this->load->view('profile/rainfall');
    }
    
    public function drought(){
        $this->load->view('profile/drought');
    }

    public function DroughtBlockChart(){
        $districtId = $this->input->post('districtId',true);
        $year = $this->input->post('year',true);
        $dName = $this->Drought_profile_model->get_district_name($districtId);
        $DistrictWiseAffected = $this->Drought_profile_model->DistrictWiseAffected($districtId,$year);
        $ret_ = json_encode(array('dName'=>$dName,'drought_affected'=>$DistrictWiseAffected),JSON_NUMERIC_CHECK);
        echo $ret_; exit;
    }




    public function heatDeathRatePerEachYearByDistrict(){
        if(!empty($_POST)){
            $districtId = $this->input->post('districtId',true);
            // District Name - Sql
            
            $districtName = $this->ProfileModel->get_district_name($districtId);
            //pr($districtName[0]['district_name'],1); exit();
            $dName = $districtName[0]->district_name;
            // District Name - Sql 
            
            $yearWiseDeath = $this->ProfileModel->get_summary_district_year();
            $ret_ = json_encode(array('dName'=>$dName,'deathData'=>$yearWiseDeath),JSON_NUMERIC_CHECK);
            echo $ret_; exit;
        } else {
            redirect('Home');
        }
    }


    public function fetchDroughtAffected_data(){
        if(!empty($_POST)){
            $ret_ = $data = array();
            $event = $this->input->post('event',true);
            $year = $this->input->post('year',true);
            if($event == 'drought_affected' && $year != ''){
                $district_wise_data = $this->Drought_profile_model->fetch_district_wise_affected_data($year);
                #pr($district_wise_data);
                //$block_wise_data = $this->Drought_profile_model->fetch_block_wise_affected_data($year);
                //$year_wise_data = $this->Drought_profile_model->fetch_year_wise_affected_data();
                if(!empty($district_wise_data) /*&& !empty($block_wise_data)*/){
                    $data['district_wise_data'] = json_encode($district_wise_data,JSON_NUMERIC_CHECK);
                    //$data['block_wise_data'] = json_encode($block_wise_data,JSON_NUMERIC_CHECK);
                    $ret_ = array('result'=>true,'data'=>$data,'eventType'=>'drought_affected');
                } else {
                    $ret_ = array('result'=>false);
                }
            } else {
                $ret_ = array('result'=>false,'msg'=>'No data available as of now.');
            }
            echo json_encode($ret_); 
            exit();
        } else {
            redirect('Home');
        }
    }

    public function snakebite(){
        /*data['nodata'] = false;
        $data['impact_types'] = $this->Information_model->get_impact_type();
        if(!empty($_POST)){
            $data['impact']         = $this->db->escape_str($this->input->post('impact',true));
            $data['dataLevel']      = $this->input->post('data_level',true);
            $data['impact_name']    = $this->Information_model->get_impact_name($data['impact']);
        } else {
            $data['impact']         = 3;
            $data['impact_name']    = $this->Information_model->get_impact_name($data['impact']);
            $data['dataLevel']      = 'district';
        }
        if($data['impact'] == '3'){
            if($data['dataLevel'] == 'district'){
                $data['districtWiseDeath']  = $this->Information_model->impactsPerDistrict();
                $data['yearWiseDeath']      = $this->Information_model->impactsPerYear();
                $data['year_json_data'] = json_encode($data['yearWiseDeath']);
            } else {
                $data['nodata'] = true;
            }
        } else {
            $data['nodata'] = true;
        }
        $this->load->view('profile/snakebite',$data);*/

        $data['nodata'] = false;
        $no_error = false;
        $data['impact_name']  = $data['impact'] = $data['dataLevel']   = '';
        $data['impact_types'] = $this->Information_model->get_impact_type();
        $year = $this->input->post('year',true);
        if(!empty($_POST)){
            $this->form_validation->set_rules('impact','impact','trim|required|is_natural');
            $this->form_validation->set_rules('data_level','data level','trim|required|callback_valid_level');
            $this->form_validation->set_rules('year','year','trim|required');
            if ($this->form_validation->run() == FALSE) { 
                $no_error = false;
            } else {
                $no_error = true;
                $data['impact']         = $this->input->post('impact',true);
                $data['dataLevel']      = $this->input->post('data_level',true);
                $data['year']           = $this->input->post('year',true);
                $data['impact_name']    = $this->Information_model->get_impact_name($data['impact']);
            }
        } else {
            $no_error = true;
            $data['impact']         = 3;
            $data['impact_name']    = $this->Information_model->get_impact_name($data['impact']);
            $data['dataLevel']      = 'district';
        }
        if($no_error){
            if($data['impact'] == '3'){
                if($data['dataLevel'] == 'district'){
                    $data['districtWiseDeath']  = $this->Information_model->impactsPerDistrict($year);
                    $data['yearWiseDeath']      = $this->Information_model->impactsPerYear();
                    $data['year_json_data'] = json_encode($data['yearWiseDeath']);
                } else {
                    $data['nodata'] = true;
                }
            } else {
                $data['nodata'] = true;
            }        
        }else {
            $data['nodata'] = true;
        }
        $year_group_death_data = $this->Information_model->fetch_year_group_death_data();
        if(!empty($year_group_death_data)){
            $dist_death = $tot_death = array();
            $year_id = $year_group_death_data[0]['year'];
            $info = $this->Information_model->fetch_district_wise_lightning_death($year_id);
            if(!empty($info)){
                foreach($info as $key => $val){
                    array_push($dist_death,$val['district_name']);
                    array_push($tot_death,$val['deaths']);
                }
                if(!empty($dist_death)){
                    $data['dist_death'] = json_encode($dist_death);
                }
                if(!empty($tot_death)){
                    $data['tot_death'] = json_encode($tot_death,JSON_NUMERIC_CHECK);
                }
                $data['information_exit'] = true;
                $data['year_id'] = $year_id;
            }
        }
        $data['year_group_death_data']  = $year_group_death_data;
        $this->load->view('profile/snakebite',$data);

    }

    public function fetch_district_wise_death_ajax_snakebite(){
        $dist_death = $tot_death =  $data = array();
        $year_id = $this->input->post('year_id',true);
        $info = $this->Information_model->fetch_district_wise_lightning_death($year_id);
        //pr($info);
        if(!empty($info)){
            foreach($info as $key => $val){
                array_push($dist_death,$val['district_name']);
                array_push($tot_death,$val['deaths']);
            }
            if(!empty($dist_death)){
                $data['dist_death'] = json_encode($dist_death);
            }
            if(!empty($tot_death)){
                $data['tot_death'] = json_encode($tot_death,JSON_NUMERIC_CHECK);
            }
            $data['information_exit'] = true;
        }
        echo json_encode(array('data'=>$data));
    }

    public function deathratepereachYearByDist(){
        if(!empty($_POST)){
            $districtId = $this->input->post('districtId',true);

            $dName = $this->Information_model->get_district_name($districtId);
            $yearWiseDeath = $this->Information_model->impactsPerYearAgainestADistrict($districtId);

            $ret_ = json_encode(array('dName'=>$dName,'deathData'=>$yearWiseDeath),JSON_NUMERIC_CHECK);

            echo $ret_; exit;
        } else {
            redirect('Home');
        }
    }
    
}
