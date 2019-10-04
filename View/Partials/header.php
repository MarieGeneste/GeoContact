
<?php $pageTitle = "Accueil" ?>

<?php if($pageTitle == "Accueil"){ ?>
    <header id="accueil">
    <!-- Header page d'accueil -->
        <div class="h-100 bg-blue-light-geocontact d-flex align-items-center flex-column">
        <a href="<?= $webroot ?>home"><img src="<?= $webroot ?>/public/images/logoGeoContact2.png" width="400" alt="Logo GéoContact"></a>
        <!-- Masthead Heading -->
        <h1 class="text-uppercase d-none">GéoContact</h1>
        </div>
    </header>
<?php }

else if($pageTitle == "Espace Admin"){ ?>
    <header class="container-fluid">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">GéoContact</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
            <a class="nav-link" href="#">Départements</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="#">Localité</a>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
            <a class="nav-link" href="#">Déconnexion</a>
            </li>
        </ul>
        </div>
    </nav>
    </header>
<?php } ?>