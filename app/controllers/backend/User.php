<?php
if (! defined('BASEPATH'))
    exit('No direct script access allowed');

class User extends CI_Controller
{

    protected $data = array();

    function __construct()
    {
        parent::__construct();

     /*if( !$this->session->userdata('userlogued') ){
             redirect(base_url('bo/login'),'refresh');
        }*/

        $this->load->model('Profile_Model', 'profile');
        $this->load->model('User_Model', 'user');
        $this->load->library('Paginacion','paginar');
        $this->data['uri'] = $this->uri->segment_array();
        
         add_css(array(
            
        ));
        
        add_js(array(
            BASE_THEME.'plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js',
            
            BASE_JS_BO . 'users.js',
            
        ));

       
        /**add_css(array(
            
            BASE_JS_BO_PLUGINS . 'datatables.net-bs/css/dataTables.bootstrap.min.css',
            BASE_JS_BO_PLUGINS . 'bootstrap-sweetalert/sweet-alert.css',
            
        ));
        
        add_js(array(
            
            BASE_JS_BO_PLUGINS .    'datatables.net/js/jquery.dataTables.min.js',
            BASE_JS_BO_PLUGINS .    'datatables.net-bs/js/dataTables.bootstrap.min.js',
            BASE_JS_BO_PLUGINS .    'bootstrap-sweetalert/sweet-alert.min.js',
            BASE_JS_BO_PLUGINS .    'parsleyjs/parsley.min.js',
            BASE_JS_BO_PLUGINS .    'parsleyjs/i18n/es.js',
            BASE_JS_BO .            'users.js',
        ));*/
    }

    function index()
    {
        redirect( base_url()."bo/user/Lists/");
    }


    function Lists (){
        $this->data['tittle'] = "Administracion Usuarios";
        $this->data['sub_tittle'] = "Listado de Usuarios";
        $this->data['description'] = "Listado de usaurios del sistema";
        $this->data['csfr'] = array(
            'csrfName' => $this->security->get_csrf_token_name(),
            'csrfHash' => $this->security->get_csrf_hash()
        );
        $this->data['content'] = 'backend/user/List';
        $this->load->view('backend/layout/layout', $this->data);
    }

    function Add()
    {
        $this->data['tittle']       = "Administracion Usuarios";
        $this->data['sub_tittle']   = "Agregar Usuario";
        $this->data['description']  = "Permite agregar un nuevo usuario al sistema";
        $this->data['profiles']     = $this->profile->getActiveProfiles();
        $this->data['content']      = 'backend/user/Add';
        $this->load->view('backend/layout/layout', $this->data);
    }
    

    function Edit($user_id = null)
    {
        $this->data['tittle']           = "Administracion Usuarios";
        $this->data['sub_tittle']       = "Editar Usuario";
        $this->data['description']      = "Permite modificar informacion d eun usuario";
        $this->data['profiles']         = $this->profile->getActiveProfiles();
        $this->data['user']             = $this->user->getRows($user_id);
        $this->data['content']          = 'backend/user/Edit';
        $this->load->view('backend/layout/layout', $this->data);
    }

    function Delete()
    {
        if ($this->user->Delete($this->input->post('user_id'))){
            $err_data = array(
                "succes" => "true",
                "msg" => "Operacion realizada con exito"
            );
        }else{
            $err_data = array(
                "succes" => "false",
                "msg" => "Operacion realizada con exito"
            );
        }
        echo  json_encode( $err_data );
    }

    function Change($user_id){
        $this->data['tittle']       = "Administracion Usuarios";
        $this->data['sub_tittle']   = "Cambiar Contraseña Usuario";
        $this->data['description']  = "Permite modificar la clave del usuario ";
        $this->data['user_id']      = $user_id;
        $this->data['content']      = 'backend/user/change';
        $this->load->view('backend/layout/layout', $this->data);
    }

   

    function Save()
    {
        if ($this->input->post()) {
            if (!$this->input->post('user_id')){
               $this->__create($this->input->post());
            }else{
                $this->__update($this->input->post()); 
            }
        }
   
    }


    function Changepass(){
        $this->data['user_id']          = $this->input->post('user_id', true); 
        $this->data['user_password']    = $this->enc->encode($this->input->post('user_password', true));
        $this->data['user_updated']     = date('Y-m-d H:i:s');
        if ($this->user->UpdatePassword((object) $this->data)) {
            $err_data = array(
                "status" => true,
                "action"=>"Actualizacion Password Usuario",
                "msg" => "La operación fue realizada con exito"
            );
        } else {
                $err_data = array(
                    "status" => false,
                    "action"=>"Actualizacion de Usuario",
                    "msg" => "Operacion fallida"
                );
        }
        $this->session->set_flashdata('success', $err_data);
        redirect(BASE_BO."user/lists/");
        die();
    }


