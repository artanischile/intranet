<?php
$errors = $this->session->flashdata('errors');
$data = !empty($this->session->flashdata ( 'data' )) ? $this->session->flashdata ( 'data' ):(array)$data;
$attributes = array('id' => 'frmBanner', "enctype" => "multipart/form-data");
?>
<?php echo form_open('bo/banner/save', $attributes); ?>
<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title"><?php echo $sub_tittle ?></h3>
    </div>
    <div class="box-body table-responsive m-t-20	">
        <!-- first col -->
        <div class="col-lg-6 ">
            <div class="form-group row">
                <label for="inputEmail3" class="col-lg-4 form-control-label">Id:</label>
                <div class="col-lg-2">
                    <input
                        type="text"
                        placeholder="Id"
                        id="banner_id"
                        name="banner_id"
                        class="form-control"
                        value="<?php echo isset($data['banner_id']) ? $data['banner_id'] : '' ?>"
                        autocomplete="off"
                        readonly
                        />
                </div>
            </div>
            <div class="form-group row">
                <label for="inputEmail3" class="col-lg-4 form-control-label">Titulo:</label>
                <div class="col-lg-8">
                    <input
                        type="text"
                        placeholder="Titulo Banner"
                        id="banner_title"
                        name="banner_title"
                        class="form-control"
                        value="<?php echo isset($data['banner_title']) ? $data['banner_title'] : '' ?>"

                        parsley-type="alphanum"
                        required=""  
                        autocomplete="off"

                        />
                </div>
            </div>
            
            <div class="form-group row">
                <label for="inputEmail3" class="col-lg-4 form-control-label">Imagen:</label>
                <div class="col-lg-8">
                    <input
                        type="file"
                        placeholder=""
                        id="banner_image"
                        name="banner_image"
                        class="form-control"
                        value=""
                        autocomplete="off"
                        
                        style="padding-bottom: 42px;" 
                        />
                </div>
                <input type="hidden" name="hdImage" value="<?php echo isset($data['banner_image'])? $data['banner_image'] : '' ?>">
            </div>

            <div class="form-group row">
                <label for="inputEmail3" class="col-lg-4 form-control-label">Url:</label>
                <div class="col-lg-8">
                    <input
                        type="text"
                        placeholder="Ingrese Url"
                        id="banner_url"
                        name="banner_url"
                        class="form-control"
                        value="<?php echo isset($data['banner_url']) ? $data['banner_url'] : '' ?>"
                        autocomplete="off"

                        />
                </div>
            </div>
            <div class="form-group row">
                <label for="inputEmail3" class="col-lg-4 form-control-label">Destino:</label>
                <div class="col-lg-8">
                    <select class="form-control" id="banner_target" name="banner_target">
                        <option  value="">Seleccione Destino</option>
                        <option  value="_self">Misma Pagina</option>
                        <option  value="_blank">Nueva Pagina</option>
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label for="inputEmail3" class="col-lg-4 form-control-label">Estado:<span class="text-danger">*</span></label>
                <div class="col-lg-8">
                    <select class="form-control" id="banner_status" name="banner_status" required="">
                        <option value=""  <?php if ($data['banner_status'] == "") echo "selected" ?>>Seleccione</option>
                        <option value="1" <?php echo $data['banner_status'] == "1" ? 'selected' : '' ?>>Activo</option>
                        <option value="2" <?php echo $data['banner_status'] == "2" ? 'selected' : '' ?>>Inactivo</option>
                    </select>
                    <div class="clearfix"></div>
                    <div class="text-danger font-10"><i><?php echo isset($errors['banner_status']) ? $errors['banner_status'] : '' ?></i></div>

                </div>
            </div>

        </div>
        <!--/ first col -->
        <!-- first col -->
        <div class="col-md-6">
            <img class="img-responsive" src="<?php echo  isset($data['banner_image']) ? base_url('assets/frontend/img/slider/').$data['banner_image'] : ''  ?>" alt="">
        </div>
        <!--/ first col -->
    </div>
    <!-- /.box-body -->
    <div class="box-footer">
        <div class="box-tools">
            <div class="form-group text-right m-b-0">
                <a href="<?php echo base_url() ?>bo/banner/lists" type="reset" class="btn btn-default waves-effect m-l-5">
                    <i class="fa fa-chevron-left"></i>   Volver
                </a>
                <button class="btn btn-primary waves-effect waves-light" type="submit">
                    <i class="fa fa-save"></i> Guardar 
                </button>
            </div>
        </div>
    </div>
    <!-- /.box-footer-->
</div>
<!-- /.box -->
<?php echo form_close(); ?>	