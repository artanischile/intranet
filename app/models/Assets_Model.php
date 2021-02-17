<?php
if (! defined('BASEPATH'))
    exit('No direct script access allowed');

class Assets_Model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    public function getStatus(){
        $this->db->select('status_name,status_value ');
        $this->db->from('status');
        $this->db->where('status_status',1);
        $query = $this->db->get();
        return  $query->result();
    } 


    public function getRegion(){
        $this->db->select('region_id,region_name ');
        $this->db->from('region');
        $this->db->where('region_status',1);
        $query = $this->db->get();
        return  $query->result();
    } 
    
    public function getRegionName($region_id){
        $this->db->select('region_name ');
        $this->db->from('region');
        $this->db->where('region_id',$region_id);
        $query = $this->db->get();
        $row= $query->result();
        return $row[0]->region_name;
    } 


    public function getCommuneByRegion($reg_id){
        $this->db->select('commune_id,commune_name ');
        $this->db->from('commune');
        $this->db->where('commune_status',1);
        $this->db->where('commune_region_id',$reg_id);
        $query = $this->db->get();
        return  $query->result();
    } 


    public function getBrand(){
        $this->db->select('brand_id,brand_name ');
        $this->db->from('brand');
        $this->db->where('brand_status',1);
        $query = $this->db->get();
        return  $query->result();
    } 
    
    public function get_category_level($level){
         $this->db->select('category_id,category_name ');
         $this->db->from('category');
         $this->db->where('category_level',$level);
         $this->db->where('category_status',1);
         
        $query = $this->db->get();
        return  $query->result();
    }
    
    public  function getColors(){
         $this->db->select('product.product_color ');
         $this->db->from('product');
         $this->db->group_by('product.product_color');
         $query = $this->db->get();
        return  $query->result();
    }
    
    public  function getSizes(){
         $this->db->select('product.product_size');
         $this->db->from('product');
         $this->db->group_by('product.product_size');
         $this->db->having('product_size is not null');
         $query = $this->db->get();
        return  $query->result();
    }
    
    
    
   

    /*public function getCategorys(){
        $this->db->select('category_id,category_name ');
        $this->db->from('category');
        $this->db->where('category_status',1);
        $query = $this->db->get();
        return  $query->result();
    } */


}