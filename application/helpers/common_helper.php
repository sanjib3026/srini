<?php
/**
* Displays the pre-formatted array 
* @param mix $mix_arr
* @param int $i_then_exit
* @return void
*/
function pr($mix_arr = array(), $i_then_exit = 0)
{
	try
    {
     	echo '<pre>';
		print_r($mix_arr);
		echo '</pre>';
		unset($mix_arr);
		if($i_then_exit)
		{
			exit();
		}
    }
    catch(Exception $err_obj)
    {
        show_error($err_obj->getMessage());
    }
}
/**
* Displays the pre-formatted array with array element type
* @param mix $mix_arr
* @param int $i_then_exit
* @return void
*/
function vr($mix_arr = array(), $i_then_exit = 0)
{
	try
    {
     	echo '<pre>';
		var_dump($mix_arr);
		echo '</pre>';
		unset($mix_arr);
		if($i_then_exit)
		{
			exit();
		}
    }
    catch(Exception $err_obj)
    {
        show_error($err_obj->getMessage());
    }
}
/**
* Get the districts as option value for a select statement
* @param $s_id for selecting the id
* @return list of district name
*/
if ( ! function_exists('getOptionDistricts')){
	function getOptionDistricts($s_id = 0){
	    $CI =  &get_instance();
	    $opt = '';
	    $sql = "SELECT id,district_name FROM  districts_s WHERE id > 0 ";
	    $res_obj = $CI->db->query($sql);
	    $res = $res_obj->result_array();
	    for($i = 0; $i<count($res); $i++) {
	        $selected = $s_id == $res[$i]['id'] ? 'selected="selected"' : '';
	        $opt .= '<option value="'.$res[$i]['id'].'" '.$selected.'>'.ucfirst(strtolower($res[$i]['district_name'])).'</option>';
	    }
	    unset($CI, $res, $selected);
	    return $opt;
	}
}

/**
* Get the districts as option value for a select statement
* @param $s_id for selecting the id
* @return list of district name
*/
if ( ! function_exists('getOptionDistrictsDrought')){
	function getOptionDistrictsDrought($s_id = null){
	    $CI =  &get_instance();
	    
	    	$opt = '<option value="">All District</option>';
	    
	    
	    $sql = "SELECT id,district_name FROM  districts_s WHERE id > 0 ";
	    $res_obj = $CI->db->query($sql);
	    $res = $res_obj->result_array();
	    for($i = 0; $i<count($res); $i++) {
	        $selected = $s_id == $res[$i]['id'] ? 'selected="selected"' : '';
	        $opt .= '<option value="'.$res[$i]['id'].'" '.$selected.'>'.ucfirst(strtolower($res[$i]['district_name'])).'</option>';
	    }
	    unset($CI, $res, $selected);
	    return $opt;
	}
}

/**
* Get the districts as option value for a select statement
* @param $s_ids_add for selecting the id
* @return list of district name
*/
if ( ! function_exists('getOptionDistrictsMultiple')){
	function getOptionDistrictsMultiple($s_ids_add){
	    $CI =  &get_instance();
	    $opt = '';
	    $sql = "SELECT id,district_name FROM  districts_s WHERE id > 0 ";
	    $res_obj = $CI->db->query($sql);
	    $res = $res_obj->result_array();
	    for($i = 0; $i<count($res); $i++) {
	    	if(!empty($s_ids_add)){
		    	foreach ($s_ids_add as $key => $value) {
		    		if($value == $res[$i]['id']){
		    			$selected = 'selected="selected"';
		    			$opt .= '<option value="'.$res[$i]['id'].'" '.$selected.'>'.ucfirst(strtolower($res[$i]['district_name'])).'</option>';
		    		} else {
		    			$opt .= '<option value="'.$res[$i]['id'].'" >'.ucfirst(strtolower($res[$i]['district_name'])).'</option>';
		    		}
		    	}
		    } else {
		    	$opt .= '<option value="'.$res[$i]['id'].'" >'.ucfirst(strtolower($res[$i]['district_name'])).'</option>';
		    }
	    }
	    unset($CI, $res, $selected);
	    return $opt;
	}
}
	
# ===============================================================================
#           BLOCK FUNCTION(S) - START
# ===============================================================================
if ( ! function_exists('getOptionBlock')){
	function getOptionBlock($mix_where = '', $s_id = ''){
		$CI = &get_instance();
		$cond = (trim($mix_where)) ? "WHERE id!=0 AND ".$mix_where : ' WHERE id!=0';
		$res = $CI->db->query("select id, blk_name from block_s {$cond} GROUP BY id,blk_name");	
		//echo $CI->db->last_query();
		$mix_value = $res->result_array();
		//$s_option = '<option value="">Select Block</option>';
		$s_option = '';
		if($mix_value)
		{
			foreach ($mix_value as $val)
			{
				$s_select = '';
				if($val["id"] == $s_id)
					$s_select = " selected ";
				$s_option .= "<option $s_select value='".$val["id"]."' >".ucfirst(strtolower($val["blk_name"]))."</option>";
			}
		}
		unset($res, $mix_value, $s_select, $mix_where, $s_id);
		return $s_option;
		
	}
}

