
<div class="content-wrapper" style="background-image: url('img/fondo.png');">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                
            </section>
            <!-- Main content -->
            <section class="content">
                <!-- Default box -->
                <div class="box box-solid">
                    <div class="box-body">
                    <div class="container">
	
				<h1>Lista de Usuarios</h1>
				<?php
					$atributos = array('class' => 'form-goup', 'id' => 'usuario');
					echo form_open_multipart('usuario/agregar',$atributos);?>
					<button type="submit" class="btn btn-outline-primary" style="background-color:  #ff5733">Registrar Usuario</button>
				<?php echo form_close(); ?>
				<table class="table">
					<thead>
						<tr>
							<th>No.</th>
							<th>Nombre</th>
							<th>Apellido P.</th>
							<th>Apellido M.</th>
							<th>Rol</th>
							<th>Teléfono</th>
							<th>Modificar</th>
							<th>Eliminar</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$indice=1;
							foreach ($usuario->result() as $row) {
								?>
								<tr>
									<td><?php echo $indice; ?></td>
									<td><?php echo $row->nombre; ?></td>
									<td><?php echo $row->primerApellido; ?></td>
									<td><?php echo $row->segundoApellido; ?></td>
									<?php if($row->idrol == 1){
									?>
									<td><?php echo "Administrador"; ?></td>
									<?php 
									}
									else{
									?>
									<td><?php echo "Vendedor"; ?></td>
									<?php 
									}
									?>
									<td><?php echo $row->telefono; ?></td>
									<td>
										<?php
										$atributos = array('class' => 'form-goup', 'id' => 'usuario');
										echo form_open_multipart('usuario/Modificar',$atributos);?>
										<input type="hidden" name="id" value="<?php echo $row->idusuario ?>">
										<button type="submit" class="btn btn-primary btn">Modificar</button>
										<?php echo form_close(); ?>
									</td>
									<td>
										<?php
										$atributos = array('class' => 'form-goup', 'id' => 'usuario');
										echo form_open_multipart('usuario/eliminar',$atributos);?>
										<input type="hidden" name="id" value="<?php echo $row->idusuario ?>">
										<button type="submit" class="btn btn-danger btn">Eliminar</button>
										<?php echo form_close(); ?>
									</td>
								</tr>
								<?php $indice++;
							}
						?>
					</tbody>
				</table>
			</div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
