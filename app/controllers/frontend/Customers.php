<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Customers extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Customer_Model', 'customer');
        $this->load->model('Assets_Model', 'assets');
        $this->load->model('Orders_Model', 'orders');
    }

    function index() {
        $data['region'] = $this->assets->getRegion();
        $data['content'] = "frontend/customers/access";
        $this->load->view('frontend/layout/layout', $data);
    }

    function login() {

        //  print_r($_POST);

        $this->form_validation->set_rules('customer_email', 'usuario', 'trim|required|valid_email');
        $this->form_validation->set_rules('customer_password', 'Contrase&ntilde;a', 'trim|required|min_length[9]|max_length[12]');
        if ($this->form_validation->run() === FALSE) {
            $err_data = array(
                "succes" => "error",
                "customer_email" => form_error('customer_email'),
                "customer_password" => form_error('customer_password'),
            );

            $this->session->set_flashdata('errors', $err_data);
            $this->session->set_flashdata('data', $this->input->post());
            redirect(base_url() . 'clientes', 'refresh');
            echo json_encode($err_data);
            exit();
        } else {
            $data = array(
                "user" => trim($this->input->post('customer_email')),
                "password" => trim($this->enc->encode(SEEDPASS . $this->input->post('customer_password'))),
            );


            if ($this->customer->VerifyCustomerAccess($data)) {
                $UserInfo = $this->customer->GetUserInfo($this->input->post('customer_email'));
                $this->session->set_userdata(array(
                    "id" => $UserInfo[0]->customer_id,
                    "user" => $UserInfo[0]->customer_email,
                    "name" => $UserInfo[0]->customer_name,
                    "rut" => $UserInfo[0]->customer_rut,
                    "user" => $UserInfo[0]->customer_email,
                    "date_add" => $UserInfo[0]->customer_create_at,
                    "status" => "Conectado",
                    "isLogued" => true,
                ));
                $LastLogin = array(
                    "customer_id" => $UserInfo[0]->customer_id,
                    "customer_last_login" => date("Y-m-d H:i:s"),
                );
                $this->customer->SaveLastLogin($LastLogin);
                redirect(base_url() . 'productos', 'refresh');
            } else {
                $err_data = array(
                    "succes" => "error",
                    "message" => "sus datos de acceso no validos verifique usuario y/o Contrase&ntilde;a"
                );
                $this->session->set_flashdata('errors', $err_data);
                redirect(base_url() . 'clientes', 'refresh');
            }
        }
    }

    function Register() {
        $data['region'] = $this->assets->getRegion();
        $data['content'] = "frontend/customers/register";
        $this->load->view('frontend/layout/layout', $data);
    }

    function Recovery() {
        
    }

    function account() {
        $data['info'] = $this->customer->GetUserInfo($this->session->userdata('user'));
        $data['region'] = $this->assets->getRegion();
        $data['content'] = "frontend/customers/panel";
        $this->load->view('frontend/layout/layout', $data);
    }

    function orders() {
        $data['orders'] = $this->customer->getCustomerOrders($this->session->userdata('id'));
        $data['content'] = "frontend/customers/orders";
        $this->load->view('frontend/layout/layout', $data);
    }

    function orders_details($order_id) {
        $data['order_number'] = $order_id;
        $data['orders'] = $this->customer->getCustomerOrdersDetails($order_id);
        $data['content'] = "frontend/customers/order_details";
        $this->load->view('frontend/layout/layout', $data);
    }

    function Save_Register() {

        $this->form_validation->set_rules('customer_rut', 'Rut Cliente', 'trim|required|valid_rut|is_unique[customers.customer_rut]');
        $this->form_validation->set_rules('customer_name', 'Nombre Cliente', 'trim|required');
        $this->form_validation->set_rules('customer_email', 'E-Mail Cliente', 'trim|required|valid_email|is_unique[customers.customer_email]');
        $this->form_validation->set_rules('customer_phone', 'Telefono Cliente', 'trim|required|min_length[9]|max_length[12]');
        $this->form_validation->set_rules('customer_password', 'Password', 'trim|required|min_length[8]|max_length[12]');
        $this->form_validation->set_rules('re_customer_password', 'Verificacion', 'trim|required|min_length[8]|max_length[12]|matches[customer_password]');


        if ($this->form_validation->run() === FALSE) {
            $err_data = array(
                "succes" => "error",
                "customer_rut" => form_error('customer_rut'),
                "customer_name" => form_error('customer_name'),
                "customer_email" => form_error('customer_email'),
                "customer_phone" => form_error('customer_phone'),
                "customer_password" => form_error('customer_password'),
                "re_customer_password" => form_error('re_customer_password'),
            );

            $this->session->set_flashdata('errors', $err_data);
            $this->session->set_flashdata('data', $this->input->post());
            redirect(base_url() . 'clientes/registro', 'refresh');
            echo json_encode($err_data);
            exit();
        } else {
            $info['customer_rut'] = $this->input->post('customer_rut');
            $info['customer_name'] = $this->input->post('customer_name');
            $info['customer_email'] = $this->input->post('customer_email');
            $info['customer_phone'] = $this->input->post('customer_phone');
            $info['customer_password'] = $this->enc->secured_encrypt($this->input->post('customer_password'));
                      
            
            
            $info['customer_address'] = $this->input->post('customer_address');
            $info['customer_addres_number'] = $this->input->post('customer_addres_number');
            $info['customer_addres_rest'] = $this->input->post('customer_addres_rest');
            $info['customer_commune'] = $this->input->post('customer_commune');
            $info['customer_region'] = $this->input->post('customer_region');
            $info['customer_city'] = $this->input->post('customer_city');
            

            
            
            $info['customer_status'] = 1;
            $info['customer_create_at'] = date('Y-m-d H:i:s');
            $info['customer_token_recovery'] = $this->_token();
            $info['customer_verify_token'] = $this->_token();

            
            echo "<pre>";
            
            print_r($_POST);
            
            
            
            die();

            if ($this->customer->Save($info)) {
                $err_data = array(
                    "succes" => "true",
                    "message" => "Incripcion correcta",
                    "usuario" => $this->input->post('customer_email'),
                );
                $this->session->set_flashdata('errors', $err_data);
                $this->session->set_flashdata('data', $this->input->post());
                redirect(base_url() . 'clientes/registro', 'refresh');
            } else {
                
            }
        }
    }

    function updateCustomer() {

        $this->form_validation->set_rules('customer_rut', 'Rut Cliente', 'trim|required|valid_rut');
        $this->form_validation->set_rules('customer_name', 'Nombre Cliente', 'trim|required');
        $this->form_validation->set_rules('customer_email', 'E-Mail Cliente', 'trim|required|valid_email');
        $this->form_validation->set_rules('customer_phone', 'Telefono Cliente', 'trim|required|min_length[9]|max_length[12]');

        $this->form_validation->set_rules('enterprise_rut', 'Rut Empresa', 'trim|required|min_length[5]|valid_rut');
        $this->form_validation->set_rules('enterprise_name', 'Razo Social', 'trim|required');
        $this->form_validation->set_rules('enterprise_address', 'Direccion', 'trim|required');
        $this->form_validation->set_rules('enterprise_commune', 'Comuna', 'trim|required');
        $this->form_validation->set_rules('enterprise_city', 'Ciudad', 'trim|required');
        $this->form_validation->set_rules('enterprise_region', 'Region', 'trim|required');


        if ($this->form_validation->run() === FALSE) {
            $err_data = array(
                "succes" => "error",
                "customer_rut" => form_error('customer_rut'),
                "customer_name" => form_error('customer_name'),
                "customer_email" => form_error('customer_email'),
                "customer_phone" => form_error('customer_phone'),
                "enterprise_rut" => form_error('enterprise_rut'),
                "enterprise_name" => form_error('enterprise_name'),
                "enterprise_address" => form_error('enterprise_address'),
                "enterprise_commune" => form_error('enterprise_commune'),
                "enterprise_city" => form_error('enterprise_city'),
                "enterprise_region" => form_error('enterprise_region'),
            );

            $this->session->set_flashdata('errors', $err_data);
            $this->session->set_flashdata('data', $this->input->post());
            redirect(base_url() . 'clientes/mi-cuenta', 'refresh');
            echo json_encode($err_data);
            exit();
        } else {
            $info['customer_id'] = $this->input->post('customer_id');
            $info['customer_rut'] = $this->input->post('customer_rut');
            $info['customer_name'] = $this->input->post('customer_name');
            $info['customer_email'] = $this->input->post('customer_email');
            $info['customer_phone'] = $this->input->post('customer_phone');
            //$info['customer_password'] = $this->enc->encode(SEEDPASS . $this->input->post('customer_password'));
            $info['customer_enterprise_name'] = $this->input->post('enterprise_name');
            $info['customer_rut_enterprise'] = $this->input->post('enterprise_rut');
            $info['customer_enterprise_adress'] = $this->input->post('enterprise_address');
            $info['customer_enterprise_commune'] = $this->input->post('enterprise_commune');
            $info['customer_enterprise_city'] = $this->input->post('enterprise_city');
            $info['customer_enterprise_region'] = $this->input->post('enterprise_region');
            $info['customer_status'] = 1;
            $info['customer_updated_at'] = date('Y-m-d H:i:s');


            if ($this->customer->Save($info)) {
                $err_data = array(
                    "succes" => "true",
                    "message" => "Tus Datos se actualizaron de manera correcta",
                    "usuario" => $this->input->post('customer_email'),
                );
                $this->session->set_flashdata('errors', $err_data);
                $this->session->set_flashdata('data', $this->input->post());
                redirect(base_url() . 'clientes/mi-cuenta', 'refresh');
            } else {
                
            }
        }
    }

    private function _token() {
        return sha1(uniqid(rand(), true));
    }

    function ajaxCommune() {
        $reg_id = $this->input->post('reg_id');
        $comunas = $this->assets->getCommuneByRegion($reg_id);


        echo json_encode($comunas);
    }

    function SendVerification($data) {
        $email_config = Array(
            'mailtype' => 'html',
            'newline' => "\r\n"
        );
        $config['protocol'] = 'smtp';
        $config['smtp_host'] = 'blue41.dnsmisitio.net';
        $config['smtp_port'] = '587';
        $config['smtp_timeout'] = '7';
        $config['smtp_user'] = 'contacto1@doblementeprotegido.cl';
        $config['smtp_pass'] = '6rt6n1s2';
        $config['charset'] = 'utf-8';
        $config['mailtype'] = 'html';
        $config['newline'] = "\r\n";

        $this->load->library('email');
        $this->email->initialize($config);
        $this->email->from('contacto@dorelsportschile.cl', 'Contacto Web');
        $this->email->to('danielnune@gmail.com' . 'Test');
        $this->email->subject('Activacion de Cuenta');
        $this->email->message($message);

        if ($this->email->send()) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    function logOut() {

        $this->session->sess_destroy();
        redirect(base_url() . '/');
    }

}
