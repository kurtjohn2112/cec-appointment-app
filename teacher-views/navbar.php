<nav class="navbar bg-dark navbar-dark py-3 navbar-expand-lg">
    <div class="container">
        <a href="teacher-dashboard.php" class="navbar-brand"><?php echo $app_name ?></a>

      
            <button class="navbar-toggler" type="button" data-bs-toggle='collapse' data-bs-target='#nav-collapse'>
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="nav-collapse">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a href="manage-appointments.php" class="nav-link">Appointments</a>
                    </li>
                    <li class="nav-item">
                        <a href="check-messages.php" class="nav-link">Messages</a>
                    </li>
                    <li class="nav-item">
                    
                        <a href="logout.php" class="nav-link">Logout</a>
                    </li>
                </ul>
            </div>
    
    </div>
</nav>