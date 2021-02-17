<?php
if (! defined('BASEPATH'))     exit('No direct script access allowed');

class Product_Category_Model extends CI_Model {
    
 
    
    function __construct(){
        parent::__construct();
    }
    
    
    public  function GetAll(){
        $this->db->select('*')->from('category');
        $query = $this->db->get();
        return $query->result();
    }
    
    public function getById($sku){
        $this->db->select('*')->from('product')->where('product_sku',$sku);
        $query = $this->db->get();
        return $query->result();
     
    }
    
    public function Save($banner){


        
        
    }
    
    public function RecorCount(){
        
    }


    public function getAllProduct(){
        
        $this->db->select('*')->from('product');
        $query = $this->db->get();
        //echo $this->db->last_query();
        return $query->result();
        
    }
    
    public function getProductByCategorys($category=null){
        
        //$this->db->select('*')->from('product')->where('category_id' ,$category)->limit(12);
        $this->db->select('*')->from('product')->like('category_inter_ids',",{$category},")->limit(12);
       
       
        $query = $this->db->get();
        //echo $this->db->last_query();
        return $query->result();
        
    }
    
    
    public function getAllCategories(){
        $this->db->select('*')->from('category');
        $query = $this->db->get();
        return $query->result();

    }
    
    public function getAllBrands(){
        $this->db->select('*')->from('brand');
        $query = $this->db->get();
        return $query->result();

    }
    
    
}