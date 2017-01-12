<!-- DESCRIPTION DU PERSONNAGE -->
<div class="row">
  <div class="jumbotron" style="padding-top: 10px; padding-bottom: 10px; border-radius: 0;">

    <div class="hidden-xs hidden-sm col-md-2">
      <img class="img-thumbnail" src="" alt="" style="width: 142px;" ID="char_img">
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

      <div class="row col-sm-4 pull-right" style="margin-top: 20px;">

        <div class="col-xs-4 col-sm-4 pull-right">
          <input type="text" class="form-control text-center" placeholder="Sexe"  tabindex="6" id="val_sexe">
        </div>

        <div class="col-xs-4 col-sm-4 pull-right">
          <input type="text" class="form-control text-center" placeholder="Age"  tabindex="5" id="val_age">
        </div>

        <div class="col-xs-4 col-sm-4 pull-right">
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

<div class="col-xs-12 col-md-8">
<!-- STATS PRINCIPALES -->
<div class="col-xs-12 col-sm-6">
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

<!-- STATS DÉRIVÉES -->
<div class="col-xs-12 col-sm-6">
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
        <label style="width: 50%;"><small>Bonus aux dégats</small></label><input type="text" class="form-control" id="val_bd">
      </div>

      <div class="clearfix"></div>
    </div>
  </div>
</div>

<!-- COMPÉTENCES -->
<div class="col-xs-12">
  <div class="panel panel-default">
    <div class="panel-heading"><h3 class="panel-title">Table des compétences</h3></div>
    <table class="table table-fixed table-striped table-responsive table-condensed table-hover">

      <thead>
        <th class="col-xs-8">Compétence</th>
        <th class="col-xs-2 text-center">% base</th>
        <th class="col-xs-2 text-center">% actuel</th>
      </thead>

      <tbody id="comp-list" class="form-inline">

      </tbody>

    </table>
  </div>
</div>

</div>

<?php require_once('scripts/roller.php'); ?>

<div class="col-md-8 col-lg-6">
</div>

<script type="text/javascript">

  //================================================================================================
  // AU CHARGEMENT DE LA PAGE
  //================================================================================================
  $(document).ready(function () {

    // RÉCUPÉRATION DU FICHIER JSON DU PERSONNAGE
    $.ajax({
      url: 'char/falzar.json',
      dataType: 'json',
      success: function(c){
        var s = c.character.stats;

        // APPEL DE LA FONCTION DE REMPLISSAGE DE LA FEUILLE
        fillSheet(c);

        // APPEL DE LA FONCTION DE CALCUL DES STATS DÉRIVÉES
        genStats(s.for, s.dex, s.int, s.con, s.app, s.pou, s.tai);
      },
      error: function(e, d, l){
        console.log(e); // GESTION D'ERREUR EN CAS DE PROBLÈME DE CHARGEMENT
      }
    });

    // RÉCUPÉRATION DU FICHIER JSON DE LA LISTE DES COMPETENCES
    $.ajax({
      url: 'assets/competences.json',
      dataType: 'json',
      success: function(c){
        $.each(c, function (i, v) {
          $('#comp-list').append(
                   "<tr>"
                    +"<td class='col-xs-8'><input type='checkbox'> " + i + "</td>"
                    +"<td class='col-xs-2 text-center'>" + v.base + "%</td>"
                    +"<td class='col-xs-2 text-center'>"
                      +"<input type='text' class='form-control' style='width:20px; height:22px;'>%"
                    +"</td>"
                  +"</tr>");
          });
      },
      error: function(e, d, l){
        console.log(e); // GESTION D'ERREUR EN CAS DE PROBLÈME DE CHARGEMENT
      }
    });
    
  });

  //================================================================================================
  // RÉCUPÉRATION DE L'OBJET JSON DU PERSONNAGE ET SAISIE DANS LES CHAMPS DE LA FEUILLE
  //================================================================================================
  function fillSheet(p) {

    console.log(p.character); // DEBUG

    c = p.character;

    // SAISIE DES INFOS DE PERSONNAGES DANS LES INPUTS ASSOCIÉS
    $('#val_nom').val(c.name);
    $('#val_job').val(c.job);
    $('#val_race').val(c.race);
    $('#val_taille').val(c.height);
    $('#val_age').val(c.age);
    $('#val_sexe').val(c.sex);
    $('#val_desc').val(c.desc);

    // SAISIE DES STATS PRINCIPALES DANS LES INPUTS ASSOCIÉS
    var s = c.stats;
    $('#val_for').val(s.for);
    $('#val_tai').val(s.tai);
    $('#val_con').val(s.con);
    $('#val_app').val(s.app);
    $('#val_dex').val(s.dex);
    $('#val_int').val(s.int);
    $('#val_pou').val(s.pou);

    // AJOUT DU PORTRAIT DU PERSONNAGE
    $('#char_img').attr('src',c.photo);

  }

  //================================================================================================
  // GÉNÈRE LES STATS DÉRIVÉES DEPUIS LES STATS PRINCIPALES
  //================================================================================================
  function genStats(forc, dex, int, con, app, pou, tai) {

    var pv = Math.ceil((parseInt(tai) + parseInt(con)) /2); // PV = (CON + TAI) / 2
    var pm = pou; // PM = POU
    var idee = int*5; // Jet d'idée = INT x 5
    var chance = pou*5; // Jet de chance = POU x 5

    var bd_test = parseInt(tai) + parseInt(forc); // TAI + FOR pour tester le jet de bonus aux dégats
    var bonus_dommage = "";

    // Test du bonus aux dégats
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

    // SAISIE DES VALEURS DES STATS DÉRIVÉES DANS LES INPUTS ASSOCIÉS
    $('#val_pv').val(pv);
    $('#val_pm').val(pm);
    $('#val_idee').val(idee);
    $('#val_chance').val(chance);
    $('#val_bd').val(bonus_dommage);

  }

</script>