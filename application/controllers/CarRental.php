<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CarRental extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('CarRentalModel');
        $this->load->library('email'); // Load email library
    }

    public function index() {
        // Load the booking form view
        $this->load->view('car_rental_form');
    }

    public function book() {
        // Gather data from the form
        $data = [
            'name' => $this->input->post('name'),
            'contact' => $this->input->post('contact'),
            'email' => $this->input->post('email'),
            'car_type' => $this->input->post('car_type'),
            'pickup_date' => $this->input->post('pickup_date'),
            'dropoff_date' => $this->input->post('dropoff_date'),
            'pickup_location' => $this->input->post('pickup_location'),
            'drop_location' => $this->input->post('drop_location')
        ];

        // Insert into the database
        if ($this->CarRentalModel->insertBooking($data)) {
            // Send the booking email
            $this->sendBookingEmail($data);
            // Redirect or load a success view
            $this->load->view('booking_success');
        } else {
            // Handle error case
            echo "Error booking your car.";
        }
    }

    private function sendBookingEmail($data) {
        $config = [
            'protocol' => 'smtp',
            'smtp_host' => 'smtp.gmail.com',
            'smtp_port' => 587,
            'smtp_user' => 'sanjib.dash359@gmail.com', // Your email address
            'smtp_pass' => 'S@njib1994',   // Your email password
            'mailtype' => 'text', // or 'html'
            'charset' => 'utf-8',
            'newline' => "\r\n"
        ];

        $this->email->initialize($config);

        $this->email->from('sanjib.dash359@gmail.com', 'Sanjib'); // Change this to your email
        $this->email->to('sanjib.dash3026@gmail.com'); // Recipient's email
        $this->email->subject('Car Rental Booking Confirmation');

        // Compose the email content
        $message = "Hello,\n\n";
        $message .= "A new car rental booking has been made.\n\n";
        $message .= "Name: " . $data['name'] . "\n";
        $message .= "Contact: " . $data['contact'] . "\n";
        $message .= "Email: " . $data['email'] . "\n";
        $message .= "Car Type: " . $data['car_type'] . "\n";
        $message .= "Pickup Date: " . $data['pickup_date'] . "\n";
        $message .= "Drop-off Date: " . $data['dropoff_date'] . "\n";
        $message .= "Pickup Location: " . $data['pickup_location'] . "\n";
        $message .= "Drop Location: " . $data['drop_location'] . "\n";

        $this->email->message($message);

        // Send the email
        if (!$this->email->send()) {
            // Handle the error
            log_message('error', 'Email not sent: ' . $this->email->print_debugger());
        } else {
            log_message('info', 'Email sent successfully to: ' . $data['email']);
        }
    }
}
