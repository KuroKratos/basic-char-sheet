<!-- LOADING RPG DICE ROLLER JS BY GreenImp : https://github.com/GreenImp/rpg-dice-roller -->
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


    <!-- BUTTONS -->
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
    </div><!-- BUTTONS -->

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

    </div><!-- PANEL BODY -->

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

  </div><!-- PANEL -->
</div><!-- ROLLER -->

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

      // If desired roll is legal for the script
      if(latestRoll.toString().split(':')[1] != " No dice rolled") {
        // Displaying roll details etc. in the table as a new row
        $('#resultat').append("<tr><td>" + timetext + "</td><td>" + resultRoll + "</td><td>" + resultDetail + "</td><td>" + resultValue + "</td></tr>");
        // Scrolling down the table div to keep focus on latest roll
        scrollDownResult();
      }
    }
  });

  //==================================================================
  // Scrolling down the table div to keep focus on latest roll
  //==================================================================
  function scrollDownResult() {
    $('#result_div').scrollTop($('#result_div')[0].scrollHeight);
  }

  //==================================================================
  // WHEN CLICKING ON CUSTOM ROLL BUTTON
  //==================================================================

  $('#btn_custom_roll').click(function () {
    // create a new instance of the DiceRoller
    var diceRoller  = new DiceRoller();

    // Storing number of rolls to do
    var roll_nb = $('#roll_nb').val();

    // Repeats roll as many times as specified
    for(i=0; i<roll_nb; i++) {
      //Calling roll function with custom input value converted to lower case (because of splitting 'D' in roll)

      diceRoller.roll($('#txt_custom_roll').val().toLowerCase());
      //Get the latest dice rolls from the log
      var latestRoll  = diceRoller.getLog().shift();

      // DEBUG
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

      // If desired roll is legal for the script
      if(latestRoll.toString().split(':')[1] != " No dice rolled") {
        // Displaying roll details etc. in the table as a new row
        $('#resultat').append("<tr><td>" + timetext + "</td><td>" + resultRoll + "</td><td>" + resultDetail + "</td><td>" + resultValue + "</td></tr>");
        // Scrolling down the table div to keep focus on latest roll
        scrollDownResult();
      }
    }
  });

</script>