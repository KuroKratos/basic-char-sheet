<?php

if(!empty($_POST['roll'])) {
  include_once './dice.class.php';
  Dice::roll($_POST['roll'], $_POST['char'], $_POST['mod'], $_POST['type'], $_POST['disp_mod']);
}