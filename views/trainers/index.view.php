<?php require "views/partials/header.view.php" ?>
<p><a class="btn btn-success btn-lg mt-4 mb-4" href="clubs/create" role="button">Add Club</a></p>
<?php foreach ($clubs as $club) : ?>
    <div class="jumbotron">
        <h1><?= $club->club_name?></h1>
        <h5>Adress: <?= $club->adress?> </h5>
        <p><?= $club->club_description?></p>
        <a class="btn btn-primary btn-lg" href="clubs/club?id=<?=$club->id?>" role="button">View</a>
        <a class="btn btn-info btn-lg" href="clubs/edit?id=<?=$club->id?>" role="button">Edit</a>
        <form style="display: inline-block" action="clubs/destroy" method="post">
            <input name="id" type="hidden" value="<?=$club->id?>">
            <button class="btn btn-danger btn-lg" type="submit">Delete</button>
        </form>

    </div>
<?php endforeach;?>

<?php require "views/partials/footer.view.php" ?>
