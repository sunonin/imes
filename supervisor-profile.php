<?php 
session_start();
require_once 'init.php';

include 'public/base2.php';

?>

<?php startblock('title') ?><?php echo $menuTitle ?><?php endblock('title') ?>

<?php startblock('content') ?>
  <?php include('views/supervisor/profile.php'); ?>
<?php endblock() ?>

<?php include('views/supervisor/app.css'); ?>