if ( ! function_exists('getOptionBlockAll')){
	function getOptionBlockAll($mix_where = '', $s_id = ''){
		$CI = &get_instance();
		$cond = (trim($mix_where)) ? "WHERE id!=0 AND ".$mix_where : ' WHERE id!=0';
		$res = $CI->db->query("select id, blk_name from block_s {$cond} GROUP BY id,blk_name");	
		//echo $CI->db->last_query();
		$mix_value = $res->result_array();
		$s_option = '<option value="">All</option>';
		if($mix_value)
		{
			foreach ($mix_value as $val)
			{
				$s_select = '';
				if($val["id"] == $s_id)
					$s_select = " selected ";
				$s_option .= "<option $s_select value='".$val["id"]."' >".ucwords(strtolower($val["blk_name"]))."</option>";
			}
		}
		unset($res, $mix_value, $s_select, $mix_where, $s_id);
		return $s_option;
		
	}
}

if ( ! function_exists('getOptionBlockAllOption')){
	function getOptionBlockAllOption($mix_where = '', $s_id = ''){
		$CI = &get_instance();
		$cond = (trim($mix_where)) ? "WHERE id!=0 AND ".$mix_where : ' WHERE id!=0';
		$res = $CI->db->query("select id, block_name from blocks_with_all {$cond} GROUP BY id,block_name");	
		//echo $CI->db->last_query();
		$mix_value = $res->result_array();
		$s_option = '<option value="">Select Block</option>';
		if($mix_value)
		{
			foreach ($mix_value as $val)
			{
				$s_select = '';
				if($val["id"] == $s_id)
					$s_select = " selected ";
				$s_option .= "<option $s_select value='".$val["id"]."' >".ucwords(strtolower($val["block_name"]))."</option>";
			}
		}
		unset($res, $mix_value, $s_select, $mix_where, $s_id);
		return $s_option;
		
	}
}
// Get all blocks
if ( ! function_exists('get_all_blocks')){
	function get_all_blocks(){
	    $CI =  &get_instance();
	    $opt = '';
	    $sql = "SELECT block_s.id FROM block_s WHERE id > 0";
	    $res_obj = $CI->db->query($sql);
	    $res = $res_obj->result_array();
	    $result = $res;
	    unset($CI, $res);
	    return $result;
	}
}
# ===============================================================================
#           BLOCK FUNCTION(S) - END
# ===============================================================================

if ( ! function_exists('getDistrictListForAlertSystem')){
	function getDistrictListForAlertSystem(){
	    $CI =  &get_instance();
	    $opt = '';
	    $sql = "SELECT id,district_name FROM districts_s WHERE id > 0 ";
	    $res_obj = $CI->db->query($sql);
	    $res = $res_obj->result_array();
	    for($i = 0; $i<count($res); $i++) {
	    	$opt .= '<input type="checkbox" name="districts_selected[]" value="'.$res[$i]['id'].'">&nbsp;'.$res[$i]['district_name'].'<br/>';
	        //$selected = $s_id == $res[$i]['id'] ? 'selected="selected"' : '';
	        //$opt .= '<option value="'.$res[$i]['id'].'" '.$selected.'>'.$res[$i]['district_name'].'</option>';
	    }
	    unset($CI, $res, $selected);
	    return $opt;
	}
}

if ( ! function_exists('getUseRoleListForAlertSystem')){
	function getUseRoleListForAlertSystem(){
	    $CI =  &get_instance();
	    $opt = '';
	    $sql = "SELECT role_id,role_name FROM role WHERE role_id > 0 ";
	    $res_obj = $CI->db->query($sql);
	    $res = $res_obj->result_array();
	    for($i = 0; $i<count($res); $i++) {
	    	$opt .= '<input type="checkbox" name="user_type_selected[]" value="'.$res[$i]['role_id'].'">&nbsp;'.$res[$i]['role_name'].'<br/>';
	    }
	    unset($CI, $res, $selected);
	    return $opt;
	}
}

// Get District name 
if ( ! function_exists('getDistrictNameDROUGHT')){
	function getDistrictNameDROUGHT($dis_ids){
		$dis_names = '';
	    $CI =  &get_instance();
	    $opt = '';
	    $sql = "SELECT district_name FROM districts_s WHERE id ='".$dis_ids."'";
	    $res_obj = $CI->db->query($sql);
	    $res = $res_obj->row_array();
	    
	    $dis_names .= ucfirst(strtolower($res['district_name']));
	    unset($CI, $res, $selected);
	    return $dis_names;
	}
}

// Get District ID 
if ( ! function_exists('getDistrictID')){
	function getDistrictID($dis_name){
		$dis_names = '';
	    $CI =  &get_instance();
	    $opt = '';
	    $sql = "SELECT id FROM districts_s WHERE district_name LIKE '".$dis_name."' ";
	    $res_obj = $CI->db->query($sql);
	    $res = $res_obj->row_array();
	    return $res['id'];
	}
}

// Get BLock ID 
if ( ! function_exists('getBlockID')){
	function getBlockID($blk_name){
		$dis_names = '';
	    $CI =  &get_instance();
	    $opt = '';
	    $sql = "SELECT id FROM block_s WHERE blk_name LIKE '".$blk_name."' ";
	    $res_obj = $CI->db->query($sql);
	    $res = $res_obj->row_array();
	    return $res['id'];
	}
}

