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

  <div class="actions">
    <a class="action" href="<?= url_for('staff/pages/edit.php?id=' . u($id)) ?>">Edit</a>
    <a class="action" href="<?= url_for('staff/pages/delete.php?id=' . u($id)) ?>">Delete</a>
  </div>
  
  You're on subject #<?= h($page_id) ?>!
</div>


<?php include(SHARED_PATH . '/staff_footer.php'); ?>