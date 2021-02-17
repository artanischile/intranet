<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Modules extends CI_Controller {

    protected $data = array();

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('isLogued')) {
            redirect(base_url('bo/login'), 'refresh');
        }
        $this->data['uri'] = $this->uri->segment_array();
        $this->load->model('Modules_Model', 'module');
        $this->form_validation->set_error_delimiters('', '');
        add_css(array());

        add_js(array(
            BASE_JS_BO . 'modules.js',
        ));
    }

    function index() {
        redirect(base_url() . "bo/modules/Lists/");
    }

    //CRUD METHODS

    function Lists() {
        $this->data['tittle'] = "Administracion de Modulos";
        $this->data['sub_tittle'] = "Listado de Modulos";
        $this->data['description'] = "Listado de Modulos";
        $this->data['csfr'] = array(
            'csrfName' => $this->security->get_csrf_token_name(),
            'csrfHash' => $this->security->get_csrf_hash()
        );
        $this->data['content'] = 'backend/modules/List';
        $this->load->view('backend/layout/layout', $this->data);
    }

    function Add() {
        $this->data['tittle'] = "Administracion de Modulos";
        $this->data['sub_tittle'] = "Agregar  Modulo";
        $this->data['description'] = "Permite agregar un nuevo Modulo";
        $this->data['principals'] = $this->module->getPrincipalModules();
        $this->data['status'] = $this->assets->getStatus();
        $this->data['content'] = 'backend/modules/Add';
        $this->load->view('backend/layout/layout', $this->data);
    }

    function Edit($modules_id = null) {
        $this->data['tittle'] = "Administracion de Modulos";
        $this->data['sub_tittle'] = "Editar Modulo";
        $this->data['description'] = "Permite Editar Modulo";
        $this->data['status'] = $this->assets->getStatus();
        $this->data['principals'] = $this->module->getPrincipalModules();
        $this->data['modules'] = $this->module->getRows($modules_id);
        $this->data['content'] = 'backend/modules/Add';
        $this->load->view('backend/layout/layout', $this->data);
    }

    function Save() {
        $this->data=array();
        $this->form_validation->set_error_delimiters('', '');
        $this->form_validation->set_rules('module_name', 'Nombre ', 'required|xss_clean');
        $this->form_validation->set_rules('module_url', 'Url ', 'required|xss_clean');
        $this->form_validation->set_rules('module_parent', 'Parent ', 'required|xss_clean');
        $this->form_validation->set_rules('module_status', 'Estado', 'required|xss_clean|integer');

        if ($this->form_validation->run() === FALSE) {

            $err_data = array(
                "succes" => "error",
                "modules_name" => form_error('modules_name'),
                "module_url" => form_error('module_url'),
                "module_parent" => form_error('module_parent'),
                "modules_status" => form_error('modules_status'),
            );

            $this->session->set_flashdata('errors', $err_data);
            $this->session->set_flashdata('data', $this->input->post());
            redirect(BASE_BO . "modules/add");
        } else {

            
            $this->data['module_id'] = $this->input->post('module_id');
            $this->data['module_name'] = $this->input->post('module_name');
            $this->data['module_parent'] = $this->input->post('module_parent');
            $this->data['module_url'] = $this->input->post('module_url');
            $this->data['module_status'] = $this->input->post('module_status');
            $this->data['module_create_at'] = date('Y-m-d H:i:s');
            
        
            
            if ($this->module->Save($this->data)) {
                $this->session->set_flashdata('success', "operacion realizada con exito");
                redirect(BASE_BO . "modules/lists");
            }
        }
    }

    function ajax_list() {
        $list = $this->module->get_datatables($this->input->post());
        $data = array();
        $no = $this->input->post('start'); // $_POST['start'];
        foreach ($list as $lst) {
            $no ++;
            $row = array();
            $row[] = $lst->module_id;
            $row[] = $lst->module_name;
            $row[] = $lst->module_create_at;
            $row[] = $lst->module_status == 1 ? 'Activo' : 'Inactivo';
            $isActive = $lst->module_status == 1 ? 'green' : 'red';
            $row[] = '
                    <a href="' . base_url() . 'bo/modules/edit/' . $lst->module_id . '"> <i class="green bigger-160 ion ion-edit" ></i> </a>
                   &nbsp; <a   href="javascript:del('.$lst->module_id.')"           ><i class="red   bigger-160 ion-android-delete"></i></a>
                ';

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->module->count_all(),
            "recordsFiltered" => $this->module->count_filtered($this->input->post()),
            "data" => $data
        );
        // output to json format
        echo json_encode($output);
    }

}

/* End of file Controllername.php */