// Get District name 
if ( ! function_exists('getDistrictName')){
	function getDistrictName($dis_ids){
		$dis_names = '';
	    $CI =  &get_instance();
	    $opt = '';
	    $sql = "SELECT district_name FROM districts_s WHERE id IN(".$dis_ids.") ";
	    $res_obj = $CI->db->query($sql);
	    $res = $res_obj->result_array();
	    $tot = count($res);
	    $addAndPos = $tot - 2;
	    for($i = 0; $i<count($res); $i++) {
	    	if($i == $addAndPos){
	    		$dis_names .= ucfirst(strtolower($res[$i]['district_name'])).' and ';
	    	} else {
	    		$dis_names .= ucfirst(strtolower($res[$i]['district_name'])).', ';
	    	}
	    }
	    $dis_names = rtrim($dis_names,', ');
	    unset($CI, $res, $selected);
	    return $dis_names;
	}
}
// Get District name 
if ( ! function_exists('getIntensityName')){
	function getIntensityName($intensity){
		if($intensity == 1){
			return 'Low';
		} else if($intensity == 2){
			return 'Moderate';
		} else if($intensity == 3){
			return 'Strong';
		} else {
			return ;
		}
	}
}
if ( ! function_exists('getAdvisoryTime')){
	function getAdvisoryTime($s_id = 0){
	    $CI =  &get_instance();
	    $opt = '';
	    $sql = "SELECT id,time FROM timeadvisory WHERE id > 0 ";
	    $res_obj = $CI->db->query($sql);
	    $res = $res_obj->result_array();
	    for($i = 0; $i<count($res); $i++) {
	        $selected = $s_id == $res[$i]['id'] ? 'selected="selected"' : '';
	        $opt .= '<option value="'.$res[$i]['id'].'" '.$selected.'>'.$res[$i]['time'].'</option>';
	    }
	    unset($CI, $res, $selected);
	    return $opt;
	}
}

if ( ! function_exists('getUserRole')){
	function getUserRole($s_id = 0){
	    $CI =  &get_instance();
	    $opt = '';
	    $sql = "SELECT role_id,role_name FROM  role WHERE role_id > 0 ";
	    $res_obj = $CI->db->query($sql);
	    $res = $res_obj->result_array();
	    for($i = 0; $i<count($res); $i++) {
	        $selected = $s_id == $res[$i]['role_id'] ? 'selected="selected"' : '';
	        $opt .= '<option value="'.$res[$i]['role_id'].'" '.$selected.'>'.$res[$i]['role_name'].'</option>';
	    }
	    unset($CI, $res, $selected);
	    return $opt;
	}
}
if ( ! function_exists('district_name')){
	function district_name($s_id){
	    $CI =  &get_instance();
	    $opt = '';
	    $sql = "SELECT district_name FROM districts_s WHERE id =".$s_id;
	    $res_obj = $CI->db->query($sql);
	    $res = $res_obj->result_array();
	    $result = $res[0];
	    unset($CI, $res, $selected);
	    return ucfirst(strtolower($result['district_name']));
	}
}

if ( ! function_exists('block_name')){
	function block_name($s_id){
	    $CI =  &get_instance();
	    $opt = '';
	    $sql = "SELECT blk_name FROM block_s WHERE id =".$s_id;
	    $res_obj = $CI->db->query($sql);
	    $res = $res_obj->result_array();
	    $result = $res[0];
	    unset($CI, $res, $selected);
	    return ucfirst(strtolower($result['blk_name']));
	}
}

// Send SMS by using Clickatell API
if ( ! function_exists('sendSMSByClickatell')){
	function sendSMSByClickatell($message,$numbers){
	    $username = urlencode(CLICKATEL_UN);
		$password = urlencode(CLICKATEL_PWD);
		$api_id = urlencode(CLICKATEL_APPID);
		$to = urlencode($numbers);
		$message = urlencode($message);		
		$res = file_get_contents("https://api.clickatell.com/http/sendmsg?user=$username&password=$password&api_id=$api_id&to=$to&text=$message");
		return $res;
	}
}

// Send SMS by using MSG91 API
if ( ! function_exists('sendSMSByMsg91')){
	function sendSMSByMsg91($postData){
		//API URL
		$url="http://api.msg91.com/api/sendhttp.php";
		// init the resource
		$ch = curl_init();
		curl_setopt_array($ch, array(
		    CURLOPT_URL => $url,
		    CURLOPT_RETURNTRANSFER => true,
		    CURLOPT_POST => true,
		    CURLOPT_POSTFIELDS => $postData
		    //,CURLOPT_FOLLOWLOCATION => true
		));

		//Ignore SSL certificate verification
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
		//get response
		$output = curl_exec($ch);

		//Print error if any
		if(curl_errno($ch))
		{
		    //echo 'error:' . curl_error($ch);
		    return curl_error($ch);
		}
		curl_close($ch);
		return $output;
	}
}

function url_get_contents($url, $useragent='cURL', $headers=false, $follow_redirects=true, $debug=false) {

    // initialise the CURL library
    $ch = curl_init();

    // specify the URL to be retrieved
    curl_setopt($ch, CURLOPT_URL,$url);

    // we want to get the contents of the URL and store it in a variable
    curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);

    // specify the useragent: this is a required courtesy to site owners
    curl_setopt($ch, CURLOPT_USERAGENT, $useragent);

    // ignore SSL errors
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

    // return headers as requested
    if ($headers==true){
        curl_setopt($ch, CURLOPT_HEADER,1);
    }

    // only return headers
    if ($headers=='headers only') {
        curl_setopt($ch, CURLOPT_NOBODY ,1);
    }

    // follow redirects - note this is disabled by default in most PHP installs from 4.4.4 up
    if ($follow_redirects==true) {
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1); 
    }

    // if debugging, return an array with CURL's debug info and the URL contents
    if ($debug==true) {
        $result['contents']=curl_exec($ch);
        $result['info']=curl_getinfo($ch);
    }

    // otherwise just return the contents as a variable
    else $result=curl_exec($ch);

    // free resources
    curl_close($ch);

    // send back the data
    return $result;
}

