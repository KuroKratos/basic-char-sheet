<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

define('DB_HOST', 'localhost');
define('DB_NAME', 'jd20r');
define('DB_USER', 'root');
define('DB_PASS', 'nossiob68');
define('DB_CHAR', 'utf8');

class DB
{
    protected static $instance = null;

    protected function __construct() {}
    protected function __clone() {}

    public static function instance()
    {
        if (self::$instance === null)
        {
            $opt  = array(
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES   => FALSE,
            );
            $dsn = 'mysql:host='.DB_HOST.';dbname='.DB_NAME.';charset='.DB_CHAR;
            self::$instance = new PDO($dsn, DB_USER, DB_PASS, $opt);
        }
        return self::$instance;
    }

    public static function __callStatic($method, $args)
    {
        return call_user_func_array(array(self::instance(), $method), $args);
    }

    public static function run($sql, $args = [])
    {
        $stmt = self::instance()->prepare($sql);
        $stmt->execute($args);
        return $stmt;
    }
}

class character {

  public static function get ($data) {

    $return = [];

    $sql = "SELECT
              char_name name,
              char_level level,
              char_current_exp exp,
              char_max_exp max_exp,
              char_current_hp hp,
              char_max_hp max_hp,
              char_current_mp mp,
              char_max_mp max_mp,
              char_gold gold,
              char_str_mod `for`,
              char_psy_mod psy,
              char_luk_mod luk,
              char_def_mod def,
              (CASE WHEN (char_sex = 0) THEN cl.class_name_m ELSE cl.class_name_f END) as class,
              (CASE WHEN (char_sex = 0) THEN r.race_name_m ELSE r.race_name_f END) as race
            FROM `character` ch
            INNER JOIN class cl ON ch.char_class = cl.class_id
            INNER JOIN race r ON ch.char_race = r.race_id
            WHERE char_name = '".$data['name']."'";

    $stmt = DB::run($sql);
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
    {
      foreach($row as $key => $val) {
        $return[$key] = $val;
      }
    }

    return $return;
  }

}

$data = character::get(['name' => 'Kratos']);

header('Content-Type: application/json');
echo json_encode($data);