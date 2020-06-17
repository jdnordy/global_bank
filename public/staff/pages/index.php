<?php
require_once('../../../private/initialize.php');
?>

<?php $page_title = 'Staff Pages'; ?>

<!-- STAFF HEADER -->
<?php include(SHARED_PATH.'/staff_header.php'); ?>

<?php 
$pages_set = find_all_pages();
?>

<div id="content">
  <h1>Pages</h1>
  <div class="actions">
    <a class="action" href="<?= url_for('staff/pages/new.php') ?>">Create New Page</a>
  </div>

  <table class="list">
    <tr>
      <th>Id</th>
      <th>Subject Id</th>
      <th>Subject Name</th>
      <th>Position</th>
      <th>Visible</th>
      <th>Page Name</th>
      <th>&nbsp;</th>
      <th>&nbsp;</th>
      <th>&nbsp;</th>
    </tr>
    <?php while ($page = $pages_set->fetch_assoc()) : ?>
    <tr>
      <td><?= h($page['id']) ?></td>
      <td><?= h($page['subject_id']) ?></td>
      <td><?= h($page['menu_name']) ?></td>
      <td><?= h($page['position']) ?></td>
      <td><?= $page['visible'] === '1' ? 'true' : 'false' ?></td>
      <td><?= h($page['page_name']) ?></td>
      <td><a class="action" href="<?= url_for('staff/pages/show.php?id=' . h(u($page['id']))); ?>">View</a></td>
      <td><a class="action" href="<?= url_for("/staff/pages/edit.php?id=" . h(u($page['id']))) ?>">Edit</a></td>
      <td><a class="action" href="">Delete</a></td>
    </tr>
    <?php endwhile; ?>
  </table>

  <?php
    $pages_set->free();
  ?>

</div>

<!-- STAFF FOOTER -->
<?php include(SHARED_PATH.'/staff_footer.php'); ?>