<form action="<?php echo current_url(); ?>" method="POST">

    <input type="text" name="abc" placeholder="name" />

	<?php echo modules::run('adminlte/widget/btn_submit', 'Save'); ?>

</form>