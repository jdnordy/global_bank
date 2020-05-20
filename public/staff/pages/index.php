<?php
require_once('../../../private/initialize.php');
?>

<?php $page_title = 'Staff Pages'; ?>

<!-- STAFF HEADER -->
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
  <h1>Pages</h1>
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
      <td><?= $page['id'] ?></td>
      <td><?= $page['position'] ?></td>
      <td><?= $page['visible'] ? 'true' : 'false' ?></td>
      <td><?= $page['page_name'] ?></td>
      <td><a 
        class="action" 
        href="<?= url_for("staff/pages/show.php?id={$page['id']}&name={$page['name']}") ?>"
      >View</a></td>
      <td><a class="action" href="">Edit</a></td>
      <td><a class="action" href="">Delete</a></td>
    </tr>
    <?php endforeach; ?>
  </table>

</div>

<!-- STAFF FOOTER -->
<?php include(SHARED_PATH.'/staff_footer.php'); ?>