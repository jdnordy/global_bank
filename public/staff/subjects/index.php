<?php
require_once('../../../private/initialize.php');
?>

<?php $page_title = 'Staff Subjects'; ?>

<!-- STAFF HEADER -->
<?php include(SHARED_PATH.'/staff_header.php'); ?>

<?php
$subject_set = find_all_subjects();

$subjects = [];
while ($subject = $subject_set->fetch_assoc()) {
  array_push($subjects, $subject);
}
?>

<div id="content">
  <div class="subject_listings">
    <h1>Subjects</h1>

    <div class="actions">
      <a class="action" href="<?= url_for("staff/subjects/new.php") ?>">Create New Subject</a>
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
            <td><?= h($subject['id']) ?></td>
            <td><?= h($subject['position']) ?></td>
            <td><?= $subject['visible'] === '1' ? "true" : "false" ?></td>
            <td><?= h($subject['menu_name']) ?></td>
            <td><a 
              class="action"
              href="<?= url_for(
                  '/staff/subjects/show.php?id='
                  . h(u($subject['id']))
                  . '&name='
                  . h(u($subject['menu_name'])) 
                )
              ?>"
            >View</a></td>
            <td><a class="action" href="<?= url_for("/staff/subjects/edit.php?id=" . h(u($subject['id'])) . '&name=' . h(u($subject['menu_name']))) ?>">Edit</a></td>
            <td><a class="action" href="">Delete</a></td>
          </tr>
      <?php endforeach; ?>
    </table>
    
    <?php
      $subject_set->free();
    ?>

  </div>
</div>
 
<!-- STAFF FOOTER -->
<?php include(SHARED_PATH.'/staff_footer.php'); ?>