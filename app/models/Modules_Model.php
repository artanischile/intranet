<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Modules_Model extends CI_Model {

    protected $table = 'modules';
    protected $column_order = array(
        'module_id',
        'module_name',
        'module_create_at',
        'module_status',
    );
    // set column field database for datatable orderable
    protected $column_search = array(
        'module_id',
        'module_name',
        'module_create_at',
        'module_status',
    );
    // set column field database for datatable searchable
    protected $order = array(
        'module_id' => 'asc'
    );

    function __construct() {
        parent::__construct();
    }

    function getRows($id = null) {
        if (!empty($id)) {
            $this->db->select('*')
            ->from($this->table)
            ->where('module_id', $id)
            ->where_not_in('module_parent', array(0));
        } else {
            $this->db->select('*')
                    ->from($this->table)
                    ->where_not_in('module_parent', array(0))
                    ->order_by('module_id', 'asc');
        }

        $query = $this->db->get();
        return $query->result();
    }

    public function getPrincipalModules() {
        $this->db
                ->select('module_id, module_name')
                ->from('modules')
                ->where('module_status', 1)
                ->where('module_parent', 0)
                ->order_by("module_id", "desc");
        $query = $this->db->get();
        return $query->result();
    }

    public function Save($data = '') {
        $data = (object) $data;
        if ($data->module_id > 0) {
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
        $this->db->where('module_id', $info->module_id);
        $this->db->update($this->table, $info);
        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE) {
            return FALSE;
        } else {
            return TRUE;
        }
    }

    function getActivemoduless() {
        $this->db
                ->select('*')
                ->from('modules')
                ->where('module_status', 1)
                ->where_not_in('module_parent', array(0))
                ->order_by("module_id", "desc");
        $query = $this->db->get();
        return $query->result();
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
        $this->db->select('*')
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
        $this->db->select('*')->from($this->table)->where_not_in('module_parent', array(0));
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
