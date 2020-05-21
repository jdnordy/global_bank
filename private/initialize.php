<?php
// define paths to directories
define("PRIVATE_PATH", dirname(__FILE__));
define("PROJECT_PATH", dirname(PRIVATE_PATH));
define("PUBLIC_PATH", PROJECT_PATH."/public");
define("SHARED_PATH", PRIVATE_PATH."/shared");
// website url
define("WWW_ROOT", "http://globe_bank");

require_once('functions.php');
require_once('db.php');
require_once('query_functions.php');

$db = db_connect();
?>