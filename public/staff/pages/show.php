<?php
require_once('../../../private/initialize.php');
?>

<?php
// check for params and escape html
$id = isset($_GET['id']) ? h($_GET['id']) : '1';
// query data base for page based on id
$page_result = get_page_by_id($id);
$page = $page_result->fetch_assoc();
$page_result->free();
// query database for subject
$subject_result = get_subject_by_id($page['subject_id']);
$subject = $subject_result->fetch_assoc();
$subject_result->free();

// set page title
$page_title = 'Staff Pages / ' . h($page['page_name']); 
?>

<!-- STAFF HEADER -->
<?php include(SHARED_PATH.'/staff_header.php'); ?>

<div id="content">
  <a href="<?= url_for('staff/pages/') ?>">&laquo; Back to Pages</a>

  <div class="actions">
    <a class="action" href="<?= url_for('staff/pages/edit.php?id=' . u($id)) ?>">Edit</a>
    <a class="action" href="<?= url_for('staff/pages/delete.php?id=' . u($id)) ?>">Delete</a>
  </div>

  <h1>Page: <?= h($page['page_name']); ?></h1>
  <div class="attributes">
    <dl>
      <dt>Page Name</dt>
      <dd><?= h($page['page_name']); ?></dd>
    </dl>
    <dl>
      <dt>Subject</dt>
      <dd><?= h($subject['menu_name']); ?></dd>
    </dl>
    <dl>
      <dt>Position</dt>
      <dd><?= h($page['position']); ?></dd>
    </dl>
    <dl>
      <dt>Visible</dt>
      <dd><?= $page['visible'] == '1' ? 'true' : 'false'; ?></dd>
    </dl>
  </div>
</div>

<!-- STAFF FOOTER -->
<?php include(SHARED_PATH.'/staff_footer.php'); ?>