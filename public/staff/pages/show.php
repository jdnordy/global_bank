<?php
require_once('../../../private/initialize.php');
?>

<?php
$id = $_GET['id'];
$page_title = 'Staff Pages ' . h($id); 
?>
<?php include(SHARED_PATH.'/staff_header.php'); ?>

<div id="content">
  <a href="<?= url_for('staff/pages') ?>">Back</a>

  <div class="actions">
    <a class="action" href="<?= url_for('staff/pages/edit.php?id=' . u($id)) ?>">Edit</a>
    <a class="action" href="<?= url_for('staff/pages/delete.php?id=' . u($id)) ?>">Delete</a>
  </div>
  
  <p>
    You are on page id #<?= h($id) ?>!
  </p>
</div>

<?php include(SHARED_PATH.'/staff_footer.php'); ?>