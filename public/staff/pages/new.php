<?php
require_once('../../../private/initialize.php');

$page = [];

if (is_post_request()) {
  $page['page_name'] = $_POST['page_name'] ?? '';
  $page['position'] = $_POST['position'] ?? 1;
  $page['visible'] = $_POST['visible'] ?? 1;
  $page['subject_id'] = $_POST['subject_id'] ?? 1;
  
  $result = insert_page($page);
  if ($result === true) {
    $new_id = $db->insert_id;
    redirect_to('/staff/pages/show.php?id=' . $new_id);
  } else {
    $errors = $result;
  }
} else {
  $page['page_name'] = '';
  $page['visible'] = 0;
  $page['subject_id'] = 1;
}
// GET PAGE COUNT
$page_set = find_all_pages();
$page_count = $page_set->num_rows + 1;
$page_set->free();

$page['position'] = $page['position'] ?? $page_count;

// GET THE NAMES OF ALL THE SUBJECTS
$subject_set = find_all_subjects();

?>

<?php $page_title = 'Create Page'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/staff/pages/index.php'); ?>">&laquo; Back to Pages</a>

  <div class="pages new">
    <h1>Create Page</h1>

    <!-- DISPLAY FORM VALIDATION ERRORS IF ANY -->
    <?= display_errors($errors) ?>

    <form action="<?= url_for('staff/pages/new.php') ?>" method="post">
      <dl>
        <dt>Page Name</dt>
        <dd><input type="text" name="page_name" value="<?= h($page['page_name']) ?>" /></dd>
      </dl>
      <dl>
        <dt>Subject</dt>
        <dd>
          <select name="subject_id">
          <?php while($subject = $subject_set->fetch_assoc()) : ?>
            <option 
              value="<?= h($subject['id']) ?>" 
              <?= $page['subject_id'] === $subject['id'] ? 'selected' : ''; ?> 
            > 
              <?= h($subject['menu_name']) ?>
            </option>
          <?php endwhile; ?>
          </select>
        </dd>
      </dl>
      <dl>
        <dt>Position</dt>
        <dd>
          <select name="position">
          <?php for($i = 1; $i <= $page_count; $i++) : ?>
            <option value="<?= $i ?>" <?= $i == $page['position'] ? 'selected' : '' ?> ><?= $i ?></option>
          <?php endfor; ?>
          </select>
        </dd>
      </dl>
      <dl>
        <dt>Visible</dt>
        <dd>
          <input type="hidden" name="visible" value="0" />
          <input type="checkbox" name="visible" value="1" <?= $page['visible'] == 1 ? 'checked' : ''; ?>/>
        </dd>
      </dl>
      <div id="operations">
        <input type="submit" value="Create Page" />
      </div>
    </form>

  </div>

</div>

<?php $subject_set->free(); ?>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>