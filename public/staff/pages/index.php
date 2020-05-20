<?php
require_once('../../../private/initialize.php');
?>

<?php $page_title = 'Staff Pages'; ?>
<?php include(SHARED_PATH.'/staff_header.php'); ?>

<?php 
$pages = [
  ['id' => '1', 'position' => '1', 'visible' => '1', 'page_name' => 'Globe Bank'],
  ['id' => '2', 'position' => '2', 'visible' => '1', 'page_name' => 'History'],
  ['id' => '3', 'position' => '3', 'visible' => '1', 'page_name' => 'Leadership'],
  ['id' => '4', 'position' => '4', 'visible' => '1', 'page_name' => 'Contact Us'],
]
?>

<div id="content">
  <div class="actions">
    <a class="action" href="">Create New Page</a>
  </div>

  <table class="list">
    <tr>
      <th>Id</th>
      <th>Position</th>
      <th>Visible</th>
      <th>Page Name</th>
      <th>&nbsp;</th>
      <th>&nbsp;</th>
      <th>&nbsp;</th>
    </tr>
    <?php foreach($pages as $page) : ?>
    <tr>
      <th><?= $page['id'] ?></th>
      <th><?= $page['position'] ?></th>
      <th><?= $page['visible'] ? 'true' : 'false' ?></th>
      <th><?= $page['page_name'] ?></th>
      <th><a class="action" href="<?= url_for('staff/pages/show.php?id=' . $page['id']) ?>">View</a></th>
      <th><a class="action" href="">Edit</a></th>
      <th><a class="action" href="">Delete</a></th>
    </tr>
    <?php endforeach; ?>
  </table>

</div>
    
<?php include(SHARED_PATH.'/staff_footer.php'); ?>