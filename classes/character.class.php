<?php
class character {

  public static function add($name, $password, $sex, $race, $class) {
    $sql = "INSERT INTO character (char_name, char_password, char_sex, char_race, char_class)"
            . "VALUES ("
            . mysqli::escape_string($name) . ","
            . mysqli::escape_string(md5($password)) . ","
            . mysqli::escape_string($sex) . ","
            . mysqli::escape_string($race) . ","
            . mysqli::escape_string($class) . ")";
  }

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
              char_str_mod `str`,
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

  public static function getList($table = 'character') {
    $sql = "SELECT * FROM $table";
    $stmt = DB::run($sql);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

}
?>