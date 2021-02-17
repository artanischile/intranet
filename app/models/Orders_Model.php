<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Orders_Model extends CI_Model {

    protected $table = 'orders';
    protected $table_rel='customers';
    protected $column_order = array(
        'order_id',
        'customer_rut',
        'customer_name',
        'customer_enterprise_name',
        'order_total_items',
        'order_total_price',
        'order_status',
        'order_create',
    );
    // set column field database for datatable orderable
    protected $column_search = array(
        'order_id',
        'customer_rut',
        'customer_name',
        'customer_enterprise_name',
        'order_total_items',
        'order_total_price',
        'order_status',
        'order_create',
    );
    // set column field database for datatable searchable
    protected $order = array(
        'order_id' => 'asc'
    );
    
    
    function __construct() {
        parent::__construct();
    }

   
    public function GetOrderById($order_id){
        $this->db
                ->select('*')
                ->from('orders')
                ->where('order_id', $order_id);
        $query = $this->db->get();
        return $query->result();
    }
    
    function getDetails($order_id){
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
    
    
    
    

    public function Save($data = '') {
        $data = (object) $data;
        if ($data->brand_id > 0) {
            $status = $this->__UpdateRecord($data);
        } else {
            $status = $this->__AddRecord($data);
        }
        return $status;
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
        $this->db->where('brand_id', $info->brand_id);
        $this->db->update($this->table, $info);
        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE) {
            return FALSE;
        } else {
            return TRUE;
        }
    }

    /* data table functions */

    public function get_datatables($param = array()) {
        $this->_get_datatables_query($param);
        if ($param['length'] != - 1)
            $this->db->limit($param['length'], $param['start']);
        $query = $this->db->get();
        return $query->result();
    }

    public function count_all() {
       $this->db->select(
            'orders.order_id,customers.customer_rut,
            customers.customer_name,
            customers.customer_enterprise_name,
            orders.order_total_items,
            orders.order_total_price,
            orders.order_status,
            orders.order_create')
            ->from($this->table)
            ->join( $this->table_rel,'customers ON orders.customer_id = customers.customer_id');
        return $this->db->count_all_results();
    }

    function count_filtered($param) {
        $this->_get_datatables_query($param);
        $query = $this->db->get();
        return $query->num_rows();
    }

    private function _get_datatables_query($params = null) {

        // $this->db->from($this->table);
        $this
            ->db->select(
                    'orders.order_id,customers.customer_rut,
                    customers.customer_name,
                    customers.customer_enterprise_name,
                    orders.order_total_items,
                    orders.order_total_price,
                    orders.order_status,
                    orders.order_create')
            ->from($this->table)
            ->join( $this->table_rel,'customers ON orders.customer_id = customers.customer_id');
        
        
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

}

/* End of file ModelName.php */
?>