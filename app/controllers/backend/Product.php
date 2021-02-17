<?php
if (! defined('BASEPATH'))
    exit('No direct script access allowed');

class Product extends CI_Controller{

    function __construct(){ 
        parent::__construct();
        if( !$this->session->userdata('isLogued') ){
             redirect(base_url('bo/login'),'refresh');
        }
        $this->load->helper('category_helper');
        $this->load->model('Product_Model','product');
        $this->load->model('Code_Model','code');
        $this->load->library('upload');
        add_css(array(
            BASE_THEME.'plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css',
            BASE_THEME.'plugins/select2/select2.css',
        ));
        
        add_js(array(
            BASE_THEME.'plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js',
            BASE_THEME.'plugins/select2/select2.full.min.js',
            BASE_THEME.'plugins/parsleyjs/parsley.min.js',
            BASE_THEME.'plugins/parsleyjs/i18n/es.js',
            BASE_JS_BO . 'product.js',
            
        ));
    }

    function index(){
        redirect( base_url()."bo/product/Lists/");
    }

    function Lists (){
        $this->data['tittle'] = "Administracion de Producto";
        $this->data['sub_tittle'] = "Listado de Productos";
        $this->data['description'] = "Listado de Productos";
        $this->data['btn_add_tittle'] ="Nuevo Producto";
       
        $this->data['csfr'] = array(
            'csrfName' => $this->security->get_csrf_token_name(),
            'csrfHash' => $this->security->get_csrf_hash()
        );
        $this->data['content'] = 'backend/product/List';
        $this->load->view('backend/layout/layout', $this->data);
    }

    function Add()
    {
       
        
        
        $this->data['tittle']       = "Administracion Productos";
        $this->data['sub_tittle']   = "Nuevo Producto";
        $this->data['description']  = "Permite agregar un nuevo producto";
        $this->data['category_one']     = $this->assets->get_category_level(1);
        $this->data['category_two']     = $this->assets->get_category_level(2);
        $this->data['category_three']     = $this->assets->get_category_level(3);
        
        $this->data['colors']           = $this->assets->getColors();
        $this->data['sizes']           = $this->assets->getSizes();
        
        $this->data['status']       = $this->assets->getStatus();
        $this->data['brands']       = $this->assets->getBrand();
        $this->data['codes']        = $this->code->getCodes();
        //$this->data['categorys']    = $this->assets->getCategory();
        $this->data['content']      = 'backend/product/Add';
        $this->load->view('backend/layout/layout', $this->data);
    }
    
    function Edit($poduct_id)
    {
       //print_r($this->product->getRows($poduct_id));
        $this->data['tittle']           = "Administracion Productos";
        $this->data['sub_tittle']       = "Editar Producto";
        $this->data['description']      = "Permite Editar un producto";
        $this->data['status']           = $this->assets->getStatus();
        $this->data['brands']           = $this->assets->getBrand();
        $this->data['colors']           = $this->assets->getColors();
        $this->data['sizes']           = $this->assets->getSizes();
        
        
        $this->data['codes']            = $this->code->getCodes();
        $this->data['category_one']     = $this->assets->get_category_level(1);
        $this->data['category_two']     = $this->assets->get_category_level(2);
        $this->data['category_three']     = $this->assets->get_category_level(3);
        
        
        
        
        $this->data['product']          = $this->product->getRows($poduct_id);
        $this->data['content']          = 'backend/product/Add';
        $this->load->view('backend/layout/layout', $this->data);
    }
    
    

    function save(){
       
        if ($_FILES ['product_list_image'] ['name'] == "" && $this->input->post('hdImage')!="" ) {
             $img =$this->input->post('hdImage'); 
        }else{
             $up=$this->upload('product_list_image');
                if($up['success']=="OK"){
                   $img=$up['file_name'];
                }else{
                $img='';
                }
        }
        
        if ($_FILES ['product_detail_image'] ['name'] == "" && $this->input->post('hdImageD')!="" ) {
             $imgD =$this->input->post('hdImageD'); 
        }else{
             $upD=$this->upload('product_detail_image');
                if($upD['success']=="OK"){
                   $imgD=$upD['file_name'];
                }else{
                $imgD='';
                }
        }
       

      

        $this->data=array();
        $this->data['product_id']                   =   $this->input->post('product_id');
        $this->data['code_id']                      =   $this->input->post('code_id');
        $this->data['product_sku']                  =   $this->input->post('product_sku');
        $this->data['product_name']                 =   $this->input->post('product_name');
        $this->data['brand_id']                     =   $this->input->post('brand_id');

        $this->data['product_cat_1']                =   $this->input->post('category_id_1');
        $this->data['product_cat_2']                =   $this->input->post('category_id_2');
        $this->data['product_cat_3']                =   $this->input->post('category_id_3');
       
        $this->data['product_size']                =   $this->input->post('product_size');
        $this->data['product_color']                =   $this->input->post('product_color');
        
        $this->data['product_stock']                =   $this->input->post('product_stock');
        $this->data['product_sale_price']           =   $this->input->post('product_sale_price');
		$this->data['product_sugest_price']         =   $this->input->post('product_sugest_price');
        $this->data['product_long_description']     =   $this->input->post('product_long_description');
        $this->data['product_short_description']    =   $this->input->post('product_short_description');
        $this->data['product_list_image']           =   $img;
        $this->data['product_detail_image']         =   $imgD;
        $this->data['product_status']               =   $this->input->post('product_status');
        $this->data['product_created_at']           =   date("Y-m-d H:i:s");
    
        
 
        
        if ($this->product->Save($this->data)){
            $this->session->set_flashdata('success'  , "operacion realizada con exito");
            redirect(BASE_BO."product/lists");
        }else{
            $this->session->set_flashdata('error'  , "operacion fallido");
            redirect(BASE_BO."product/lists");
        }
    }

    function upload($campo = null) {
        $config['upload_path']      =   './assets/frontend/img/product/';
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
    

    function ajax_list(){
        sleep(1);
        $list = $this->product->get_datatables($this->input->post());
       
   
        $data = array();
        $no = $this->input->post('start'); // $_POST['start'];

     
 
        foreach ($list as $product) {
            $no ++;
            $row = array();
            $row[] = $product->product_id;
            $row[] = $product->code_id;
            $row[] = $product->product_sku;
            $row[] = $product->product_name;
            $row[] = $product->product_created_at;
            $row[] = $product->product_status==1 ? 'Activo' : 'Inactivo' ;
            $isActive=$product->product_status==1 ? 'green' : 'red' ;
            $row[] = '
               
               &nbsp; <a   href="'.BASE_BO."product/edit/{$product->product_id}".'"     ><i class="green bigger-160 ion ion-edit"></i></a>
               &nbsp; <a   href="javascript:del('.$product->product_id.')"             ><i class="red   bigger-160 ion-android-delete"></i></a>
            ';
            
            $data[] = $row;
        }
        
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->product->count_all(),
            "recordsFiltered" => $this->product->count_filtered($this->input->post()),
            "data" => $data
        );
        // output to json format
        echo json_encode($output);
        
        
    }
  












    
   
    
}
