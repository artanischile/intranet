<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Contact_Model extends CI_Model {
    protected $table='contact';

    protected $column_order = array(
        'id',
        'name',
        'email',
        'phone',
        'contact_created_at',
        'contact_update_at',
    );



    // set column field database for datatable orderable

    protected $column_search = array(
        'id',
        'name',
        'email',
        'phone',
        'contact_created_at',
        'contact_update_at',
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
}