    private function __create($data=array()){
        $this->form_validation->set_error_delimiters('', '');
        $this->form_validation->set_rules('user_first_name' ,'Nombre'       , 'required|xss_clean');
        $this->form_validation->set_rules('user_last_name'  ,'Apellido'     , 'required|xss_clean');
        $this->form_validation->set_rules('user_email'      ,'Email '       , 'required|xss_clean|valid_email|is_unique[user.user_email]');
        $this->form_validation->set_rules('user_phone'      ,'Telefono '    , 'required|xss_clean');
        $this->form_validation->set_rules('user_username'   , 'Usuario'     , 'required|xss_clean|min_length[6]|is_unique[user.user_name]');
        $this->form_validation->set_rules('user_password'   , 'Password '   , 'required|xss_clean|min_length[6]');
        $this->form_validation->set_rules('user_profile'    , 'Perfil'      , 'required|xss_clean');
        $this->form_validation->set_rules('user_status'     , 'Estado'      , 'required|xss_clean');
        if ($this->form_validation->run() === FALSE) {
            $err_data = array(
                "succes" => "error",
                "user_first_name"   => form_error('user_first_name'),
                "user_last_name"    => form_error('user_last_name'),
                "user_email"        => form_error('user_email'),
                "user_username"     => form_error('user_username'),
                "user_password"     => form_error('user_password'),
                "user_profile"      => form_error('user_profile'),
                "user_status"       => form_error('user_status')
            );
            $this->session->set_flashdata('errors', $err_data);
            $this->session->set_flashdata('data', $this->input->post());
            redirect(BASE_BO."user/add");
        }else{


            $this->data=array();
            $this->data['user_id']          = $this->input->post('user_id', true);
            $this->data['user_first_name']  = $this->input->post('user_first_name', true);
            $this->data['user_last_name']   = $this->input->post('user_last_name', true);
            $this->data['user_name']        = $this->input->post('user_username', true);
            $this->data['user_password']    = $this->enc->encode($this->input->post('user_password', true));
            $this->data['user_email']       = $this->input->post('user_email', true);
            $this->data['user_phone']       = $this->input->post('user_phone', true);
            $this->data['user_profile_id']  = $this->input->post('user_profile', true);
            $this->data['user_status']      = $this->input->post('user_status', true);
            $this->data['user_created']     = date('Y-m-d H:i:s');
            
            if ($this->user->Save((object) $this->data)) {
                $err_data = array(
                    "status" => true,
                    "action"=>"Creación de usuario : ",
                    "msg" => "La operación fue realizada con exito"
                ) ;   
            } else {
                $err_data = array(
                    "status" => false,
                    "action"=>"Creación de Usuario: ",
                    "msg" => "Operacion fallida"
                );
            }
            $this->session->set_flashdata('success', $err_data);
            redirect(BASE_BO."user/lists/");
            die();
        }    


    } 


    private function __update(){
        $this->form_validation->set_error_delimiters('', '');
        $this->form_validation->set_rules('user_first_name' ,'Nombre'       , 'required|xss_clean');
        $this->form_validation->set_rules('user_last_name'  ,'Apellido'     , 'required|xss_clean');
        $this->form_validation->set_rules('user_email'      ,'Email '       , 'required|xss_clean|valid_email');
        $this->form_validation->set_rules('user_phone'      ,'Telefono '    , 'required|xss_clean');
        $this->form_validation->set_rules('user_profile'    , 'Perfil'      , 'required|xss_clean');
        $this->form_validation->set_rules('user_status'     , 'Estado'      , 'required|xss_clean');

        if ($this->form_validation->run() === FALSE) {
            $err_data = array(
                "succes" => "error",
                "user_first_name"   => form_error('user_first_name'),
                "user_last_name"    => form_error('user_last_name'),
                "user_email"        => form_error('user_email'),
                "user_phone"        => form_error('user_phone'),
                "user_profile"      => form_error('user_profile'),
                "user_status"       => form_error('user_status')
            );
            $this->session->set_flashdata('errors', $err_data);
            $this->session->set_flashdata('data', $this->input->post());
            redirect(BASE_BO."user/edit");
        }else{


            $this->data=array();
            $this->data['user_id']          = $this->input->post('user_id', true);
            $this->data['user_first_name']  = $this->input->post('user_first_name', true);
            $this->data['user_last_name']   = $this->input->post('user_last_name', true);
            $this->data['user_email']       = $this->input->post('user_email', true);
            $this->data['user_phone']       = $this->input->post('user_phone', true);
            $this->data['user_profile_id']  = $this->input->post('user_profile', true);
            $this->data['user_status']      = $this->input->post('user_status', true);
            $this->data['user_updated']     = date('Y-m-d H:i:s');
            
            if ($this->user->Save((object) $this->data)) {
                $err_data = array(
                    "status" => true,
                    "action"=>"Actualizacion de usuario : ",
                    "msg" => "La operación fue realizada con exito"
                ) ;   
            } else {
                $err_data = array(
                    "status" => true,
                    "action"=>"Actualizacion de usuario : ",
                    "msg" => "Operacion fallida"
                ) ;  
            }
            $this->session->set_flashdata('success', $err_data);
            redirect(BASE_BO."user/lists/");
            die();
        }    

    }


    function ajax_list(){
        sleep(3);
        $list = $this->user->get_datatables($this->input->post());
        $data = array();
        $no = $this->input->post('start'); // $_POST['start'];
        foreach ($list as $user) {
            $no ++;
            $row = array();
            $row[] = $user->user_id;
            $row[] = $user->user_first_name;
            $row[] = $user->user_last_name;
            $row[] = $user->user_name;
            $row[] = $user->profile_name;
            $row[] = $user->user_email;
            $row[] = $user->user_status==1 ? 'Activo' : 'Inactivo' ;
            $isActiveUser=$user->user_status==1 ? 'green' : 'red' ;
            $row[] = '
               &nbsp; <a   href="'.BASE_BO."user/change/{$user->user_id}".'"   ><i class="red   bigger-160 ion icon ion-key"></i></a>       
               &nbsp; <a   href="'.BASE_BO."user/edit/{$user->user_id}".'"     ><i class="green bigger-160 ion ion-edit"></i></a>
               &nbsp; <a   href="javascript:del('.$user->user_id.')"           ><i class="red   bigger-160 ion-android-delete"></i></a>
            ';
            
            $data[] = $row;
        }
        
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->user->count_all(),
            "recordsFiltered" => $this->user->count_filtered($this->input->post()),
            "data" => $data
        );
        // output to json format
        echo json_encode($output);
        
        
    }
   

}