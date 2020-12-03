<div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
            </section>
            <!-- Main content -->
            <section class="content">
                <!-- Default box -->
                <div class="box box-solid">
                    <div class="box-body">

					<div class="container" style="background-image: url('<?php echo base_url() ?>img/fondo.png');">
						<?php 
						$atributos = array('class' => 'form-group', 'id' => 'myform');
						echo form_open_multipart('usuario/agregarbd', $atributos);
						?>
						<div class="py-5 text-center">
							<h2 style="color: #ff5733">Registrar Usuario</h2>
						</div>
						<div class="row">

							<div class="col-md-4 mb-3">
								<label for="nombre">Nombre</label><input type="text" id="nombre" name="nombre" class="form-control" placeholder="Nombre" required>
							</div>
							<div class="col-md-4 mb-3">
								<label>Primer Apellido</label><input type="text" name="primerApellido" class="form-control" placeholder="Primer Apellido" required>
							</div>
							<div class="col-md-4 mb-3">
								<label>Segundo Apellido</label><input type="text" name="segundoApellido" class="form-control" placeholder="Segundo Apellido">
							</div>
							<div class="col-md-12">
								<label>Direccion</label><input type="text" name="direccion" class="form-control" placeholder="Direccion">
								<label>Teléfono</label><input type="text" name="telefono" class="form-control" placeholder="Número de celular" style="">
								<label for="rol">Rol de usuario</label>
							    <select class="form-control" name="idrol" id="rol">
							      <option value="1">Administrador</option>
							      <option value="2">Vendedor</option>
							    </select>
								<label>Nombre de Usuario</label><input type="text" name="username" class="form-control" placeholder="Nombre de usuario">
								<label>Contraseña</label><input type="password" name="password" class="form-control" placeholder="Contraseña">
								
								<button type="submit" class="btn btn-primary btn" style="background-color: #ff5733">Registrar</button>
							</div>
						</div>
						<?php 
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
<style type="text/css">
	body{
		background-size: 100vw 100vh;
		background-attachment: fixed;
		margin: 0;
        background-image: url('img/fondo.png');
	}
	input{
		width: 100%;
		margin-bottom: 20px;
		padding: 7px;
		box-sizing: border-box;
		border: none;
	}
	form{
		width: 600px; 
		margin:auto; 
		background:rgba(0,0,0,0.4);
		padding: 5px 20px; 
		box-sizing: border-box;
		margin-top:20px;
		border-radius: 7px;
	}
	@media (max-width:700px){
		form{
			width:100%;
		}
	}
	label{
		font-size: 18px;
        color: #ff5733;
	}
	button{
		width: 100%;
	}
	h2{
		font-size: 40px;
	}
	img{
		display:block;
		margin:auto;
	}
</style>