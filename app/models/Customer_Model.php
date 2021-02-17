<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Customer_model extends CI_Model {

    var $table = 'customers';
    var $column_order = array(
        'customer_id',
        'customer_rut_enterprise', 
        'customer_enterprise_name', 
        'customer_name', 
        'customer_email', 
        'customer_phone', 
        'customer_status'
        ); //set column field database for datatable orderable
    var $column_search = array(
        'customer_id',
        'customer_rut_enterprise', 
        'customer_enterprise_name', 
        'customer_name', 
        'customer_email', 
        'customer_phone', 
        'customer_status'
        
        );
    var $order = array('customer_id' => 'asc'); // default order

    public function __construct() {
        parent::__construct();
    }
    
    
    function getRows($params = array()){
        $this->db->select('*');
        $this->db->from($this->table);
        
        if(array_key_exists("conditions", $params)){
            foreach($params['conditions'] as $key => $val){
                $this->db->where($key, $val);
            }
        }
        
        if(array_key_exists("returnType",$params) && $params['returnType'] == 'count'){
            $result = $this->db->count_all_results();
        }else{
            if(array_key_exists("customer_id", $params)){
                $this->db->where('customer_id', $params['customer_id']);
                $query = $this->db->get();
                $result = $query->row();
            }else{
               // $this->db->order_by('first_name', 'asc');
                if(array_key_exists("start",$params) && array_key_exists("limit",$params)){
                    $this->db->limit($params['limit'],$params['start']);
                }elseif(!array_key_exists("start",$params) && array_key_exists("limit",$params)){
                    $this->db->limit($params['limit']);
                }
                
                $query = $this->db->get();
                $result = ($query->num_rows() > 0)?$query->result():FALSE;
            }
        }
       
        return $result;
    }

    public function getCustomer($customer_id) {
        $this->db
                ->select()
                ->from($this->table)
                ->where('customer_id', $customer_id);
        $query = $this->db->get();
        return $query->result();
    }

    public function Save($data = '') {
        if ($data['customer_id'] > 0) {
            $status = $this->UpdateRecord($data);
        } else {
            $status = $this->AddRecord($data);
        }
        return $status;
    }

    private function AddRecord($info = array()) {
        $this->db->trans_start();
        $this->db->insert($this->table, $info);
        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE) {
            return FALSE;
        } else {
            return TRUE;
        }
    }

    private function UpdateRecord($info = array()) {
        $this->db->trans_start();
        $this->db->where('customer_id', $info['customer_id']);
        $this->db->update($this->table, $info);
        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE) {
            return FALSE;
        } else {
            return TRUE;
        }
    }

    function VerifyCustomerAccess($info) {

        $this->db
                ->select()
                ->from($this->table)
                ->where('customer_email', $info['user'])
                ->where('customer_password', $info['password']);
        $query = $this->db->get();
        // echo $this->db->last_query();
        if ($query->num_rows()) {
            return true;
        } else {
            return false;
        }
    }

    function GetUserInfo($user_name) {
        $this->db
                ->select()
                ->from($this->table)
                ->where('customer_email', $user_name);
        $query = $this->db->get();
        return $query->result();
    }

    function getCustomerOrders($customer_id) {
        $this->db
                ->select()
                ->from('orders')
                ->where('customer_id', $customer_id);
        $query = $this->db->get();
        return $query->result();
    }

    function getCustomerOrdersDetails($order_id) {

        $this->db
                ->select('order_detail.order_details_id,
                        order_detail.order_id,
                        order_detail.product_code,
                        order_detail.product_id,
                        order_detail.product_attr_1,
                        order_detail.product_attr_2,
                        order_detail.product_quantity,
                        order_detail.product_sub_total,
                        order_detail.`comment`,
                        product_code.code_description')
                ->from('orders')
                ->join('order_detail', 'orders.order_id = order_detail.order_id')
                ->join('product_code', 'order_detail.product_code = product_code.`code`')
                ->where('order_detail.order_id', $order_id);
        $query = $this->db->get();
        return $query->result();
    }

    function SaveLastLogin($info) {

        $this->db->where('customer_id', $info['customer_id']);
        $this->db->update($this->table, $info);
        // echo $this->db->last_query();
    }

    private function _get_datatables_query($params = null) {
        $this->db->from($this->table);
        $i = 0;
        foreach ($this->column_search as $item) { // loop column
            if ($params['search']['value']) { // if datatable send POST for search
                if ($i === 0) { // first loop
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $params['search']['value']);
                } else {
                    $this->db->or_like($item, $params['search']['value']);
                }

                if (count($this->column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }

        if (isset($params['order'])) { // here order processing
            $this->db->order_by($this->column_order[$params['order']['0']['column']], $params['order']['0']['dir']);
        } else if (isset($this->order)) {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    function get_datatables($param = null) {
        $this->_get_datatables_query($param);
        if ($param['length'] != -1)
            $this->db->limit($param['length'], $param['start']);
        $query = $this->db->get();
        return $query->result();
    }

    function count_filtered($param) {
        $this->_get_datatables_query($param);
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all() {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

}
