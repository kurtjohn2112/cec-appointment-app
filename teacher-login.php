<?php
include 'html/head.html';
include 'functions/admin-logic.php';
// include 'navbar.php';

include 'navbar.php';

if(isset($_POST['login'])){
    $uname = $_POST['uname'];
    $pword = $_POST['pword'];

     login($uname,$pword);
}
?>

<main class="py-5">
    <div class="container">
        <div class="card w-50 mx-auto shadow-lg">
            <div class="card-header bg-secondary text-light">
                <p>Login</p>
            </div>
            <div class="card-body">
                <form action="" method="post">
                    <div class="mb-3">
                        <input type="text" name="uname" placeholder="Enter Username or Email" id="" class="form-control">
                    </div>
                    <div class="mb-3">
                        <input type="password" name="pword" id="" placeholder="Password" class="form-control">
                    </div>
                    <div class="mb-3">
                       <button type="submit" name="login" class="btn btn-secondary">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>

<?php include 'html/foot.html'; ?>