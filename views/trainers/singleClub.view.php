<?php require "views/partials/header.view.php" ?>
<div class="jumbotron">
    <h1><?= $club->club_name?></h1>
    <h5>Adress: <?= $club->adress?> </h5>
    <p><?= $club->club_description?></p>
</div>
<p><a class="btn btn-success btn-lg mt-4 mb-4" href="trainings/create?id=<?=$club->id?>" role="button">Add Training</a></p>

<div class="card-group">
<?php foreach ($trainings as $training) : ?>
        <div class="card text-white bg-dark mb-3">
            <div class="card-body">
                <h5 class="card-title"><?=$training->training_title?></h5>
                <p class="card-text"><?=$training->training_description?></p>
                <p class="card-text">Sport: <?=$training->sport?></p>
            </div>
            <div class="card-footer">
                <a class="btn btn-info btn-md" href="training/edit?id=<?=$training->id?>" role="button">Edit Training</a>
                <form style="display: inline-block" action="training/destroy" method="post">
                    <input name="id" type="hidden" value="<?=$training->id?>">
                    <button class="btn btn-danger btn-md" type="submit">Delete</button>
                </form>
            </div>
        </div>
<?php endforeach;?>
</div>
<?php require "views/partials/footer.view.php" ?>

