<nav class="navbar bg-dark navbar-dark py-3 navbar-expand-lg">
    <div class="container">
        <a href="dash-admin.php" class="navbar-brand"><?php echo $app_name ?></a>

        <?php if (!empty($_SESSION)) : ?>
            <button class="navbar-toggler" type="button" data-bs-toggle='collapse' data-bs-target='#nav-collapse'>
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="nav-collapse">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a href="manage-teachers.php" class="nav-link">Manage Teachers</a>
                    </li>
                    <li class="nav-item">
                        <a href="manage-appointment.php" class="nav-link">Appointment list</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">Post an announcement</a>
                    </li>
                    <li class="nav-item">
                        <a href="logout.php" class="nav-link">Logout</a>
                    </li>
                </ul>
            </div>
        <?php else : ?>
            <div class="collapse navbar-collapse" id="nav-collapse">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a href="login.php" class="nav-link">Login</a>
                    </li>
                    <li class="nav-item">
                        <a href="register.php" class="nav-link">Register</a>
                    </li>
                    
                </ul>
            </div>

        <?php endif ?>
    </div>
</nav>