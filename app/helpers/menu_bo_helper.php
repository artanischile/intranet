<?php
if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );
	
	// si no existe la función invierte_date_time la creamos
if (! function_exists ( 'Menu_bo' )) {
	function Menu_bo($profile_id) {
            
        
             echo $profile_id;
             
            
            
            
		$li = "";
		$mad = "";
		$htm = "";
		$ci = & get_instance ();
		$ci->db->select ( '*' )->from ( 'profile' )->where ( 'profile_status', 1 )->where ( "profile_id", $profile_id );
		$query = $ci->db->get ();
		$row = $query->result ();
                $modulos = explode ( '|', $row [0]->profile_modules);
               
		$htm = "";
		$ci = & get_instance ();
		$ci->db->select ( '*' )->from ( 'modules' )->where ( 'module_status', 1 )->where ( "module_parent", 0 );
		$query = $ci->db->get ();
		
		foreach ( $query->result () as $mdo ) {
			//if (TieneModulos ( $mdo->module_id, $modulos )) {
				 
				$mad = "";
				$htm = "";
				$ci = & get_instance ();
				$ci->db->select ( '*' )->from ( 'modules' )->where ( 'module_status', 1 
                                        )->where ( "module_parent", $mdo->module_id );
				$querySM = $ci->db->get ();
				
				$li .= '<li class="treeview">';
				$li .= '<a href="#"><span>'.$mdo->module_name.'</span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>';
				$li .= '<ul class="treeview-menu">';
				
				foreach ( $querySM->result () as $mdos ) {
					
					if (in_array ( $mdos->module_id, $modulos )) {
						// $mad [] = $mdos->descripcion;
						$li .= '<li><a href="' . base_url() . $mdos->module_url . '">' . $mdos->module_name . '</a></li>';
					} else {
						
						$li .= '<li><a href="javascript:;">' . $mdos->module_name . '</a></li>';
					}
				}
				
				$li .= '</ul>';
				$li .= '</li>';
				/*
				 * if (count ( $mad ) > 0) { $madi [$mdo->descripcion] = $mad; }
				 */
			//}
		}
		
		return $li;
	}
	
	if (! function_exists ( 'TieneModulos' )) {
		function TieneModulos($id, $modulos) {
			$mad = "";
			$htm = "";
			$ci = & get_instance ();
			$ci->db->select ( '*' )->from ( 'modules' )->where ( 'module_status', 1 )->where ( "module_parent", $id );
			$querySM = $ci->db->get ();
			foreach ( $querySM->result () as $mdos ) {
				
				if (in_array ( $mdos->module_id, $modulos )) {
					return true;
				} else {
					return false;
				}
			}
		}
	}
}   
    
    