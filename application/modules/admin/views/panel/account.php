<?php echo $form1->messages(); ?>

<div class="row">

	<div class="col-md-6">
		<div class="box box-primary">
			<div class="box-header">
				<h3 class="box-title">Info de la Cuenta</h3>
			</div>
			<div class="box-body">
				<?php echo $form1->open(); ?>
					<?php echo $form1->bs3_text('Nombre', 'first_name', $user->first_name); ?>
					<?php echo $form1->bs3_text('Apellido', 'last_name', $user->last_name); ?>
					<?php echo $form1->bs3_submit('Actualizar'); ?>
				<?php echo $form1->close(); ?>
			</div>
		</div>
	</div>
	
	<div class="col-md-6">
		<div class="box box-primary">
			<div class="box-header">
				<h3 class="box-title">Cambiar Password</h3>
			</div>
			<div class="box-body">
				<?php echo $form2->open(); ?>
					<?php echo $form2->bs3_password('Nuevo Password', 'new_password'); ?>
					<?php echo $form2->bs3_password('Reingrese Password', 'retype_password'); ?>
					<?php echo $form2->bs3_submit('Enviar'); ?>
				<?php echo $form2->close(); ?>
			</div>
		</div>
	</div>
	
</div>