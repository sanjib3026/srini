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

class Ocean_bulletin
{
    private $ci;
    private $parameters;

    function __construct()
    {
        $this->ci =& get_instance();
        $this->ci->load->library('Pdf');
        $this->parameters = FALSE;
    }

    function create_pdf_bulletin($data)
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
        // $pdf->SetFont('Courier', '',10, '', true);
        $pdf->SetFont('freeserif', '', 10, '', true);
     
        $pdf->AddPage();

        $tmp_vw = "ocean/bulletin/template.php";
      

        $html = $this->ci->load->view($tmp_vw, $data, TRUE);
        $pdf->writeHTML($html, true, false, true, false, '');

        $filename = $data['bulletin_dir'] . $data['filename'];

        if (file_exists($filename))
            unlink($filename);

        $pdf->Output($filename, 'F');
        
    }


}