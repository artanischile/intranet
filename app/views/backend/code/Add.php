<?php
$errors = $this->session->flashdata('errors');
$data = $this->session->flashdata('data');
$succcess = $this->session->flashdata('success');



if (empty($data)) {
    $data = (array) $brands[0];
}
if (!empty($succcess)) {
    $success = (array) $brands[0];
} else {
    $success = "";
}
$attributes = array('id' => 'frmCode', "enctype" => "multipart/form-data");
?>







<?php echo form_open('bo/code/save', $attributes); ?>

<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title"><?php echo $sub_tittle ?></h3>
    </div>
    <div class="box-body table-responsive m-t-20	">
        <div class="col-lg m-b-10" >
            <?php if (!empty($success)) : ?>
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <strong><?php echo $success; ?></strong> 
                </div>
            <?php endif ?>
        </div>


        <div class="col-lg-12 m-t-20">
            <!-- first col -->
            <div class="col-lg-6 ">
                <div class="form-group row">
                    <label for="inputEmail3" class="col-lg-4 form-control-label">Id:</label>
                    <div class="col-lg-2">
                        <input
                            type="text"
                            placeholder=""
                            id="id"
                            name="id"
                            class="form-control"
                            value="<?php echo isset($data['id']) ? $data['id'] : '' ?>"
                            autocomplete="off"
                            readonly
                            />

                    </div>
                    <div class="text-danger small e_enterprise_rut"><?php echo $errors['id'] ?></div>

                </div>

                <div class="form-group row">
                    <label for="inputEmail3" class="col-lg-4 form-control-label">Codigo Padre :</label>
                    <div class="col-lg-8">
                        <input
                            type="text"
                            placeholder="Codigo Padre"
                            id="code"
                            name="code"
                            class="form-control"
                            value="<?php echo isset($data['code']) ? $data['code'] : '' ?>"
                            autocomplete="off"
                            required=""
                            />
                        <div class="text-danger small e_enterprise_rut"><?php echo $errors['code'] ?></div>
                    </div>
                </div>



                <div class="form-group row">
                    <label for="inputEmail3" class="col-lg-4 form-control-label">Glosa Padre :</label>
                    <div class="col-lg-8">
                        <input
                            type="text"
                            placeholder="Descripcion Codigo Padre"
                            id="description_code"
                            name="description_code"
                            class="form-control"
                            value="<?php echo isset($data['code_description']) ? $data['code_description'] : '' ?>"
                            autocomplete="off"
                            required=""
                            />
                        <div class="text-danger small e_enterprise_rut"><?php echo $errors['code_description'] ?></div>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputEmail3" class="col-lg-4 form-control-label">Descripcion :</label>
                    <div class="col-lg-8">
                        <textarea 
                            name="code_long_description" 
                            id="code_long_description" 
                            class="form-control"
                            width="100%"
                            placeholder="Descripción Codigo"
                            required=""

                            ><?php echo isset($data['code_web_description']) ? $data['code_web_description'] : '' ?></textarea>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputEmail3" class="col-lg-4 form-control-label">Imagen 1:</label>
                    <div class="col-lg-8">
                        <input
                            type="file"
                            placeholder=""
                            id="code_list_image"
                            name="code_list_image"
                            class="form-control"
                            value="<?php echo isset($data['code_list_image']) ? $data['code_list_image'] : '' ?>"
                            autocomplete="off"
                            requiredx=""
                            style="padding-bottom: 42px;" 
                            />
                    </div>
                </div>
                <input type="hidden" name="hdImage" value="<?php echo isset($data['code_list_image']) ? $data['code_list_image'] : '' ?>">

                <div class="form-group row">
                    <label for="inputEmail3" class="col-lg-4 form-control-label">Imagen 2:</label>
                    <div class="col-lg-8">
                        <input
                            type="file"
                            placeholder=""
                            id="code_detail_image"
                            name="code_detail_image"
                            class="form-control"
                            value="<?php echo isset($data['code_detail_image']) ? $data['product_detail_image'] : '' ?>"
                            autocomplete="off"
                            requiredx=""
                            style="padding-bottom: 42px;" 
                            />
                    </div>
                </div>
                <input type="hidden" name="hdImageD" value="<?php echo isset($data['code_detail_image']) ? $data['code_detail_image'] : '' ?>">
                <div class="form-group row">
                    <label for="inputEmail3" class="col-lg-4 form-control-label">Estado:<span class="text-danger">*</span></label>
                    <div class="col-lg-8">
                        <select class="form-control" id="code_status" required=""   name="code_status" >
                            <option value=""  >Seleccione</option>
                            <?php foreach ($status as $sts): ?>
                                <option  value="<?php echo $sts->status_value; ?>" <?php echo isset($data['code_status']) ? $sts->status_value == $data['code_status'] ? 'selected' : '' : '' ?>   ><?php echo $sts->status_name; ?></option>
                            <?php endforeach; ?>
                        </select>

                        <div class="text-danger small e_enterprise_rut"><?php echo $errors['product_status'] ?></div>
                    </div>
                </div>
            </div>




            <!--/ first col -->

            <div class="col-md-6">

                <div>

                    <?php if( isset($data['code_list_image'])) :?>
                <div class="col-md-6">
                    <img src="<?php echo base_url()?>/assets/frontend/img/code/<?php echo !empty($data['code_list_image'])? $data['code_list_image'] : 'nofoto.jpg' ?>" class="img-responsive" />
                </div>
            <?php endif;?>
            <?php if( isset($data['code_detail_image'])) :?>
                <div class="col-md-6">
                    <img src="<?php echo base_url()?>/assets/frontend/img/code/<?php echo !empty($data['code_detail_image'])? $data['code_detail_image'] : 'nofoto.jpg' ?>" class="img-responsive" />
                </div>
            <?php endif;?>

                </div>

            </div>



        </div>



        <!--/ first col -->

    </div>

    <!-- /.box-body -->

    <div class="box-footer">

        <div class="box-tools">

            <div class="form-group text-right m-b-0">

                <a href="<?php echo base_url() ?>bo/brand/lists" type="reset" class="btn btn-default waves-effect m-l-5">

                    Cancel

                </a>

                <button class="btn btn-primary waves-effect waves-light" type="submit">

                    Submit

                </button>

            </div>

        </div>

    </div>

    <!-- /.box-footer-->

</div>

<!-- /.box -->

<?php echo form_close(); ?>	