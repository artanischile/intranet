<?php
if (!defined('BASEPATH'))exit('No direct script access allowed');

class Landing extends  CI_Controller{

    protected $data = array();
     
    function __construct()
    {
        parent::__construct();
    }
    
    function index(){
        //$data['info']=R::findAll( 'producto', ' ORDER BY id DESC LIMIT 9 ' );
        //$data['blog']=R::findAll( 'tema', ' ORDER BY id DESC LIMIT 9 ' );
        $data['content']="frontend/brands/brands";
        $this->load->view('frontend/layout/layout', $data);
        
    }
    
    
    public function force(){
        $data['csfr'] = array(
            'csrfName' => $this->security->get_csrf_token_name(),
            'csrfHash' => $this->security->get_csrf_hash()
        );
        $this->load->view('frontend/landing/force',$data);
     }
     
     public function systemsix(){
        $data['csfr'] = array(
            'csrfName' => $this->security->get_csrf_token_name(),
            'csrfHash' => $this->security->get_csrf_hash()
        );
        $this->load->view('frontend/landing/system-six',$data);
     }
    
    public function cannondale_fsi(){
        $data['csfr'] = array(
            'csrfName' => $this->security->get_csrf_token_name(),
            'csrfHash' => $this->security->get_csrf_hash()
        );
        $this->load->view('frontend/landing/fsi',$data);
     }

     public function sensor(){
        $data['csfr'] = array(
            'csrfName' => $this->security->get_csrf_token_name(),
            'csrfHash' => $this->security->get_csrf_hash()
        );
        $this->load->view('frontend/landing/sensor',$data);
     }

     public function si(){
        $data['csfr'] = array(
            'csrfName' => $this->security->get_csrf_token_name(),
            'csrfHash' => $this->security->get_csrf_hash()
        );
        $this->load->view('frontend/landing/si',$data);
     }
    
    
    public function new_jekill(){
        $data['csfr'] = array(
            'csrfName' => $this->security->get_csrf_token_name(),
            'csrfHash' => $this->security->get_csrf_hash()
        );
        $this->load->view('frontend/landing/new_jekill',$data);
     }
    
    

     public function jekill(){
        $data['csfr'] = array(
            'csrfName' => $this->security->get_csrf_token_name(),
            'csrfHash' => $this->security->get_csrf_hash()
        );
        $this->load->view('frontend/landing/jekill',$data);
     }
    
    public function trigger(){
        $data['csfr'] = array(
            'csrfName' => $this->security->get_csrf_token_name(),
            'csrfHash' => $this->security->get_csrf_hash()
        );
        $this->load->view('frontend/landing/trigger',$data);
     }
    
    
    public function scalpel(){
        $data['csfr'] = array(
            'csrfName' => $this->security->get_csrf_token_name(),
            'csrfHash' => $this->security->get_csrf_hash()
        );
        $this->load->view('frontend/landing/scalpel',$data);
     }
    
    
    public function supersixevo(){
        $data['csfr'] = array(
            'csrfName' => $this->security->get_csrf_token_name(),
            'csrfHash' => $this->security->get_csrf_hash()
        );
        $this->load->view('frontend/landing/supersix',$data);
     }
     
     
     public function synapse(){
        $data['csfr'] = array(
            'csrfName' => $this->security->get_csrf_token_name(),
            'csrfHash' => $this->security->get_csrf_hash()
        );
        $this->load->view('frontend/landing/synapse',$data);
     }
     
    
    
