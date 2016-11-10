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
            <select class="form-control">
              <option value=""><?= $name ?> (<?= $race." - ".$class ?>)</option>
              <option value="">Kendoras</option>
              <option value="">Cubibu</option>
              <option value="">Kradash</option>
            </select>
          </div>

          <div class="panel-body">

            <table class="table table-condensed">

              <thead>
                <th>Stat</th>
                <th>Actuel</th>
                <th>Max</th>
              </thead>

              <tr>
                <td>Niveau :</td>
                <td><input style="width:150px; display: inline-block;" type="number" class="form-control" value="<?= $level ?>"></td>
                <td></td>
              </tr>

              <tr>
                <td>HP :</td>
                <td><input style="width:150px; display: inline-block;" type="number" class="form-control" value="<?= $hp ?>"></td>
                <td><input style="width:150px; display: inline-block;" type="number" class="form-control" value="<?= $max_hp ?>"></td>
              </tr>

              <tr>
                <td>MP :</td>
                <td><input style="width:150px; display: inline-block;" type="number" class="form-control" value="<?= $mp ?>"></td>
                <td><input style="width:150px; display: inline-block;" type="number" class="form-control" value="<?= $max_mp ?>"></td>
              </tr>

              <tr>
                <td>XP :</td>
                <td><input style="width:150px; display: inline-block;" type="number" class="form-control" value="<?= $exp ?>"></td>
                <td><input style="width:150px; display: inline-block;" type="number" class="form-control" value="<?= $max_exp ?>"></td>
              </tr>

              <tr>
                <td>PO :</td>
                <td><input style="width:150px; display: inline-block;" type="number" class="form-control" value="<?= $gold ?>"></td>
                <td></td>
              </tr>

              <tr>
                <td>Mod FOR :</td>
                <td><input style="width:150px; display: inline-block;" type="number" class="form-control" value="<?= $for ?>"></td>
                <td></td>
              </tr>

              <tr>
                <td>Mod PSY :</td>
                <td><input style="width:150px; display: inline-block;" type="number" class="form-control" value="<?= $psy ?>"></td>
                <td></td>
              </tr>

              <tr>
                <td>Mod CHA :</td>
                <td><input style="width:150px; display: inline-block;" type="number" class="form-control" value="<?= $luk ?>"></td>
                <td></td>
              </tr>

              <tr>
                <td>Mod DEF :</td>
                <td><input style="width:150px; display: inline-block;" type="number" class="form-control" value="<?= $def ?>"></td>
                <td></td>
              </tr>
            </table>

          </div><!-- PANEL BODY -->

        </div><!-- CHARACTER SHEET PANEL -->

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

    </script>

  </body>
</html>
