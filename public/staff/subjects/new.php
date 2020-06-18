<?php require_once('../../../private/initialize.php'); ?>

<?php
if (is_post_request()) {
  $subject = [];

  $subject['menu_name'] = $_POST['menu_name'] ?? '';
  $subject['position'] = $_POST['position'] ?? '1';
  $subject['visible'] = $_POST['visible'] ?? '1';


  $result = insert_subject($subject);
  if ($result === true) {
    $new_id = $db->insert_id;
    redirect_to('staff/subjects/show.php?id=' . $new_id);
  } else {
    $errors = $result;
  }
} else {
  $subject = [];
  $subject['menu_name'] = '';
  $subject['visible'] = 0;
}
// FIND NUMBER OF SUBJECTS IN DATA BASE
$subject_set = find_all_subjects();
$subject_count = $subject_set->num_rows + 1;
$subject_set->free();

$subject['position'] = $subject['position'] ?? $subject_count;

?>

<?php $page_title = 'Create Subject'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/staff/subjects/index.php'); ?>">&laquo; Back to Subjects</a>

  <div class="subject new">
    <h1>Create Subject</h1>

    <!-- DISPLAY ERRORS FOR FORM -->
    <?= display_errors($errors) ?>

    <form action="<?= url_for('staff/subjects/new.php') ?>" method="post">
      <dl>
        <dt>Menu Name</dt>
        <dd><input type="text" name="menu_name" value="<?= $subject['menu_name'] ?>" /></dd>
      </dl>
      <dl>
        <dt>Position</dt>
        <dd>
          <select name="position">
          <?php for($i = 1; $i <= $subject_count; $i++) : ?>
            <option <?= $i == $subject['position'] ? 'selected' : '' ?> value="<?= $i ?>"><?= $i ?></option>
          <?php endfor; ?>
          </select>
        </dd>
      </dl>
      <dl>
        <dt>Visible</dt>
        <dd>
          <input type="hidden" name="visible" value="0" />
          <input type="checkbox" name="visible" value="1" <?= $subject['visible'] == 1 ? 'checked' : '' ?>/>
        </dd>
      </dl>
      <div id="operations">
        <input type="submit" value="Create Subject" />
      </div>
    </form>

  </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>


