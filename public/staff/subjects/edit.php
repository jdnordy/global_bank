<?php 
require_once('../../../private/initialize.php');

// PAGE ID
if (!isset($_GET['id'])) {
  redirect_to('staff/subjects/index.php');
}
$id = h($_GET['id']);
$menu_name = '';
$position = '';
$visible = '';

// FORM PROCESSING ON POSTS
if (is_post_request()) {
  $menu_name = isset($_POST['menu_name']) ? h($_POST['menu_name']) : '';
  $position = isset($_POST['position']) ? h($_POST['position']) : '1';
  $visible = isset($_POST['visible']) ? h($_POST['visible']) : '1';

  // echo "Form parameters <br />";
  // echo "Menu name: " . $menu_name . "<br />";
  // echo "Position: $position <br />";
  // echo "Visible: " . ($visible === '1' ? 'true' : 'false') . "<br />";
}

?>

<?php 
// check for param and html escape 
$id = isset($_GET['id']) ? h($_GET['id']) : '1'; 
$name = isset($_GET['name']) ? h($_GET['name']) : '';
$page_title = 'Edit Subject : ' . $name; 
?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/staff/subjects/index.php'); ?>">&laquo; Back to Subjects</a>

  <div class="subject edit">
    <h1>Edit Subject</h1>

    <form action="<?= url_for('staff/subjects/edit.php?id=' . u($id)) ?>" method="post">
      <dl>
        <dt>Menu Name</dt>
        <dd><input type="text" name="menu_name" value="<?= $menu_name ?>" /></dd>
      </dl>
      <dl>
        <dt>Position</dt>
        <dd>
          <select name="position">
            <?php for($i = 1; $i <= 4; $i++) : ?>
              <option <?= $i == $position ? 'selected' : '' ?> value="<?= $i ?>"><?= $i ?></option>
            <?php endfor; ?>
          </select>
        </dd>
      </dl>
      <dl>
        <dt>Visible</dt>
        <dd>
          <input type="hidden" name="visible" value="0" />
          <input type="checkbox" name="visible" value="1" <?= $visible == '1' ? 'checked' : '' ?>/>
        </dd>
      </dl>
      <div id="operations">
        <input type="submit" value="Create Subject" />
      </div>
    </form>

  </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>


