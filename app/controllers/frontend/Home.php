<?php
if (!defined('BASEPATH'))exit('No direct script access allowed');

class Home extends  CI_Controller{

    protected $data = array();
     
    function __construct()
    {
        parent::__construct();
    }
    
    function index(){
        $data['content']="frontend/home/home";
        $this->load->view('frontend/layout/layout', $data);
        
    }

    function mision(){
        $data['content']="frontend/mision/mision";
        $this->load->view('frontend/layout/layout', $data);
        
    }
    
    function quienes(){
        $data['content']="frontend/vision/vision";
        $this->load->view('frontend/layout/layout', $data);
        
    }
    
    function unete(){
        $data['content']="frontend/unete/unete";
        $this->load->view('frontend/layout/layout', $data);
        
    }
    
    function works(){
        $data['content']="frontend/home/trabaja";
        $this->load->view('frontend/layout/layout', $data);
        
    }


}    