if (!function_exists('array_group_by')) {
	function array_group_by(array $array, $key)
	{
		if (!is_string($key) && !is_int($key) && !is_float($key) && !is_callable($key) ) {
			trigger_error('array_group_by(): The key should be a string, an integer, or a callback', E_USER_ERROR);
			return null;
		}
		$func = (!is_string($key) && is_callable($key) ? $key : null);
		$_key = $key;
		// Load the new array, splitting by the target key
		$grouped = [];
		foreach ($array as $value) {
			$key = null;
			if (is_callable($func)) {
				$key = call_user_func($func, $value);
			} elseif (is_object($value) && property_exists($value, $_key)) {
				$key = $value->{$_key};
			} elseif (isset($value[$_key])) {
				$key = $value[$_key];
			}
			if ($key === null) {
				continue;
			}
			$grouped[$key][] = $value;
		}
		// Recursively build a nested grouping if more parameters are supplied
		// Each grouped array value is grouped according to the next sequential key
		if (func_num_args() > 2) {
			$args = func_get_args();
			foreach ($grouped as $key => $value) {
				$params = array_merge([ $value ], array_slice($args, 2, func_num_args()));
				$grouped[$key] = call_user_func_array('array_group_by', $params);
			}
		}
		return $grouped;
	}
}

if ( ! function_exists('getFinancialYearDropdown')){
	function getFinancialYearDropdown($s_year = 0){
	    $CI =  &get_instance();
	    $opt = '';
	    $dates = range('2005', date('Y'));
	    $opt = '<option value="all">All</option>';
	    foreach($dates as $date){
		    if (date('m', strtotime($date)) <= 6) {//Upto June
		    	$last_year = ($date - 1);
		    	$this_year = $date;
		        $year = $last_year . '-' . $this_year;
		    } else {//After June
		        $next_year = $date +1;
		        $year = $date . '-' .  $next_year;
		    }
		    $selected = $s_year == $year ? 'selected="selected"' : '';
		    $opt .= '<option value="'.$year.'" '.$selected.'>'.$year.'</option>';
		}
	    unset($selected);
	    return $opt;
	}
}

if ( ! function_exists('getYearDropdown')){
	function getYearDropdown($currently_selected = 0){
	    $opt = '';
	    $earliest_year = 1960;
	    $latest_year = date('Y'); 
	    foreach ( range( $latest_year, $earliest_year ) as $i ) {
			$opt .= '<option value="'.$i.'"'.($i == $currently_selected ? ' selected="selected"' : '').'>'.$i.'</option>';
		}
	    unset($selected);
	    return $opt;
	}
}

if ( ! function_exists('getMultiYearDropdown')){
	function getMultiYearDropdown($start_year= 1960,$currently_selected = 0){
		pr($currently_selected);
	    $opt = '';
	    $earliest_year = $start_year;
	    $latest_year = date('Y'); 
	    foreach ( range( $latest_year, $earliest_year ) as $i ) {
			$opt .= '<option value="'.$i.'"'.(in_array( $i, $currently_selected ) ? ' selected="selected"' : '').'>'.$i.'</option>';
		}
	    unset($selected);
	    return $opt;
	}
}

if ( ! function_exists('getAczDropdown')){
	function getAczDropdown($s_id = 0){
	    $CI =  &get_instance();
	    $opt = '';
	    $sql = "SELECT id,climate_zone FROM agro_climate_zone WHERE id > 0 ";
	    $res_obj = $CI->db->query($sql);
	    $res = $res_obj->result_array();
	    for($i = 0; $i<count($res); $i++) {
	    	$selected = $s_id == $res[$i]['id'] ? 'selected="selected"' : '';
	        $opt .= '<option value="'.$res[$i]['id'].'" '.$selected.'>'.$res[$i]['climate_zone'].'</option>';
	    }
	    unset($CI, $res, $selected);
	    return $opt;
	}
}

/**
* Get the districts as option value for a select statement
* @param $s_id for selecting the id
* @return list of paddy and non-paddy name
*/
if ( ! function_exists('getOptionPaddyNames')){
	function getOptionPaddyNames($s_id = 0){
	    $CI =  &get_instance();
	    $opt = '';
	    $sql = "SELECT id,paddy_name FROM  drought_paddy_non_paddy_list WHERE id > 0 ";
	    $res_obj = $CI->db->query($sql);
	    $res = $res_obj->result_array();
	    for($i = 0; $i<count($res); $i++) {
	        $selected = $s_id == $res[$i]['id'] ? 'selected="selected"' : '';
	        $opt .= '<option value="'.$res[$i]['id'].'" '.$selected.'>'.$res[$i]['paddy_name'].'</option>';
	    }
	    unset($CI, $res, $selected);
	    return $opt;
	}
}

