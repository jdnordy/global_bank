<?php
require_once('../../../private/initialize.php');
?>

<?php 
$page_id = $_GET['id'] ?? '1'; 
$page_title = "Staff Subjects $page_id";
?>

<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">
  <a href="<?= url_for('staff/subjects') ?>">Back</a>
  You're on subject #<?= h($page_id) ?>!
</div>


<?php include(SHARED_PATH . '/staff_footer.php'); ?>