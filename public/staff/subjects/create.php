<?php
require_once('../../../private/initialize.php');

if (!is_post_request()) {
  redirect_to('staff/subjects/new.php');
}

$menu_name = isset($_POST['menu_name']) ? h($_POST['menu_name']) : '';
$position = isset($_POST['position']) ? h($_POST['position']) : '1';
$visible = isset($_POST['visible']) ? h($_POST['visible']) : '1';

echo "Form parameters <br />";
echo "Menu name: " . $menu_name . "<br />";
echo "Position: $position <br />";
echo "Visible: " . ($visible === '1' ? 'true' : 'false') . "<br />";

?>