<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class About extends CI_Controller {

    public function index() {
        // Correct in CodeIgniter 3
        $this->load->view('about'); // 'home' is the view file name (home.php in the views directory)
    }
    
}
