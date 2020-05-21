<?php
require_once('../../../private/initialize.php');

if (is_post_request()) {
  $page_name = isset($_POST['page_name']) ? h($_POST['page_name']) : '';
  $position = isset($_POST['position']) ? h($_POST['position']) : '';
  $visible = isset($_POST['visible']) ? h($_POST['visible']) : '';
  
  // echo $page_name;
  // echo $position;
  // echo $visible;
}

?>

<?php $page_title = 'Create Page'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/staff/pages/index.php'); ?>">&laquo; Back to Pages</a>

  <div class="pages new">
    <h1>Create Page</h1>

    <form action="<?= url_for('staff/pages/new.php') ?>" method="post">
      <dl>
        <dt>Menu Name</dt>
        <dd><input type="text" name="page_name" value="" /></dd>
      </dl>
      <dl>
        <dt>Position</dt>
        <dd>
          <select name="position">
            <option value="1">1</option>
          </select>
        </dd>
      </dl>
      <dl>
        <dt>Visible</dt>
        <dd>
          <input type="hidden" name="visible" value="0" />
          <input type="checkbox" name="visible" value="1" />
        </dd>
      </dl>
      <div id="operations">
        <input type="submit" value="Create Page" />
      </div>
    </form>

  </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>