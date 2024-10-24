<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends CI_Controller {

    public function index() {
        // Correct in CodeIgniter 3
        $this->load->view('blog'); // 'home' is the view file name (home.php in the views directory)
    }
    
}