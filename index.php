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
      <h1 style="text-align: center;"><img src="logo.jpg" alt="" style="height:70px; magin:0; padding:0;">[J-D20-R]<small class="hidden-xs"> Le JDR dans son plus simple appareil</small></h1>
    </div>

    <div class="container">
      <div class="col-xs-12 col-sm-8">
        <div id="char_sheet" class="panel panel-default">

          <!-- CHARACTER DENOMINATION -->
          <div class="panel-heading">
            <h3 id="denomination" class="panel-title pull-left"><?= $name ?> <small><?= $race ?> <?= $class ?> de niveau <?= $level ?></small></h3>
            <button id="btn-refresh" class="btn btn-sm btn-primary pull-right"><span class="glyphicon glyphicon-refresh"></span></button>
            <div style="clear: both"></div>
          </div>

          <div class="panel-body">

            <!-- HEALTH POINTS BAR -->
            <div class="col-xs-6 col-sm-4 pull-left">
              HP : <span class="hidden-sm hidden-md hidden-lg" style="color:darkred; font-weight: bold;"><?= $hp ?>/<?= $max_hp ?></span>

              <!-- HIDDEN ON MOBILE -->
              <div class="progress hidden-xs">
                <div class="progress-bar progress-bar-danger"
                     role="progressbar"
                     aria-valuenow="<?= floor($hp/$max_hp*100) ?>"
                     aria-valuemin="0"
                     aria-valuemax="100"
                     style="width: <?= round($hp/$max_hp*100) ?>%"
                >
                  <?= $hp ?>/<?= $max_hp ?>
                </div>
              </div>
            </div>

            <div class="visible-xs col-xs-6">
              PO : <span style="color: darkgoldenrod; font-weight: bold;"><?= $gold ?></span>
            </div>

            <!-- MAGIC POINTS BAR -->
            <div class="col-xs-6 col-sm-4 pull-left">
              MP : <span class="hidden-sm hidden-md hidden-lg" style="color:darkblue; font-weight: bold;"><?= $mp ?>/<?= $max_mp ?></span>

              <!-- HIDDEN ON MOBILE -->
              <div class="progress hidden-xs">
                <div class="progress-bar"
                     role="progressbar"
                     aria-valuenow="<?= floor($mp/$max_mp*100) ?>"
                     aria-valuemin="0"
                     aria-valuemax="100"
                     style="width: <?= round($mp/$max_mp*100) ?>%"
                >
                  <?= $mp ?>/<?= $max_mp ?>
                </div>
              </div>
            </div>

            <!-- EXPERIENCE POINTS BAR -->
            <div class="col-xs-6 col-sm-4 pull-left">
              XP : <span class="hidden-sm hidden-md hidden-lg" style="color:darkgreen; font-weight: bold;"><?= $exp ?>/<?= $max_exp ?></span>

              <!-- HIDDEN ON MOBILE -->
              <div class="progress hidden-xs">
                <div class="progress-bar progress-bar-success"
                     role="progressbar"
                     aria-valuenow="<?= floor($exp/$max_exp*100) ?>"
                     aria-valuemin="0"
                     aria-valuemax="100"
                     style="width: <?= round($exp/$max_exp*100) ?>%"
                >
                  <?= $exp ?>/<?= $max_exp ?>
                </div>
              </div>
            </div>

            <!-- Show only on small screens and bigger -->
            <div class="hidden-xs col-sm-4">
              <ul class="list-group">
                <li class="list-group-item">Mod. FOR<span class="badge"><?= $for < 0 ? '' : $for > 0 ? '+' : '' ?><?= $for ?></span></li>
                <li class="list-group-item">Mod. PSY<span class="badge"><?= $psy < 0 ? '' : $psy > 0 ? '+' : '' ?><?= $psy ?></span></li>
              </ul>
            </div>
            <div class="hidden-xs col-sm-4">
              <ul class="list-group">
                <li class="list-group-item">Mod. CHA<span class="badge"><?= $luk < 0 ? '' : $luk > 0 ? '+' : '' ?><?= $luk ?></span></li>
                <li class="list-group-item">Mod. DEF<span class="badge"><?= $def < 0 ? '' : $def > 0 ? '+' : '' ?><?= $def ?></span></li>
              </ul>
            </div>
            <div class="hidden-xs col-sm-4">
              <ul class="list-group">
                <li class="list-group-item">Pièces d'or<span class="badge"><?= $gold ?></span></li>
              </ul>
            </div>

            <!-- Show only on phone screens -->
            <div class="col-xs-12 hidden-sm hidden-md hidden-lg">
              <ul class="list-group col-xs-6">
                <li class="list-group-item">FOR<span class="badge"><?= $for < 0 ? '' : $for > 0 ? '+' : '' ?><?= $for ?></span></li>
                <li class="list-group-item">PSY<span class="badge"><?= $psy < 0 ? '' : $psy > 0 ? '+' : '' ?><?= $psy ?></span></li>
              </ul>
              <ul class="list-group col-xs-6">
                <li class="list-group-item">CHA<span class="badge"><?= $luk < 0 ? '' : $luk > 0 ? '+' : '' ?><?= $luk ?></span></li>
                <li class="list-group-item">DEF<span class="badge"><?= $def < 0 ? '' : $def > 0 ? '+' : '' ?><?= $def ?></span></li>
              </ul>
            </div>

          </div><!-- PANEL BODY -->

        </div><!-- CHARACTER SHEET PANEL -->

        <!-- BUTTONS FOR NORMAL VIEW -->
        <div class="hidden-xs btn-group btn-group-justified" role="group" aria-label="...">
          <div class="btn-group" role="group">
            <button name="btn-for" type="button" class="btn btn-default">Roll FOR</button>
          </div>
          <div class="btn-group" role="group">
            <button type="button" class="btn btn-default">Roll PSY</button>
          </div>
          <div class="btn-group" role="group">
            <button type="button" class="btn btn-default">Roll CHA</button>
          </div>
          <div class="btn-group" role="group">
            <button type="button" class="btn btn-default">Roll DEF</button>
          </div>
          <div class="btn-group" role="group">
            <button type="button" class="btn btn-default">Rencontre</button>
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

      $('#btn-send-comment').click(function () {
        $('#histo').append('<div class="well" style="background-color:white;">'+$('#txt-comment').val()+'</div><p style="text-align:right;">- <?= $name ?> -</p>');
      });

      $('[name="btn-for"]').click(function () {
        $.ajax({
          data: {
            roll: '1D20',
            mod: '<?= $for ?>',
            type: 'Force',
            char: '<?= $name ?>'
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
      });

      $('#btn-refresh').click(function(){
        $.ajax({
          data: {
          },
          type: "POST",
          url: 'char_info.php',
          success: function(data){
            $('#denomination').html(data.name + ' <small>' + data.race + ' ' + data.class + '</small>');
          },
          error: function(e, d, l){
            console.log(e);
          }
        });
      });

    </script>

  </body>
</html>
