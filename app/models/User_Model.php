<?php
if (! defined('BASEPATH'))
    exit('No direct script access allowed');

class User_Model extends CI_Model
{

    //protected $tableName = 'user';
    var $table = 'user';

    var $column_order = array(
        'user_id',
        'user_first_name',
        'user_last_name',
        'user_name',
        'profile_name',
        'user_email',
        'user_status'
    );

    // set column field database for datatable orderable
    var $column_search = array(
        'user_id',
        'user_first_name',
        'user_last_name',
        'user_name',
        'profile_name',
        'user_email',
        'user_status'
    );

    // set column field database for datatable searchable
    var $order = array(
        'user_id' => 'asc'
    );

    function __construct()
    {
        parent::__construct();
    }

    function getRows($user_id=null)
    {

        if(!empty($user_id)){
            $this->db->select('user.*,profile.*')
            ->from('user')
            ->join('profile', 'user.user_profile_id = profile.profile_id')
            ->where('user.user_id', $user_id);
        }else{
            $this->db->select('user.*,profile.*')
            ->from('user')
            ->join('profile', 'user.user_profile_id = profile.profile_id');
        }
        
        $query = $this->db->get();
        return  $query->result();
    }

    public function Save($data = '')
    {
        if ($data->user_id > 0) {
            $status = $this->UpdateRecord($data);
        } else {
            $status = $this->AddRecord($data);
        }
        return $status;
    }

    public function Delete($user_id){
        return $this->__DeleteRecord($user_id);
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
        $this->db->where('user_id', $info->user_id);
        $this->db->update($this->table, $info);
        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE) {
            return FALSE;
        } else {
            return TRUE;
        }
    }


    function UpdatePassword($info = array())
    {
        $this->db->trans_start();
        $this->db->where('user_id', $info->user_id);
        $this->db->update($this->table, $info);
        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE) {
            return FALSE;
        } else {
            return TRUE;
        }
    }


    private function __DeleteRecord($user_id){
        $this->db->trans_start();
        $this->db->where('user_id', $user_id)->delete($this->table);
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
        $this->db->select('user.*,profile.*')
            ->from($this->table)
            ->join('profile', 'user.user_profile_id = profile.profile_id');
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
        $this->db->select('user.*,profile.*')
        ->from($this->table)
        ->join('profile', 'user.user_profile_id = profile.profile_id');
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