if ( ! function_exists('getIrrigationSourceDropdown')){
	function getIrrigationSourceDropdown($s_id = 0){
	    $CI =  &get_instance();
	    $opt = '';
	    $sql = "SELECT id,source_name FROM drought_irrigation_source_info WHERE id > 0 ";
	    $res_obj = $CI->db->query($sql);
	    $res = $res_obj->result_array();
	    for($i = 0; $i<count($res); $i++) {
	    	$selected = $s_id == $res[$i]['id'] ? 'selected="selected"' : '';
	        $opt .= '<option value="'.$res[$i]['id'].'" '.$selected.'>'.$res[$i]['source_name'].'</option>';
	    }
	    unset($CI, $res, $selected);
	    return $opt;
	}
}


if ( ! function_exists('get_irrigation_source_name')){
	function get_irrigation_source_name($s_id){
	    $CI =  &get_instance();
	    $opt = '';
	    $sql = "SELECT source_name FROM drought_irrigation_source_info WHERE id =".$s_id;
	    $res_obj = $CI->db->query($sql);
	    $res = $res_obj->result_array();
	    $result = $res[0];
	    unset($CI, $res, $selected);
	    return $result['source_name'];
	}
}

if ( ! function_exists('getFinancialYearWithNormalBreakupDropdown')){
	function getFinancialYearWithNormalBreakupDropdown($s_year = 0){
	    $CI =  &get_instance();
	    $opt = '';
	    $dates = range('2009', date('Y'));
	    foreach($dates as $date){
		    if (date('m', strtotime($date)) <= 6) {//Upto June
		    	if($date < '2012'){
		    		$last_year = ($date);
		    		$this_year = $date + 1;
		    		$year = $last_year . '-' . $this_year;
		    	} else {
		    		$year = $date + 1;
		    	}
		    } else {//After June
		        $next_year = $date +1;
		        if($next_year <= '2012'){
		        	$year = $date . '-' . substr( $next_year, -2);
		        } else {
		        	$year = $next_year;
		        }
		    }
		    $selected = $s_year == $year ? 'selected="selected"' : '';
		    $opt .= '<option value="'.$year.'" '.$selected.'>'.$year.'</option>';
		}
	    unset($selected);
	    return $opt;
	}
}

if(!function_exists('getCropNameWithSeason')){
	function getCropNameWithSeason($crop_id){
		$CI =  &get_instance();
	    $opt = '';
	    $sql = "SELECT crop_name,crop_season FROM drought_crop_details WHERE id =".$crop_id;
	    $res_obj = $CI->db->query($sql);
	    $res = $res_obj->row_array();
	    $result = $res;
	    unset($CI, $res, $selected);
	    return $result['crop_name'].'-'.$result['crop_season'];
	}
}

# ===============================================================================
#           Crop FUNCTION(S) - START
# ===============================================================================
if ( ! function_exists('getOptionCrop')){
	function getOptionCrop($mix_where = '', $s_id = ''){
		$CI = &get_instance();
		$cond = (trim($mix_where)) ? "WHERE id!=0 AND ".$mix_where : ' WHERE id!=0';
		$res = $CI->db->query("select id,crop_name,crop_season from drought_crop_details {$cond} ");	
		$mix_value = $res->result_array();
		$s_option = '';
		if($mix_value)
		{
			$s_ids = explode(',', $s_id);
			foreach ($mix_value as $val)
			{
				$s_select = '';
				$s_select = (in_array($val["id"], $s_ids) ) ? " selected" : "";
				$s_option .= "<option $s_select value='".$val["id"]."' >".$val['crop_name'].'-'.$val['crop_season']."</option>";
			}
		}
		unset($res, $mix_value, $s_select, $mix_where, $s_id);
		return $s_option;
		
	}
}

# ===============================================================================
#           Crop Growth Stage FUNCTION(S) - START
# ===============================================================================
if ( ! function_exists('getOptionCropGrowthStage')){
	function getOptionCropGrowthStage($mix_where = '', $s_id = ''){
		pr($mix_where);
		pr($s_id);
		$CI = &get_instance();
		$cond = (trim($mix_where)) ? "WHERE id!=0 AND ".$mix_where : ' WHERE id!=0';
		$res = $CI->db->query("select id,gs_name from drought_crop_growth_stage {$cond} ");	
		$mix_value = $res->result_array();
		pr($CI->db->last_query());
		$s_option = '';
		if($mix_value)
		{
			$s_ids = explode(',', $s_id);
			foreach ($mix_value as $val)
			{
				$s_select = '';
				$s_select = (in_array($val["id"], $s_ids) ) ? " selected" : "";
				$s_option .= "<option $s_select value='".$val["id"]."' >".$val['gs_name']."</option>";
			}
		}
		unset($res, $mix_value, $s_select, $mix_where, $s_id);
		return $s_option;
		
	}
}


// Get District name 
if ( ! function_exists('getCropGrowthStageNames')){
	function getCropGrowthStageNames($ids){
		$gs_names = '';
	    $CI =  &get_instance();
	    $opt = '';
	    $sql = "SELECT gs_name FROM drought_crop_growth_stage WHERE id IN(".$ids.") ";
	    $res_obj = $CI->db->query($sql);
	    $res = $res_obj->result_array();
	    $tot = count($res);
	    $addAndPos = $tot - 2;
	    for($i = 0; $i<count($res); $i++) {
	    	if($i == $addAndPos){
	    		$gs_names .= $res[$i]['gs_name'].' and ';
	    	} else {
	    		$gs_names .= $res[$i]['gs_name'].', ';
	    	}
	    }
	    $gs_names = rtrim($gs_names,', ');
	    unset($CI, $res, $selected);
	    return $gs_names;
	}
}

