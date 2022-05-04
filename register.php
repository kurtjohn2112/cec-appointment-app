<?php include 'html/head.html'; 
include 'functions/user-logic.php';
include 'navbar.php';

if(isset($_POST['register'])){
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $uname = $_POST['uname'];
    $pword = $_POST['pword'];

    $validate = register($fname,$lname,$uname,$pword);

    if($validate){
        
   
        
    }
}

?>



<main class="py-5">
    <div class="container">
        <div class="card w-50 mx-auto shadow">
            <div class="card-header bg-dark text-light p-3">
                <p>Register</p>
            </div>
            <div class="card-body">
                <form action="" method="post">
                    <div class="mb-3">
                        <input type="text" name="fname" placeholder="Firstname" id="" class="form-control form-control-lg" autofocus required>
                        <div class="form-text">Enter Your Firstname</div>
                    </div>
                    <div class="mb-3">
                        <input type="text" name="lname" placeholder="Lastname" id="" class="form-control form-control-lg" required>
                        <div class="form-text">Enter Your Lastname</div>
                    </div>
                    <div class="mb-3">
                        <input type="text" name="uname" placeholder="Username" id="" class="form-control form-control-lg" required>
                        <div class="form-text">Username or Email should be valid</div>
                    </div>
                    <div class="mb-3">
                        <input type="password" name="pword" placeholder="Password" id="" class="form-control form-control-lg" required>
                        <div class="form-text">Password should be atleast 8 characters</div>
                    </div>
                    <div class="mb-3">
                        <input type="password" name="" placeholder="Student Number" id="" class="form-control form-control-lg" required>
                        <div class="form-text">Student number is provided on your ID</div>
                    </div>
                    <div class="mb-3">
                        <input type="password" name="" placeholder="Phone Number" id="" class="form-control form-control-lg" required>
                        <div class="form-text">Contact Information</div>
                    </div>
                    <div class="mb-3">
                        <select name="" id="" class="form-select form-select-lg">
                            <option value="">First Year</option>
                            <option value="">Second Year</option>
                            <option value="">Third Year</option>
                            <option value="">Fourth Year</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <button type="submit" name="register" class="btn btn-lg btn-dark">Register</button>
                    </div>
                    <a href="login.php" class="text-decoration-none text-muted">Have an account already? Login here</a>
                </form>
            </div>
        </div>
    </div>
</main>



<?php include 'html/foot.html'; ?>