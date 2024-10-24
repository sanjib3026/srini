<?php
require_once(dirname(__FILE__) . '/dompdf/autoload.inc.php');
require_once TCPDF_DIR. '/tcpdf.php';

// Extend the TCPDF class to create custom Header and Footer
class Pdf extends TCPDF {

     // Page footer
     public function Footer() {

    	// Position at 15 mm from bottom
        $this->SetY(-15);
        // Set font
        $this->SetFont('helvetica', 'I', 8);
        // Set Text Color
        $this->SetTextColor(33, 150, 243);
        // Page number
        $this->Cell(0, 10, 'Odisha State Disaster Management Authority (OSDMA)', 0, false, 'C', 0, '', 0, false, 'T', 'M');
    }
}

class Compose_bulletin
{
    private $ci;
    private $parameters;

    function __construct()
    {
        $this->ci =& get_instance();
        $this->ci->load->library('Pdf');
        $this->parameters = FALSE;
    }

    function set_parameters($param)
    {
        $this->parameters = $param;

        foreach ($param as $var => $val):
            $this->$var = $val;
        endforeach;
    }

    function get_parameters()
    {
        return $this->parameters;
    }


    function create_bulletin_dir()
    {
        $this->parameter_check();
        $bulletin_dir  = '/home/clint/earthquake_scripts/bulletins/' . $this->parameters['event_id']  . '/'; 
        // $bulletin_dir  = 'D:\\My Personal Files\\Work\\RIMES\\osdma scripts\\bulletins\\' . $this->parameters['event_id']  . "\\";

        $cmd = "mkdir -p " . $bulletin_dir;

        $status = '';
        system($cmd, $status);

        return $bulletin_dir;
    }

   
    
    function write_json($filename, $data)
    {
        $this->parameter_check();

        $file = sprintf('%s/%s/%s', BULLETIN_DIR, $this->event_id, $filename);

        $json_str = json_encode($data);

        if (!write_file($file, $json_str)):
            show_error('Unable to write ' . $file);
            die();
        endif;
    }

    function read_json($filename)
    {
        $this->parameter_check();

        $file = sprintf('%s/%s/%s', BULLETIN_DIR, $this->event_id, $filename);
        $ajson = array();

        if (file_exists($file)):

            $json_str = read_file($file);
            $ajson = json_decode($json_str, TRUE);

            if (is_null($ajson)) $ajson = array();
        endif;

        return $ajson;
    }

    function explode_comma_2assoc($delimeter, $data)
    {
        $ret_val = array();
        $line = explode(',', $data);
        foreach ($line as $col):

            $tmp = explode($delimeter, $col);

            if (count($tmp) > 1):
                $ret_val[$tmp[0]] = $tmp[1];
            endif;
        endforeach;

        return $ret_val;
    }

    function parameter_check($check_param = FALSE)
    {
        if(is_array($check_param)):

            $tmp_data = $this->get_parameters();

            foreach($check_param as $k):

                if(!isset($check_param[$k])):
                    show_error($k. ' parameter not set.');
                    die();
                endif;
            endforeach;
        else:

            if ($this->parameters === FALSE):
                show_error('Earthquake parameters not set.');
                die();
            endif;
        endif;
    }
    
    

