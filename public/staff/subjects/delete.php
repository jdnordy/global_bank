<?php

require_once('../../../private/initialize.php');

if(!isset($_GET['id'])) {
  redirect_to('/staff/subjects');
}
$id = h($_GET['id']);

$result = get_subject_by_id($id);
$subject = $result->fetch_assoc();
$result->free();

if(is_post_request()) {
  delete_subject_by_id($id);
  redirect_to('staff/subjects');
}

?>

<?php $page_title = 'Delete Subject'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">

  <a class="back-link" href="<?= url_for('/staff/subjects'); ?>">&laquo; Back to List</a>

  <div class="subject delete">
    <h1>Delete Subject</h1>
    <p>Are you sure you want to delete this subject?</p>
    <p class="item"><?= h($subject['menu_name']); ?></p>

    <form action="<?= url_for('/staff/subjects/delete.php?id=' . h(u($subject['id']))); ?>" method="post">
      <div id="operations">
        <input type="submit" name="commit" value="Delete Subject" />
      </div>
    </form>
  </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
