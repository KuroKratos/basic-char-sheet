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

          <div class="col-xs-12">
            <label>Résultat</label>
            <textarea style="resize: none;" rows="15" class="form-control"></textarea>
          </div>

        </div>
      </div>
    </div>

    <script type="text/javascript">
      $('[name=roll]').click(function (a) {

        d_faces = this.id;
        d_nb = $('#d_nb').val();
        d_mod = $('#d_mod').val();
        roll_nb = $('#roll_nb').val();

        result = getRandomInt(1, d_faces);

        console.log(result);
        
      });

      function getRandomInt(min, max) {
          return Math.floor(Math.random() * (max - min + 1)) + min;
      }
    </script>

  </body>
</html>
