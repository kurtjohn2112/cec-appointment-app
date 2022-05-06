<?php include '../html/head.html';
include '../functions/admin-logic.php';

include 'navbar.php';

if (isset($_POST['save_teacher'])) {
    $name = $_POST['fullname'];
    $contact = $_POST['contact'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    create_teacher($name, $contact, $username, $password);
}

?>



<main class="py-5">

    <div class="container">
        <div class="card w-50 mx-auto shadow">
            <div class="card-header bg-secondary p-2 align-items-center">
                <p class="text-light">Add teacher</p>
            </div>
            <div class="card-body">
                <form action="" method="post">
                    <div class="mb-3">
                        <input type="text" placeholder="Teacher fullname" name="fullname" id="" class="form-control">
                    </div>
                    <div class="mb-3">
                        <input type="text" placeholder="Contact Information" name="contact" id="" class="form-control">
                    </div>
                    <div class="mb-3">
                        <input type="text" placeholder="Username" name="username" id="" class="form-control">
                    </div>
                    <div class="mb-3">
                        <input type="password" placeholder="Password" name="password" id="" class="form-control">
                    </div>
                    <div class="mb-3">
                        <button type="submit" name="save_teacher" class="btn btn-secondary"> <i class="fas fa-check    "></i> Save teacher</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="container my-5">
        <table class="table table-bordered table-striped">
            <thead class="table-secondary">
                <td>Teacher Fullname</td>
                <td>Contact Info</td>
                <td>Action</td>

            </thead>
            <tbody>
                <?php foreach (show('teachers') as $row) : ?>
                    <tr>
                        <td><?php echo $row['fullname'] ?></td>
                        <td><?php echo $row['contact'] ?></td>
                        <td> <a class="btn btn-danger" href="delete.php?teacher_id=<?php echo $row['id'] ?> ">Deactivate Account</a> </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</main>



<?php include '../html/foot.html'; ?>