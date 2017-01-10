    <script src="assets/rpg_dice_roller/dice-roller.js" type="text/javascript"></script>

    <div class="col-md-4 pull-right roller" style="font-size: 11px;">
        <div class="panel panel-info">
          <div class="panel-heading"><h3 class="panel-title">Jets de dés</h3></div>
          <div id="form" class="panel-body">
          <!-- NUMBER OF DICE -->
          <div class="col-xs-6 col-sm-4">
            <label>Nombre de dés</label>
            <input type="number" class="form-control" value="1" id="d_nb">
          </div>

          <!-- DICE MOD -->
          <div class="col-xs-6 col-sm-4">
            <label>Modificateur</label>
            <input type="number" class="form-control" value="0" id="d_mod">
          </div>

          <!-- NUMBER OF ROLLS -->
          <div class="col-sm-4">
            <label>Répéter</label>
            <input type="number" class="form-control" value="1" id="roll_nb">
          </div>

          <!-- SM+ BUTTONS -->
          <!--
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
          <div class="col-sm-12 btn-group btn-group-justified" style="margin:10px 0;">
            <a name="roll" id="3" class="btn btn-default col-xs-3">D3</a>
            <a name="roll" id="4" class="btn btn-default col-xs-3">D4</a>
            <a name="roll" id="6" class="btn btn-default col-xs-3">D6</a>
            <a name="roll" id="8" class="btn btn-default col-xs-3">D8</a>
          </div>
          <div class="col-sm-12 btn-group btn-group-justified" style="margin:10px 0;">
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
          <div style="clear: both"></div>
          </div>
          <!-- RESULT FRAME -->
          <div class="col-xs-12">
            <label>Résultat</label><span onclick="reset_log()" style="cursor: pointer" class="label label-danger pull-right"><span class="glyphicon glyphicon-remove"></span> Effacer</span>
              
            <div id="result_div" style="height:200px; overflow-y: auto;">
              <table class="table table-striped table-hover table-bordered" style="margin-bottom:0;">
                <thead>
                  <tr>
                    <th style="width: 72px;">Heure</th>
                    <th>Jet</th>
                    <th>Détail</th>
                    <th style="width: 72px;">Résultat</th>
                  </tr>
                </thead>

                <tbody id="resultat">

                </tbody>
              </table>
            </div>
          </div><!-- RESULT FRAME -->

          <div style="clear:both"></div>

        </div><!-- well -->
      </div><!-- row -->

    <script type="text/javascript">
      //
      //==================================================================
      // ON DOCUMENT READY
      //==================================================================

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

        //Create a new instance of the DiceRoller
        var diceRoller  = new DiceRoller();

        // Initializing variables for further use
        var i, rollStr, resultArray, resultRoll, resultDetail, resultValue;

        //Getting inputs and dice button values and parsing them as integers
        var d_faces = parseInt(this.id);
        var d_nb = parseInt($('#d_nb').val());
        var d_mod = parseInt($('#d_mod').val());
        var roll_nb = parseInt($('#roll_nb').val());

        //Repeating the roll as many times as specified in Repeat input
        for(i=0; i<roll_nb; i++) {
          //Generates roll string with the inputs values
          rollStr = d_nb + "d" + d_faces + ((d_mod != 0) ? ((d_mod >= 0 ? "+" : "") + d_mod) : "");
          //Calling roll function with combinig inputs into dice format as argument
          diceRoller.roll(rollStr);
          //Get the latest dice rolls from the log
          var latestRoll  = diceRoller.getLog().shift();

          //Output the latest roll - it has a toString method for nice output
          resultArray = latestRoll.toString().split("=");
          resultRoll = resultArray[0].split(':')[0].replace(/ /g, "");
          resultDetail = resultArray[0].split(':')[1].replace(/ /g, "");
          resultValue = resultArray[1].replace(/ /g, "");

          //Generating HH:MM:SS to display in first cell
          d = new Date();
          // d is "Sun Oct 13 2013 20:32:01 GMT+0530 (India Standard Time)"
          datetext = d.toTimeString();
          // datestring is "20:32:01 GMT+0530 (India Standard Time)"
          // Split with ' ' and we get: ["20:32:01", "GMT+0530", "(India", "Standard", "Time)"]
          // Take the first value from array :)
          timetext = datetext.split(' ')[0];

          if($('#resultat tr td').attr('class') == "dataTables_empty") {
            reset_log();
          }

          if(latestRoll.toString().split(':')[1] != " No dice rolled") {
            $('#resultat').append("<tr><td>" + timetext + "</td><td>" + resultRoll + "</td><td>" + resultDetail + "</td><td>" + resultValue + "</td></tr>");
            scrollDownResult();
          }
        }
      });

      function scrollDownResult() {
        $('#result_div').scrollTop($('#result_div')[0].scrollHeight);
      }

      //==================================================================
      // WHEN CLICKING ON CUSTOM ROLL BUTTON
      //==================================================================

      $('#btn_custom_roll').click(function () {
        // create a new instance of the DiceRoller
        var diceRoller  = new DiceRoller();

        var roll_nb = $('#roll_nb').val();

        for(i=0; i<roll_nb; i++) {
          //Calling roll function with custom input value converted to lower case (because of splitting 'D' in roll)
          diceRoller.roll($('#txt_custom_roll').val().toLowerCase());
          //Get the latest dice rolls from the log
          var latestRoll  = diceRoller.getLog().shift();

          console.log(latestRoll.toString());

          //Output the latest roll - it has a toString method for nice output
          resultArray = latestRoll.toString().split("=");
          resultRoll = resultArray[0].split(':')[0].replace(/ /g, "");
          resultDetail = resultArray[0].split(':')[1].replace(/ /g, "");
          resultValue = resultArray[1].replace(/ /g, "");

          //Generating HH:MM:SS to display in first cell
          d = new Date();
          // d is "Sun Oct 13 2013 20:32:01 GMT+0530 (India Standard Time)"
          datetext = d.toTimeString();
          // datestring is "20:32:01 GMT+0530 (India Standard Time)"
          // Split with ' ' and we get: ["20:32:01", "GMT+0530", "(India", "Standard", "Time)"]
          // Take the first value from array :)
          timetext = datetext.split(' ')[0];

          if($('#resultat tr td').attr('class') == "dataTables_empty") {
            reset_log();
          }

          if(latestRoll.toString().split(':')[1] != " No dice rolled") {
            $('#resultat').append("<tr><td>" + timetext + "</td><td>" + resultRoll + "</td><td>" + resultDetail + "</td><td>" + resultValue + "</td></tr>");
          }
        }
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