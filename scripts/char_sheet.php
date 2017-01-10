<div class="row">
  <div class="jumbotron" style="padding-top: 10px; padding-bottom: 10px; border-radius: 0;">

    <div class="hidden-xs hidden-sm col-md-2">
      <img class="img-thumbnail" src="assets/images/orc.jpg" alt="" style="width: 142px;">
    </div>

    <div class="form-horizontal col-sm-12 col-md-10">

      <div class="row">

        <div class="col-sm-4 col-md-4">
          <input type="text" class="form-control" placeholder="Nom" tabindex="1"  id="val_nom">
        </div>

        <div class="col-sm-4 col-md-4">
          <input type="text" class="form-control" placeholder="Profession" tabindex="2"  id="val_job">
        </div>

        <div class="col-sm-4 col-md-4">
          <input type="text" class="form-control" placeholder="Race" tabindex="3" id="val_race">
        </div>

      </div>

      <div class="row" style="margin-top: 20px;">

        <div class="col-xs-4 col-sm-2 col-md-1 pull-right">
          <input type="text" class="form-control text-center" placeholder="Sexe"  tabindex="6" id="val_sexe">
        </div>

        <div class="col-xs-4 col-sm-2 col-md-1 pull-right">
          <input type="text" class="form-control text-center" placeholder="Age"  tabindex="5" id="val_age">
        </div>

        <div class="col-xs-4 col-sm-2 col-md-1 pull-right">
          <input type="text" class="form-control text-center" placeholder="Taille"  tabindex="4" id="val_taille">
        </div>

    </div>

    <div class="row" style="margin-top: 20px;">
      <div class="col-md-12">
        <input type="text" class="form-control" placeholder="Description"  tabindex="7" id="val_desc">
      </div>
    </div>

    </div>
    <div class="clearfix"></div>
  </div>
</div>

<div class="row">

  <div class="col-sm-5 col-md-4 col-lg-3">
    <div class="panel panel-default">
      <div class="panel-heading"><h3 class="panel-title">Statistiques principales</h3></div>
      <div class="panel-body form-inline" id="main-stats">

        <div class="col-xs-4">
          <label><small>FOR</small></label> <input type="text" class="form-control" style="width: 50%" id="val_for">
        </div>
        <div class="col-xs-4">
          <label><small>DEX</small></label> <input type="text" class="form-control" style="width: 50%" id="val_dex">
        </div>
        <div class="col-xs-4">
          <label><small>INT</small></label> <input type="text" class="form-control" style="width: 50%" id="val_int">
        </div>

        <div class="col-xs-4">
          <label><small>CON</small></label> <input type="text" class="form-control" style="width: 50%" id="val_con">
        </div>
        <div class="col-xs-4">
          <label><small>APP</small></label> <input type="text" class="form-control" style="width: 50%" id="val_app">
        </div>
        <div class="col-xs-4">
          <label><small>POU</small></label> <input type="text" class="form-control" style="width: 50%" id="val_pou">
        </div>

        <div class="col-xs-4">
          <label><small>TAI</small></label> <input type="text" class="form-control" style="width: 50%" id="val_tai">
        </div>

        <div class="clearfix"></div>
      </div>
    </div>
  </div>

  <div class="col-sm-5 col-md-4 col-lg-3">
    <div class="panel panel-default">
      <div class="panel-heading"><h3 class="panel-title">Statistiques dérivées</h3></div>
      <div class="panel-body form-inline" id="main-stats">

        <div class="col-xs-6">
          <label><small>PV</small></label> <input type="text" class="form-control" style="width: 50%" id="val_pv">
        </div>
        <div class="col-xs-6">
          <label><small>PM</small></label> <input type="text" class="form-control" style="width: 50%" id="val_pm">
        </div>

        <div class="col-xs-6">
          <label><small>Idée</small></label> <input type="text" class="form-control" style="width: 50%" id="val_idee">
        </div>
        <div class="col-xs-6">
          <label><small>Chance</small></label> <input type="text" class="form-control" style="width: 50%" id="val_chance">
        </div>

        <div class="col-xs-12">
          <label><small>Bonus aux dégats</small></label> <input type="text" class="form-control" style="width: 50%" id="val_bd">
        </div>

        <div class="clearfix"></div>
      </div>
    </div>
  </div>

</div>

<script type="text/javascript">
  
  $(document).ready(function () {
    
    $.ajax({
      url: 'char/falzar.json',
      dataType: 'json',
      success: function(c){
        var s = c.character.stats;
        fillSheet(c);
        genStats(s.for, s.dex, s.int, s.con, s.app, s.pou, s.tai);
      },
      error: function(e, d, l){
        console.log(e);
      }
    });
    
  });

  function fillSheet(p) {
    console.log(p.character);

    c = p.character;

    $('#val_nom').val(c.name);
    $('#val_job').val(c.job);
    $('#val_race').val(c.race);
    $('#val_taille').val(c.height);
    $('#val_age').val(c.age);
    $('#val_sexe').val(c.sex);
    $('#val_desc').val(c.desc);

    var s = c.stats;
    $('#val_for').val(s.for);
    $('#val_tai').val(s.tai);
    $('#val_con').val(s.con);
    $('#val_app').val(s.app);
    $('#val_dex').val(s.dex);
    $('#val_int').val(s.int);
    $('#val_pou').val(s.pou);

  }

  function genStats(forc, dex, int, con, app, pou, tai) {

    var pv = Math.ceil((parseInt(tai) + parseInt(con)) /2);
    var pm = pou;
    var idee = int*5;
    var chance = pou*5;

    var bd_test = parseInt(tai) + parseInt(forc);
    var bonus_dommage = "";

    if (bd_test >= 25 && bd_test <= 32) {
      bonus_dommage = "+1d4";
    }
    else if (bd_test >= 33 && bd_test <= 40) {
      bonus_dommage = "+1d6";
    }
    else if (bd_test >= 41 && bd_test <= 56) {
      bonus_dommage = "+2d6";
    }
    else {
      bonus_dommage = "AUCUN";
    }

    $('#val_pv').val(pv);
    $('#val_pm').val(pm);
    $('#val_idee').val(idee);
    $('#val_chance').val(chance);
    $('#val_bd').val(bonus_dommage);

  }

</script>