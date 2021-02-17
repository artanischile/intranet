<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Brand  extends CI_Controller
{
    protected $data = array();
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('isLogued')) {
            redirect(base_url('bo/login'), 'refresh');
        }
        $this->data['uri'] = $this->uri->segment_array();
        $this->load->model('Brand_Model', 'brand');
        $this->form_validation->set_error_delimiters('', '');

        $this->load->library('upload');

        add_css(array(
            BASE_THEME . 'plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css',
        ));

        add_js(array(
            BASE_THEME . 'plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js',
            BASE_THEME . 'plugins/parsleyjs/parsley.min.js',
            BASE_THEME . 'plugins/parsleyjs/i18n/es.js',
            BASE_JS_BO . 'brand.js',
        ));
    }



    function index()
    {
        redirect(base_url() . "bo/brand/Lists/");
    }

    //CRUD METHODS

    function Lists()
    {
        $this->data['tittle'] = "Administracion de Marcas ";
        $this->data['sub_tittle'] = "Listado de Marcas";
        $this->data['description'] = "Listado de Marcas";
        $this->data['csfr'] = array(
            'csrfName' => $this->security->get_csrf_token_name(),
            'csrfHash' => $this->security->get_csrf_hash()
        );
        $this->data['content'] = 'backend/brand/List';
        $this->load->view('backend/layout/layout', $this->data);
    }



    function Add()

    {
        $this->data['tittle'] = "Administracion de Marcas";
        $this->data['sub_tittle'] = "Agregar Marca";
        $this->data['description'] = "Permite agregar una nueva marca";
        $this->data['status'] = $this->assets->getStatus();
        $this->data['titulo'] = "Agregar Nueva Categoriao";
        $this->data['content'] = 'backend/brand/Add';
        $this->load->view('backend/layout/layout', $this->data);
    }

    function Edit($brand_id = null)
    {

        #seteo titulo
        $con['returnType'] = 'single';
        $con['conditions'] = array(
            'brand_id' => $brand_id,
        );
        $brands = $this->brand->getRows($con);

        $this->data['tittle']       = "Administracion de Marcas";
        $this->data['sub_tittle']   = "Editar Marca";
        $this->data['description']  = "Permite agregar una nueva marca";
        $this->data['status']       = $this->assets->getStatus();
        $this->data['brands']       = $brands;
        $this->data['content']      = 'backend/brand/Add';
        $this->load->view('backend/layout/layout', $this->data);
    }



    function Save()
    {

        $_POST['brand_image'] = $_FILES['brand_image'];


        $this->form_validation->set_error_delimiters('', '');
        $this->form_validation->set_rules('brand_name', 'Nombre ', 'required|xss_clean');
        $this->form_validation->set_rules('brand_status', 'Estado', 'required|xss_clean|integer');

        if ($this->form_validation->run() === FALSE) {
            $err_data = array(
                "succes"             => "error",
                "brand_name"         => form_error('brand_name'),
                "brand_status"       => form_error('brand_status'),

            );

            $this->session->set_flashdata('errors', $err_data);
            $this->session->set_flashdata('data', $this->input->post());
            redirect(BASE_BO . "brand/add");
        } else {

            $name = gen_slug($this->input->post('brand_name'));
            $config['upload_path'] = './assets/frontend/img/brand/page/';
            $config['allowed_types'] = 'gif|jpg|png|svg';
            $config['max_size'] = '2000';
            $config['file_name'] = "brand_{$name}_" . $_FILES['brand_image']['name'];
            $config['overwrite'] = TRUE;

            $brand = $this->SubirImagen($config, 'brand_image');

            if (!is_array($brand)) {
                $err_data = array(
                    "succes"             => "error",
                    "brand_image"         => $brand,
                );
                $this->session->set_flashdata('errors', $err_data);
                $this->session->set_flashdata('data', $this->input->post());
                redirect(BASE_BO . "brand/add");
            }


            $this->data['brand_id']           =   $this->input->post('brand_id');
            $this->data['brand_name']         =   $this->input->post('brand_name');
            $this->data['brand_description']  =   $this->input->post('brand_description');
            $this->data['brand_image']        =   '/assets/frontend/img/brand/page/' . $brand['file_name'];
            $this->data['brand_status']       =   $this->input->post('brand_status');
            $this->data['brand_created_at']   =   date('Y-m-d H:i:s');


            if ($this->brand->Save($this->data)) {
                $this->session->set_flashdata('success', "operacion realizada con exito");
                redirect(BASE_BO . "brand/lists");
            }
        }
    }




    function ajax_list()
    {
        $list = $this->brand->get_datatables($this->input->post());
        $data = array();
        $no = $this->input->post('start'); // $_POST['start'];
        foreach ($list as $lst) {
            $no++;
            $row = array();
            $row[] = $lst->brand_id;
            $row[] = $lst->brand_name;
            $row[] = $lst->brand_created_at;
            $row[] = $lst->brand_status == 1 ? 'Activo' : 'Inactivo';

            $isActive = $lst->brand_status == 1 ? 'green' : 'red';
            $row[] = '
                    <a href="' . base_url() . 'bo/brand/edit/' . $lst->brand_id . '"> <i class="green bigger-160 ion ion-edit" ></i> </a>
                ';

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->brand->count_all(),
            "recordsFiltered" => $this->brand->count_filtered($this->input->post()),
            "data" => $data
        );
        // output to json format
        echo json_encode($output);
    }



    public function SubirImagen($data = null, $campo = null)
    {

        $this->upload->initialize($data);
        if (!$this->upload->do_upload($campo)) {
            return $this->upload->display_errors();
        } else {
            return $this->upload->data();
        }
    }

    /*
     * file value and type check during validation
     */
    public function file_check($str)
    {



        echo "sadasd : ";
        print_r($str);
        print_r($_FILES);

        die();

        $allowed_mime_type_arr = array('image/gif', 'image/jpeg', 'image/pjpeg', 'image/png', 'image/x-png', 'svg');
        $mime = get_mime_by_extension($_FILES['file']['name']);
        if (isset($_FILES['file']['name']) && $_FILES['file']['name'] != "") {
            if (in_array($mime, $allowed_mime_type_arr)) {
                return true;
            } else {
                $this->form_validation->set_message('file_check', 'por favor  selecciona solamente gif/jpg/png file.');
                return false;
            }
        } else {
            $this->form_validation->set_message('file_check', 'Selecciona un archivo.');
            return false;
        }
    }
}

/* End of file Controllername.php */