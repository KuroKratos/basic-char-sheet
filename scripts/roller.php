<!DOCTYPE html>
<html style="margin:0; padding:0;">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Simple Roll</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.7/<?= $_GET['p'] ?? "" ?>/bootstrap.min.css">

    <!-- Website Font style -->
	    <link rel="stylesheet" href="assets/font_awesome/css/font-awesome.min.css">

		<!-- Google Fonts -->
		<link href='https://fonts.googleapis.com/css?family=Passion+One' rel='stylesheet' type='text/css'>
		<link href='https://fonts.googleapis.com/css?family=Oxygen' rel='stylesheet' type='text/css'>

    <!-- jQuery JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

    <!-- Bootstrap JS -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" type="text/javascript"></script>

  </head>

  <body style="height: 100%; margin:0; padding:0;">
    <div class="container" style="">
      <div class="row">
        <h2 class="text-center">Simple Roll</h2>
        <div class="well col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">

          <!-- NUMBER OF DICE -->
          <div class="col-sm-4">
            <label>Nombre de dés</label>
            <input type="number" class="form-control" value="1" id="d_nb">
          </div>

          <!-- DICE MOD -->
          <div class="col-sm-4">
            <label>Modificateur</label>
            <input type="number" class="form-control" value="0" id="d_mod">
          </div>

          <!-- NUMBER OF ROLLS -->
          <div class="col-sm-4">
            <label>Répéter</label>
            <input type="number" class="form-control" value="1" id="roll_nb">
          </div>

          <!-- SM+ BUTTONS -->
          <div class="col-sm-12 btn-group btn-group-justified hidden-xs" style="margin:10px 0;">
            <a name="roll" id="3" class="btn btn-default">D3</a>
            <a name="roll" id="4" class="btn btn-default">D4</a>
            <a name="roll" id="6" class="btn btn-default">D6</a>
            <a name="roll" id="8" class="btn btn-default">D8</a>
            <a name="roll" id="10" class="btn btn-default">D10</a>
            <a name="roll" id="12" class="btn btn-default">D12</a>
            <a name="roll" id="20" class="btn btn-default">D20</a>
            <a name="roll" id="100" class="btn btn-default">D100</a>
          </div><!-- SM+ BUTTONS -->

          <!-- XS BUTTONS -->
          <div class="col-sm-12 btn-group btn-group-justified visible-xs" style="margin:10px 0;">
            <a name="roll" id="3" class="btn btn-default col-xs-3">D3</a>
            <a name="roll" id="4" class="btn btn-default col-xs-3">D4</a>
            <a name="roll" id="6" class="btn btn-default col-xs-3">D6</a>
            <a name="roll" id="8" class="btn btn-default col-xs-3">D8</a>
          </div>
          <div class="col-sm-12 btn-group btn-group-justified visible-xs" style="margin:10px 0;">
            <a name="roll" id="10" class="btn btn-default col-xs-3">D10</a>
            <a name="roll" id="12" class="btn btn-default col-xs-3">D12</a>
            <a name="roll" id="20" class="btn btn-default col-xs-3">D20</a>
            <a name="roll" id="100" class="btn btn-default col-xs-3">D100</a>
          </div><!-- XS BUTTONS -->

          <!-- CUSTOM ROLL -->
          <div class="col-sm-12" style="margin-bottom: 10px;">
            <label>Jet personalisé <small style="color:grey; font-size: 10px;">(ignore les options ci-dessus)</small></label>
            <div class = "input-group">
              <input id="txt_custom_roll" type = "text" class = "form-control">
              <span class = "input-group-btn">
                 <button id="btn_custom_roll" class = "btn btn-default" type = "button">
                    Roll
                 </button>
              </span>
            </div>
          </div><!-- CUSTOM ROLL -->

          <!-- RESULT FRAME -->
          <div class="col-xs-12">
            <label>Résultat</label><span onclick="reset_log()" style="cursor: pointer" class="label label-danger pull-right"><span class="glyphicon glyphicon-remove"></span> Effacer</span>
            <textarea style="resize: none;" rows="15" class="form-control" id="resultat"></textarea>
          </div><!-- RESULT FRAME -->

          <div style="clear:both"></div>

        </div><!-- well -->
      </div><!-- row -->
    </div><!-- container -->

    <script type="text/javascript">

      //==================================================================
      // RESETTING RESULT TEXTAREA
      //==================================================================
      function reset_log() {
        $('#resultat').html('');
      }

      //==================================================================
      // WHEN CLICKING ON ANY DICE BUTTON
      //==================================================================

      $('[name=roll]').click(function (a) {

        var i; //Initializing i for the loop

        //Getting inputs and dice button values and parsing them as integers
        var d_faces = parseInt(this.id);
        var d_nb = parseInt($('#d_nb').val());
        var d_mod = parseInt($('#d_mod').val());
        var roll_nb = parseInt($('#roll_nb').val());

        //Displaying separator in textarea
        $('#resultat').append('--------------------------------------------------\n');

        //Repeating the roll as many times as specified in Repeat input
        for(i=0; i<roll_nb; i++)
          //Calling roll function with combinig inputs into dice format as argument
          roll(d_nb + "D" + d_faces + (d_mod >= 0 ? "+" : "") + d_mod);
      });

      //==================================================================
      // WHEN CLICKING ON CUSTOM ROLL BUTTON
      //==================================================================

      $('#btn_custom_roll').click(function () {
        //Calling roll function with custom input value converted to upper case (because of splitting 'D' in roll)
        roll($('#txt_custom_roll').val().toUpperCase());
      });

      //==================================================================
      // ROLL FUNCTION
      // d_string MUST BE A DICE FORMAT LIKE 2D6+1 or 1D100-8 etc.
      // DICE MOD CAN ONLY BE + ou - ATM
      //==================================================================

      function roll(d_string) {

        //Checking the validity of the dice format ( [INT]D[INT][+/-][INT]
        var match = /^(\d+)?d(\d+)([+-]\d+)?$/.exec(d_string.toLowerCase());

        if (!match) {
          //Throws an error if the dice format is not respected
          throw "Invalid dice notation: " + d_string;
        }

        //Initializing variables
        var i, tmp1, tmp2, d_nb, d_faces, d_mod;

        //Splitting the dice string to first get the number of dice
        tmp1 = d_string.split('D');

        //Number of dice
        d_nb = tmp1[0];


        if(tmp1[1].split('+').length > 1) { //If mod is +X
          tmp2 = tmp1[1].split('+'); //Splitting the second part to get faces and mod value
          d_faces = tmp2[0]; //Number of dices faces
          d_mod = tmp2[1]; //Dice mod value
        } else if(tmp1[1].split('-').length > 1){ //If mod is -X
          tmp2 = tmp1[1].split('-');//Splitting the second part to get faces and mod value
          d_faces = tmp2[0]; //Number of dices faces
          d_mod = -tmp2[1]; //Dice mod value
        } else { //If mod is not set
          d_faces = tmp1[1]; //Number of dices faces
          d_mod = 0; //Dice mod value
        }


        var result = 0; //Initializing result value
        var tmp = 0; //Will be used as our random var
        var tmp_str = ""; //Will contain the detail of the roll (ex: 2 + 5 + 1 = 8)

        //Repeat as many times as our dice number
        for(i=0; i<d_nb; i++) {
          tmp = getRandomInt(1, d_faces); //Random between 1 and number of faces
          result += tmp; //Adding to the final result
          tmp_str += '' + tmp + ' + '; // Adding detail to string
        }

        //If dice mod id different from 0
        if(d_mod != 0) {
          result += parseInt(d_mod); //Adding dice mod to result
          mod_str = (d_mod > 0 ? "plus " : "moins ") + Math.abs(d_mod) + " "; //Mod string to add in roll description
          mod_str_cond = d_mod > 0 ? '+'+d_mod : d_mod ; //Mod string to add in condensed roll description
        } else {
          mod_str = ""; //If no mod => no mod description
          mod_str_cond = "";
        }

        if(d_nb > 1) { //Building result string only if there's more than 1 dice
          result_str = tmp_str.substring(0, tmp_str.length - 2) + ' = ' + result;
        }

        if (d_mod != 0) { //Or if there is a mod
          result_str = tmp_str.substring(0, tmp_str.length - 2) + (d_mod > 0 ? ('+ '+d_mod) : ('- ' + Math.abs(d_mod)) ) + ' = ' + result;
        }

        if(d_nb == 1 && d_mod == 0) { //But not when neither (if no mod and 1 dice, it would look like 8 = 8, so no need)
          result_str = result;
        }

        //Displaying the roll description in the textarea (Roll of X dice of Y faces plus/minus Z (XDY±Z)
        $('#resultat').append(
                "Jet " + ((d_nb > 1) ? ("de " + d_nb + " dés") : ("d'un dé"))
                + " à " + d_faces + " faces "
                + mod_str
                + "(" + d_nb + "D" + d_faces + mod_str_cond + ") "
                + ":\n");

        //Displaying roll detail and result in the textarea (8 + 2 + 5 + 1 - 3 = 13)
        $('#resultat').append(result_str + '\n');

        //Setting result textarea in a variable
        var result_log = $('#resultat');

        //If there is something in the textarea
        if(result_log.length)
           //Scrolling to the bottom of the textarea to display latest rolls
           result_log.scrollTop(result_log[0].scrollHeight - result_log.height());
          };

      //==================================================================
      // GENERATES A RANDOM INTEGER BETWEEN min AND max
      //==================================================================
      function getRandomInt(min, max) {
          return Math.floor(Math.random() * (max - min + 1)) + min;
      }

    </script>

  </body>
</html>
