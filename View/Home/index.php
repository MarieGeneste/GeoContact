<!-- Title -->
<?php $this->title = "GéoContact"; ?>

<?php include("View/Partials/menuUser.php") ?>

<div class="container-fluid row m-0 p-0 pt-4 pb-4">
    <div class="col col-12 d-flex flex-column p-0 pt-4 pb-4">
        <?php foreach($articles as $homeArticle) { ?>

            <div class="mt-4 mb-4 p-4 w-75 jumbotron staggered">
                <?php if ($homeArticle["title"] != null) {?>
                    <h3 class="bg-blue-light-geocontact text-white"><?= $homeArticle["title"]; ?></h3>
                <?php } ?>
                <p><?= $homeArticle["content"]; ?></p>
            </div>

        <?php } ?>
    </div>
</div>