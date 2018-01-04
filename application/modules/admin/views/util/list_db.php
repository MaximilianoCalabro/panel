
<div class="box">
	<div class="box-header">
		<h3 class="box-title">Database Versions</h3>
	</div>
	<div class="box-body">
		<?php /* Backup button */ ?>
		<p>
			<a href="util/backup_db" class="btn btn-primary">Respaldar Base de datos actual</a>
			<a href="util/backup_db?save_latest=1" class="btn btn-primary">Respaldar Base de datos actual (y guardar al Ultimo)</a>
		</p>

		<?php /* List out stored versions */ ?>
		<table class="table table-striped table-hover table-bordered">
			<tbody>
				<tr>
					<th>Versión</th>
					<th>Dirección del archivo</th>
					<th>Acción</th>
				</tr>
				<tr>
					<td><b>Ultimo</b></td>
					<td><?php echo FCPATH.'sql/latest.sql'; ?></td>
					<td><a href="util/restore_db/latest" class="btn btn-primary">Restaurar</a></td>
				</tr>
				<?php foreach ($backup_sql_files as $file): ?>
				<tr>
					<td>
						<?php
							$datetime = explode('_', str_replace('.sql', '', $file));
							echo '<b>'.$datetime[0].'</b> '.str_replace('-', ':', $datetime[1]);
						?>
					</td>
					<td><?php echo FCPATH.'sql/backup/'.$file; ?></td>
					<td>
						<a href="util/restore_db/<?php echo $file; ?>" class="btn btn-primary">Restaurar</a>
						<a href="util/remove_db/<?php echo $file; ?>" class="btn btn-danger">Borrar</a>
					</td>
				</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
</div>