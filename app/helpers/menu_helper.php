<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');


if (!function_exists('get_base_categories')) {

    function get_base_categories() {
        $ci = & get_instance();
        $ci->db
                ->select('category_id,category_name,category_parent_id,category_status,category_friendly_name')
                ->from('category')
                ->where('category_status', 1)
                ->where('category_parent_id', 0);
        $query = $ci->db->get();
        $data = $query->result();
        return $data;
    }

}

function get_cats_by_cat_id($id) {
    $ci = & get_instance();
    $ci->db
            ->select('category_id,category_name,category_parent_id,category_friendly_name,category_status')
            ->from('category')
            ->where('category_status', 1)
            ->where('category_parent_id', $id);
    $query = $ci->db->get();
    //echo $ci->db->last_query();
    $data = $query->result();
    $subcats = array();
    if (count($data) > 0) {
        return $data;
    }
}

function list_tree_cat_id($id) {
    $subs = get_cats_by_cat_id($id);
    if (count($subs) > 0) {
        echo "<ul class='sidebar-submenu'>";
        foreach ($subs as $s) {
            $parent = getName($s->category_parent_id);
            
            
            if (empty($parent)) {
               
                echo "<li ><a href='" . base_url() . "productos/" . $s->category_friendly_name . "'><span>" . $s->category_name . "</span><i class='fa fa-angle-left pull-right'></i></a>";
            } else {
                
                echo "<li ><a href='" . base_url() . "productos/{$parent}/" . $s->category_friendly_name . "'><span>" . $s->category_name . "</span><i class='fa fa-angle-left pull-right'></i></a>";
            }

            list_tree_cat_id($s->category_id);
        }
        echo "</li></ul>";
    } else {
        
    }
}

function getName($category) {



    $ci = & get_instance();
    $ci->db
            ->select('category_friendly_name')
            ->from('category')
            ->where('category_id', $category);
    $query = $ci->db->get();
    //echo $ci->db->last_query();
    $data = $query->result();
    $subcats = array();
    if (count($data) > 0) {
        return $data[0]->category_friendly_name;
    }
}

function poner_guion($url) {
    $url = utf8_decode(strtolower($url));

    echo str_replace('�', 'o', $url);




    //Reemplazamos caracteres especiales latinos
    $find = array('�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�');
    $repl = array('a', 'e', 'i', 'o', 'u', 'a', 'e', 'i', 'o', 'u', 'a', 'o', 'c', 'n');
    $url = str_replace($find, $repl, $url);
    //A�adimos los guiones
    //$find = array(' ', '&', '\r\n', '\n','+');
    //$url = str_replace($find, '-', $url);
    //Eliminamos y Reemplazamos los demas caracteres especiales
// $find = array('/[^a-z0-9\-<>]/', '/[\-]+/', '/<{^>*>/');
// $repl = array('', '-', '');
// $url = preg_replace($find, $repl, $url);
    return $url;
}

/**
 * Reemplaza todos los acentos por sus equivalentes sin ellos
 *
 * @param $string
 *  string la cadena a sanear
 *
 * @return $string
 *  string saneada
 */
function sanear_string($string) {

    $string = utf8_decode(strtolower(trim($string)));

    $string = str_replace(
            array('�', '�', '�', '�', '�', '�', '�', '�', '�'), array('a', 'a', 'a', 'a', 'a', 'A', 'A', 'A', 'A'), $string
    );

    $string = str_replace(
            array('�', '�', '�', '�', '�', '�', '�', '�'), array('e', 'e', 'e', 'e', 'E', 'E', 'E', 'E'), $string
    );

    $string = str_replace(
            array('�', '�', '�', '�', '�', '�', '�', '�'), array('i', 'i', 'i', 'i', 'I', 'I', 'I', 'I'), $string
    );

    $string = str_replace(
            array('�', '�', '�', '�', '�', '�', '�', '�'), array('o', 'o', 'o', 'o', 'O', 'O', 'O', 'O'), $string
    );

    $string = str_replace(
            array('�', '�', '�', '�', '�', '�', '�', '�'), array('u', 'u', 'u', 'u', 'U', 'U', 'U', 'U'), $string
    );

    $string = str_replace(
            array('�', '�', '�', '�'), array('n', 'N', 'c', 'C',), $string
    );

    //Esta parte se encarga de eliminar cualquier caracter extra�o
    $string = str_replace(
            array("�", "�", "-", "~",
        "#", "@", "|", "!",
        "�", "$", "%", "&", "/",
        "(", ")", "?", "'", "�",
        "�", "[", "^", "<code>", "]",
        "+", "}", "{", "�", "�",
        ">", "< ", ";", ",", ":",
        ".", " "), '-', $string
    );



    return strtolower($string);
}


 function show_cart() {
       $ci = & get_instance();
        $output = '';
        $output = ' <div class="cart-info float-right">
                            <a href="' . base_url() . '/productos/carro">
                            <h5>Mi Carro <span>' . $ci->cart->total_items() . '</span> items  </h5>
                            <i class="fa fa-shopping-cart"></i>
                            </a>
                            <div class="cart-hover">
                            <ul class="header-cart-pro">';

        foreach ($ci->cart->contents() as $items) :
            $img = getImageCode( $items['id']);
             $output .= '<li>
                                <div class="image"><img alt="cart item" src="'.base_url('assets/frontend/img/code/').$img.'"></div>
                                <div class="content fix" style="font-size: 11px;">' . $items['name'] . '<span class="quantity">Cantidad: ' . $items['qty'] . '</span></div>
                                <i class="fa fa-trash delete"></i>
                            </li>';
        endforeach;
        
     

        $output .= '</ul>
                        <div class="header-button-price">
                            <a href="' . base_url() . 'productos/carro"><i class="fa fa-sign-out"></i><span>Ir al Carro</span></a>
                            <!--<div class="total-price"><h3>Total Price : <span>$390</span></h3></div>
                        </div>
                    </div>
                </div>';


        echo $output;
    }
    
    function getImageCode($code_id){
        $ci = & get_instance();
        $ci->db
                ->select('product_code.code_list_image' )
                ->from('product_code')
                ->where('product_code.code', $code_id);
        $query = $ci->db->get();

        $row = $query->result();
        $imageList=$row[0]->code_list_image;
        return $imageList;
        
    }