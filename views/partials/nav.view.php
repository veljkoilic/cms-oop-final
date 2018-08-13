    <nav class="navbar navbar-expand-lg navbar-light bg-light mb-5 mt-3">
        <a class="navbar-brand" href="/">Training Manager</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="/clubs">All trainings <span class="sr-only">(current)</span></a>
                </li>
                <?php if (isset($_SESSION['auth'])): ?>
                <li class="nav-item">
                    <a class="nav-link" href="/admin/clubs">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a  style="position: absolute; right: 50px;" class="nav-link text-white btn btn-danger btn-sm ml-2" href="/admin/logout">Log out</a>
                </li>
                <?php endif; ?>
                <?php if (!isset($_SESSION['auth'])): ?>
                    <li class="nav-item">
                        <a style="position: absolute; right: 130px;" class="nav-link text-white btn btn-success ml-2" href="/admin/login">Log in</a>
                    </li>
                    <li class="nav-item">
                        <a style="position: absolute; right: 50px;" class="nav-link text-white btn btn-info ml-2" href="/admin/signup">Sign up</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </nav>
    <?php if (isset($_SESSION['auth'])): ?>
        <p class="lead bg-light bold mb-5" style="font-weight: bold; display: inline;">Hello, <?=ucfirst($_SESSION["auth"]->trainer_name);?> !</p>
    <?php endif; ?>
