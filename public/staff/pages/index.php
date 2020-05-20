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
    
  </table>

</div>
    
<?php include(SHARED_PATH.'/staff_footer.php'); ?>