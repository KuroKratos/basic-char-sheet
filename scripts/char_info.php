<?php
  require_once('../classes/db.class.php');
  require_once('../classes/character.class.php');

  $data = character::get(['name' => $_POST['char']]);

  header('Content-Type: application/json');
  echo json_encode($data);
?>
