<?php

function find_all_subjects() {
  global $db;
  $sql = "SELECT * FROM subjects ";
  $sql .= "ORDER BY position ASC";
  $result = $db->query($sql);
  confirm_result_set($result);
  return $result;
}

function get_subject_by_id($id) {
  global $db;
  $sql = "SELECT * FROM subjects
    WHERE id = '$id'
  ";
  $result_set = $db->query($sql);
  confirm_result_set($result_set);
  return $result_set;
}

function find_all_pages() {
  global $db;
  $sql = "SELECT p.id, p.subject_id, s.menu_name, p.page_name, p.position, p.visible, p.content
    FROM pages p
    INNER JOIN subjects s 
    ON p.subject_id = s.id 
    ORDER BY p.subject_id ASC, p.position ASC;
  ";
  $result_set = $db->query($sql);
  confirm_result_set($result_set);
  return $result_set;
}


function get_page_by_id($id) {
  global $db;
  $sql = "SELECT * FROM pages
   WHERE id = '$id'
  ";
  $result_set = $db->query($sql);
  confirm_result_set($result_set);
  return $result_set;
}

function insert_subject($subject) {
  global $db;
  $menu_name = $subject['menu_name'];
  $position = $subject['position'];
  $visible = $subject['visible'];
  $sql = "
    INSERT INTO subjects (menu_name, position, visible)
    VALUES ('$menu_name', '$position', '$visible')
  ";
  $result = $db->query($sql);
  if ($result) {
    return true;
  } else {
    // INSERT failed
    echo $db->error;
    db_disconnect($db);
    exit;
  }
}

function update_subject($subject) {
  global $db;
  $menu_name = $subject['menu_name'];
  $position = $subject['position'];
  $visible = $subject['visible'];
  $id = $subject['id'];
  $sql = "
    UPDATE subjects
    SET menu_name = '$menu_name', position = '$position', visible = '$visible'
    WHERE id = '$id'
    LIMIT 1;
  ";
  $result = $db->query($sql);
  if ($result) {
    return true;
  } else {
    // UPDATE failed
    echo $db->error;
    db_disconnect($db);
    exit;
  }
}

function delete_subject_by_id($id) {
  global $db;
  $sql = "
    DELETE FROM subjects
    WHERE id = '$id'
    LIMIT 1
  ";
  $result = $db->query($sql);
  if ($result) {
    return true;
  } else {
    // DELETE failed
    echo $db->error;
    db_disconnect($db);
    exit;
  }
}

?>