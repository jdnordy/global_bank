<?php
require_once('../../../private/initialize.php');

if (!isset($_GET['id'])) {
  redirect_to('staff/pages/');
}
$id = h($_GET['id']);

if (is_post_request()) {
  $page = [];
  $page['page_name'] = $_POST['page_name'] ?? '';
  $page['subject_id'] = $_POST['subject_id'] ?? 1;
  $page['position'] = $_POST['position'] ?? 1;
  $page['visible'] = $_POST['visible'] ?? 1;
  $page['id'] = $id;

  $result = update_page($page);
  if ($result === true) {
    redirect_to('staff/pages/show.php?id=' . u($id));
  } else {
    $errors = $result;
  }

} else {
  // GET PAGE
  $result = get_page_by_id($id);
  $page = $result->fetch_assoc();
  $result->free();
}

// GET PAGE COUNT
$page_set = find_all_pages();
$page_count = 0;
while ($curr_page = $page_set->fetch_assoc()) {
  if ($curr_page['subject_id'] == $page['subject_id']) {
    $page_count++;
  }
}
$page_set->free();

// GET THE NAMES OF ALL THE SUBJECTS
$subject_set = find_all_subjects();

?>

<?php 
$page_title = 'Edit Page : ' . h($page['page_name']); 
?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">

  <a class="back-link" href="<?= url_for('/staff/pages/'); ?>">&laquo; Back to Pages</a>

  <div class="pages new">
    <h1>Edit Page : <?= h($page['page_name']) ?></h1>

    <!-- DISPLAY FORM VALIDATION ERRORS IF ANY -->
    <?= display_errors($errors) ?>

    <form action="<?= url_for('staff/pages/edit.php?id=' . u($id)) ?>" method="post">
      <dl>
        <dt>Page Name</dt>
        <dd><input type="text" name="page_name" value="<?= h($page['page_name']) ?>" /></dd>
      </dl>
      <dl>
        <dt>Subject</dt>
        <dd>
          <select name="subject_id">
          <?php while($subject = $subject_set->fetch_assoc()) : ?>
            <option value="<?= $subject['id']?>" <?= $subject['id'] == $page['subject_id'] ? 'selected' : '' ?>><?= $subject['menu_name'] ?></option>
          <?php endwhile; ?>
          </select>
        </dd>
      </dl>
      <dl>
        <dt>Position</dt>
        <dd>
          <select name="position">
            <?php for($i = 1; $i <= $page_count; $i++) : ?>
              <option <?= $i == $page['position'] ? 'selected' : '' ?> value="<?= $i ?>"><?= $i ?></option>
            <?php endfor; ?>
          </select>
        </dd>
      </dl>
      <dl>
        <dt>Visible</dt>
        <dd>
          <input type="hidden" name="visible" value="0" />
          <input type="checkbox" name="visible" value="1" <?= $page['visible'] == '1' ? 'checked' : '' ?>/>
        </dd>
      </dl>
      <div id="operations">
        <input type="submit" value="Update Page" />
      </div>
    </form>

  </div>

</div>

<?php $subject_set->free(); ?>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>