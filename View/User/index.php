<?php $this->title = "Création utilisateur"; ?>


<div id="createuser" class="container">
    <div class="row">
        <div class="col">
            <form action="<?= Configuration::get('webroot') ?>User/userConnect" method="post">
                <div class="row justify-content-center">
                    <h2 class="col-s-12">Inscription</h2>
                </div>
                <div class="form-group">
                    <label>Nom</label>
                    <input class="form-control" type="text" name="lastname" />
                </div>
                <div class="form-group">
                    <label>Prénom</label>
                    <input class="form-control" type="text" name="firstname" />
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input class="form-control" type="email" name="email" />
                </div>
                <div class="form-group">
                    <label>Mot de passe</label>
                    <input class="form-control" type="password" name="password" />
                </div>
                <div class="form-group">
                    <label>Confirmer le mot de passe</label>
                    <input class="form-control" type="password" name="password" />
                </div>
                <div class="row justify-content-center">
                    <input class="btn btn-primary" type="submit" value="Valider" />
                </div>
            </form>
        </div>
    </div>    
</div>