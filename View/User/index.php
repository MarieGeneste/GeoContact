<?php $this->title = "Connexion utilisateur"; ?>

<?php if (!empty($_SESSION['flashMessage'])) { 
        if ($_SESSION['flashMessage']["status"] == "success") {
            echo '<div class="alert alert-success alert-dismissible fade show text-center m-4" role="alert">';
        } else {
            echo '<div class="alert alert-danger alert-dismissible fade show text-center m-4" role="alert">';
        }
        
        echo $_SESSION['flashMessage']["message"];
        unset($_SESSION['flashMessage']); ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php } ?>

<div id="userlog" class="container">
    <div class="row">
        <div class="col">
            <form action="<?= Configuration::get('webroot') ?>User/userConnect" method="post">
                <div class="row justify-content-center">
                    <h2 class="col-12 py-4 text-center">Connexion</h2>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input class="form-control" type="email" name="email" required>
                </div>
                <div class="form-group">
                    <label>Mot de passe</label>
                    <input class="form-control" type="password" name="password" required>
                </div>
                <div class="userConnexionButtons">
                    <input class="btn btn-info p-0 m-0" type="submit" value="Connexion">
                    <a href="<?= Configuration::get('webroot') ?>User/new" class="btn btn-success">Inscription</a>
                </div>
            </form>
        </div>
    </div>
</div>