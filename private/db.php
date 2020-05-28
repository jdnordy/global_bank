<?php
require_once('db_credentials.php');

function db_connect() {
  $db = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
  confirm_db_connect($db);
  return $db;
}

function db_disconnect($db) {
  if (isset($db)) {
    $db->close();
  }
}

function confirm_db_connect($db) {
  // Test if connection succeeded
  if($db->connect_errno) {
    $msg = "Database connection failed: ";
    $msg .= $db->connect_error;
    $msg .= " (" . $db->connect_errno . ")";
    exit($msg);
  }
}

function confirm_result_set($result_set) {
  // Test if query succeeded
  if (!$result_set) {
    exit("Database query failed.");
  }
}
?>