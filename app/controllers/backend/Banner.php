<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Banner extends CI_Controller {

    protected $data = array();

    function __construct() {

        parent::__construct();
        if (!$this->session->userdata('isLogued')) {
            redirect(base_url('bo/login'), 'refresh');
        }
        $this->load->model('Banners_Model', 'banner');
        $this->data['uri'] = $this->uri->segment_array();
        $this->form_validation->set_error_delimiters('<li>', '</li>');

        add_css(array(
        ));
        add_js(array(
            BASE_JS_BO . 'banners.js',
        ));
    }

    function index() {
        redirect(base_url() . "bo/banner/Lists/");
    }

    function Lists() {
        $this->data['tittle'] = "Administracion Banners";
        $this->data['sub_tittle'] = "Listado de Banners";
        $this->data['description'] = "Listado de banners";
        $this->data['csfr'] = array(
            'csrfName' => $this->security->get_csrf_token_name(),
            'csrfHash' => $this->security->get_csrf_hash()
        );
        $this->data['content'] = 'backend/banner/List';
        $this->load->view('backend/layout/layout', $this->data);
    }

    function Add() {
        $this->data['tittle'] = "Administracion Banners";
        $this->data['sub_tittle'] = "Agregar Banner";
        $this->data['description'] = "Permite agregar un nuevo Banner";
        $this->data['content'] = 'backend/banner/Add';
        $this->load->view('backend/layout/layout', $this->data);
    }

    function Edit($banner_id = null) {
        $this->data['tittle'] = "Administracion de Banners";
        $this->data['sub_tittle'] = "Editar Banner";
        $this->data['description'] = "Permite modificar informacion d eun usuario";
        $this->data['data']=$this->banner->getRows(array('banner_id' => $banner_id));
        $this->data['content'] = 'backend/banner/Add';
        $this->load->view('backend/layout/layout', $this->data);
    }

    function Save() {

        $this->form_validation->set_rules('banner_title', 'Titulo', 'required|xss_clean');
        $this->form_validation->set_rules('banner_status', 'Estado', 'required|xss_clean');
        if ($this->form_validation->run() === FALSE) {
            $this->session->set_flashdata('errors', $err_data);
            $this->session->set_flashdata('data', $this->input->post());
        } else {

            $config['upload_path'] = './assets/frontend/img/slider/';
            $config['allowed_types'] = 'jpg|png';
            $config['max_size'] = '1000';
            $config['max_width'] = '1600';
            $config['max_height'] = '535';
            $config['remove_spaces'] = TRUE;
            $this->load->library('upload', $config);
            print_r($_FILES);
            if($_FILES['banner_image']['name']=="" && !empty($this->input->post('hdImage')) ){
                 $sbi['file_name']=   $this->input->post('hdImage');
            }else{
                $sbi = $this->SubirImagen($config, 'banner_image');
            }
           
            if (is_array($sbi) && count($sbi) > 0) {
                $this->data = array();
                $this->data['banner_id'] = $this->input->post('banner_id');
                $this->data['banner_title'] = $this->input->post('banner_title');
                $this->data['banner_url'] = $this->input->post('banner_url');
                $this->data['banner_image'] = $sbi['file_name'];
                $this->data['banner_target'] = $this->input->post('banner_target');
                $this->data['banner_create_at'] = date('Y-m-d H:i:s');
                $this->data['banner_status'] = $this->input->post('banner_status');
               
                if ($this->banner->save($this->data)){
                   $this->session->set_flashdata('success', "operacion realizada con exito");
                   redirect(BASE_BO . "banner/lists");
                }else{
                    $this->session->set_flashdata('errors', $err_data);
                    $this->session->set_flashdata('data', $this->input->post());
                }
            } else {
                $this->session->set_flashdata('errors', $err_data);
                $this->session->set_flashdata('data', $this->input->post());
                
            }
        }



        //print_r($_POST);
        //print_r($_FILES);
    }

    function banner_list() {

        $list = $this->banner->get_datatables($this->input->post());

        $data = array();
        $no = $this->input->post('start'); // $_POST['start'];
        foreach ($list as $banner) {
            $no ++;
            $row = array();
            $row[] = $banner->banner_id;
            $row[] = $banner->banner_title;
            $row[] = $banner->category_name;
            $row[] = $banner->banner_create_at;
            $row[] = $banner->banner_status == 1 ? 'Activo' : 'Inactivo';
            $isActivebanner = $banner->banner_status == 1 ? 'green' : 'red';
            $row[] = '
      
               &nbsp; <a   href="' . BASE_BO . "banner/edit/{$banner->banner_id}" . '"  ><i class="green ion ion-edit bigger-160"></i></a>
               &nbsp; <a   href="javascript:del(' . $banner->banner_id . ')"             ><i class="red  ion-android-delete bigger-160"></i></a>
            ';

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->banner->count_all(),
            "recordsFiltered" => $this->banner->count_filtered($this->input->post()),
            "data" => $data
        );
        // output to json format
        echo json_encode($output);
    }

    function SubirImagen($data = null, $campo = null) {
        $this->upload->initialize($data);
        if (!$this->upload->do_upload($campo)) {
            return $this->upload->display_errors();
        } else {
            return $this->upload->data();
        }
    }

}
