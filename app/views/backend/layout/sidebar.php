<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">


        </div>

        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header text-center" style="font-size:20px">Menu Principal</li>
            
            
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>

            </li>

            <?php echo Menu_bo($this->session->userdata('profile'))?>
            
            
            <!--
            <li class="treeview active">
                <a href="#">
                    <i class="fa fa-laptop"></i>
                    <span>E-Comerce</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo base_url() ?>bo/brand"><i class="fa fa-circle-o"></i> Marcas</a></li>
                    <li><a href="<?php echo base_url() ?>bo/code"><i class="fa fa-circle-o"></i> Codigos Padre</a></li>
                    <li><a href="<?php echo base_url() ?>bo/category"><i class="fa fa-circle-o"></i> Categorias</a></li>
                    <li><a href="<?php echo base_url() ?>bo/product"><i class="fa fa-circle-o"></i> Productos</a></li>
                     <li><a href="<?php echo base_url() ?>bo/customer"><i class="fa fa-circle-o"></i> Cliente</a></li>
                </ul>
            </li>
            <li class="treeview active">
                <a href="#">
                    <i class="fa fa-laptop"></i>
                    <span>Administración</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo base_url() ?>bo/user"><i class="fa fa-circle-o"></i> Usuarios</a></li>
                    <li><a href="<?php echo base_url() ?>bo/profile"><i class="fa fa-circle-o"></i>Perfiles</a></li>
                    <li><a href="<?php echo base_url() ?>bo/modules"><i class="fa fa-circle-o"></i>Modulos</a></li>
                    
                </ul>
            </li>-->
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>