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

    <style>
      .spinner input {
        text-align: center;
      }

      .input-group-btn-vertical {
        position: relative;
        white-space: nowrap;
        width: 2%;
        vertical-align: middle;
        display: table-cell;
      }

      .input-group-btn-vertical > .btn {
        display: block;
        float: none;
        width: 100%;
        max-width: 100%;
        padding: 8px;
        margin-left: -1px;
        position: relative;
        border-radius: 0;
      }

      .input-group-btn-vertical > .btn:first-child {
        border-top-right-radius: 4px;
      }

      .input-group-btn-vertical > .btn:last-child {
        margin-top: -2px;
        border-bottom-right-radius: 4px;
      }

      .input-group-btn-vertical i {
        position: absolute;
        top: 0;
        left: 4px;
      }
    </style>

  </head>

  <body style="height: 100%; margin:0; padding:0;">

    <div class="container">

      <div class="row" style="margin-top: 15px">

        <!-- CHARACTER SHEET -->
        <div class="col-xs-12 col-sm-6 col-md-4">
          <div class="panel panel-default">

            <div class="panel-heading">
              <h3 class="panel-title pull-left">Samurox</h3>
              <span class="badge badge-primary pull-right">Nv. 2</span>
              <div style="clear: both"></div>
            </div><!-- PANEL HEADING -->

            <div class="panel-body">

              <div class="row" style="margin-bottom:20px;">

                <div class="col-xs-4" style="">
                  <b>Physique</b><br>
                  <div class="input-group spinner">
                    <input type="text" class="form-control" value="50" min="10" max="90" readonly style="background-color: white;">
                    <div class="input-group-btn-vertical">
                      <button class="btn btn-default" type="button"><i class="fa fa-caret-up"></i></button>
                      <button class="btn btn-default" type="button"><i class="fa fa-caret-down"></i></button>
                    </div>
                  </div>
                </div>

                <div class="col-xs-4" style="">
                  <b>Mental</b><br>
                  <div class="input-group spinner">
                    <input type="text" class="form-control" value="50" min="10" max="90" readonly style="background-color: white;">
                    <div class="input-group-btn-vertical">
                      <button class="btn btn-default" type="button"><i class="fa fa-caret-up"></i></button>
                      <button class="btn btn-default" type="button"><i class="fa fa-caret-down"></i></button>
                    </div>
                  </div>
                </div>
                
                <div class="col-xs-4" style="">
                  <b>Social</b><br>
                  <div class="input-group spinner">
                    <input type="text" class="form-control" value="50" min="10" max="90" readonly style="background-color: white;">
                    <div class="input-group-btn-vertical">
                      <button class="btn btn-default" type="button"><i class="fa fa-caret-up"></i></button>
                      <button class="btn btn-default" type="button"><i class="fa fa-caret-down"></i></button>
                    </div>
                  </div>
                </div>

              </div>

              <!-- ROW HEALTH AND PSY POINTS -->
              <div class="row">

                <!-- HEALTH POINTS AND BAR -->
                <div class="col-xs-6" style="text-align: left;">
                  <b>Points de Vie</b>
                  <div class="progress" style="margin-bottom: 5px;">
                    <div class="progress-bar progress-bar-success" role="progressbar" style="width:70%">
                    </div>
                  </div>
                  <div class="text-center">
                  <button class="btn btn-xs pull-left"><span class="glyphicon glyphicon-minus"></span></button>
                  10/10
                  <button class="btn btn-xs pull-right"><span class="glyphicon glyphicon-plus"></span></button>
                  </div>
                </div><!-- /HEALTH POINTS AND BAR -->

                <!-- HEALTH POINTS AND BAR -->
                <div class="col-xs-6" style="text-align: left;">
                  <b>Points de Psy</b>
                  <div class="progress" style="margin-bottom: 5px;">
                    <div class="progress-bar progress-bar-primary" role="progressbar" style="width:70%">
                    </div>
                  </div>
                  <div class="text-center">
                  <button class="btn btn-xs pull-left"><span class="glyphicon glyphicon-minus"></span></button>
                  10/10
                  <button class="btn btn-xs pull-right"><span class="glyphicon glyphicon-plus"></span></button>
                  </div>
                </div><!-- /HEALTH POINTS AND BAR -->

              </div><!-- /ROW HEALTH AND PSY POINTS -->

            </div><!-- PANEL BODY -->

          </div><!-- PANEL -->

        </div><!-- /CHARACTER SHEET -->

        <!-- CHARACTER SHEET -->
        <div class="col-md-4">
          <div class="panel panel-default">

            <div class="panel-heading">
              <h3 class="panel-title pull-left">Samurox</h3>
              <span class="badge badge-primary pull-right">Nv. 2</span>
              <div style="clear: both"></div>
            </div><!-- PANEL HEADING -->

            <div class="panel-body">

              <div class="row" style="margin-bottom:20px;">

                <div class="col-xs-4" style="">
                  <b>Physique</b><br>
                  <div class="input-group spinner">
                    <input type="text" class="form-control" value="50" min="10" max="90" readonly style="background-color: white;">
                    <div class="input-group-btn-vertical">
                      <button class="btn btn-default" type="button"><i class="fa fa-caret-up"></i></button>
                      <button class="btn btn-default" type="button"><i class="fa fa-caret-down"></i></button>
                    </div>
                  </div>
                </div>

                <div class="col-xs-4" style="">
                  <b>Mental</b><br>
                  <div class="input-group spinner">
                    <input type="text" class="form-control" value="50" min="10" max="90" readonly style="background-color: white;">
                    <div class="input-group-btn-vertical">
                      <button class="btn btn-default" type="button"><i class="fa fa-caret-up"></i></button>
                      <button class="btn btn-default" type="button"><i class="fa fa-caret-down"></i></button>
                    </div>
                  </div>
                </div>

                <div class="col-xs-4" style="">
                  <b>Social</b><br>
                  <div class="input-group spinner">
                    <input type="text" class="form-control" value="50" min="10" max="90" readonly style="background-color: white;">
                    <div class="input-group-btn-vertical">
                      <button class="btn btn-default" type="button"><i class="fa fa-caret-up"></i></button>
                      <button class="btn btn-default" type="button"><i class="fa fa-caret-down"></i></button>
                    </div>
                  </div>
                </div>

              </div>

              <!-- ROW HEALTH AND PSY POINTS -->
              <div class="row">

                <!-- HEALTH POINTS AND BAR -->
                <div class="col-xs-6" style="text-align: left;">
                  <b>Points de Vie</b>
                  <div class="progress" style="margin-bottom: 5px;">
                    <div class="progress-bar progress-bar-success" role="progressbar" style="width:70%">
                    </div>
                  </div>
                  <div class="text-center">
                  <button class="btn btn-xs pull-left"><span class="glyphicon glyphicon-minus"></span></button>
                  10/10
                  <button class="btn btn-xs pull-right"><span class="glyphicon glyphicon-plus"></span></button>
                  </div>
                </div><!-- /HEALTH POINTS AND BAR -->

                <!-- HEALTH POINTS AND BAR -->
                <div class="col-xs-6" style="text-align: left;">
                  <b>Points de Psy</b>
                  <div class="progress" style="margin-bottom: 5px;">
                    <div class="progress-bar progress-bar-primary" role="progressbar" style="width:70%">
                    </div>
                  </div>
                  <div class="text-center">
                  <button class="btn btn-xs pull-left"><span class="glyphicon glyphicon-minus"></span></button>
                  10/10
                  <button class="btn btn-xs pull-right"><span class="glyphicon glyphicon-plus"></span></button>
                  </div>
                </div><!-- /HEALTH POINTS AND BAR -->

              </div><!-- /ROW HEALTH AND PSY POINTS -->

            </div><!-- PANEL BODY -->

          </div><!-- PANEL -->

        </div><!-- /CHARACTER SHEET -->

      </div><!-- ROW -->

    </div><!-- CONTAINER -->

    <script type="text/javascript">
    $(function(){

        $('.spinner .btn:first-of-type').on('click', function() {
          var btn = $(this);
          var input = btn.closest('.spinner').find('input');
          if (input.attr('max') == undefined || parseInt(input.val()) < parseInt(input.attr('max'))) {
            input.val(parseInt(input.val(), 10) + 5);
          } else {
            btn.next("disabled", true);
          }
        });
        $('.spinner .btn:last-of-type').on('click', function() {
          var btn = $(this);
          var input = btn.closest('.spinner').find('input');
          if (input.attr('min') == undefined || parseInt(input.val()) > parseInt(input.attr('min'))) {
            input.val(parseInt(input.val(), 10) - 5);
          } else {
            btn.prev("disabled", true);
          }
        });

    })
    </script>

  </body>
</html>
