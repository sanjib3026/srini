<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function index() {
        // Correct in CodeIgniter 3
        $this->load->view('home'); // 'home' is the view file name (home.php in the views directory)
    }
    // public function submit_reservation() {
    //     // Handle form submission here
    //     $carType = $this->input->post('car_type');
    //     $pickUpLocation = $this->input->post('pickup_location');
    //     $dropOffLocation = $this->input->post('dropoff_location');
    //     $pickUpDateTime = $this->input->post('pickup_datetime');
    //     $dropOffDateTime = $this->input->post('dropoff_datetime');
        
    //     // Process the form data as needed (e.g., save to database)
    //     // $this->CarModel->save_reservation($data);

    //     // Redirect or show success message
    //     redirect('car_rental/success');
    // }
}

