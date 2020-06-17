<?php
require_once('../../../private/initialize.php');
?>

<?php 
// check for param and html escape 
$id = isset($_GET['id']) ? h($_GET['id']) : '1';
$subject_set = get_subject_by_id($id);
$subject = $subject_set->fetch_assoc();
$subject_set->free();
?>

<!-- STAFF HEADER -->
<?php 
// set page title
$page_title = "Staff Subjects / " . h($subject['menu_name']);
include(SHARED_PATH . '/staff_header.php'); 
?>

<div id="content">
  <a href="<?= url_for('staff/subjects/') ?>">&laquo; Back to Subjects</a>

  <div class="actions">
    <a class="action" href="<?= url_for('staff/subjects/edit.php?id=' . u($id)) ?>">Edit</a>
    <a class="action" href="<?= url_for('staff/subjects/delete.php?id=' . u($id) . '&name=' . u(h($subject['menu_name']))) ?>">Delete</a>
  </div>

  <h1>Subject: <?= h($subject['menu_name']); ?></h1>
  <div class="attributes">
    <dl>
      <dt>Menu Name</dt>
      <dd><?= h($subject['menu_name']); ?></dd>
    </dl>
    <dl>
      <dt>Position</dt>
      <dd><?= h($subject['position']); ?></dd>
    </dl>
    <dl>
      <dt>Visible</dt>
      <dd><?= $subject['visible'] == '1' ? 'true' : 'false'; ?></dd>
    </dl>
  </div>
</div>

<!-- STAFF FOOTER -->
<?php include(SHARED_PATH . '/staff_footer.php'); ?>