<?php require "views/partials/header.view.php" ?>
<?php if(isset($training)): ?>
    <form action="/admin/clubs/training/update" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $training->id ?>">
        <input type="hidden" name="clubs_id" value="<?= $training->clubs_id ?>">

<?php else: ?>
    <form id="form" action="/admin/clubs/trainings" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="clubs_id" value="<?=$_GET['id']?>">
<?php endif; ?>
    <div class="form-group">
        <label for="training_title">Training title:</label>
        <input type="text" name="training_title" id="training_title" class="form-control" value="<?= isset($training->training_title) ? $training->training_title : '' ?>">
    </div>

    <div class="form-group">
        <label for="training_title">Sport:</label>
        <input type="text" name="sport" id="sport" class="form-control" value="<?= isset($training->sport) ? $training->sport : '' ?>">
    </div>
    <div class="form-group">
        <label for="training_description">Description</label>
        <textarea name="training_description" id="training_description" cols="30" rows="4" class="form-control"><?= isset($training->training_description) ? $training->training_description : '' ?></textarea>
    </div>
    <button class="btn btn-primary">Submit</button>
    <button type="reset" class="btn btn-danger">Reset</button>

</form>
<?php require "views/partials/footer.view.php" ?>
