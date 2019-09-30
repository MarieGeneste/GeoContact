<?php $this->title = "Connexion admin"; ?>


<div class="row d-flex flex-wrap align-items-center justify-content-center">
    <div class="jumbotron col-s-10 d-flex flex-column align-items-center justify-content-center">
        <h2 class="col-s-12">Connexion</h2>
        <form class="col-s-12" action="<?= $webroot ?>Admin/adminDashbord" method="post">
        <label>Email</label>
        <input type="email" name="email" /><br />
        
        <label>Mot de passe</label>
        <input type="password" name="password" /><br /><br />
        
        <input type="submit" value="Connexion" />
        </form>
    </div>
</div>