<?php $this->title = "Connexion admin"; ?>


<div id="adminlog" class="container">
    <div class="row">
        <div class="col">
            <form action="<?= Configuration::get('webroot') ?>Admin/adminConnect" method="post">
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