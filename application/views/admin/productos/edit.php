
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Productos
        <small>Editar</small>
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box box-solid">
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">
                        <?php if($this->session->flashdata("error")):?>
                            <div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <p><i class="icon fa fa-ban"></i><?php echo $this->session->flashdata("error"); ?></p>
                                
                             </div>
                        <?php endif;?>
                        <form action="<?php echo base_url();?>mantenimiento/productos/update" method="POST">
                            <?php foreach($infoproductos->result() as $row){ ?>
                                <input type="hidden" name="idproducto" value="<?php echo $row->idproducto;?>">
                            <div class="form-group <?php echo !empty(form_error('nombre')) ? 'has-error':'';?>">
                                <label for="nombre">Nombre:</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $row->nombre;?>">
                            </div>
                            <div class="form-group ">
                                <label for="descripcion">Descripcion:</label>
                                <input type="text" class="form-control" id="descripcion" name="descripcion" value="<?php echo $row->descripcion;?>">
                            </div>
                            <div class="form-group <?php echo !empty(form_error('precio')) ? 'has-error':'';?>">
                                <label for="precio">Precio:</label>
                                <input type="text" class="form-control" id="precio" name="precio" value="<?php echo $row->precio;?>">
                            </div>
                             <div class="form-group <?php echo !empty(form_error('talla')) ? 'has-error':'';?>">
                                <label for="talla">Talla:</label>
                                <input type="text" class="form-control" id="talla" name="talla" value="<?php echo $row->talla;?>">
                            </div>
                            <div class="form-group <?php echo !empty(form_error('stock')) ? 'has-error':'';?>">
                                <label for="stock">Stockk:</label>
                                <input type="text" class="form-control" id="stock" name="stock" value="<?php echo $row->stock;?>">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success btn-flat">Guardar</button>
                            </div>
                            <?php } ?>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
