<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Clientes
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
                        <a href="<?php echo base_url();?>mantenimiento/clientes1/add" class="btn btn-primary btn-flat"><span class="fa fa-plus"></span> Agregar Clientes</a>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <table id="example1" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>CI</th>
                                    <th>Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(!empty($cliente)):?>
                                    <?php foreach($cliente as $cliente):?>
                                        <tr>
                                            <td><?php echo $cliente->nombre;?></td>
                                            <td><?php echo $cliente->ci;?></td>
                                            <?php $datacliente = $cliente->idcliente."*".$cliente->nombre."*".$cliente->ci;?>
                                            <td>
                                                <div class="btn-group">
                                                
                                                    <?php 
                                                    $atributos = array('class' => 'form-group', 'id' => 'cliente');
                                                    echo form_open_multipart('mantenimiento/clientes1/edit', $atributos);
                                                    ?>
                                                    <input type="hidden" name="id" value="<?php echo $cliente->idcliente;?>">
                                                    <button type="submit" class="btn btn-warning"><span class="fa fa-pencil"></span></button>
                                                    <?php echo form_close();?>
                                                    <?php 
                                                    $atributos = array('class' => 'form-group', 'id' => 'cliente');
                                                    echo form_open_multipart('mantenimiento/clientes1/eliminarbd', $atributos);
                                                    ?>
                                                    <input type="hidden" name="id" value="<?php echo $cliente->idcliente;?>">
                                                    <button type="submit" class="btn btn-danger"><span class="fa fa-remove"></span></button>
                                                    <?php echo form_close();?>
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