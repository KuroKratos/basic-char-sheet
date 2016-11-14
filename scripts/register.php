<?php require_once 'classes/character.class.php'; ?>

  <div class="panel panel-default" style="width:300px; margin:0 auto;">

    <div class="panel-heading">
      <h4 style="margin: 0; text-align: center;">Créez votre personnage</h4>
    </div>

    <div class="panel-body" style="padding: 0 30px">
      <form class="form-horizontal" method="post" action="#">

        <div class="form-group">
          <label for="name" class="cols-sm-2 control-label">Nom du personnage</label>
          <div class="cols-sm-10">
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
              <input type="text" class="form-control" name="character" id="character"  placeholder="Saisissez un nom"/>
            </div>
          </div>
        </div>

        <div class="form-group">
          <label for="password" class="cols-sm-2 control-label">Mot de passe</label>
          <div class="cols-sm-10">
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
              <input type="password" class="form-control" name="password" id="password"  placeholder="Saisissez un Mot de Passe"/>
            </div>
          </div>
        </div>

        <div class="form-group">
          <label for="password_v" class="cols-sm-2 control-label">Mot de passe (vérification)</label>
          <div class="cols-sm-10">
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
              <input type="password" class="form-control" name="password_v" id="password_v"  placeholder="Saisissez un Mot de Passe"/>
            </div>
          </div>
        </div>

        <div class="form-group">
          <label for="sex" class="cols-sm-2 control-label">Genre</label>
          <div class="cols-sm-10">
            <div class='input-group'>
              <span class="input-group-addon"><i class="fa fa-venus-mars fa-lg" aria-hidden="true"></i></span>
              <select class="form-control" name='sex' id='sex'>
                <option value="0">Homme</option>
                <option value="1">Femme</option>
              </select>
            </div>
          </div>
        </div>

        <div class="form-group">
          <label for="race" class="cols-sm-2 control-label">Race</label>
          <div class="cols-sm-10">
            <div class='input-group'>
              <span class="input-group-addon"><i class="fa fa-users fa-lg" aria-hidden="true"></i></span>
              <select class="form-control" name='race' id='race'>
                <?php
                $races = character::getList('race');
                foreach($races as $race) {
                  echo "<option value='".$race['race_id']."'>".$race['race_name_m']."</option>";
                }
              ?>
              </select>
            </div>
          </div>
        </div>

        <div class="form-group">
          <label for="class" class="cols-sm-2 control-label">Classe</label>
          <div class="cols-sm-10">
            <div class='input-group'>
              <span class="input-group-addon"><i class="fa fa-vcard fa-lg" aria-hidden="true"></i></span>
              <select class="form-control" name='class' id='class'>
              <?php
                $classes = character::getList('class');
                foreach($classes as $class) {
                  echo "<option value='".$class['class_id']."'>".$class['class_name_m']."</option>";
                }
              ?>
              </select>
            </div>
          </div>
        </div>

        <div class="form-group ">
          <button type="button" id="btn-save-char" class="btn btn-primary btn-block login-button">Enregistrer</button>
        </div>

      </form>
    </div>

  </div>

<script type="text/javascript">
//================================================================================================================
function verifyName() {
  $.ajax({
    data: {
      char:$('#character').val()
    },
    type: "POST",
    url: 'scripts/char_info.php',
    success: function(data){
      if(data.name != null) {
        alert('Un personnage avec ce nom existe déjà !');
        $('#character').val('');
        $('#character').focus();
      }
    },
    error: function(e, d, l){
      console.log(e);
    }
  });
}

//================================================================================================================
$('#btn-save-char').click(function () {
  verifyName();
});

//================================================================================================================
</script>