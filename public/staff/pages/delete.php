<?php

require_once('../../../private/initialize.php');

if(!isset($_GET['id'])) {
  redirect_to('/staff/pages');
}
$id = h($_GET['id']);

$result = get_page_by_id($id);
$subject = $result->fetch_assoc();
$result->free();

if(is_post_request()) {
  delete_page_by_id($id);
  redirect_to('staff/pages');
}

?>

<?php $page_title = 'Delete Page'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">

  <a class="back-link" href="<?= url_for('/staff/pages'); ?>">&laquo; Back to List</a>

  <div class="subject delete">
    <h1>Delete Page</h1>
    <p>Are you sure you want to delete this page?</p>
    <p class="item"><?= h($page['page_name']); ?></p>

    <form action="<?= url_for('/staff/pages/delete.php?id=' . u($id)); ?>" method="post">
      <div id="operations">
        <input type="submit" name="commit" value="Delete Page" />
      </div>
    </form>
  </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
