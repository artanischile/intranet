<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Code_Model extends CI_Model {
    protected $table='product_code';

    protected $column_order = array(
        'id',
        'code',
        'code_description',
        'code_status',
        'code_created_at',
    );



    // set column field database for datatable orderable

    protected $column_search = array(
        'id',
        'code',
        'code_description',
        'code_status',
        'code_created_at',

    );



    // set column field database for datatable searchable

    protected $order = array(

        'id' => 'asc'

    );



    function __construct()

    {

        parent::__construct();

    }

   





    /** CRUD FUNCTIONS */



    function getRows($id=null)
    {
        if(!empty($id)){
            $this->db->select('*')
            ->from($this->table)
            ->where('id', $id);
        }else{
            $this->db->select('*')
            ->from($this->table)
            ->order_by('id','asc');
        }
        $query = $this->db->get();
        return  $query->result();
    }

    

    public function getCodes()

    {

        $this->db->select('*')

        ->from($this->table)

        ->where('code_status', 1);

        $query = $this->db->get();

        return  $query->result();

        

        

    }





    public function Save($data = '')

    {
        $data=(object)$data;
        if ($data->id > 0) {
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
        $this->db->where('id', $info->id);
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