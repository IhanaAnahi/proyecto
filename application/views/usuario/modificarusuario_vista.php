<div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                
            </section>
            <!-- Main content -->
            <section class="content">
                <!-- Default box -->
                <div class="box box-solid">
                    <div class="box-body">
                    Modificar
					<div class="container">
						<?php
						$atributos = array('class' => 'form-group', 'id' => 'myform');
						echo form_open_multipart('usuario/modificarbd', $atributos);
						foreach ($infousuario->result() as $row) {
							?>
							<input type="hidden" name="id" value="<?php echo $row->idusuario; ?>">
							<input type="text" name="nombre" class="form-control" value="<?php echo $row->nombre; ?>" style="width: 500px">
							<button type="submit" class="btn btn-primary btn">Modificar</button>
							<?php  
						}
						echo form_close();
						?>
					</div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
