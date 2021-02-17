<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Customer extends CI_Controller
{

    private $data = array();

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Customer_Model', 'customers');
        $this->load->helper('url');
        $this->data['uri'] = $this->uri->segment_array();
        
        add_js(array(
            BASE_JS_BO.'customers.js')
        );
    }

    public function index()
    {
        $this->data['tittle'] = "Administracion Clientes";
        $this->data['sub_tittle'] = "Listado de Clientes";
        $this->data['description'] = "Listado de Clientes";
        $this->data['csfr'] = array(
            'csrfName' => $this->security->get_csrf_token_name(),
            'csrfHash' => $this->security->get_csrf_hash()
        );
        
        $this->data['content'] = 'backend/customers/List';
        $this->load->view('backend/layout/layout', $this->data);    
    }

    public function View($customer_id)
    {
        $this->data['tittle'] = "Administracion Clientes";
        $this->data['sub_tittle'] = "Vista de Clientes";
        $this->data['description'] = "Vista de Clientes";
        $this->data['csfr'] = array(
            'csrfName' => $this->security->get_csrf_token_name(),
            'csrfHash' => $this->security->get_csrf_hash()
        );
        $this->data['customer']= $this->customers->getRows(array('customer_id' => $customer_id));
        $this->data['content'] = 'backend/customers/View';
        $this->load->view('backend/layout/layout', $this->data);    
    }
    
    
  
    public function ajax_list()
    {
        $list = $this->customers->get_datatables($this->input->post());
        $data = array();
        $no = $this->input->post('start'); // $_POST['start'];
        foreach ($list as $customers) {
            $no ++;
            $row = array();
            $row[] = $customers->customer_id;
            $row[] = $customers->customer_rut_enterprise; 
            $row[] = $customers->customer_enterprise_name;
            $row[] = $customers->customer_name;
            $row[] = $customers->customer_email;
            $row[] = $customers->customer_phone;
            $row[] = $customers->customer_status == 1 ? 'Activo' : 'Inactivo';
            $row[] = '
                <a href="' . base_url() . 'bo/customer/view/' . $customers->customer_id . '"> <i class="green bigger-160 ion ion-ios-eye" ></i> </a>
                    ';
            
            $data[] = $row;
        }
        
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->customers->count_all(),
            "recordsFiltered" => $this->customers->count_filtered($this->input->post()),
            "data" => $data
        );
        // output to json format
        echo json_encode($output);
    }
}