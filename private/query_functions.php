<?php

function find_all_subjects() {
  global $db;
  $sql = "SELECT * FROM subjects ";
  $sql .= "ORDER BY position ASC";
  $result = $db->query($sql);
  confirm_result_set($result);
  return $result;
}
?>