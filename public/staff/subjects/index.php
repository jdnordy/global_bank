<?php
require_once('../../../private/initialize.php');
?>

<?php $page_title = 'Staff Subjects'; ?>
<?php include(SHARED_PATH.'/staff_header.php'); ?>

<?php
$subjects = [
  ['id' => '1', 'position' => '1', 'visible' => '1', 'menu_name' => 'About Globe Bank'],
  ['id' => '2', 'position' => '2', 'visible' => '1', 'menu_name' => 'Consumer'],
  ['id' => '3', 'position' => '3', 'visible' => '1', 'menu_name' => 'Small Business'],
  ['id' => '4', 'position' => '4', 'visible' => '1', 'menu_name' => 'Commercial'],
]
?>

<div id="content">
  <div class="subject_listings">
    <h1>Subjects</h1>

    <div class="actions">
      <a class="action" href="">Create New Subject</a>
    </div>

    <table class="list">
      <tr>
        <th>Id</th>
        <th>Position</th>
        <th>Visible</th>
        <th>Name</th>
        <th>&nbsp;</th>
        <th>&nbsp;</th>
        <th>&nbsp;</th>
      <tr>
      <?php foreach ($subjects as $subject) : ?>
          <tr>
            <td><?= $subject['id'] ?></td>
            <td><?= $subject['position'] ?></td>
            <td><?= $subject['visible'] ? "true" : "false" ?></td>
            <td><?= $subject['menu_name'] ?></td>
            <td><a class="action" href="<?= url_for("/staff/subjects/show.php?id=" . $subject['id'])?>">View</a></td>
            <td><a class="action" href="">Edit</a></td>
            <td><a class="action" href="">Delete</a></td>
          </tr>
      <?php endforeach; ?>
    </table>
    
  </div>
</div>
 
<?php include(SHARED_PATH.'/staff_footer.php'); ?>