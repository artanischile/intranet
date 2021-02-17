<?php
if (! defined('BASEPATH'))
    exit('No direct script access allowed');

class Banners_Model extends CI_Model
{

    //protected $tableName = 'user';
    var $table = 'banner';
    
    var $column_order = array(
        'banner_id,',
        'banner_title',
        'banner_image',
        'banner_create_at',
        'banner_status'
    );

    // set column field database for datatable orderable
    var $column_search = array(
        'banner_id,',
        'banner_title',
        'banner_image',
        'banner_create_at',
        'banner_status'
    );

    // set column field database for datatable searchable
    var $order = array(
        'banner_id' => 'asc'
    );

    function __construct()
    {
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
            if(array_key_exists("banner_id", $params)){
                $this->db->where('banner_id', $params['banner_id']);
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
        
        // Return fetched data
        return $result;
    }
    

    public function Save($data = '')
    {
        if ($data['banner_id'] > 0) {
            $status = $this->UpdateRecord($data);
        } else {
            $status = $this->AddRecord($data);
        }
        return $status;
    }

    public function Delete($id){
        return $this->__DeleteRecord($id);
    }

    private function AddRecord($info = array())
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

    private function UpdateRecord($info = array())
    {
        $this->db->trans_start();
        $this->db->where('banner_id', $info['banner_id']);
        $this->db->update($this->table, $info);
        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE) {
            return FALSE;
        } else {
            return TRUE;
        }
    }


    


    private function __DeleteRecord($id){
        $this->db->trans_start();
        $this->db->where('banner_id', $id)->delete($this->table);
        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE) {
            return FALSE;
        } else {
            return TRUE;
        }
    }

    function Activate($uid = NULL)
    {
        $row = $this->ById($uid);
        if ($row->user_status == 1) {
            $user_status = 0;
        } else {
            $user_status = 1;
        }
        $this->db->trans_start();
        $this->db->set('user_status', $user_status, FALSE);
        $this->db->where('user_id', $uid);
        $this->db->update($this->tableName);
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
        $this
            ->db->select('banner.*')
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
        $this->db->select('banner.*')
             ->from($this->table);
             
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