    function create_pdf_bulletin($data, $simulation)
    {
        $pdf = new Pdf(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        
        // set document information
        $pdf->SetCreator(PDF_CREATOR);
        
        // set default header data
        $pdf->setPrintHeader(false);
        // $pdf->setPrintFooter(false);
        
        // set default font subsetting mode
        // $pdf->setFontSubsetting(true);

        // Set font
        // dejavusans is a UTF-8 Unicode font, if you only need to
        // print standard ASCII chars, you can use core fonts like
        // helvetica or times to reduce file size.
        $pdf->SetFont('Courier', '',10, '', true);
      
        $pdf->AddPage();
        
        // set auto page breaks
        // $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

        $org = "SATARK - ODISHA STATE DISASTER MANAGEMENT AUTHORITY";

        // Prepare to generate bulletin

        $param = json_decode($data['_body']);
        $data['simulation']  =  $simulation;
        $data['org']  =  $org;
        $data['_eqinfo']  = str_replace("//n/","\n",$param->_eqinfo);
        $data['_title'] = $param->_title;
        $data['_eqinfo_title_print'] = $param->_eqinfo_title_print;
        $data['_eval_title_print'] = $param->_eval_title_print;
        $data['w_threat'] = $param->w_threat;
        $data['_threat_title_print'] = $param->_threat_title_print;
        $data['_threat'] = $param->_threat;
        $data['w_advice'] = $param->w_advice;
        $data['_advice_title_print'] = $param->_advice_title_print;
        $data['_advice'] = $param->_advice;
        $data['w_update'] = $param->w_update;
        $data['_update_title_print'] = $param->_update_title_print;
        $data['_update'] = $param->_update;
        $data['_contact_title'] = $param->_contact_title;
        $data['_contact_title_print'] = $data['_contact_title_print'];
        $data['_contact'] = $data['_contact'];
        $data['_eqinfo'] = $this->_replace_eq_vars($data['_eqinfo'], $param);        
      

        $cupdate = $param->_update_no == 0 ? '': ' - Update No. '.str_pad($param->_update_no, 2, '0',STR_PAD_LEFT);        
        $type = (trim($param->_type) == "") ? "" : ' ('.$param->_type.')';

        $data['_header1'] = "[SATARK - OSDMA]-".gmdate('Ymd-Hi').'-'.str_pad($data['bulletin_no'], 3, '0',STR_PAD_LEFT) . $type . $cupdate;
        $data['_header2'] = $param->_is_tsu ? 'TSUNAMI BULLETIN NUMBER ' . $data['bulletin_no'] : 'EARTHQUAKE BULLETIN';
        $data['_header3'] = 'Issued at ' . gmdate('Hi'). ' UTC '. date ('l d F Y');        


        $data['_header2'] = ($simulation==true ? "TEST BULLETIN ". $data['bulletin_no'] : $data['_header2']);
      

        // Precise Info
        $param->_eval   = str_replace("*PRECISE_DATA", $data['_precise_info'], $param->_eval);
        $param->_threat = str_replace("*PRECISE_DATA", $data['_precise_info'], $param->_threat);
        $param->_advice = str_replace("*PRECISE_DATA", $data['_precise_info'], $param->_advice);
        $param->_update = str_replace("*PRECISE_DATA", $data['_precise_info'], $param->_update); 

        // Sea Level Info
        $param->_eval   = str_replace("*PRECISE_DATA", $data['_sealvl_info'], $param->_eval);
        $param->_threat = str_replace("*PRECISE_DATA", $data['_sealvl_info'], $param->_threat);
        $param->_advice = str_replace("*PRECISE_DATA", $data['_sealvl_info'], $param->_advice);
        $param->_update = str_replace("*PRECISE_DATA", $data['_sealvl_info'], $param->_update); 

        $data['_eval']      = str_replace("//n/","\n",$param->_eval);
        $data['_threat']    = str_replace("//n/","\n",$param->_threat);
        $data['_advice']    = str_replace("//n/","\n",$param->_advice);
        $data['_update']    = str_replace("//n/","\n",$param->_update);

        // Cleanup
        $data['_eval']      = str_replace("Further information on this event will be available at:", "", $data['_eval']);
        $data['_eval']      = str_replace("http://www.rimes.int/eqt-tsunami-bulletin/","", $data['_eval']);
        $data['_eval']      = str_replace("http://www.rimes.int/eqt-tsunami-bulletin","", $data['_eval']);
        $data['_eval']      = str_replace("\n","", $data['_eval']);

        // $data['_update']    = str_replace("Other TSPs may issue additional information at:\n","", $data['_update']);
        // $data['_update']    = str_replace("IOTWMS-TSP AUSTRALIA: http://www.bom.gov.au/tsunami/iotws\n","", $data['_update']);
        // $data['_update']    = str_replace("IOTWMS-INDIA: http://www.incois.gov.in/Incois/tsunami/eqevents.jsp\n","", $data['_eval']);
        // $data['_update']    = str_replace("IOTWMS-INDONESIA: http://rtsp.bmkg.go.id/publicbull.php\n","", $data['_update']);
        // $data['_update']    = str_replace("PTWC: http://ptwc.weather.gov/\n","", $data['_update']);
        // $data['_update']    = str_replace("NWPTAC: http://www.jma.go.jp/en/tsunami/\n","", $data['_eval']);
        // $data['_update']    = str_replace("US NTWC: http://wcatwc.arh.noaa.gov/\n","", $data['_update']);
        // $data['_update']    = str_replace("JATWC: http://www.bom.gov.au/tsunami/\n","", $data['_eval']);

        // $data['_update']    = nl2br($data['_update']) . "\n" . $data['bulletin_tsp'];

        foreach ($data as $key => $row) {
            // $data[$key][$row] = str_replace("RIMES", $org, $row);
            $data[$key] = str_replace("RIMES", $org, $data[$key]);
        }
        
        $this->set_parameters($data);
        $this->parameter_check();

        $tmp_vw = 'earthquake/bulletin/template.php';
        $filename = ($simulation == true ? "TEST_" : "") . $this->parameters['event_id'] . "_" . $this->parameters['bulletin_no'];
        $dir = $this->create_bulletin_dir();
        #$dir = "D:\\";
        $filename = $dir . "$filename.pdf";

        $html = $this->ci->load->view($tmp_vw, $this->parameters, TRUE);
        $pdf->writeHTML($html, true, false, true, false, '');

        if (file_exists($filename))
            unlink($filename);

        $pdf->Output($filename, 'F');
        
    }

    function _replace_eq_vars($str, $event){
        // create a function that will REPLACE VALUE OF KEYWORDS IN CONTENTS
        $tmp_str = $str;

         // test if string contains keywords
        if (preg_match("/\*/", $tmp_str)){

            $date=date_create($event['event_datetime']);

            $lat = abs($event['latitude']) . ($event['latitude'] < 0 ? 'S' : 'N');
            $lon = abs($event['longitude']) . ($event['longitude'] < 0 ? 'W' : 'E');

            $tmp_str = str_replace("*DATE_VAL", date_format($date,"d F Y"), $tmp_str); 
            $tmp_str = str_replace("*DEPTH_VAL", $event['depth'], $tmp_str); 
            $tmp_str = str_replace("*EVENT_ID", $event['event_id'], $tmp_str); 
            $tmp_str = str_replace("*LAT_VAL", $lat, $tmp_str); 
            $tmp_str = str_replace("*LON_VAL", $lon, $tmp_str); 
            $tmp_str = str_replace("*MAG_VAL", number_format($event['magnitude'], 1), $tmp_str); 
            $tmp_str = str_replace("*MAGTYPE_VAL", $event['mag_type'], $tmp_str); 
            $tmp_str = str_replace("*REG_VAL", $event['region'], $tmp_str); 
            $tmp_str = str_replace("*TIME_VAL", date_format($date,"H:i:s"), $tmp_str); 
        }
        // str_replace(' ', '&nbsp;', $_update)
        return $tmp_str;         

    }


}