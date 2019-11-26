<?php $this->title = "Création utilisateur"; ?>


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

<div id="newUser" class="container">
    <div class="row">
        <div class="col">
            <form action="<?= Configuration::get('webroot') ?>User/userInsert" method="post">
                <div class="row justify-content-center">
                    <h2 class="col-s-12">Inscription</h2>
                </div>
                <div class="form-group">
                    <label for="lastname">Nom</label>
                    <input class="form-control" type="text" name="lastname" value="<?php if(isset($_SESSION['lastname'])) { echo $_SESSION['lastname']; }?>"/>
                </div>
                <div class="form-group">
                    <label for="firstname">Prénom</label>
                    <input class="form-control" type="text" name="firstname" value="<?php if(isset($_SESSION['firstname'])) { echo $_SESSION['firstname']; }?>"/>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input class="form-control" type="email" name="email" value="<?php if(isset($_SESSION['email'])) { echo $_SESSION['email']; }?>"/>
                </div>
                <div class="form-group">
                    <label for="password">Mot de passe</label>
                    <input class="form-control" type="password" name="password" />
                </div>
                <div class="form-group">
                    <label for="confirmpassword">Confirmer le mot de passe</label>
                    <input class="form-control" type="password" name="confirmpassword" />
                </div>
                <div class="row justify-content-center">
                    <input class="btn btn-primary" type="submit" value="Valider" />
                </div>
            </form>
        </div>
    </div>    
</div>