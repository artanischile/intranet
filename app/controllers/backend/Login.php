<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Login extends CI_Controller {

    protected $data = array();

    function __construct() {
        parent::__construct();


        $this->load->model('User_Model', 'user');
        $this->load->model('Login_Model', 'login');
        add_js(array(
            BASE_JS_BO . 'login.js'
                )
        );
    }

    public function index() {
        $this->data['titulo_pagina'] = "Inicio Sesion";
        $this->data['subtitulo_pagina'] = "ingrese usuario y contrase&ntildea para ingresar";
        $this->data['titulo'] = "Inicio de Sesion";
        $this->load->view('backend/login/login', $this->data);
    }

    public function checkUser() {

        $this->form_validation->set_rules('user', 'Usuario', 'trim|required|xss_clean');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');
        if ($this->form_validation->run() === FALSE) {
            $err_data = array(
                "succes" => "error",
                "user" => form_error('user'),
                "password" => form_error('password'),
            );

            // set flash data
            $this->session->set_flashdata('errors', $err_data);

            // mark existing data as flash data
           // $this->session->set_userdata('err', $err_data);
           // $this->session->mark_as_flash('err');
            redirect(base_url() . 'bo','refresh');


            $this->session->set_flashdata('errors', $err_data);
            //$this->session->set_flashdata('data', $this->input->post());
            redirect(base_url() . 'bo', 'refresh');
            //echo json_encode($err_data);
            exit();
        } else {

            $data = array(
                "user" => $this->input->post('user'),
                "password" => $this->enc->encode($this->input->post('password')),
            );

            $check = $this->login->CheckCredentials($data);
            if ($check) {
                $UserInfo = $this->login->GetUserInfo($this->input->post('user'));
                $this->session->set_userdata(array(
                    "id" => $UserInfo[0]->user_id,
                    "user" => $UserInfo[0]->user_name,
                    "name" => $UserInfo[0]->user_first_name . ' ' . $UserInfo[0]->user_last_name,
                    "date_add" => $UserInfo[0]->user_created,
                    "profile" => $UserInfo[0]->user_profile_id,
                    "status" => "Conectado",
                    "isLogued" => true,
                ));

                $LastLogin = array(
                    "user_id" => $UserInfo[0]->user_id,
                    "user_last_login" => date("Y-m-d H:i:s"),
                        );
                $this->login->SaveLastLogin($LastLogin);

                // setFlash('loguedIn', 'Bienvenido' .$UserInfo[0]->user_first_name .' '.$user[0]->user_last_name);
                redirect(base_url() . 'bo/dashboard', "refresh");
            } else {
                $this->session->set_flashdata('errors', $err_data);
                redirect(base_url() . 'bo', 'refresh');
            }
        }
    }

    function logOut() {

        $this->session->sess_destroy();
        redirect(base_url() . 'bo', 'refresh');
    }

}
