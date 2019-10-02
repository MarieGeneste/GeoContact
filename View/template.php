<!DOCTYPE html>
<html lang="fr">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $title ?></title>
    <link rel="stylesheet" href="<?= Configuration::get("webroot") ?>/public/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Karla&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= Configuration::get("webroot") ?>/public/css/app.css">
    <base href="<?= Configuration::get("webroot") ?>">
  </head>

  <body>
      <!-- Include of header -->
      <?php require_once('Partials/header.php') ?>

      <!-- Injection of content -->
      <div id="content">
        <?= $content ?>
      </div>

      <!-- Include of footer -->
      <?php require_once('Partials/footer.php') ?>

    <!-- Include of footer -->
    <?php require_once('Partials/cookies.php') ?>

    <!-- Script files links -->
    <script src="<?= Configuration::get("webroot") ?>/public/js/jquery.min.js"></script>
    <script src="<?= Configuration::get("webroot") ?>/public/js/popper.min.js"></script>
    <script src="<?= Configuration::get("webroot") ?>/public/js/bootstrap.min.js"></script>
    <script src="<?= Configuration::get("webroot") ?>/public/js/app.js"></script>
    <script src="<?= Configuration::get("webroot") ?>/public/js/departmentEdition.js"></script>
  </body>

</html>