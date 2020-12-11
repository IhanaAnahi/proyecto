<div class="row">
	<div class="col-xs-12 text-center">
		<b>Tiendas comerciales de 
			venta de ropa Ihana</b><br>
		calle San Martin 210 <br>
		Tel. 44363560 <br>
		Email:IhanaElegancia@gmail.com
	</div>
</div> <br>
<div class="row">
	<div class="col-xs-6">
		<b>CLIENTE</b><br>
		<b>Nombre:</b> <?php echo $venta->nombre;?> <br>
		<b>Ci:</b> <?php echo $venta->ci;?><br>
	</div>	
	<div class="col-xs-6">	
		<b>COMPROBANTE</b> <br>
		<b>Tipo de Comprobante:</b> <?php echo $venta->tipocomprobante;?><br>
		<b>Fecha</b> <?php echo $venta->fechaActualizacion;?>
	</div>	
</div>
<br>
<div class="row">
	<div class="col-xs-12">
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>Nombre</th>
					<th>Precio</th>
					<th>Cantidad</th>
					<th>Importe</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($detalles as $detalle):?>
				<tr>
					<td><?php echo $detalle->nombre;?></td>
					<td><?php echo $detalle->precio;?></td>
					<td><?php echo $detalle->cantidad;?></td>
					<td><?php echo $detalle->importe;?></td>
				</tr>
				<?php endforeach;?>
			</tbody>
			<tfoot>
				<tr>
					<td colspan="4" class="text-right"><strong>Total:</strong></td>
					<td><?php echo $venta->total;?></td>
				</tr>
			</tfoot>
		</table>
	</div>
</div>