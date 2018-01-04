view: demo.php <?php if ( !empty($demo_id) ) echo "(ID = $demo_id)"; 

echo md5(uniqid());
?>
<?php echo 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; ?>