<div class="row">

	<div class="col-md-4">
		<?php echo modules::run('adminlte/widget/box_open', 'Atajos'); ?>
			<?php echo modules::run('adminlte/widget/app_btn', 'fa fa-user', 'Cuenta', 'panel/account'); ?>
			<?php echo modules::run('adminlte/widget/app_btn', 'fa fa-sign-out', 'Salir', 'panel/logout'); ?>
		<?php echo modules::run('adminlte/widget/box_close'); ?>
	</div>

	<div class="col-md-4">
		<?php echo modules::run('adminlte/widget/info_box', 'yellow', $count['users'], 'Usuarios', 'fa fa-users', 'user'); ?>
	</div>
	
</div>