if ( ! function_exists('getMonthDropdown')){
	function getMonthDropdown($s_month = 0){
	    $CI =  &get_instance();
	    $opt = '';
	    $jan_sel = $feb_sel = $mar_sel = $apr_sel = $may_sel = $june_sel = $july_sel = $aug_sel = $sep_sel = $oct_sel = $nov_sel = $dec_sel = '';
	    if($s_month == 1){
	    	$jan_sel = 'selected="selected"';
	    } else if($s_month == 2) {
	    	$feb_sel = 'selected="selected"';
	    } else if($s_month == 3) {
	    	$mar_sel = 'selected="selected"';
	    } else if($s_month == 4) {
	    	$apr_sel = 'selected="selected"';
	    } else if($s_month == 5) {
	    	$may_sel = 'selected="selected"';
	    } else if($s_month == 6) {
	    	$june_sel = 'selected="selected"';
	    } else if($s_month == 7) {
	    	$july_sel = 'selected="selected"';
	    } else if($s_month == 8) {
	    	$aug_sel = 'selected="selected"';
	    } else if($s_month == 9) {
	    	$sep_sel = 'selected="selected"';
	    } else if($s_month == 10) {
	    	$oct_sel = 'selected="selected"';
	    } else if($s_month == 11) {
	    	$nov_sel = 'selected="selected"';
	    } else if($s_month == 12) {
	    	$dec_sel = 'selected="selected"';
	    }
	    $opt .= '<option value=""> Select</option> <option value="1" '.$jan_sel.' > January </option><option value="2" '.$feb_sel.'> February </option><option value="3" '.$mar_sel.'> March </option><option value="4" '.$apr_sel.'> April </option><option value="5" '.$may_sel.'> May </option><option value="6" '.$june_sel.'> June </option><option value="7" '.$july_sel.'> July </option><option value="8" '.$aug_sel.'> August </option><option value="9" '.$sep_sel.'> September </option><option value="10" '.$oct_sel.'> October </option><option value="11" '.$nov_sel.'> November </option><option value="12" '.$dec_sel.'> December </option>';
		
	    unset($selected);
	    return $opt;
	}
}

if ( ! function_exists('getMonthDropdownRoadAccident')){
	function getMonthDropdownRoadAccident($s_month){
		pr($s_month);
	    $CI =  &get_instance();
	    $opt = '';
	    $jan_sel = $feb_sel = $mar_sel = $apr_sel = $may_sel = $june_sel = $july_sel = $aug_sel = $sep_sel = $oct_sel = $nov_sel = $dec_sel = '';
	    if(in_array(1, $s_month) ){
	    	$jan_sel = 'selected="selected"';
	    } 
	    if(in_array(2, $s_month) ){
	    	$feb_sel = 'selected="selected"';
	    }  
	    if(in_array(3, $s_month) ) {
	    	$mar_sel = 'selected="selected"';
	    }  
	    if(in_array(4, $s_month) ) {
	    	$apr_sel = 'selected="selected"';
	    }  
	    if(in_array(5, $s_month) ) {
	    	$may_sel = 'selected="selected"';
	    }  
	    if(in_array(6, $s_month) ) {
	    	$june_sel = 'selected="selected"';
	    }  
	    if(in_array(7, $s_month) ) {
	    	$july_sel = 'selected="selected"';
	    }  
	    if(in_array(8, $s_month) ) {
	    	$aug_sel = 'selected="selected"';
	    }  
	    if(in_array(9, $s_month) ) {
	    	$sep_sel = 'selected="selected"';
	    }  
	    if(in_array(10, $s_month) ) {
	    	$oct_sel = 'selected="selected"';
	    }  
	    if(in_array(11, $s_month) ) {
	    	$nov_sel = 'selected="selected"';
	    }  
	    if(in_array(12, $s_month) ) {
	    	$dec_sel = 'selected="selected"';
	    }
	    $opt .= '<option value="1" '.$jan_sel.' > January </option><option value="2" '.$feb_sel.'> February </option><option value="3" '.$mar_sel.'> March </option><option value="4" '.$apr_sel.'> April </option><option value="5" '.$may_sel.'> May </option><option value="6" '.$june_sel.'> June </option><option value="7" '.$july_sel.'> July </option><option value="8" '.$aug_sel.'> August </option><option value="9" '.$sep_sel.'> September </option><option value="10" '.$oct_sel.'> October </option><option value="11" '.$nov_sel.'> November </option><option value="12" '.$dec_sel.'> December </option>';
		
	    unset($selected);
	    return $opt;
	}
}



if ( ! function_exists('getFeedbackInfo')){
	function getFeedbackInfo(){
	    $CI =  &get_instance();
	    $output = '';
	    
	    $qry = "SELECT U.full_name,F.district_name,F.block_name,F.feedback_content ,F.date,F.field FROM feedback_tb AS F 
	    		LEFT JOIN users as U ON U.id = F.user_id ";
	    $res = $CI->db->query($qry);	
		$output = $res->result_array();
	    return $output;
	}
}

