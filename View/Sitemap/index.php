<?php $this->title = "Plan du site"; ?>

<div id="sitemap" class="container">
    <div class="row">
        <div class="col">
            <h1>Plan du site</h1>
            <ul>
                <li><a href="<?= Configuration::get('webroot') ?>home">Accueil</a></li>
                <li><a href="<?= Configuration::get('webroot') ?>Admin">Connexion</a></li>
                <li><a href="<?= Configuration::get('webroot') ?>legals">Mentions Légales</a></li>
            </ul>
        </div>
    </div>
</div>            