<?php require "views/partials/header.view.php" ?>
<?php if(isset($club)): ?>
    <form action="/admin/clubs/update" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $club->id ?>">
<?php else: ?>
    <form id="form" action="/admin/clubs" method="POST" enctype="multipart/form-data">
<?php endif; ?>
    <div class="form-group">
        <label for="club_name">Club name:</label>
        <input type="text" name="club_name" id="club_name" class="form-control" value="<?= isset($club->club_name) ? $club->club_name : '' ?>">
    </div>

    <div class="form-group">
        <label for="training_title">Adress:</label>
        <input type="text" name="adress" id="adress" class="form-control" value="<?= isset($club->adress) ? $club->adress : '' ?>">
    </div>
    <input type="hidden" name="trainers_id" value="<?=$_SESSION['auth']->id?>">

    <div class="form-group">
        <label for="club_description">Description</label>
        <textarea name="club_description" id="club_description" cols="30" rows="4" class="form-control"><?= isset($club->club_description) ? $club->club_description : '' ?></textarea>
    </div>
    <button class="btn btn-primary">Submit</button>
    <button type="reset" class="btn btn-danger">Reset</button>

</form>
<?php require "views/partials/footer.view.php" ?>