if( ! function_exists('getDateDropdownForPest')){
	function getDateDropdownForPest($mix_where = '', $s_date = ''){
		
    	$CI =  &get_instance();
	    $opt = '';
	    $selected = '';
	    $cond = (trim($mix_where)) ? "WHERE id>0 AND ".$mix_where : ' WHERE id>0';
	    $sql = "SELECT id,start_date,end_date FROM drought_pest_info {$cond} GROUP BY start_date,end_date ORDER BY start_date";
	    $res_obj = $CI->db->query($sql);
	    $res = $res_obj->result_array();
	    for($i = 0; $i<count($res); $i++) {
	    	
	    	if($res[$i]['id'] == $s_date){
	    		$selected = 'selected="selected"';	
	    	} else {
    			$selected = '';
    		}
	     
	        $opt .= '<option value="'.$res[$i]['id'].'" '.$selected.'>'.date('d/m/Y',strtotime($res[$i]['start_date'])).' - '.date('d/m/Y',strtotime($res[$i]['end_date'])).'</option>';
	    }
	    unset($CI, $res, $selected);
	    return $opt;


	}
}

/**
* Get the districts as option value for a select statement
* @param $s_id for selecting the id
* @return list of week name
*/
if ( ! function_exists('getOptionWeeks')){
	function getOptionWeeks($s_id = 0){
	    $CI =  &get_instance();
	    $opt = '';
	    $sql = "SELECT id,week_name FROM  week_tb WHERE id > 0 ";
	    $res_obj = $CI->db->query($sql);
	    $res = $res_obj->result_array();
	    for($i = 0; $i<count($res); $i++) {
	        $selected = $s_id == $res[$i]['id'] ? 'selected="selected"' : '';
	        $opt .= '<option value="'.$res[$i]['id'].'" '.$selected.'>'.$res[$i]['week_name'].'</option>';
	    }
	    unset($CI, $res, $selected);
	    return $opt;
	}
}

/**
* Convert English numbers to Oriya
* @param English number
* @return Oriya number
*/
if ( ! function_exists('convertEnglishtoOriya')){
	function convertEnglishtoOriya($en_number){
	    $CI =  &get_instance();
	    $opt = '';
	    $sql = "SELECT or_num FROM  oriya_numbers WHERE en_num = '".$en_number."'";
	    $res_obj = $CI->db->query($sql);
	    $result = $res_obj->row_array();
	    unset($CI, $res);
	    return $result['or_num'];
	}
}
if ( ! function_exists('readEachDigit')){
	function readEachDigit($number){
		$num = '';
		for ($i = 0; $i < strlen($number); $i++){ 
        	$num .= convertEnglishtoOriya($number[$i]);
    	}
    	return $num;
	}
}
if ( ! function_exists('getOriyaNumber')){
	function getOriyaNumber($date = '',$number= ''){
		$first = $second = $third = $converted_text = '';
		if($date !== ''){
			if(strpos($date,"-") !== false){
		    	$date_arr = explode('-',$date);
		    	$first = readEachDigit($date_arr[0]);
		    	$second = readEachDigit($date_arr[1]);
		    	$third = readEachDigit($date_arr[2]);
		    	$converted_text = $first .'-'.$second.'-'.$third;
		    } else if(strpos($date,"/") !== false){
		    	$date_arr = explode('/',$date);
		    	$first = readEachDigit($date_arr[0]);
		    	$second = readEachDigit($date_arr[1]);
		    	$third = readEachDigit($date_arr[2]);
		    	$converted_text = $first .'/'.$second.'/'.$third;
		    }
		} else if($number !== ''){
			if(strpos($number,".") !== false ) {
				$number_arr = explode('.',$number);
			    $first = readEachDigit($number_arr[0]);
			    $second = readEachDigit($number_arr[1]);
			    $converted_text = $first.'.'.$second;
			} else {
				$converted_text = readEachDigit($number);
			}
		}
	    return $converted_text;
	}
}

// SPI Overview Related Functions
if ( ! function_exists('getYearDropdownSPI')){
	function getYearDropdownSPI($currently_selected = 0){
	    $opt = '';
	    $earliest_year = 2020;
	    $latest_year = date('Y'); 
	    foreach ( range( $latest_year, $earliest_year ) as $i ) {
			$opt .= '<option value="'.$i.'"'.($i == $currently_selected ? ' selected="selected"' : '').'>'.$i.'</option>';
		}
	    unset($selected);
	    return $opt;
	}
}

if( ! function_exists('getDateDropdownForSPI')){
	function getDateDropdownForSPI($mix_where = '', $s_date = ''){
		$CI =  &get_instance();
	    $opt = '';
	    $selected = '';
	    $cond = (trim($mix_where)) ? "WHERE id>0 AND ".$mix_where : ' WHERE id>0';
	    $sql = "SELECT id,start_date,end_date FROM drought_district_spi_data {$cond} GROUP BY start_date,end_date ORDER BY start_date";
	    $res_obj = $CI->db->query($sql);
	    $res = $res_obj->result_array();
	    for($i = 0; $i<count($res); $i++) {
	    	if($res[$i]['id'] == $s_date){
	    		$selected = 'selected="selected"';	
	    	} else {
    			$selected = '';
    		}
	        $opt .= '<option value="'.$res[$i]['id'].'" '.$selected.'>'.date('d/m/Y',strtotime($res[$i]['start_date'])).' - '.date('d/m/Y',strtotime($res[$i]['end_date'])).'</option>';
	    }
	    unset($CI, $res, $selected);
	    return $opt;
	}
}

