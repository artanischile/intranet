<!-- Default box -->
<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title"><?php echo $sub_tittle ?></h3>
    </div>
    <div class="box-body table-responsive no-padding">
        <?php
        $msg = (object) $this->session->flashdata('success');
        if (isset($msg->status)) :
            if ($msg->status == true):
                ?>
                <div class="msg alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-check"></i> <?php echo $msg->action ?></h4>
                    <?php echo $msg->msg ?>
                </div>
            <?php else: ?>
                <div class="msg alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-check"></i> <?php echo $msg->action ?></h4>
                    <?php echo $msg->msg ?>
                </div>
            <?php
            endif;
        endif;
        ?>
        <!-- BOTON -->
        <div class="col-lg-12">
            <a id="agregar_user" href="<?php echo BASE_BO ?>product/add"   class="btn bg-navy btn-flat margin">
                <i class="bigger-120 ion-android-add-circle"></i> <?php echo $btn_add_tittle ?>
            </a>
        </div>
        <!-- FIN BOTON -->
        <input type="hidden" name="<?php echo $csfr['csrfName'] ?>" value="<?php echo $csfr['csrfHash'] ?>" style="display:none;" />-.
        <div class="col-lg-12">
            <table class="table table-bordered table-hover" id="table">
                <thead>
                    <tr>
                        <th>product_id</th>
                        <th>code_id</th>
                        <th>SKU</th>
                        <th>product_name</th>
                        <th>Creado </th>
                        <th>Estado</th>
                        <th >Accion</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>

                <tfoot>
                    <tr>
                        <th>product_id</th>
                        <th>code_id</th>
                        <th>SKU</th>
                        <th>product_name</th>
                        <th>Creado </th>
                        <th>Estado</th>
                        <th >Accion</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
    <!-- /.box-body -->
    <div class="box-footer">
        <div class="box-tools">

        </div>
    </div>
    <!-- /.box-footer-->
</div>
<!-- /.box -->


<!-- COMPOSE MESSAGE MODAL VER -->
