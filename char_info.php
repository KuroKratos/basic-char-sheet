<?php

$data = [
    'name'    => "Kradash",

    'race'    => "Nain",
    'class'   => "Guerrier",

    'level'   => "3",

    'hp'      => "5",
    'max_hp'  => "9",

    'mp'      => "5",
    'max_mp'  => "5",

    'exp'     => "1950",
    'max_exp' => "2000",

    'for'     => "-3",
    'psy'     => "2",
    'luk'     => "-2",
    'def'     => "1",

    'gold'    => "250"
];

header('Content-Type: application/json');
echo json_encode($data);