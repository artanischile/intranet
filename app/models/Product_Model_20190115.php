<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Product_Model extends CI_Model {

    var $table = 'product';
    var $column_order = array(
        'product_id',
        'code_id',
        'product_sku',
        'product_name',
        'product_status',
        'product_created_at',
    );
    // set column field database for datatable orderable
    var $column_search = array(
        'code_id',
        'product_sku',
        'product_name',
    );
    // set column field database for datatable searchable
    var $order = array(
        'product_id' => 'asc'
    );

    function __construct() {
        parent::__construct();
    }

    function getRows($id = null) {
        if (!empty($id)) {
            $this->db->select('*')
                    ->from($this->table)
                    ->where('product_id', $id);
        } else {
            $this->db->select('*')
                    ->from($this->table)
                    ->order_by('product_id', 'asc');
        }
        $query = $this->db->get();
       // echo $this->db->last_query();
        return $query->result();
    }

    public function Save($data = '') {
        $data = (object) $data;

        if ($data->product_id > 0) {
            $status = $this->__UpdateRecord($data);
        } else {
            $status = $this->__AddRecord($data);
        }
        return $status;
    }

    public function Delete($product_id) {
        return $this->__DeleteRecord($product_id);
    }

    private function __AddRecord($info = array()) {
        $this->db->trans_start();
        $this->db->insert($this->table, $info);
        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE) {
            return FALSE;
        } else {
            return TRUE;
        }
    }

    private function __UpdateRecord($info = array()) {
        $this->db->trans_start();
        $this->db->where('product_id', $info->product_id);
        $this->db->update($this->table, $info);
        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE) {
            return FALSE;
        } else {
            return TRUE;
        }
    }

    public function get_datatables($param = array()) {
        $this->_get_datatables_query($param);
        if ($param['length'] != - 1)
            $this->db->limit($param['length'], $param['start']);
        $query = $this->db->get();
        //echo $this->db->last_query();
        return $query->result();
    }

    public function count_all() {
        $this
                ->db->select('*')
                ->from($this->table);

        return $this->db->count_all_results();
    }

    function count_filtered($param) {
        $this->_get_datatables_query($param);
        $query = $this->db->get();
        return $query->num_rows();
    }

    private function _get_datatables_query($params = null) {

        // $this->db->from($this->table);
        $this->db->select('*')
                ->from($this->table);

        $i = 0;
        foreach ($this->column_search as $item) { // loop column
            if ($params['search']['value']) { // if datatable send POST for search
                if ($i === 0) { // first loop
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $params['search']['value']);
                } else {
                    $this->db->or_like($item, $params['search']['value']);
                }

                if (count($this->column_search) - 1 == $i) // last loop
                    $this->db->group_end(); // close bracket
            }
            $i ++;
        }

        if (isset($params['order'])) { // here order processing
            $this->db->order_by($this->column_order[$params['order']['0']['column']], $params['order']['0']['dir']);
        } else if (isset($this->order)) {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    public function GetAlls() {
        $this->db->select('*')->from('product');
        $query = $this->db->get();
        return $query->result();
    }

    public function getProductByCategory($category_name = null, $params = array()) {
        $category_inter_id = $this->__getIdCategoryByName($category_name);
        $this->
                db->select('product.code_id,
                        product_code.code_description,
                        product_code.code_list_image,
                        product_code.code_detail_image,
                        product_code.code_web_description,
                        brand.brand_name,
                        product_code.code_friendly_name
                ')
                ->from('product_code')
                ->join('product', 'product_code.`code` = product.code_id')
                ->join('brand', 'product.brand_id = brand.brand_id ')
                ->where('product.product_stock >', 0)
				->where('product.product_cat_1', $category_inter_id)
                ->or_where('product.product_cat_2', $category_inter_id)
                ->or_where('product.product_cat_3', $category_inter_id)
                ->group_by(array('product.code_id',
                    'product_code.code_description',
                    'brand.brand_name',
                    'product_code.code_list_image',
                    'product_code.code_detail_image',
                    'product_code.code_web_description')
        );
        if (array_key_exists("start", $params) && array_key_exists("limit", $params)) {
            $this->db->limit($params['limit'], $params['start']);
        } elseif (!array_key_exists("start", $params) && array_key_exists("limit", $params)) {
            $this->db->limit($params['limit']);
        }
        $query = $this->db->get();
       // echo $this->db->last_query();
        return $query->result();
    }

    public function getCountProductByCategory($category_name = null, $params = array()) {
        $category_inter_id = $this->__getIdCategoryByName($category_name);
        $this->
                db->select('product.code_id ')
                ->from('product_code')
                ->join('product', 'product_code.`code` = product.code_id')
                ->join('brand', 'product.brand_id = brand.brand_id ')
				->where('product.product_stock >', 0)
                ->where('product.product_cat_1', $category_inter_id)
                ->or_where('product.product_cat_2', $category_inter_id)
                ->or_where('product.product_cat_3', $category_inter_id)
                ->group_by(array('product.code_id',
                    'product_code.code_description',
                    'brand.brand_name',
                    'product_code.code_list_image',
                    'product_code.code_detail_image',
                    'product_code.code_web_description')
        );
        $query = $this->db->get();
        //echo $this->db->last_query();
        return count($query->result());
    }

    function getProductByCode($code) {

        $this->db
                ->select('product.code_id,'
                        . 'product_code.code_description,'
                        . 'product_code.code_list_image,'
                        . 'product_code.code_detail_image,'
                        . 'product_code.code_web_description,'
                        . 'brand.brand_name,'
                        . 'product_code.code_friendly_name'
                        )
                ->from('product_code')
                ->join('product', 'product_code.`code` = product.code_id')
                ->join('brand', 'product.brand_id = brand.brand_id ')
				->where('product.product_stock >', 0)
                ->group_by(array('product.code_id',
                    'product_code.code_description',
                    'brand.brand_name',
                    'product_code.code_list_image',
                    'product_code.code_detail_image',
                    'product_code.code_web_description'))
                ->having('product_code.code_friendly_name', $code);
        $query = $this->db->get();
        //echo $this->db->last_query();
        return $query->result();
    }

    public function getSizeProduct($code) {
        $this->db
                ->select('product_size')
                ->from('product')
                ->where('code_id', $code)
                ->group_by(array('product_size'));
                
        $query = $this->db->get();
        return $query->result();
    }

    public function getColorProduct($code) {
        $this->db
                ->select('code_id,product_color')
                ->from('product')
                ->group_by(array('code_id', 'product_color'))
                ->having('code_id', $code);
        $query = $this->db->get();
        return $query->result();
    }

    public function getSkuProduct($code) {
        $this->db
                ->select('code_id,product_ax_code')
                ->from('product')
                ->group_by(array('code_id', 'product_ax_code'))
                ->having('code_id', $code);
        $query = $this->db->get();
        return $query->result();
    }

    private function __getIdCategoryByName($category_name = null) {
        $this->db->select('category_id')->from('category')->where('category_friendly_name', $category_name);
        $query = $this->db->get();
        //echo $this->db->last_query();
        $row = $query->result();
        return $row[0]->category_id;
    }

}

?>