<?php
$errors = $this->session->flashdata('errors');
$data = $this->session->flashdata('data');
$succcess = $this->session->flashdata('success');
if (empty($data)) {
    $data = (array) $profiles[0];
}

if (!empty($succcess)) {
    $success = (array) $profiles[0];
} else {
    $success = "";
}
$attributes = array('id' => 'frmprofile', "enctype" => "multipart/form-data");
?>



<?php echo form_open('bo/profile/save', $attributes); ?>
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
                            id="profile_id"
                            name="profile_id"
                            class="form-control"
                            value="<?php echo isset($data['profile_id']) ? $data['profile_id'] : '' ?>"
                            autocomplete="off"
                            readonly
                            />
                    </div>
                    <div class="text-danger small e_enterprise_rut"><?php echo $errors['profile_id'] ?></div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-lg-4 form-control-label">Nombre :</label>
                    <div class="col-lg-8">
                        <input
                            type="text"
                            placeholder="Descripcion"
                            id="profile_name"
                            name="profile_name"
                            class="form-control"
                            value="<?php echo isset($data['profile_name']) ? $data['profile_name'] : '' ?>"
                            required=""  
                            parsley-type="alphanum"
                            autocomplete="off"
                            />
                        <div class="text-danger small e_enterprise_rut"><?php echo $errors['profile_name'] ?></div>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputEmail3" class="col-lg-4 form-control-label">Modulos:<span class="text-danger">*</span></label>
                    <div class="col-lg-8">
                        <select class="form-control select2" id="module" required="" name="profile_module[]" multiple="" >
                            <option value=""  >Seleccione</option>
                            <?php 
                                $muduls =explode('|',$data['profile_modules']);
                                foreach ($modules as $module):
                             ?>
                            
                            <option  value="<?php echo $module->module_id; ?>" <?php echo  in_array( $module->module_id , $muduls)   ? 'selected'  : '' ?>   ><?php echo $module->module_name; ?></option>
                            <?php endforeach; ?>
                        </select>
                        <div class="text-danger small e_enterprise_rut"><?php echo $errors['module'] ?></div>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputEmail3" class="col-lg-4 form-control-label">Estado:<span class="text-danger">*</span></label>
                    <div class="col-lg-8">
                        <select class="form-control" id="profile_status" required=""   name="profile_status" >
                            <option value=""  >Seleccione</option>
                            <?php foreach ($status as $sts): ?>
                                <option  value="<?php echo $sts->status_value; ?>" <?php echo isset($data['profile_status']) ? $sts->status_value == $data['profile_status'] ? 'selected' : '' : '' ?>   ><?php echo $sts->status_name; ?></option>
                            <?php endforeach; ?>
                        </select>

                        <div class="text-danger small e_enterprise_rut"><?php echo $errors['profile_status'] ?></div>
                    </div>
                </div>
            </div>
            <!--/ first col -->
            <div class="col-lg-6">
                <div>
                    <img class="center_block"  src="<?php echo base_url() ?>assets/frontend/img/profile/page/<?php echo $data['profile_image'] ?>" alt="">
                </div>
            </div>

        </div>

        <!--/ first col -->
    </div>
    <!-- /.box-body -->
    <div class="box-footer">
        <div class="box-tools">
            <div class="form-group text-right m-b-0">
                <a href="<?php echo base_url() ?>bo/profile/lists" type="reset" class="btn btn-default waves-effect m-l-5">
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