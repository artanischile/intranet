<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
    protected $data = array();
	function __construct(){

		parent::__construct();
		$this->data['uri'] = $this->uri->segment_array();
		$this->load->model('Dashboard_Model','dash');
        $this->data['csrf'] = $csrf = array(
            'name' => $this->security->get_csrf_token_name(),
            'hash' => $this->security->get_csrf_hash()
        );
        add_js(array(
            
            BASE_JS_BO . 'usuarios.js',
            
        ));
	}

	public function index()
	{

		$this->data['titulo_pagina']="Dashboard";
		$this->data['subtitulo_pagina']="Dashboard";
		$this->data['content'] = 'backend/dashboard/dashboard';
		$this->load->view('backend/layout/layout', $this->data);
	}

	function ajax_list(){
        //echo "<pre>";
         
        $list = $this->dash->get_datatables($this->input->post());
        
       // print_r($list); 
        
        $data = array();
        $no = $this->input->post('start'); // $_POST['start'];
        foreach ($list as $lst) {
            $no ++;
            $row = array();
            $row[] = $lst->id_solicitud;
            $row[] = $lst->rutsocio;
            $row[] = $lst->nombre;
            $row[] = $lst->tipo;
            $row[] = $lst->monto;
            $row[] = $lst->cantidad;
            $row[] = $lst->fecha;
            $row[] = $lst->fecha_des;
            $row[] = $lst->estado;
            $row[] = 'accion';
            $data[] = $row;
            
        }
        //print_r($data);
        //die();
        
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->dash->count_all(),
            "recordsFiltered" => $this->dash->count_filtered($this->input->post()),
            "data" => $data
        );
        // output to json format
        echo json_encode($output);
        
        
    }




	

}

/* End of file dashboard.php */
/* Location: .//C/xampp/htdocs/hardsoft/app/controllers/backend/dashboard.php */