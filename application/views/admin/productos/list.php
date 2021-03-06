<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Productos
        <small>Listado</small>
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box box-solid">
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">
                        <a href="<?php echo base_url();?>mantenimiento/productos/add" class="btn btn-primary btn-flat"><span class="fa fa-plus"></span> Agregar Productos</a>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <table id="example1" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>talla</th>
                                    <th>Descripcion</th>
                                    <th>Precio</th>
                                    <th>Stock</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(!empty($productos)):?>
                                    <?php foreach($productos as $producto):?>
                                        <tr>
                                            <td><?php echo $producto->nombre;?></td>
                                            <td><?php echo $producto->talla;?></td>
                                            <td><?php echo $producto->descripcion;?></td>
                                            <td><?php echo $producto->precio;?> bs</td>
                                            <td><?php echo $producto->stock;?></td>
                                            <td>
                                                <div class="row">
                                                    <div class="col-sm-9">
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <?php 
                                                    $atributos = array('class' => 'form-group', 'id' => 'cliente');
                                                    echo form_open_multipart('mantenimiento/productos/edit', $atributos);
                                                    ?>
                                                    <input type="hidden" name="id" value="<?php echo $producto->idproducto;?>">
                                                    <button type="submit" class="btn btn-warning"><span class="fa fa-pencil"></span></button>
                                                    <?php echo form_close();?>    
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <?php 
                                                    $atributos = array('class' => 'form-group', 'id' => 'cliente');
                                                    echo form_open_multipart('mantenimiento/productos/eliminarbd', $atributos);
                                                    ?>
                                                    <input type="hidden" name="id" value="<?php echo $producto->idproducto;?>">
                                                    <button type="submit" class="btn btn-danger"><span class="fa fa-remove"></span></button>
                                                    <?php echo form_close();?>
                                                    </div>
                                                </div>
                                                </div>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach;?>
                                <?php endif;?>
                            </tbody>
                        </table>
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

<div class="modal fade" id="modal-default">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Informacion de la Categoria</h4>
      </div>
      <div class="modal-body">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
