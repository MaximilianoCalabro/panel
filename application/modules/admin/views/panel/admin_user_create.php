<?php echo $form->messages(); ?>

<div class="row">

	<div class="col-md-6">
		<div class="box box-primary">
			<div class="box-header">
				<h3 class="box-title">Info de Usuario</h3>
			</div>
			<div class="box-body">
				<?php echo $form->open(); ?>

					<?php echo $form->bs3_text('Usuario', 'username'); ?>
					<?php echo $form->bs3_text('Nombre', 'first_name'); ?>
					<?php echo $form->bs3_text('Apellido', 'last_name'); ?>
					<?php echo $form->bs3_password('Password', 'password'); ?>
					<?php echo $form->bs3_password('Reingrese Password', 'retype_password'); ?>

					<?php if ( !empty($groups) ): ?>
					<div class="form-group">
						<label for="groups">Grupos</label>
						<div>
						<?php foreach ($groups as $group): ?>
							<label class="checkbox-inline">
								<input type="checkbox" name="groups[]" value="<?php echo $group->id; ?>"> <?php echo $group->name; ?>
							</label>
						<?php endforeach; ?>
						</div>
					</div>
					<?php endif; ?>

					<?php echo $form->bs3_submit('Enviar'); ?>
					
				<?php echo $form->close(); ?>
			</div>
		</div>
	</div>
	
</div>