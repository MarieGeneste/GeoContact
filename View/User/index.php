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
                    <h2 class="col-s-12">Connexion</h2>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input class="form-control" type="email" name="email" />
                </div>
                <div class="form-group">
                    <label>Mot de passe</label>
                    <input class="form-control" type="password" name="password" />
                </div>
                <div class="row justify-content-center">
                    <input class="btn btn-primary" type="submit" value="Connexion" />
                </div>
            </form>
        </div>
    </div>    
</div>