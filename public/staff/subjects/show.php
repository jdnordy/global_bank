<?php
require_once('../../../private/initialize.php');
?>

<?php 
// check for param and html escape 
$id = isset($_GET['id']) ? h($_GET['id']) : '1';
$subject_set = get_subject_by_id($id);
$subject = $subject_set->fetch_assoc();
// set page title
?>

<!-- STAFF HEADER -->
<?php 
$page_title = "Staff Subjects / " . h($subject['menu_name']);
include(SHARED_PATH . '/staff_header.php'); 
?>

<div id="content">
  <a href="<?= url_for('staff/subjects/') ?>">&laquo; Back to Subjects</a>

  <div class="actions">
    <a class="action" href="<?= url_for('staff/subjects/edit.php?id=' . u($id) . '&name=' . u(h($subject['menu_name']))) ?>">Edit</a>
    <a class="action" href="<?= url_for('staff/subjects/delete.php?id=' . u($id) . '&name=' . u(h($subject['menu_name']))) ?>">Delete</a>
  </div>
  You're on subject #<?= $subject['id'] ?>!
</div>

<?php
$subject_set->free();
?>

<!-- STAFF FOOTER -->
<?php include(SHARED_PATH . '/staff_footer.php'); ?>