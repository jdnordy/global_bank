<?php
require_once('../../../private/initialize.php');
?>

<?php
// check for params and escape html
$id = isset($_GET['id']) ? h($_GET['id']) : '1';
$name = $_GET['name'] ? h($_GET['name']) : '';
// set page title
$page_title = 'Staff Pages / ' . $name; 
?>

<!-- STAFF HEADER -->
<?php include(SHARED_PATH.'/staff_header.php'); ?>

<div id="content">
  <a href="<?= url_for('staff/pages/') ?>">&laquo; Back to Pages</a>

  <div class="actions">
    <a class="action" href="<?= url_for('staff/pages/edit.php?id=' . u($id)) ?>">Edit</a>
    <a class="action" href="<?= url_for('staff/pages/delete.php?id=' . u($id)) ?>">Delete</a>
  </div>

  <p>
    You are on page id #<?= $id ?>!
  </p>
</div>

<!-- STAFF FOOTER -->
<?php include(SHARED_PATH.'/staff_footer.php'); ?>