if( ! function_exists('getIMD_Dist_List')){
	function getIMD_Dist_List($s_imd_id = 0){
	    $CI =  &get_instance();
	    $opt = '<option value="">Select District</option>';
	    $sql = "SELECT imd_id,district_name FROM districts_s WHERE imd_id > 0 ";
	    $res_obj = $CI->db->query($sql);
	    $res = $res_obj->result_array();
	    for($i = 0; $i<count($res); $i++) {
	        $selected = $s_imd_id == $res[$i]['imd_id'] ? 'selected="selected"' : '';
	        $opt .= '<option value="'.$res[$i]['imd_id'].'" '.$selected.'>'.ucfirst(strtolower($res[$i]['district_name'])).'</option>';
	    }
	    unset($CI, $res, $selected,$s_imd_id);
	    return $opt;
	}
}

if ( ! function_exists('getIMD_Block_List')){
	function getIMD_Block_List($mix_where = '', $s_id = ''){
		$CI = &get_instance();
		$cond = (trim($mix_where)) ? "WHERE imd_block_id!=0 AND ".$mix_where : ' WHERE imd_block_id!=0';
		$res = $CI->db->query("select imd_block_id, blk_name from block_s {$cond} GROUP BY imd_block_id,blk_name");	
		#echo $CI->db->last_query();
		$mix_value = $res->result_array();
		$s_option = '<option value="">Select Block</option>';
		if($mix_value)
		{
			foreach ($mix_value as $val)
			{
				$s_select = '';
				if($val["imd_block_id"] == $s_id)
					$s_select = " selected ";
				$s_option .= "<option $s_select value='".$val["imd_block_id"]."' >".ucfirst(strtolower($val["blk_name"]))."</option>";
			}
		}
		unset($res, $mix_value, $s_select, $mix_where, $s_id);
		return $s_option;
	}
}

// Get District name Oriya
if ( ! function_exists('getDistrictNameOriya')){
	function getDistrictNameOriya($dis_id){
		$dis_names = '';
	    $CI =  &get_instance();
	    $opt = '';
	    $sql = "SELECT district_name_ory FROM districts WHERE imd_id ='".$dis_id."'";
	    $res_obj = $CI->db->query($sql);
	    $res = $res_obj->row_array();
	    
	    $dis_names = $res['district_name_ory'];
	    unset($CI, $res, $selected);
	    return $dis_names;
	}
}

// Get Block name Oriya
if ( ! function_exists('getBlockNameOriya')){
	function getBlockNameOriya($blk_id){
		$dis_names = '';
	    $CI =  &get_instance();
	    $opt = '';
	    $sql = "SELECT block_name_ory FROM blocks WHERE imd_block_id ='".$blk_id."'";
	    $res_obj = $CI->db->query($sql);
	    $res = $res_obj->row_array();
	    
	    $dis_names = $res['block_name_ory'];
	    unset($CI, $res, $selected);
	    return $dis_names;
	}
}


if ( ! function_exists('getFloodStationDropdown')){
	function getFloodStationDropdown($s_id = 0){
	    $CI =  &get_instance();
	    $opt = '';
	    $sql = "SELECT id,location_name FROM flood_stations_tb WHERE id > 0 AND station_type = 'Hydrological' ";
	    $res_obj = $CI->db->query($sql);
	    $res = $res_obj->result_array();
	    for($i = 0; $i<count($res); $i++) {
	    	$selected = $s_id == $res[$i]['id'] ? 'selected="selected"' : '';
	        $opt .= '<option value="'.$res[$i]['id'].'" '.$selected.'>'.$res[$i]['location_name'].'</option>';
	    }
	    unset($CI, $res, $selected);
	    return $opt;
	}
}

// Get District name Oriya
if ( ! function_exists('getBlockIdFromIMDID')){
	function getBlockIdFromIMDID($imd_block_id){
		$blk_id = '';
	    $CI =  &get_instance();
	    $opt = '';
	    $sql = "SELECT id FROM block_s WHERE imd_block_id ='".$imd_block_id."'";
	    $res_obj = $CI->db->query($sql);
	    $res = $res_obj->row_array();
	    
	    $blk_id = $res['id'];
	    //echo '====='.$blk_id.'=========';
	    unset($CI, $res, $selected);
	    return $blk_id;
	}
}

// Get District name Oriya
if ( ! function_exists('getIMDBlockId')){
	function getIMDBlockId($block_id){
		$imd_blk_id = '';
	    $CI =  &get_instance();
	    $opt = '';
	    $sql = "SELECT imd_block_id FROM block_s WHERE id ='".$block_id."'";
	    $res_obj = $CI->db->query($sql);
	    $res = $res_obj->row_array();
	    
	    $imd_blk_id = $res['imd_block_id'];
	    unset($CI, $res, $selected);
	    return $imd_blk_id;
	}
}

if ( ! function_exists('getFloodStationValue')){
	function getFloodStationValue($station_id,$date){
		$imd_blk_id = '';
	    $CI =  &get_instance();
	    $opt = '';
	    $sql = "SELECT value FROM stn_basin_average_forecast WHERE date ='".$date."' AND flood_stn_id = $station_id";
	    $res_obj = $CI->db->query($sql);
	    $res = $res_obj->row_array();
	    
	    $value = $res['value'];
	    unset($CI, $res, $selected);
	    return $value;
	}
}
