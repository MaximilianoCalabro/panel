<footer class="main-footer">
	<?php if (ENVIRONMENT=='development'): ?>
		<div class="pull-right hidden-xs">
			Versión CI Bootstrap: <strong><?php echo CI_BOOTSTRAP_VERSION; ?></strong>, 
			Versión CI: <strong><?php echo CI_VERSION; ?></strong>, 
			Elapso de tiempo: <strong>{elapsed_time}</strong> segundos, 
			Uso de Memoria: <strong>{memory_usage}</strong>
		</div>
	<?php endif; ?>
	<strong>&copy; <?php echo date('Y'); ?></strong> Todos los derechos reservados.
</footer>