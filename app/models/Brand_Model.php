<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Brand_Model extends CI_Model {
    
    public $table;
    public $primary_key;
    public $order_by;
    


    protected $column_order = array(
        'brand_id',
        'brand_image',
        'brand_name',
        'brand_created_at',
        'brand_status',
    
    );

    // set column field database for datatable orderable
    protected $column_search = array(
        'brand_id',
        'brand_image',
        'brand_name',
        'brand_created_at',
        'brand_status',
      
       
    );

    // set column field database for datatable searchable
    protected $order = array(
        'brand_id' => 'asc'
    );

    function __construct()
    {
        parent::__construct();
        $this->table = 'brand';
        $this->primary_key = 'brand_id';
        $this->order_by = "brand_created_at";

    }
   


    /** CRUD FUNCTIONS */

    public function getRows($params = array()) {



        $this->db->select('*');
        $this->db->from($this->table);
      
        if (array_key_exists("conditions", $params)) {
            foreach ($params['conditions'] as $key => $value) {
                $this->db->where($key, $value);
            }
        }
        //fetch data by order
        if (array_key_exists("order", $params)) {
            foreach ($params['order'] as $key => $value) {
                $this->db->order_by($key, $value);
            }
        }

        //search by keywords
        if (!empty($params['searchKeyword'])) {
            $params['searchKeyword'] = addslashes($params['searchKeyword']);
            $this->db->where("(title LIKE '%" . $params['searchKeyword'] . "%' OR content LIKE '%" . $params['searchKeyword'] . "%')");
        }
        if (array_key_exists("id", $params)) {
            $this->db->where('id', $params['id']);
            $query = $this->db->get();
            $result = $query->row_array();
        } else {
            //set start and limit
            if (array_key_exists("start", $params) && array_key_exists("limit", $params)) {
                $this->db->limit($params['limit'], $params['start']);
            } elseif (!array_key_exists("start", $params) && array_key_exists("limit", $params)) {
                $this->db->limit($params['limit']);
            }

            if (array_key_exists("returnType", $params) && $params['returnType'] == 'count') {
                $result = $this->db->count_all_results();
            } elseif (array_key_exists("returnType", $params) && $params['returnType'] == 'single') {
                $this->db->limit(1);
                $query = $this->db->get();
                $result = ($query->num_rows() > 0) ? $query->result() : false;
            } else {
                $query = $this->db->get();
                $result = ($query->num_rows() > 0) ? $query->result() : false;
            }
        }

        /// echo $this->db->last_query(); 

        return $result;
    }


    public function Save($data = '')
    {
        $data=(object)$data;
        if ($data->brand_id > 0) {
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

/* End of file ModelName.php */




?>