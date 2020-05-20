<?php
require_once('../../private/initialize.php');
?>

<?php $page_title = 'Staff Menu'; ?>
<?php include(SHARED_PATH.'/staff_header.php'); ?>

<div id="content">
  <div id="main-menu">
    <h2>Main Menu</h3>
    <ul>
      <li><a href="<?= url_for("staff/subjects") ?>">Subjects</a></li>
      <li><a href="<?= url_for("staff/pages") ?>">Pages</a></li>
    </ul>
  </div>
</div>
    
<?php include(SHARED_PATH.'/staff_footer.php'); ?>