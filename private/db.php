<?php
require_once('db_credentials.php');

function db_connect() {
  return new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
}

function db_disconnect($db) {
  if (isset($db)) {
    $db->close();
  }
}
?>