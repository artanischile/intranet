<?php  
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Contact extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Customer_Model', 'customer');
        $this->load->model('Assets_Model', 'assets');
        $this->load->model('Orders_Model', 'orders');
    }

    function index() {
        $data['region'] = $this->assets->getRegion();
        $data['content'] = "frontend/contact/contact";
        $this->load->view('frontend/layout/layout', $data);
    }

}