<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category  extends CI_Controller {
    protected $data=array();

    public function __construct(){
        parent::__construct();
        if( !$this->session->userdata('isLogued') ){
             redirect(base_url('bo/login'),'refresh');
        }
        $this->data['uri'] = $this->uri->segment_array();
        $this->load->model('Category_Model','category');
        $this->form_validation->set_error_delimiters('', '');
        $this->load->helper('category_helper');
        
        add_js(array(
            BASE_THEME.'plugins/parsleyjs/parsley.min.js',
            BASE_THEME.'plugins/parsleyjs/i18n/es.js',
            BASE_JS_BO . 'category.js',
            
        ));
        
    }

    function index(){
        redirect( base_url()."bo/category/Lists/");
    }

    //CRUD METHODS

    public function Lists()
    {
        $this->data['tittle']       = "Administracion de Categorias de Productos";
        $this->data['sub_tittle']   = "agrega, modifica, elimina , activa o desactiva categorias";
        $this->data['description']  = "Mantencion Categorias";
        $this->data['csfr'] = array(
            'csrfName' => $this->security->get_csrf_token_name(),
            'csrfHash' => $this->security->get_csrf_hash()
        );
        $this->data['content'] = 'backend/product_category/List';
        $this->load->view('backend/layout/layout', $this->data);
    }

    function Add()
    {
        
        $this->data['tittle'] = "Administracion de Categorias";
        $this->data['sub_tittle'] = "Agregar Categoria";
        $this->data['description'] = "Permite agregar una nueva categoria";
        $this->data['status'] = $this->assets->getStatus();
        $this->data['titulo'] = "Agregar Nueva Categoria";
        $this->data['content'] = 'backend/product_category/Add';
        $this->load->view('backend/layout/layout', $this->data);
    }

    function Edit($category_id=0)
    {
        $this->data['tittle'] = "Administracion de Categorias";
        $this->data['sub_tittle'] = "Editar Categoria";
        $this->data['description'] = "Permite editar una categoria existente";
        $this->data['status'] = $this->assets->getStatus();
        $this->data['category'] = $this->category->getRows($category_id);
        $this->data['titulo'] = "Agregar Nueva Categoria";
        $this->data['content'] = 'backend/product_category/Add';
        $this->load->view('backend/layout/layout', $this->data);
    }




    function Save() {
        if ($this->input->post()) {
            $this->form_validation->set_rules('category_name'       ,'Nombre Categoria' ,'required|xss_clean');
            $this->form_validation->set_rules('category_parent_id'  ,'Categoria Padre'  ,'required|xss_clean|integer');
            $this->form_validation->set_rules('category_status'     ,'Estado'           ,'required|xss_clean|integer');
            
            if ($this->form_validation->run() === FALSE) {
                $err_data = array(
                    "succes"                =>  "error",
                    "category_name"         =>  form_error('category_name'),
                    "category_parent_id"    =>  form_error('category_parent_id'),
                    "category_status"       =>  form_error('category_status'),
                );
            
                $this->session->set_flashdata('errors'  , $err_data);
                $this->session->set_flashdata('data'    , $this->input->post());
                redirect(BASE_BO."category/add");
                exit();
            

            } else {
                
                $this->data=array();
                $this->data['category_id']              = $this->input->post('category_id', true);
                $this->data['category_name']            = $this->input->post('category_name', true);
                $this->data['category_parent_id']       = $this->input->post('category_parent_id', true);
                $this->data['category_friendly_name']   = strtolower(url_title(convert_accented_characters(strtolower($this->input->post('category_name', true)))));
                $this->data['category_status']          = $this->input->post('category_status', true);
                $this->data['category_create_at']       = date('Y-m-d H:i:s');
        
                if ($this->category->Save((object) $this->data)) {

                    $op_status=array(
                         "op_flag"      =>  "success",
                         "op_message"   =>  "operacion realizada con exito",  
                         "op_result"    =>  "succesfuly" 
                    );

                    $this->session->set_flashdata('op_status'  , $op_status);
                    redirect(BASE_BO."category/lists");
                }else{

                    $op_status=array(
                        "op_flag"=>"danger",
                        "op_message"=>"se produjieron errores al realizar la operacion",  
                        "op_result" =>"errors" 
                    );

                    $this->session->set_flashdata('op_status'  , $op_status);
                    redirect(BASE_BO."category/lists");    
                }

            }
            
            die();
          print_r($_POST);  
          return false;

        }else{

        }

    }

/***
 * [category_name] => test
    [category_parent_id] => 0
    [category_status] => 1
)
*/


  

    function ajax_list(){
        $list = $this->category->get_datatables($this->input->post());
        $data = array();
        $no = $this->input->post('start'); // $_POST['start'];
        foreach ($list as $lst) {
            $no ++;
            $categoryName=getCategoryName($lst->category_parent_id);
            $row = array();
            $row[] = $lst->category_id;
            $row[] = $lst->category_name;
            $row[] = $categoryName==0 ? 'Principal':$categoryName;
            $row[] = $lst->category_create_at;
            $row[] = $lst->category_status==1 ? 'Activo' : 'Inactivo' ;
            
            $isActive=$lst->category_status==1 ? 'green' : 'red' ;
            $row[] = '
                    <a href="'.base_url().'bo/category/edit/'.$lst->category_id.'"> <i class="green bigger-160 ion ion-edit" ></i> </a>
                ';
            
            $data[] = $row;
        }
        
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->category->count_all(),
            "recordsFiltered" => $this->category->count_filtered($this->input->post()),
            "data" => $data
        );
        // output to json format
        echo json_encode($output);
        
        
    }
    


}

/* End of file Controllername.php */
