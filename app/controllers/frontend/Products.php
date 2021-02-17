<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Products extends CI_Controller {

    //protected $data = array();

    function __construct() {
        parent::__construct();
        if (!$this->session->userdata('isLogued')) {
            redirect(base_url('/clientes'), 'refresh');
        }
        $this->load->library('Paginacion', 'paginar');
        $this->load->model('Product_Model', 'product');
        $this->load->model('Assets_Model', 'assets');
        $this->load->model('Product_Category_Model', 'category');
        $this->load->model('Customer_Model', 'customer');

        $this->load->helper('menu');
        $data['csfr'] = array(
            'csrfName' => $this->security->get_csrf_token_name(),
            'csrfHash' => $this->security->get_csrf_hash()
        );
    }

    function index() {
        $category = !isset($category) ? 'bicicletas' : $category;
        $page = !isset($page) ? 0 : $page;
        redirect(base_url() . "productos/{$category}/{$page}");
    }

    function list_products($category = null, $sub_category = null, $sub_sub_category = null, $page = 0) {
        $cat = "bicicletas";
		$can = 1;

		if($category!=null && $category!="bicicletas"){
			$cat = $category;
		}		

		if($sub_category!=null && $sub_category!="bicicletas" && !is_numeric($sub_category)){
			$cat = $sub_category;
			$can = 2;		
		}

		if($sub_sub_category!=null && $sub_sub_category!="bicicletas" && !is_numeric($sub_sub_category)){
			$cat = $sub_sub_category;
			$can = 3;
		}
		
		$page = is_numeric($sub_category)?$sub_category:(is_numeric($sub_sub_category)?$sub_sub_category:$page);
		
		
		
		$category = is_null($sub_sub_category) ? 'bicicletas' : $sub_sub_category;
		
        $RecordCount = $this->product->getCountProductByCategory($cat,$can);
        $this->paginacion->Rows = 12;
        $this->paginacion->TotalRecords = $RecordCount;
        $this->paginacion->Page = $page;
        $this->paginacion->SetData
                ($this->product->getProductByCategory($cat,$can, array(
                    'limit' => $this->paginacion->Rows,
                    'start' => $page == 0 ? 0 : (($page - 1) * $this->paginacion->Rows)
        )));
        $this->paginacion->Uri = BASE_URL . "productos/{$category}/{$sub_category}/{$sub_sub_category}";
        $data['content'] = "frontend/products/shop-list-sidebar";
        $data['breadcrum'] = $this->uri->segment_array(); //array(ucwords(strtolower($p_category)),ucwords(strtolower($category)));
        $data['category'] = $this->category->GetAll();
        $data['products'] = $this->paginacion;
        $this->load->view('frontend/layout/layout', $data);
    }

    function list_product($category = null, $page = 1) {

        die();

        $category = is_null($category) ? 'bicicletas' : $category;
        $RecordCount = $this->product->getCountProductByCategory($category);
        $this->paginacion->Rows = 12;
        $this->paginacion->TotalRecords = $RecordCount;
        $this->paginacion->Page = $page;
        $this->paginacion->SetData
                ($this->product->getProductByCategory($category, array(
                    'limit' => $this->paginacion->Rows,
                    'start' => $page - 1
        )));
        $this->paginacion->Uri = BASE_URL . "productos/{$category}";
        $data['content'] = "frontend/products/shop-list-sidebar";
        $data['breadcrum'] = $this->uri->segment_array(); //array(ucwords(strtolower($p_category)),ucwords(strtolower($category)));
        $data['category'] = $this->category->GetAll();
        $data['products'] = $this->paginacion;
        $this->load->view('frontend/layout/layout', $data);
    }
    
    
    function search($string ='', $page = 1){
        $str=empty($string) ? $this->input->post('search') : $string;
        $result= $this->product->getSeachProduct($str); 
        $RecordCount = count($result); 
        
        $this->paginacion->Rows = 12;
        $this->paginacion->TotalRecords = $RecordCount;
        $this->paginacion->Page = $page;
        $this->paginacion->SetData
                ($this->product->getSeachProduct($str, array(
                    'limit' => $this->paginacion->Rows,
                    'start' => $page == 0 ? 0 : (($page - 1) * $this->paginacion->Rows)
        )));
        $this->paginacion->Uri = BASE_URL . "productos/buscar/{$str}";
        $data['content'] = "frontend/products/search";
        $data['breadcrum'] = $this->uri->segment_array(); //array(ucwords(strtolower($p_category)),ucwords(strtolower($category)));
        $data['SearcString'] =$str;
        $data['products'] = $this->paginacion;
        $this->load->view('frontend/layout/layout', $data);
        
    }
    
    
    

    function details($product) {
		if( $this->session->has_userdata('rut') ){
			$data['descuento'] = $this->product->getDescuento($this->session->userdata('rut'));
		}
        $info = $this->product->getProductByCode($product);
        $size = $this->product->getSizeProduct($info[0]->code_id);
        $codigos = $this->product->getSkuProduct($info[0]->code_id);
        $colores = $this->product->getColorProduct($info[0]->code_id);
		
		$data['vars'] = $this->product->getVarsProduct($info[0]->code_id);
        $data['info'] = $info;
        $data['size'] = $size;
        $data['colores'] = $colores;
        $data['codigos'] = $codigos;
        $data['csfr'] = array(
            'csrfName' => $this->security->get_csrf_token_name(),
            'csrfHash' => $this->security->get_csrf_hash()
        );
        $data['content'] = "frontend/products/products-details";
        $this->load->view('frontend/layout/layout', $data);
    }

    function checkout() {
        $data['csfr'] = array(
            'csrfName' => $this->security->get_csrf_token_name(),
            'csrfHash' => $this->security->get_csrf_hash()
        );



        $info = $this->customer->getCustomer($this->session->userdata('id'));
        $RegionName = $this->assets->getRegionName($info[0]->customer_enterprise_region);
        $data['RegionName'] = $RegionName;
        $data['customer'] = $info;
        $data['content'] = "frontend/products/checkout";
        $this->load->view('frontend/layout/layout', $data);
    }

    function placeOrder() {
        $info = $this->customer->getCustomer($this->input->post('customer_id'));
        $orderInfo['customer_id'] = $this->input->post('customer_id');
        $orderInfo['order_total_price'] = $this->cart->total();
        $orderInfo['order_total_items'] = $this->cart->total_items();
        $orderInfo['order_status'] = "Pendiente";
        $orderInfo['order_create'] = date('Y-m-d H:i:s');
        $Order = $this->db->insert('orders', $orderInfo);
        $orderId = $this->db->insert_id();

        //print_r($this->cart->contents() );
        foreach ($this->cart->contents() as $items) {
            $OrderDetails[] = array(
                'order_id' => $orderId,
                'product_code' => $items['id'],
                'product_attr_1' => $items['size'],
                'product_attr_2' => $items['color'],
                'product_quantity' => $items['qty'],
                'product_sub_total' => $items['price'],
            );
        }
        $OrderDet = $this->db->insert_batch('order_detail', $OrderDetails);


        
        
$email ='<table width="1000" border="0"  cellpadding="5" cellspacing="5" style="border:1px solid #ccc">
<tr>
  <td><table width="100%" border="0">
    <tr>
      <td width="10%"><table width="1000" border="0"  cellpadding="5" cellspacing="5" style="border:1px solid #ccc">
        <tr></tr>
        <tr>
          <td width="963" valign="middle"><table width="100%" border="0">
            <tr>
              <td width="33%"><img src="http://www.dorelsportschile.cl/landing/assets/frontend/img/header/logo.png" width="213" height="48"></td>
              <td width="33%" align="center"><h3># ORDEN <br> ' . $orderId . '</h3></td>
              <td width="33%" align="center">FECHA <br>
                '.$orderInfo['order_create'].'</td>
            </tr>
          </table></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td><h2>GRACIAS !</h2>
            <p>Gracias por confiar en Dorel, Hemos recibido tu orden, la cual será procesada lo antes posible. Aquí el detalle de tu orden</p></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
        </tr>
      </table></td>
      </tr>
  </table></td>
</tr>
<tr>
  <td><table width="100%" border="0" cellpadding="5" cellspacing="5" style="border:1px solid #ccc">
    <tr>
      <td width="50%"><table width="100%" border="0" >
        <tr>
          <td colspan="2"><h3>Datos Cliente</h3></td>
          </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td width="50%">Rut Empresa</td>
          <td>' . $info[0]->customer_rut_enterprise . '</td>
        </tr>
        <tr>
          <td>Razon Social </td>
          <td>' . $info[0]->customer_enterprise_name . '</td>
        </tr>
        <tr>
          <td>Nombre Contacto </td>
          <td>' . $info[0]->customer_name . '</td>
        </tr>
        <tr>
          <td>Rut Contacto </td>
          <td>' . $info[0]->customer_rut . '</td>
        </tr>
        <tr>
          <td>E-mail Contacto </td>
          <td>' .  $info[0]->customer_email . '</td>
        </tr>
        <tr>
          <td>Téfono Contacto</td>
          <td>' . $info[0]->customer_phone . '</td>
        </tr>
      </table></td>
      <td><table width="100%" border="0">
        <tr>
          <td colspan="2"><h3>Datos Despacho</h3></td>
          </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td width="50%">Direccion</td>
          <td>' . $info[0]->customer_enterprise_adress . '</td>
        </tr>
        <tr>
          <td>Comuna</td>
          <td>' . $info[0]->customer_enterprise_commune . '</td>
        </tr>
        <tr>
          <td>Ciudad</td>
          <td>' . $info[0]->customer_enterprise_city . '</td>
        </tr>
        <tr>
          <td>Region</td>
          <td>' . $info[0]->customer_enterprise_region . '</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
      </table></td>
    </tr>
  </table></td>
</tr>
<tr>
  <td>&nbsp;</td>
</tr>
<tr>
  <td><table width="100%" cellpadding="5" cellspacing="5" style="border:1px solid #ccc">
    <tr>
      <td colspan="3" align="center"><h3>Detalle de Orden</h3></td>
      </tr>
    <tr>
      <td width="75%">PRODUCTO</td>
      <td align="center">CANTIDAD</td>
      <td align="center">SUBTOTAL</td>
    </tr>
    <tr>
      <td colspan="3" align="center"><hr></td>
      </tr>
';      
foreach ($this->cart->contents() as $items) {
$email .='    <tr>
      <td>' . $items['name'] . '  ' . $items['size'] . '  ' . $items['color'] . '</td>
      <td align="right"> ' . $items['qty'] . '</td>
      <td align="right">$' . number_format($items['price'], 0, ',', '.') . '</td>
    </tr>';
 }    
$email .='     <tr>
      <td colspan="3" align="center"><hr></td>
      </tr>
      
      <tr>
      <td width="75%">&nbsp;</td>
      <td align="right">TOTAL</td>
      <td align="right">$' . number_format($this->cart->total(), 0, ',', '.') . '</td>
    </tr>

  </table></td>
</tr>
</table>
'       ; 
        $email_config = Array(
            'mailtype' => 'html',
            'newline' => "\r\n"
        );

        $this->load->library('email');
        $this->email->initialize($email_config);
        $this->email->from('contacto@dorelsportschile.cl', 'Cotizacion Web');
        $this->email->to( $info[0]->customer_email);
        //$this->email->cc('danielnune@gmail.com');

        //$this->email->to('danielnune@gmail.com');
        //$this->email->bcc('sreyes@tsfg.cl', 'Saria Reyes');

        $this->email->subject('Estado Orden de Compra DOREL #' . $orderId);
        $this->email->message($email);

        if ($this->email->send()) {
		
			$l=0;
			$c=[];
			$email_to="marcos.hasard@dorelsports.cl";
			$email_cc="marcos.hasard@dorelsports.cl";
			foreach ($this->cart->contents() as $items) {
				$m=[];
				$m['ACCOUNTNUM']=$info[0]->customer_rut_enterprise;
				$m['InventLocationId']="1060098";
				$m['invoiceaccount']=$info[0]->customer_rut_enterprise;
				$m['Fecha']=date('d-m-Y');
				$m['TransporterID']="BUL_70X30";
				$m['ItemId']=$items['id'];
				$m['Linea']=$l++;
				$m['QTY']=$items['qty'];
				$m['Price']=$items['price'];
				$m['PriceDisc']=isset($info[0]->customer_discount) && $info[0]->customer_discount!=null && $info[0]->customer_discount!=""?$info[0]->customer_discount:0;
				$email_to=isset($info[0]->zone_email) && $info[0]->zone_email!=null && $info[0]->zone_email!=""?$info[0]->zone_email:$email_to;
				$c[]=$m;
			}		
			
			if(count($c)>0){
			
				$this->email->initialize($email_config);
				$this->email->from('contacto@dorelsportschile.cl', 'Cotizacion Web');
				$this->email->to($email_to);
				$this->email->cc($email_cc);

				$flag = true;
				$buff="";
				foreach ($c as $key => $value) {
					//print_r($value);
					if ($flag) {
						$buff.=implode('";"',array_keys($value));
						$flag = false;
					}
					$buff.="\n".implode('";"',$value);
				}
				
				$this->email->subject('Estado Orden de Compra DOREL #' . $orderId);
				$this->email->message($email);
				$this->email->attach($buff, 'attachment', 'orden_venta_web_'.$orderId.'.csv', 'text/csv');
				$this->email->send();

			}
             $this->cart->destroy();
               redirect(base_url() . "productos/checkout/envio");
              
        } else {
                
        }
        
    }

    function place_order_thank() {
        $data['content'] = "frontend/products/check_thk";
        $this->load->view('frontend/layout/layout', $data);
    }

    function add_to_cart() {
        $info = $this->product->getProductByCodeId($this->input->post('product_id'));
        $data = array(
            'id' => $this->input->post('product_id'),
            'name' => $this->input->post('product_name'),
            'price' => $info[0]->product_sale_price,
            'qty' => $this->input->post('quantity'),
            'size' => $this->input->post('product_size'),
            'color' => $this->input->post('product_color'),
        );
        $this->cart->insert($data);
        $this->__show_cart();
    }

    function show_the_cart() {
        $data['csfr'] = array(
            'csrfName' => $this->security->get_csrf_token_name(),
            'csrfHash' => $this->security->get_csrf_hash()
        );
        $data['content'] = "frontend/products/products-cart";
        $this->load->view('frontend/layout/layout', $data);
    }

    function update_cart() {
        $total = $this->cart->total_items();
        $item = $this->input->post('rowid');
        $qty = $this->input->post('qty');
        for ($i = 0; $i < $total; $i++) {
            // Creamos un array de productos con sus rowid y cantidades.   
            $data = array(
                'rowid' => $item[$i],
                'qty' => $qty[$i]
            );
            $this->cart->update($data);
        }

        redirect(base_url() . 'productos/carro');
    }

    function delete_cart($rowid) {
        $data = array(
            'rowid' => $rowid,
            'qty' => 0,
        );
        $this->cart->update($data);
        redirect(base_url() . 'productos/carro');
    }

    function Eliminate_cart() {
        $this->cart->destroy();
        redirect(base_url() . 'productos/carro');
    }

    private function __show_cart() {
        
        
        
        
        
        
        $output = '';
        $output = ' <div class="cart-info float-right">
                            <a href="' . base_url() . '/productos/carro">
                            <h5>Mi Carro <span>' . $this->cart->total_items() . '</span> items  </h5>
                            <i class="fa fa-shopping-cart"></i>
                            </a>
                            <div class="cart-hover">
                            <ul class="header-cart-pro">';

        foreach ($this->cart->contents() as $items) :
            $img = $this->getImageCode( $items['id']);
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

    private function getImageCode($code_id){
        $imageList=$this->product->getProductCodeImage($code_id);
        return $imageList[0]->code_list_image;
        
    }
    
    
}
