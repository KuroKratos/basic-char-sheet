<?php
  $name = "Kratos";
  $race = "Elfe";
  $class = "Paladin";

  $max_hp = 9;
  $hp = 7;

  $max_mp = 5;
  $mp = 1;

  $max_exp = 2000;
  $exp = 1950;

  $level = 3;
  $gold = 215;
  $for = -3;
  $psy = 2;
  $luk = -2;
  $def = 1;
?>
<!DOCTYPE html>
<html style="margin:0; padding:0;">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>J - D20 - R</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <?php if(!empty($_GET['theme'])) { ?>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.7/<?= $_GET['theme'] ?>/bootstrap.min.css">
  <?php } ?>

    <style type="text/css">
      ::-webkit-scrollbar {
        width: 5px;
        height: 5px;
      }
      ::-webkit-scrollbar-button {
        width: 0px;
        height: 0px;
      }
      ::-webkit-scrollbar-thumb {
        background: darkgrey;
        border: 0px none #ffffff;
        border-radius: 4px;
      }
      ::-webkit-scrollbar-thumb:hover {
        background: gray;
      }
      ::-webkit-scrollbar-thumb:active {
        background: darkgray;
      }
      ::-webkit-scrollbar-track {
        background: none;
        border: 0px none #ffffff;
        border-radius: 4px;
      }
      ::-webkit-scrollbar-corner {
        background: transparent;
      }
    </style>

  </head>
  <body style="height: 100%; margin:0; padding:0;">

    <div class="page-header">
      <h1 style="text-align: center;">
        <img src="logo.jpg" alt="" style="height:70px; magin:0; padding:0;">
        [J-D20-R]<small class="hidden-xs"> Le JDR dans son plus simple appareil</small>
      </h1>
    </div>

    <div class="container">
      <div class="col-xs-12 col-sm-8">
        <div id="char_sheet" class="panel panel-default">

          <!-- CHARACTER DENOMINATION -->
          <div class="panel-heading">
            <span style="text-align: left; font-weight: bold;" id="name" class="panel-title pull-left col-xs-3"></span>
            <span style="text-align: center;" id="race_class" class="panel-title pull-left col-xs-6"></span>
            <span style="text-align: right;" class="panel-title pull-left col-xs-3">Nv. <span id="level"></span></span>
            <!-- <button id="btn-refresh" class="btn btn-sm btn-primary pull-right"><span class="glyphicon glyphicon-refresh"></span></button> -->
            <div style="clear: both"></div>
          </div>

          <div class="panel-body">

            <!-- HEALTH POINTS BAR -->
            <div class="col-xs-6 col-sm-4 pull-left">
              HP : <span id="caption-hp" class="hidden-sm hidden-md hidden-lg" style="color:darkred; font-weight: bold;"></span>
              <!-- HIDDEN ON MOBILE -->
              <div class="progress hidden-xs">
                <div class="progress-bar progress-bar-danger" id="bar-hp" role="progressbar"></div>
              </div>
            </div>

            <div class="visible-xs col-xs-6">
              PO : <span  id="badge-xs-gold" style="color: darkgoldenrod; font-weight: bold;"></span>
            </div>

            <!-- MAGIC POINTS BAR -->
            <div class="col-xs-6 col-sm-4 pull-left">
              MP : <span id="caption-mp" class="hidden-sm hidden-md hidden-lg" style="color:darkblue; font-weight: bold;"></span>
              <!-- HIDDEN ON MOBILE -->
              <div class="progress hidden-xs">
                <div class="progress-bar progress-bar-primary" id="bar-mp" role="progressbar"></div>
              </div>
            </div>

            <!-- EXPERIENCE POINTS BAR -->
            <div class="col-xs-6 col-sm-4 pull-left">
              XP : <span id="caption-xp" class="hidden-sm hidden-md hidden-lg" style="color:darkgreen; font-weight: bold;"></span>
              <!-- HIDDEN ON MOBILE -->
              <div class="progress hidden-xs">
                <div class="progress-bar progress-bar-success" id="bar-xp" role="progressbar"></div>
              </div>
            </div>

            <!-- Show only on small screens and bigger -->
            <div class="hidden-xs col-sm-4">
              <ul class="list-group">
                <li class="list-group-item">Mod. FOR<span id="badge-for" class="badge"></span></li>
                <li class="list-group-item">Mod. PSY<span id="badge-psy" class="badge"></span></li>
              </ul>
            </div>
            <div class="hidden-xs col-sm-4">
              <ul class="list-group">
                <li class="list-group-item">Mod. CHA<span id="badge-cha" class="badge"></span></li>
                <li class="list-group-item">Mod. DEF<span id="badge-def" class="badge"></span></li>
              </ul>
            </div>
            <div class="hidden-xs col-sm-4">
              <ul class="list-group">
                <li class="list-group-item">Pièces d'or<span id="badge-gold" class="badge"></span></li>
              </ul>
            </div>

            <!-- Show only on phone screens -->
            <div class="col-xs-12 hidden-sm hidden-md hidden-lg">
              <ul class="list-group col-xs-6">
                <li class="list-group-item">FOR<span id="badge-xs-for" class="badge"></span></li>
                <li class="list-group-item">PSY<span id="badge-xs-psy" class="badge"><?= $psy < 0 ? '' : $psy > 0 ? '+' : '' ?><?= $psy ?></span></li>
              </ul>
              <ul class="list-group col-xs-6">
                <li class="list-group-item">CHA<span id="badge-xs-cha" class="badge"><?= $luk < 0 ? '' : $luk > 0 ? '+' : '' ?><?= $luk ?></span></li>
                <li class="list-group-item">DEF<span id="badge-xs-def" class="badge"><?= $def < 0 ? '' : $def > 0 ? '+' : '' ?><?= $def ?></span></li>
              </ul>
            </div>

          </div><!-- PANEL BODY -->

        </div><!-- CHARACTER SHEET PANEL -->

        <!-- BUTTONS FOR NORMAL VIEW -->
        <div class="hidden-xs btn-group btn-group-justified" role="group" aria-label="...">
          <div class="btn-group" role="group">
            <button type="button" class="btn btn-default" onclick="roll('Force','1D20','for',true)">Roll FOR</button>
          </div>
          <div class="btn-group" role="group">
            <button type="button" class="btn btn-default" onclick="roll('Psychique','1D20','psy',true)">Roll PSY</button>
          </div>
          <div class="btn-group" role="group">
            <button type="button" class="btn btn-default" onclick="roll('Chance','1D20','cha',true)">Roll CHA</button>
          </div>
          <div class="btn-group" role="group">
            <button type="button" class="btn btn-default" onclick="roll('Défense','1D20','def',true)">Roll DEF</button>
          </div>
          <div class="btn-group" role="group">
            <button type="button" class="btn btn-default" onclick="roll('Rencontre','1D100')">Rencontre</button>
          </div>
        </div>

        <!-- BUTTONS FOR MOBILE VIEW -->
        <div class="visible-xs btn-group btn-group-justified" role="group" aria-label="...">
          <div class="btn-group" role="group">
            <button name="btn-for" type="button" class="btn btn-default">
              FOR
            </button>
          </div>
          <div class="btn-group" role="group">
            <button type="button" class="btn btn-default">
              PSY
            </button>
          </div>
          <div class="btn-group" role="group">
            <button type="button" class="btn btn-default">
              CHA
            </button>
          </div>
          <div class="btn-group" role="group">
            <button type="button" class="btn btn-default">
              DEF
            </button>
          </div>
          <div class="btn-group" role="group">
            <button type="button" class="btn btn-default">
              VS
            </button>
          </div>
        </div>

        <div id="comment" style="margin-top: 20px;">
          <textarea id="txt-comment" class="form-control" rows="5" placeholder="Écrivez votre texte ici..."></textarea>
          <button id="btn-send-comment" class="btn btn-primary pull-right col-xs-12" style="margin: 5px 0;">Envoyer</button>
        </div>

      </div> <!-- LEFT COLUMN -->

      <div id="histo" class="well col-xs-12 col-sm-4" style=" margin:0; height: 80vh; overflow: scroll; overflow-x: hidden;">
      </div><!-- RIGHT COLUMN -->

    </div><!-- CONTAINER -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" type="text/javascript"></script>

