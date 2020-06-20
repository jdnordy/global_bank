<?php

/**
 * *********
 * PAGE QUERY FUNCTIONS
 * *********
 */

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
  $esc_id = db_escape($db, $id);
  $sql = "SELECT * FROM pages
   WHERE id = '$esc_id'
  ";
  $result_set = $db->query($sql);
  confirm_result_set($result_set);
  return $result_set;
}

function validate_page($page) {

  $errors = [];
  global $db;
  
  // PAGE_NAME
  if(is_blank($page['page_name'])) {
    $errors[] = "Name cannot be blank.";
  }
  else if(!has_length($page['page_name'], ['min' => 2, 'max' => 255])) {
    $errors[] = "Name must be between 2 and 255 characters.";
  }
  // check for uniqueness of page name
  else {
    $esc_page_name = db_escape($db, $page['page_name']);
    $esc_id = $page['id'];
    $sql = "
      SELECT * FROM pages
      WHERE page_name = '$esc_page_name'
      AND id != '$esc_id';
    ";
    $result = $db->query($sql);
    if($result->num_rows > 0) {
      $errors[] = "Name must be unique.";
    }
  }

  // SUBJECT_ID
  $esc_subject_id = db_escape($db, $page['subject_id']);
  $sql = "
    SELECT * FROM SUBJECTS
    WHERE id = '$esc_subject_id'
  ";
  $result = $db->query($sql);
  if($result->num_rows !== 1) {
    $errors[] = "Subject must be an exisiting subject.";
  }

  // POSITION
  // Make sure we are working with an integer
  $postion_int = (int) $page['position'];
  if($postion_int <= 0) {
    $errors[] = "Position must be greater than zero.";
  }
  if($postion_int > 999) {
    $errors[] = "Position must be less than 999.";
  }

  // VISIBLE
  // Make sure we are working with a string
  $visible_str = (string) $page['visible'];
  if(!has_inclusion_of($visible_str, ["0","1"])) {
    $errors[] = "Visible must be true or false.";
  }

  return $errors;
}

function insert_page($page) {
  global $db;

  $errors = validate_page($page);
  if (!empty($errors)) return $errors;

  $esc_page_name = db_escape($db, $page['page_name']);
  $esc_subject_id = db_escape($db, $page['subject_id']);
  $esc_position = db_escape($db, $page['position']);
  $esc_visible = db_escape($db, $page['visible']);
  $sql = "
    INSERT INTO pages (page_name, subject_id, position, visible)
    VALUES ('$esc_page_name', '$esc_subject_id', '$esc_position', '$esc_visible');
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

function update_page($page) {
  global $db;

  $errors = validate_page($page);
  if (!empty($errors)) return $errors;

  $esc_page_name = db_escape($db, $page['page_name']);
  $esc_subject_id = db_escape($db, $page['subject_id']);
  $esc_position = db_escape($db, $page['position']);
  $esc_visible = db_escape($db, $page['visible']);
  $esc_id = db_escape($db, $page['id']);

  $sql = "
    UPDATE pages
    SET page_name='$esc_page_name', subject_id='$esc_subject_id', position='$esc_position', visible='$esc_visible'
    WHERE id='$esc_id'
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

function delete_page_by_id($id) {
  global $db;
  $esc_id = db_escape($db, $id);
  $sql = "
    DELETE FROM pages
    WHERE id = '$esc_id'
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

/**
 * *********
 * SUBJECT QUERY FUNCTIONS
 * *********
 */

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
  $esc_id = db_escape($db, $id);
  $sql = "SELECT * FROM subjects
    WHERE id = '$esc_id'
  ";
  $result_set = $db->query($sql);
  confirm_result_set($result_set);
  return $result_set;
}

function validate_subject($subject) {

  $errors = [];
  
  // MENU_NAME
  if(is_blank($subject['menu_name'])) {
    $errors[] = "Name cannot be blank.";
  }
  if(!has_length($subject['menu_name'], ['min' => 2, 'max' => 255])) {
    $errors[] = "Name must be between 2 and 255 characters.";
  }

  // POSITION
  // Make sure we are working with an integer
  $postion_int = (int) $subject['position'];
  if($postion_int <= 0) {
    $errors[] = "Position must be greater than zero.";
  }
  if($postion_int > 999) {
    $errors[] = "Position must be less than 999.";
  }

  // VISIBLE
  // Make sure we are working with a string
  $visible_str = (string) $subject['visible'];
  if(!has_inclusion_of($visible_str, ["0","1"])) {
    $errors[] = "Visible must be true or false.";
  }

  return $errors;
}

function insert_subject($subject) {
  global $db;

  // check for valid format and return errors if any
  $errors = validate_subject($subject);
  if (!empty($errors)) return $errors;

  $esc_menu_name = db_escape($db, $subject['menu_name']);
  $esc_position = db_escape($db, $subject['position']);
  $esc_visible = db_escape($db, $subject['visible']);
  $sql = "
    INSERT INTO subjects (menu_name, position, visible)
    VALUES ('$esc_menu_name', '$esc_position', '$esc_visible')
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

  // check for valid format and return errors if any
  $errors = validate_subject($subject);
  if (!empty($errors)) return $errors;

  $esc_menu_name = db_escape($db, $subject['menu_name']);
  $esc_position = db_escape($db, $subject['position']);
  $esc_visible = db_escape($db, $subject['visible']);
  $esc_id = db_escape($db, $subject['id']);
  $sql = "
    UPDATE subjects
    SET menu_name = '$esc_menu_name', position = '$esc_position', visible = '$esc_visible'
    WHERE id = '$esc_id'
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
  $esc_id = db_escape($db, $id);
  $sql = "
    DELETE FROM subjects
    WHERE id = '$esc_id'
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