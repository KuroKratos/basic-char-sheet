<?php
class Dice {

  public static function roll($diceString, $name = "", $mod = 0, $type = "", $disp_mod = false) {
    $availableDices = [4,6,8,10,12,20,100];
    $rolls = explode('D', strtoupper($diceString))[0];
    $dice = explode('D', strtoupper($diceString))[1];

    if(in_array($dice, $availableDices)) {
      $s_rolls = $rolls > 1 ? 's' : '' ;
      $s_faces = $dice > 1 ? 's' : '' ;
      $rollDetail = '';
      $total = 0;

      for( $i = 0 ; $i < $rolls ; $i++ ) {
        $roll = rand(1, $dice);
        $total += $roll;

        if($roll > $dice/2 && $disp_mod == 'true') {
          $rollDetail .= "<span style='color:green'>";
        }
        else if($roll < $dice/2 && $disp_mod == 'true') {
          $rollDetail .= "<span style='color:red'>";
        }
        else if ($disp_mod == 'true'){
          $rollDetail .= "<span style='color:blue'>";
        }
        else {
          $rollDetail .= "<span>";
        }
        $rollDetail .= "<b>$roll</b></span> + ";
      }

      if(isset($mod) && $disp_mod == 'true') {
        $tmp = trim(trim($rollDetail),'+');
        $tmp .= ($mod < 0 ? ' - ' : ' + ')."<b>".abs($mod)." </b>  ";
        $rollDetail = $tmp;
        $total += $mod;
      }

      if(empty($type)) {
        echo "Jet de $rolls dé$s_rolls à $dice face$s_faces : ";
        echo trim(trim($rollDetail), '+') ."= ".$total."<br>";
      } else {
        if($disp_mod == 'true') {
          if($total < $dice/2) {
            $class = "label-danger";
          } else if($total > $dice/2) {
            $class = "label-success";
          } else {
            $class = "label-primary";
          }
          echo "$type (<b>$name</b>) : ";
          echo trim(trim($rollDetail), '+') ."= <span class='label $class' style='border-radius: 1em;'>".$total."</span><br>";
        } else {
          echo "$type (<b>$name</b>) : ";
          echo "<b>".$total."</b><br>";
        }
      }

    } else {
      echo "Le type de dé n'est pas pris en compte (dés disponibles :";
      $dicelist = '';
      foreach($availableDices as $d) {
        $dicelist .= ' '.$d.',';
      }
      echo trim($dicelist, ',').")<br>";
    }
  }

  private function storeRoll($rolls, $dice, $detail, $total) {
    $sql = "INSERT INTO dice_log VALUES (NULL, '$rolls','$dice','$detail','$total')";
  }
}
?>
