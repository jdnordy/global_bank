<?php 
require_once('../../../private/initialize.php');

// PAGE ID
if (!isset($_GET['id'])) {
  redirect_to('staff/subjects/index.php');
}
$id = h($_GET['id']);

// FORM PROCESSING ON POST REQUEST
if (is_post_request()) {
  $subject = [];

  $subject['menu_name'] = $_POST['menu_name'] ?? '';
  $subject['position'] = $_POST['position'] ?? '1';
  $subject['visible'] = $_POST['visible'] ?? '1';
  $subject['id'] = $id;

  update_subject($subject);
  redirect_to('staff/subjects/show.php?id=' . $id);
} else {
  // GET SUBJECT DATA FROM DATABASE IF GET REQUEST
  $result = get_subject_by_id($id);
  $subject = $result->fetch_assoc();
  $result->free();

  // FIND NUMBER OF SUBJECTS IN DATA BASE
  $subject_set = find_all_subjects();
  $subject_count = $subject_set->num_rows;
  $subject_set->free();
}

?>

<?php 
// check for param and html escape 
$page_title = 'Edit Subject : ' . $menu_name; 
?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/staff/subjects/index.php'); ?>">&laquo; Back to Subjects</a>

  <div class="subject edit">
    <h1>Edit Subject : <?= h($subject['menu_name']) ?></h1>

    <form action="<?= url_for('staff/subjects/edit.php?id=' . u($id)) ?>" method="post">
      <dl>
        <dt>Menu Name</dt>
        <dd><input type="text" name="menu_name" value="<?= h($subject['menu_name']) ?>" /></dd>
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
          <input type="checkbox" name="visible" value="1" <?= $subject['visible'] == '1' ? 'checked' : '' ?>/>
        </dd>
      </dl>
      <div id="operations">
        <input type="submit" value="Update Subject" />
      </div>
    </form>

  </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>


