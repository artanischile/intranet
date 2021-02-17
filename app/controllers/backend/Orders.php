<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Orders extends CI_Controller {

    private $data = array();

    public function __construct() {
        parent::__construct();
        $this->load->model('Orders_Model', 'orders');
        $this->load->model('Customer_Model', 'customers');
        $this->load->helper('url');
        $this->data['uri'] = $this->uri->segment_array();

        add_js(array(
            BASE_JS_BO . 'orders.js')
        );
    }

    public function index() {
        $this->data['tittle'] = "Administracion Ordenes";
        $this->data['sub_tittle'] = "Listado de Ordenes";
        $this->data['description'] = "Listado de Ordenes";
        $this->data['csfr'] = array(
            'csrfName' => $this->security->get_csrf_token_name(),
            'csrfHash' => $this->security->get_csrf_hash()
        );

        $this->data['content'] = 'backend/orders/List';
        $this->load->view('backend/layout/layout', $this->data);
    }

    public function View($order_id) { 
        $this->data['tittle'] = "Administracion Ordenes";
        $this->data['sub_tittle'] = "Detalle de Orden #". $order_id;
        $this->data['description'] = "Detalle de Orden";
        $this->data['csfr'] = array(
            'csrfName' => $this->security->get_csrf_token_name(),
            'csrfHash' => $this->security->get_csrf_hash()
        );
       
        $theOrder=$this->orders->GetOrderById($order_id);
        $this->data['order'] = $theOrder[0];
        $this->data['customer']= $this->customers->getRows(array('customer_id' => $theOrder[0]->customer_id));
        $this->data['orders'] = $this->orders->getDetails($order_id);
        $this->data['content'] = 'backend/orders/View';
        $this->load->view('backend/layout/layout', $this->data);
    }

    public function ajax_list() {
        $list = $this->orders->get_datatables($this->input->post());
        $data = array();
        $no = $this->input->post('start'); // $_POST['start'];
        foreach ($list as $orders) {
            $no ++;
            $row = array();
            $row[] = $orders->order_id;
            $row[] = $orders->customer_rut;
            $row[] = $orders->customer_name;
            $row[] = $orders->customer_enterprise_name;

            $row[] = $orders->order_total_items;
            $row[] = $orders->order_total_price;
            $row[] = $orders->order_status;
            $row[] = $orders->order_create;
            $row[] = '
                <a href="' . base_url() . 'bo/orders/view/' . $orders->order_id . '"> <i data-toggle="tooltip" data-placement="left" title="Detalle" class="green bigger-160 ion-ios-list-outline" ></i> </a>
                    ';

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->orders->count_all(),
            "recordsFiltered" => $this->orders->count_filtered($this->input->post()),
            "data" => $data
        );
        // output to json format
        echo json_encode($output);
    }

}
