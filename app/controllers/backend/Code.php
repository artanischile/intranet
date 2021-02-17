<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Code extends CI_Controller {

    protected $data = array();

    public function __construct() {

        parent::__construct();

        if (!$this->session->userdata('isLogued')) {
            redirect(base_url('bo/login'), 'refresh');
        }
        $this->data['uri'] = $this->uri->segment_array();
        $this->load->model('Code_Model', 'code');
        $this->form_validation->set_error_delimiters('', '');
        $this->load->library('upload');
        add_css(array(
        ));
        add_js(array(
            BASE_THEME . 'plugins/parsleyjs/parsley.min.js',
            BASE_THEME . 'plugins/parsleyjs/i18n/es.js',
            BASE_JS_BO . 'Code.js',
        ));
    }

    function index() {

        redirect(base_url() . "bo/code/Lists/");
    }

    //CRUD METHODS



    function Lists() {
        $this->data['tittle'] = "Administracion de Codigos Padres de Productos";
        $this->data['sub_tittle'] = "Listado de Codigos";
        $this->data['description'] = "Listado de Codigos";
        $this->data['csfr'] = array(
            'csrfName' => $this->security->get_csrf_token_name(),
            'csrfHash' => $this->security->get_csrf_hash()
        );
        $this->data['content'] = 'backend/code/List';
        $this->load->view('backend/layout/layout', $this->data);
    }

    function Add() {
        $this->data['tittle'] = "Administracion de Codigos Padres";
        $this->data['sub_tittle'] = "Agregar Codigo Padre";
        $this->data['description'] = "Permite agregar un nuevo codigo";
        $this->data['status'] = $this->assets->getStatus();
        $this->data['titulo'] = "Agregar Nueva Categoriao";
        $this->data['content'] = 'backend/code/Add';
        $this->load->view('backend/layout/layout', $this->data);
    }

    function Edit($id = null) {
        $this->data['tittle'] = "Administracion de Codigos Padre";
        $this->data['sub_tittle'] = "Editar Codigo Padre";
        $this->data['description'] = "Permite agregar un Codigo Padre";
        $this->data['status'] = $this->assets->getStatus();
        $this->data['brands'] = $this->code->getRows($id);
        $this->data['content'] = 'backend/code/Add';
        $this->load->view('backend/layout/layout', $this->data);
    }

    function Save() {
        
        
        



       /* $this->form_validation->set_error_delimiters('', '');
        $this->form_validation->set_rules('code', 'Codigo Padre ', 'required|xss_clean');
        $this->form_validation->set_rules('description_code', 'Descripcion', 'required|xss_clean');
        $this->form_validation->set_rules('code_status', 'Estado', 'required|xss_clean|integer');
*/


        /*if ($this->form_validation->run() === FALSE) {
            $err_data = array(
                "succes" => "error",
                "code" => form_error('code'),
                "code_description" => form_error('description_code'),
                "code_status" => form_error('code_status'),
            );
            $this->session->set_flashdata('errors', $err_data);
            $this->session->set_flashdata('data', $this->input->post());
            redirect(BASE_BO . "code/add");
        } else {*/

            if ($_FILES ['code_list_image'] ['name'] == "" && $this->input->post('hdImage') != "") {
                $img = $this->input->post('hdImage');
            } else {
                $up = $this->upload('code_list_image');
                if ($up['success'] == "OK") {
                    $img = $up['file_name'];
                } else {
                    $img = '';
                }
            }

            if ($_FILES ['code_detail_image'] ['name'] == "" && $this->input->post('hdImageD') != "") {
                $imgD = $this->input->post('hdImageD');
            } else {
                $upD = $this->upload('code_detail_image');
                if ($upD['success'] == "OK") {
                    $imgD = $upD['file_name'];
                } else {
                    $imgD = '';
                }
            }



            $this->data['id'] = $this->input->post('id');
            $this->data['code'] = $this->input->post('code');
            $this->data['code_description'] = $this->input->post('description_code');
            $this->data['code_web_description'] = $this->input->post('code_long_description');
            $this->data['code_friendly_name'] = gen_slug($this->input->post('description_code'));
            
            $this->data['code_list_image'] = $img;
            $this->data['code_detail_image'] = $imgD;
            
            
            $this->data['code_status'] = $this->input->post('code_status');
            $this->data['code_created_at'] = date('Y-m-d H:i:s');
                   
            if ($this->code->Save($this->data)) {
                $this->session->set_flashdata('success', "La operacion fue realizada con exito");
                redirect(BASE_BO . "code/lists");
            } else {
                $this->session->set_flashdata('success', "La operacion a fallado");
                redirect(BASE_BO . "code/lists");
            }
     /*   }*/
    }
    
    
    function upload($campo = null) {
        $config['upload_path']      =   './assets/frontend/img/code/';
        $config['allowed_types']    =   'jpg|png';
        $config['remove_spaces']    =   TRUE;
        $config['encrypt_name']     =   false;
        
        $this->upload->initialize($config);
        if ($this->upload->do_upload($campo)) {
           return array("success"=>"OK","file_name"=>$this->upload->data('file_name')); 
        } else {
            return array("success"=>"error","file_name"=>$this->upload->display_errors());
        }
    }
    

    function ajax_list() {
        $list = $this->code->get_datatables($this->input->post());
        $data = array();
        $no = $this->input->post('start'); // $_POST['start'];
        foreach ($list as $lst) {
            $no ++;
            $row = array();
            $row[] = $lst->id;
            $row[] = $lst->code;
            $row[] = $lst->code_description;
            $row[] = $lst->code_status == 1 ? 'Activo' : 'Inactivo';
            $row[] = $lst->code_created_at;
            $isActive = $lst->code_status == 1 ? 'green' : 'red';
            $row[] = '
                    <a href="' . base_url() . 'bo/code/edit/' . $lst->id . '"> <i class="green bigger-160 ion ion-edit" ></i> </a>
                ';
            $data[] = $row;
        }



        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->code->count_all(),
            "recordsFiltered" => $this->code->count_filtered($this->input->post()),
            "data" => $data
        );

        // output to json format

        echo json_encode($output);
    }

    

}

/* End of file Controllername.php */

