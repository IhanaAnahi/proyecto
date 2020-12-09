        <!-- =============================================== -->

        <!-- Left side column. contains the sidebar -->
        <aside class="main-sidebar" style="background-image: url('<?php echo base_url() ?>img/fondo.png');">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar" >      
                <!-- sidebar menu: : style can be found in sidebar.less -->
                <ul class="sidebar-menu" data-widget="tree">
                    <li class="header" style="background-image: url('<?php echo base_url() ?>img/fondo.png');">
                        <div align="center" >
                            <img src="<?php echo base_url()?>/img/logo.png" class="img-circle" alt="Cinque Terre" style="width: 150px; height: 150px;">
                        </div>
                    </li>
                    <li>
                        <a href="<?php echo base_url();?>auth/login">
                            <i class="fa fa-home"></i> <span>Inicio</span>
                        </a>
                    
                    <li>
                        <a href="<?php echo base_url();?>mantenimiento/clientes1">
                            <i class="fa fa-cogs"></i> <span>Clientes</span>
                            <span class="pull-right-container"></span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>mantenimiento/productos">
                            <i class="fa fa-cogs"></i> <span>Productos</span>
                            <span class="pull-right-container"></span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url();?>mantenimiento/categorias">
                            <i class="fa fa-cogs"></i> <span>Anuncios</span>
                            <span class="pull-right-container"></span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url();?>movimientos/ventas">
                            <i class="fa fa-share-alt"></i> <span>Ventas</span>
                            <span class="pull-right-container"></span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url();?>reportes/Ventas">
                            <i class="fa fa-print"></i> <span>Reportes</span>
                            <span class="pull-right-container"></span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fa fa-user-circle-o"></i> <span>Administrador</span>
                            <span class="pull-right-container"></span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="../../index.html"><i class="fa fa-circle-o"></i> Usuarios</a></li>
                        </ul>
                    </li>
                </ul>
            </section>
            <!-- /.sidebar -->
        </aside>

        <!-- =============================================== -->