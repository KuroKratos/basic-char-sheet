<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once('../classes/db.class.php');
require_once('../classes/character.class.php');

$data = character::get(['name' => $_POST['char']]);

header('Content-Type: application/json');
echo json_encode($data);