<script type="text/javascript">

/*#######################################################################################################################*/
$('#btn-send-comment').click(function () {
  $('#histo').append('<div class="well" style="background-color:white;">'+$('#txt-comment').val()+'</div><p style="text-align:right;">- <?= $name ?> -</p>');
});

/*#######################################################################################################################*/
function roll (label, dice, type = 0, disp_mod = false) {

  if (type !== 0) {
    mod = $('#badge-'+type).html();
  } else {
    mod = 0;
  }

  $.ajax({
    data: {
      roll: dice,
      mod: mod,
      type: label,
      char: $('#name').html(),
      disp_mod: disp_mod
    },
    type: "POST",
    url: 'roll.php',
    success: function(html){
      $('#histo').append(html);
    },
    error: function(e, d, l){
      console.log(e);
    }
  });
}

/*#######################################################################################################################*/
$(document).ready(function () {
  refreshChar();
});

/*#######################################################################################################################*/
$('#btn-refresh').click(function () {
  refreshChar();
});

/*#######################################################################################################################*/
function refreshChar() {
  $.ajax({
    data: {char:'<?= $_GET['char'] ?>'},
    type: "POST",
    url: 'char_info.php',
    success: function(data){

      $('#name').html(data.name);
      $('#race_class').html(data.race + ' ' + data.class);
      $('#level').html(data.level);

      updateBar('hp', data.hp, data.max_hp);
      updateBar('mp', data.mp, data.max_mp);
      updateBar('xp', data.exp, data.max_exp);

      updateMod('for',data.str);
      updateMod('psy',data.psy);
      updateMod('cha',data.luk);
      updateMod('def',data.def);

      updateMod('gold',data.gold);

    },
    error: function(e, d, l){
      console.log(e);
    }
  });
}

/*#######################################################################################################################*/
function updateBar(bar, current, max) {
  var new_percent = 100 * current / max;
  $('#bar-'+bar).css('width',new_percent+'%');
  $('#bar-'+bar).html(current + '/' + max);
  $('#caption-'+bar).html(current + '/' + max);
}
/*#######################################################################################################################*/
function updateMod(mod, value) {

  if(value <= 0 || mod === 'gold') {
    cap = value;
  } else if(value > 0) {
    cap = '+' + value;
  }

  $('#badge-'+mod).html(cap);
  $('#badge-xs-'+mod).html(cap);
}

/*#######################################################################################################################*/
</script>

  </body>
</html>
