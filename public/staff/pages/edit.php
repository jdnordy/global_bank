<?php
require_once('../../../private/initialize.php');

if (!isset($_GET['id'])) {
  redirect_to('staff/pages/');
}
$id = h($_GET['id']);
$page_name = '';
$position = '';
$visible = '';

if (is_post_request()) {
  $page_name = isset($_POST['page_name']) ? h($_POST['page_name']) : '';
  $position = isset($_POST['position']) ? h($_POST['position']) : '';
  $visible = isset($_POST['visible']) ? h($_POST['visible']) : '';
  
  // echo $page_name;
  // echo $position;
  // echo $visible;
}

?>

<?php 
$name = isset($_GET['page_name']) ? h($_GET['page_name']) : '';
$page_title = 'Edit Page : ' . $name; 
?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">

  <a class="back-link" href="<?= url_for('/staff/pages/'); ?>">&laquo; Back to Pages</a>

  <div class="pages new">
    <h1>Edit Page : <?= $name ?></h1>

    <form action="<?= url_for('staff/pages/edit.php?id=' . u($id)) . '&name=' . $name ?>" method="post">
      <dl>
        <dt>Menu Name</dt>
        <dd><input type="text" name="page_name" value="<?= $page_name ?>" /></dd>
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
        <input type="submit" value="Update Page" />
      </div>
    </form>

  </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>