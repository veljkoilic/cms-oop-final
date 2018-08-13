<?php require "partials/header.view.php" ?>
<div class="jumbotron">
    <h1><?= $club->club_name?></h1>
    <h5>Adress: <?= $club->adress?> </h5>
    <p><?= $club->club_description?></p>
</div>
<div class="card-group">
<?php foreach ($trainings as $training) : ?>
        <div class="card text-white bg-dark mb-3">
            <div class="card-body">
                <h5 class="card-title"><?=$training->training_title?></h5>
                <p class="card-text"><?=$training->training_description?></p>
                <p class="card-text">Sport: <?=$training->sport?></p>

            </div>
        </div>
<?php endforeach;?>
</div>
<?php require "partials/footer.view.php" ?>