    public function Save(){
            $this->form_validation->set_error_delimiters('', '');
            $this->form_validation->set_rules('nombre'      ,    'Nombre'     ,'required|trim|xss_clean');
            $this->form_validation->set_rules('telefono'    , 'Telefono'      ,'required|trim|xss_clean|numeric|exact_length[9]');
            $this->form_validation->set_rules('email'       ,    'Email'      ,'required|trim|xss_clean|valid_email');
            if ($this->form_validation->run() === FALSE) {
                $err_data = array(
                    "succes"        => "error",
                    "msg"        => "Debe Llenar todos los campos marcado con (*)",
                    "nombre"        => form_error('nombre'),
                    "telefono"        => form_error('telefono'),
                    "email"        => form_error('email'),
                   
                    
                 ); 
                 
                echo json_encode($err_data);
                exit;
                        
            }else{
                
                $save['nombre']=$this->input->post('nombre');
                $save['telefono']=$this->input->post('telefono');
                $save['email']=$this->input->post('email');
                $save['mensaje']=$this->input->post('comentario');
                $save['modelo']=$this->input->post('modelo');
                $save['create_at']=date('Y-m-d h:i:s');
                $this->db->trans_start();
                $this->db->insert('resgister', $save);
                $this->db->trans_complete();
                
                /*$err_data = array(
                        "succes"        => "succes",
                        "msg"        => "Su mensaje ha sido enviado",
                      );
                  
                  echo json_encode($err_data);
                  exit;*/
                
                
                $message="
                   <table width='600'>
                     <tr>
                          <td colspan='3' >  Landing ".$this->input->post('landing')." </td>
                      </tr> 
                      <tr>
                          <td>NOMBRE</td>
                          <td>:</td>
                      <td>".$this->input->post('nombre')."</td>
                      <tr>
                          <td>MODELO</td>
                          <td>:</td>
                      <td>".$this->input->post('modelo')."</td>
                      </tr>
                          <tr>
                          <td>TELEFONO</td>
                          <td>:</td>
                      <td>".$this->input->post('codigo').$this->input->post('telefono')."</td>
                      </tr>
                      <tr>
                            <tr>
                          <td>Email</td>
                          <td>:</td>
                      <td>".$this->input->post('email')."</td>
                      </tr>
                      <tr>
                            <tr>
                          <td>Mensaje</td>
                          <td>:</td>
                      <td>".$this->input->post('comentario')."</td>
                      </tr>
                      <tr>
                          <td>FECHA</td>
                          <td>:</td>
                      <td>".date("d-m-Y H:i:s")."</td>
                       </tr>    
                  </table>
                  ";
                
                    $email_config = Array(
                   				'mailtype'  => 'html',
                   				'newline'   => "\r\n"
               		);
                    
                    /*$config['protocol']    = 'smtp';
                    $config['smtp_host']    = 'mail.dorelsportschile.cl';
                    $config['smtp_port']    = '465';
                    $config['smtp_timeout'] = '7';
                    $config['smtp_user']    = 'contacto@dorelsportschile.cl';
                    $config['smtp_pass']    = '6rt6n1sCH;';
                    $config['charset']    = 'utf-8';
                    $config['mailtype'] = 'html'; 
                    $config['newline']    = "\r\n";*/
                    
                    
                    /*$config['protocol']    = 'smtp';
                    $config['smtp_host']    = 'mail.dorelsportschile.cl';
                    $config['smtp_port']    = '465';
                    $config['smtp_timeout'] = '7';
                    $config['smtp_user']    = 'contacto@dorelsportschile.cl';
                    $config['smtp_pass']    = '6rt6n1sCH;';
                    $config['charset']    = 'utf-8';
                    $config['mailtype'] = 'html'; 
                    $config['newline']    = "\r\n";
                    */
                    
                        //Indicamos el protocolo a utilizar
                        //$config['protocol'] = 'smtp';
                         
                       //El servidor de correo que utilizaremos
                       // $config["smtp_host"] = 'smtp.gmail.com';
                         
                       //Nuestro usuario
                       // $config["smtp_user"] = 'danielnune@gmail.com';
                         
                       //Nuestra contrase�a
                       // $config["smtp_pass"] = '6rt6n1sCH;';    
                         
                       //El puerto que utilizar� el servidor smtp
                        //$config["smtp_port"] = '587';
                        
                       //El juego de caracteres a utilizar
                       // $config['charset'] = 'utf-8';
                        
                      //  $config['mailtype'] = 'html'; 
                        
                      //   $config['newline']    = "\r\n";
                    
                    
                       //Permitimos que se puedan cortar palabras
                       // $config['wordwrap'] = TRUE;
                         
                         
                       //El email debe ser valido  
                       //$config['validate'] = true;
                       
                    $email_config = Array(
                   				'mailtype'  => 'html',
                   				'newline'   => "\r\n"
               	    );   
     
                    $this->load->library('email');
                    $this->email->initialize($email_config);
                    $this->email->from('contacto@dorelsportschile.cl','Contacto Web');
                    $this->email->to('jorge.zuniga@dorelsports.cl,jorge.penailillo@dorelsports.cl');
                    $this->email->cc('eduardo.hidalgo@dorelsports.cl');
                   
                    //$this->email->to('danielnune@gmail.com');
                    $this->email->bcc('sreyes@tsfg.cl','Saria Reyes');
                    
                    $this->email->subject('Landing '. $this->input->post('modelo') );
                    $this->email->message($message);
                
                
                
                
                
                
               if ($this->email->send()) {
                      $err_data = array(
                        "succes"        => "succes",
                        "msg"        => "Su mensaje ha sido enviado",
                      );
                  }else{
                    echo $this->email->print_debugger();
                        $err_data = array(
                        "succes"        => "succes",
                        "msg"        => "Imposible enviar correo intentelo mas tarde",
                       );
                  }
                  
                  /*$err_data = array(
                        "succes"        => "succes",
                        "msg"        => "Su mensaje ha sido enviado",
                      );
                  */
                  echo json_encode($err_data);
                  exit;
                  
                  
                  
                  
                  
                  
                
            }
        
        
    }
    


}    