<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CarRentalModel extends CI_Model {

    public function insertBooking($data) {
        return $this->db->insert('car_rentals', $data); // Replace 'bookings' with your actual table name
    }
}
