<?php
if (! defined('BASEPATH'))     exit('No direct script access allowed');
class Dashboard_Model extends CI_Model {
    
    public $column_order = array(
        'id_solicitud',
        'rutsocio',
        'nombre',
        'tipo',
        'monto',
        'cantidad',
        'fecha',
        'estado'
    );

    var $column_search = array(
        'id_solicitud',
        'rutsocio',
        'nombre',
        'tipo',
        'monto',
        'cantidad',
        'fecha',
        'estado'
    );

    var $order = array(
        'id_solicitud' => 'asc'
    );


    public  function __construct(){
        parent::__construct();
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
        $this->db->select('*')->from('vw_SolicitudesProductos'); 
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
        $this->db->select('*')->from('vw_SolicitudesProductos');
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

