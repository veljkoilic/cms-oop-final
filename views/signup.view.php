<?php require "views/partials/header.view.php" ?>

    <form action="/admin/createuser" method="POST" >

    <div class="form-group">
        <label for="trainer_name">Name</label>
        <input type="text" required name="trainer_name" id="trainer_name" class="form-control" >
    </div>
        <div class="form-group">
            <label for="trainer_lastname">Lastname</label>
            <input type="text" required name="trainer_lastname" id="trainer_lastname" class="form-control" >
        </div>

    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" required name="email" id="email" class="form-control" >
    </div>

    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" required name="password" id="password" class="form-control" >
    </div>

    <button class="btn btn-primary">Submit</button>
</form>
<?php require "views/partials/footer.view.php" ?>
