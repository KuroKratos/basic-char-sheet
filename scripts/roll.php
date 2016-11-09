<?php
if(!empty($_POST['roll'])) {
  require_once '../classes/dice.class.php';
  Dice::roll($_POST['roll'], $_POST['char'], $_POST['mod'], $_POST['type'], $_POST['disp_mod']);
}