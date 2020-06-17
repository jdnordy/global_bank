<?php
require_once('../../../private/initialize.php');

if (!is_post_request()) {
  redirect_to('staff/subjects/new.php');
}

$subject = [];

$subject['menu_name'] = $_POST['menu_name'] ?? '';
$subject['position'] = $_POST['position'] ?? '1';
$subject['visible'] = $_POST['visible'] ?? '1';


insert_subject($subject);
$new_id = $db->insert_id;
redirect_to('staff/subjects/show.php?id=' . $new_id);

?>