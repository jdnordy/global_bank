<?php
require_once('../../../private/initialize.php');
?>

<?php 
// check for param and html escape 
$id = $_GET['id'] ? h($_GET['id']) : '1'; 
$name = $_GET['name'] ? h($_GET['name']) : '';
// set page title
$page_title = "Staff Subjects / " . $name;
?>

<!-- STAFF HEADER -->
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">
  <a href="<?= url_for('staff/subjects/') ?>">&laquo; Back to Subjects</a>

  <div class="actions">
    <a class="action" href="<?= url_for('staff/pages/edit.php?id=' . u($id)) ?>">Edit</a>
    <a class="action" href="<?= url_for('staff/pages/delete.php?id=' . u($id)) ?>">Delete</a>
  </div>

  You're on subject #<?= $id ?>!
</div>

<!-- STAFF FOOTER -->
<?php include(SHARED_PATH . '/staff_footer.php'); ?>