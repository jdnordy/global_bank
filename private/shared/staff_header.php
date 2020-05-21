<!doctype html>

<?php 
  if (!isset($page_title)) {
    $page_title = 'Staff';
  };
?>

<html lang="en">
  <head>
    <title><?="GBI - " . h($page_title) ?></title>
    <meta charset="utf-8">
    <link preload rel="stylesheet" media="all" href="<?=url_for("css/staff.css")?>" />
  </head>

  <body>
    <header>
      <h1>Globe Bank: Coming Soon</h1>
    </header>

    <navigation>
      <ul>
        <li><a href="<?= url_for("staff/") ?>">Menu</a></li>
      </ul>
    </navigation>