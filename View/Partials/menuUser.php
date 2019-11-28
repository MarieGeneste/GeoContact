<nav class="user-navigation">
  <div class="container">
    <div class="row py-3">
    <?php if(isset($_SESSION["userGeoContact"])) { ?>
      <div class="col-8">
        <button class="btn btn-info add-contact-btn">Nouveau contact</button>
      </div>
      <div class="col-4">
        <a href="<?= Configuration::get('webroot') ?>User/userDisconnect" class="btn btn-danger">Déconnexion</a>
      </div>
    <?php } else { ?>
      <div class="col-8">
        <a href="<?= Configuration::get('webroot') ?>User" class="btn btn-info">Connexion</a>
      </div>
      <div class="col-4">
        <a href="<?= Configuration::get('webroot') ?>User/new" class="btn btn-success">Inscription</a>
      </div>
    <?php } ?>
    </div>
  </div>
</nav>