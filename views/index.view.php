<?php require "partials/header.view.php" ?>
<?php foreach ($clubs as $club) : ?>
    <div class="jumbotron">
        <h1><?= $club->club_name?></h1>
        <h5>Adress: <?= $club->adress?> </h5>
        <p><?= $club->club_description?></p>
        <p><a class="btn btn-primary btn-lg" href="clubs/club?id=<?=$club->id?>" role="button">Learn more</a></p>
    </div>
<?php endforeach;?>

<?php require "partials/footer.view.php" ?>
