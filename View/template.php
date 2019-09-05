<!DOCTYPE html>
<html lang="fr">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $title ?></title>
    <link rel="stylesheet" href="/GeoContact/public/css/app.css">
    <link rel="stylesheet" href="/GeoContact/public/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <base href="<?= $webroot ?>">
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

    <!-- Script files links -->
    <script src="/GeoContact/public/js/jquery.min.js"></script>
    <script src="/GeoContact/public/js/popper.min.js"></script>
    <script src="/GeoContact/public/js/bootstrap.min.js"></script>
    <script src="/GeoContact/public/js/app.js"></script>
  </body>

</html>