<?php
if (!defined('BASEPATH'))exit('No direct script access allowed');

/**
 * @author ARTANIS
 *
 */
class Login_Model extends CI_Model{
    
    private $table='user';

    function CheckCredentials($info){
        $this->db
            ->select()
            ->from($this->table)
            ->where('user_name',$info['user'])
            ->where('user_password',$info['password']);
            $query = $this->db->get();
            if ($query->num_rows()){
                return true;
            }else{
                return false;
            }
      }

    function GetUserInfo($user_name){
        $this->db
        ->select()
        ->from($this->table)
        ->where('user_name',$user_name);
        $query = $this->db->get();
        return $query->result(); 
    }

    function SaveLastLogin($info){
     
        $this->db->where('user_id', $info['user_id']);
        $this->db->update($this->table, $info);
       // echo $this->db->last_query();
    }
     


    
}