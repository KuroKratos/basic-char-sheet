<!DOCTYPE html>
<html style="margin:0; padding:0;">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mc-JDR</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">

    <!-- Website Font style -->
	    <link rel="stylesheet" href="assets/font_awesome/css/font-awesome.min.css">

		<!-- Google Fonts -->
		<link href='https://fonts.googleapis.com/css?family=Passion+One' rel='stylesheet' type='text/css'>
		<link href='https://fonts.googleapis.com/css?family=Oxygen' rel='stylesheet' type='text/css'>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" type="text/javascript"></script>

  </head>

  <body style="height: 100%; margin:0; padding:0;">
    <div class="container" style="">
      <div class="row">
        <h2 class="text-center">Simple Dice Roller</h2>
        <div class="well col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">

          <div class="col-sm-4">
            <label>Nombre de dés</label>
            <input type="number" class="form-control" value="1" id="d_nb">
          </div>

          <div class="col-sm-4">
            <label>Modificateur</label>
            <input type="number" class="form-control" value="0" id="d_mod">
          </div>

          <div class="col-sm-4">
            <label>Répéter</label>
            <input type="number" class="form-control" value="1" id="roll_nb">
          </div>

          <div class="col-sm-12 btn-group btn-group-justified" style="margin:10px 0;">
            <a name="roll" id="3" class="btn btn-default">D3</a>
            <a name="roll" id="4" class="btn btn-default">D4</a>
            <a name="roll" id="6" class="btn btn-default">D6</a>
            <a name="roll" id="8" class="btn btn-default">D8</a>
            <a name="roll" id="10" class="btn btn-default">D10</a>
            <a name="roll" id="12" class="btn btn-default">D12</a>
            <a name="roll" id="20" class="btn btn-default">D20</a>
            <a name="roll" id="100" class="btn btn-default">D100</a>
          </div>

          <div class="col-sm-12" style="margin-bottom: 10px;">
            <label>Jet personalisé <small style="color:grey; font-size: 10px;">(ignore les options ci-dessus)</small></label>
            <div class = "input-group">
              <input id="txt_custom_roll" type = "text" class = "form-control">
              <span class = "input-group-btn">
                 <button id="btn_custom_roll" class = "btn btn-default" type = "button">
                    Roll
                 </button>
              </span>
            </div><!-- /input-group -->
          </div>

          <div class="col-xs-12">
            <label>Résultat</label>
            <textarea style="resize: none;" rows="15" class="form-control" id="resultat"></textarea>
          </div>

        </div>
      </div>
    </div>

    <script type="text/javascript">
      $('[name=roll]').click(function (a) {

        var i;
        var d_faces = parseInt(this.id);
        var d_nb = parseInt($('#d_nb').val());
        var d_mod = parseInt($('#d_mod').val());
        var roll_nb = parseInt($('#roll_nb').val());

        for(i=0; i<roll_nb; i++)
          roll(d_nb + "D" + d_faces + (d_mod >= 0 ? "+" : "") + d_mod);
      });

      $('#btn_custom_roll').click(function () {
        roll($('#txt_custom_roll').val().toUpperCase());
      });

      function roll(d_string) {

        var match = /^(\d+)?d(\d+)([+-]\d+)?$/.exec(d_string.toLowerCase());

        if (!match) {
          throw "Invalid dice notation: " + d_string;
        }

        var i, tmp1, tmp2, d_nb, d_faces, d_mod;

        console.log(d_string);

        tmp1 = d_string.split('D');

        console.log(tmp1);

        d_nb = tmp1[0];

        if(tmp1[1].split('+').length > 1) {
          tmp2 = tmp1[1].split('+');
          d_faces = tmp2[0];
          d_mod = tmp2[1];
        } else if(tmp1[1].split('-').length > 1){
          tmp2 = tmp1[1].split('-');
          d_faces = tmp2[0];
          d_mod = -tmp2[1];
        } else {
          d_faces = tmp1[1];
          d_mod = 0;
        }


        var result = 0;
        var tmp = 0;
        var tmp_str = "";

        for(i=0; i<d_nb; i++) {
          tmp = getRandomInt(1, d_faces);
          result += tmp;
          tmp_str += '' + tmp + ' + ';
        }

        if(d_mod != 0) {
          result += parseInt(d_mod);
          mod_str = (d_mod > 0 ? "plus " : "moins ") + Math.abs(d_mod) + " ";
          mod_str_cond = d_mod > 0 ? '+'+d_mod : d_mod ;
        } else {
          mod_str = "";
          mod_str_cond = "";
        }

        if(d_nb > 1) {
          result_str = tmp_str.substring(0, tmp_str.length - 2) + ' = ' + result;
        }

        if (d_mod != 0) {
          result_str = tmp_str.substring(0, tmp_str.length - 2) + (d_mod > 0 ? ('+ '+d_mod) : ('- ' + Math.abs(d_mod)) ) + ' = ' + result;
        }

        if(d_nb == 1 && d_mod == 0) {
          result_str = result;
        }

        $('#resultat').append(
                "Jet " + ((d_nb > 1) ? ("de " + d_nb + " dés") : ("d'un dé"))
                + " à " + d_faces + " faces "
                + mod_str
                + "(" + d_nb + "D" + d_faces + mod_str_cond + ") "
                + ":\n");

        $('#resultat').append(result_str + '\n');
      };

      function getRandomInt(min, max) {
          return Math.floor(Math.random() * (max - min + 1)) + min;
      }
    </script>

  </body>
</html>
