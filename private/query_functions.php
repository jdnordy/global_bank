<?php

function find_all_subjects() {
  global $db;
  $sql = "SELECT * FROM subjects ";
  $sql .= "ORDER BY position ASC";
  $result = $db->query($sql);
  confirm_result_set($result);
  return $result;
}

function find_all_pages() {
  global $db;
  $sql = "SELECT p.id, p.subject_id, s.menu_name, p.page_name, p.position, p.visible, p.content
    FROM pages p
    INNER JOIN subjects s 
    ON p.subject_id = s.id 
    ORDER BY p.position ASC;
  ";
  $result_set = $db->query($sql);
  confirm_result_set($result_set);
  return $result_set;
}
?>