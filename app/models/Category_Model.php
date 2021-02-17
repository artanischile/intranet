<?php
if (! defined('BASEPATH'))
    exit('No direct script access allowed');

class Category_Model extends CI_Model
{

    protected $table = 'category';

    

    var $column_order = array(
        'category_id',
        'category_name',
        'category_parent_id',
        'category_create_at',
        'category_status',
        
     
    );

    // set column field database for datatable orderable
    var $column_search = array(
        'category_id',
        'category_name',
        'category_parent_id',
        'category_create_at',
        'category_status',
       
    );

    // set column field database for datatable searchable
    var $order = array(
        'category_id' => 'asc'
    );

    function __construct()
    {
        parent::__construct();
    }

     
    function getRows($id=null)
    {
        if(!empty($id)){
            $this->db->select('*')
            ->from($this->table)
            ->where('category_id', $id);
        }else{
            $this->db->select('*')
            ->from($this->table)
            ->order_by('category_id','asc');
        }
        
        $query = $this->db->get();
        return  $query->result();
    }


    public function Save($data = '')
    {
        
        if ($data->category_id > 0) {
            $status = $this->__UpdateRecord($data);
        } else {
            $status = $this->__AddRecord($data);
        }
        return $status;
    }

    private function __AddRecord($info = array())
    {
        $this->db->trans_start();
        $this->db->insert($this->table, $info);
        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE) {
            return FALSE;
        } else {
            return TRUE;
        }
    }

    private function __UpdateRecord($info = array())
    {
        $this->db->trans_start();
        $this->db->where('category_id', $info->category_id);
        $this->db->update($this->table, $info);
        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE) {
            return FALSE;
        } else {
            return TRUE;
        }
    }

    private function __DeleteRecord(){

    }

    function ActivateRecord($uid = NULL)
    {
        $row = $this->ById($uid);
        if ($row->category_status == 1) {
            $category_status = 0;
        } else {
            $category_status = 1;
        }
        $this->db->trans_start();
        $this->db->set('category_status', $category_status, FALSE);
        $this->db->where('category_id', $uid);
        $this->db->update($this->table);
        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE) {
            return FALSE;
        } else {
            return TRUE;
        }
    }

    public function get_datatables($param = array())
    {
        $this->_get_datatables_query($param);
        if ($param['length'] != - 1)
        $this->db->limit($param['length'], $param['start']);
        $query = $this->db->get();
        return $query->result();
    }

    public function count_all()
    {
        $this->db->select('*')
             ->from($this->table);
        return $this->db->count_all_results();
    }
    
    function count_filtered($param)
    {
        $this->_get_datatables_query($param);
        $query = $this->db->get();
        return $query->num_rows();
    }

    private function _get_datatables_query($params = null)
    {
        
        // $this->db->from($this->table);
        $this->db->select('*')->from($this->table);
        $i = 0;
        
        foreach ($this->column_search as $item) // loop column
        {
            if ($params['search']['value']) // if datatable send POST for search
            {
                
                if ($i === 0) // first loop
                {
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
        
        if (isset($params['order'])) // here order processing
        {
            $this->db->order_by($this->column_order[$params['order']['0']['column']], $params['order']['0']['dir']);
        } else if (isset($this->order)) {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }



    


}