<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

require_once TCPDF_DIR. '/tcpdf.php';

class PdfAutomail extends TCPDF {

    function __construct() {
        parent::__construct();
    }

    protected $forecast;

    public function setForecast($var){
        $this->forecast = $var;
    }

    // Page footer
    public function Footer() {

    	// Position at 15 mm from bottom
        $this->SetY(-15);
        // Set font
        $this->SetFont('helvetica', 'I', 8);
        // Set Text Color
        $this->SetTextColor(33, 150, 243);
        // Page number
        $this->Cell(0, 10, 'India Meteorological Department (IMD), Bhubaneswar. Odisha State Disaster Management Authority (OSDMA) '.$this->forecast, 0, false, 'C', 0, '', 0, false, 'T', 'M');
    }
}
