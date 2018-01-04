<?php echo $form->messages(); ?>

<div class="row">

	<div class="col-md-6">
		<div class="box box-primary">
			<div class="box-header">
				<h3 class="box-title">Resetear Password para Usuario Admin: </h3>
			</div>
			<div class="box-body">
				<?php echo $form->open(); ?>
					<table class="table table-bordered">
						<tr>
							<th style="width:120px">Usuario: </th>
							<td><?php echo $target->username; ?></td>
						</tr>
						<tr>
							<th>Nombre: </th>
							<td><?php echo $target->first_name; ?></td>
						</tr>
						<tr>
							<th>Apellido: </th>
							<td><?php echo $target->last_name; ?></td>
						</tr>
						<tr>
							<th>Email: </th>
							<td><?php echo $target->email; ?></td>
						</tr>
					</table>
					<?php echo $form->bs3_password('Nuevo Password', 'new_password'); ?>
					<?php echo $form->bs3_password('Reingrese Password', 'retype_password'); ?>
					<?php echo $form->bs3_submit('Enviar'); ?>
				<?php echo $form->close(); ?>
			</div>
		</div>
	</div>
	
</div>