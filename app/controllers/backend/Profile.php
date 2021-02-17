<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

    protected $data = array();

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('isLogued')) {
            redirect(base_url('bo/login'), 'refresh');
        }
        $this->data['uri'] = $this->uri->segment_array();
        $this->load->model('Profile_Model', 'profile');
        $this->load->model('Modules_Model', 'module');
        $this->form_validation->set_error_delimiters('', '');
        add_css(array(
            BASE_THEME.'plugins/select2/select2.css',
        ));

        add_js(array(
            BASE_THEME.'plugins/select2/select2.full.min.js',
            BASE_JS_BO . 'profile.js',
        ));
    }

    function index() {
        redirect(base_url() . "bo/profile/Lists/");
    }

    //CRUD METHODS

    function Lists() {
        $this->data['tittle'] = "Administracion de Perfiles";
        $this->data['sub_tittle'] = "Listado de Perfil";
        $this->data['description'] = "Listado de Perfil";
        $this->data['csfr'] = array(
            'csrfName' => $this->security->get_csrf_token_name(),
            'csrfHash' => $this->security->get_csrf_hash()
        );
        $this->data['content'] = 'backend/profile/List';
        $this->load->view('backend/layout/layout', $this->data);
    }

    function Add() {
        $this->data['tittle'] = "Administracion de Perfiles";
        $this->data['sub_tittle'] = "Agregar Nuevo perfil";
        $this->data['description'] = "Permite agregar un nuevo perfil";
        $this->data['status'] = $this->assets->getStatus();
        $this->data['modules']=$this->module->getRows();
        
  //      echo "<pre>";
  //      print_r($this->module->getRows());
        
  //      die();
        
        
        
        $this->data['content'] = 'backend/profile/Add';
        $this->load->view('backend/layout/layout', $this->data);
    }

    function Edit($profile_id = null) {
        $this->data['tittle'] = "Administracion de Marcas";
        $this->data['sub_tittle'] = "Editar Marca";
        $this->data['description'] = "Permite agregar una nueva marca";
        $this->data['status'] = $this->assets->getStatus();
        $this->data['profiles'] = $this->profile->getRows($profile_id);
        $this->data['modules']=$this->module->getRows();
        
        $this->data['content'] = 'backend/profile/Add';
        $this->load->view('backend/layout/layout', $this->data);
    }

    function Save() {
        
       
       
        $this->form_validation->set_error_delimiters('', '');
        $this->form_validation->set_rules('profile_name', 'Nombre ', 'required|xss_clean');
        $this->form_validation->set_rules('profile_module[]', 'Modulos ', 'required|xss_clean');
        //$this->form_validation->set_rules('profile_description'  ,'Descripcion'   , 'required|xss_clean');
        $this->form_validation->set_rules('profile_status', 'Estado', 'required|xss_clean|integer');

        if ($this->form_validation->run() === FALSE) {

            $err_data = array(
                "succes" => "error",
                "profile_name" => form_error('profile_name'),
                "profile_module" => form_error('profile_module'),
                "profile_status" => form_error('profile_status'),
            );

            $this->session->set_flashdata('errors', $err_data);
            $this->session->set_flashdata('data', $this->input->post());
            redirect(BASE_BO . "profile/add");
        } else {
           
            $this->data['profile_id'] = $this->input->post('profile_id');
            $this->data['profile_name'] = $this->input->post('profile_name');
            $this->data['profile_modules'] = implode('|',$this->input->post('profile_module'));
            $this->data['profile_status'] = $this->input->post('profile_status');
            $this->data['profile_create_at'] = date('Y-m-d H:i:s');
            if ($this->profile->Save($this->data)) {
                $this->session->set_flashdata('success', "operacion realizada con exito");
                redirect(BASE_BO . "profile/lists");
            }
        }
    }

    function ajax_list() {
        $list = $this->profile->get_datatables($this->input->post());
        $data = array();
        $no = $this->input->post('start'); // $_POST['start'];
        foreach ($list as $lst) {
            $no ++;
            $row = array();
            $row[] = $lst->profile_id;
            $row[] = $lst->profile_name;
            $row[] = $lst->profile_create_at;
            $row[] = $lst->profile_status == 1 ? 'Activo' : 'Inactivo';

            $isActive = $lst->profile_status == 1 ? 'green' : 'red';
            $row[] = '
                    <a href="' . base_url() . 'bo/profile/edit/' . $lst->profile_id . '"> <i class="green bigger-160 ion ion-edit" ></i> </a>
                ';

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->profile->count_all(),
            "recordsFiltered" => $this->profile->count_filtered($this->input->post()),
            "data" => $data
        );
        // output to json format
        echo json_encode($output);
    }

}

/* End of file Controllername.php */
