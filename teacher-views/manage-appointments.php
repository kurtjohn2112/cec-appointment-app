<?php include '../html/head.html';
include '../functions/admin-logic.php';

include 'navbar.php';

// echo $_SESSION['id'];

if (isset($_POST['approve'])) {

    $id = $_SESSION['id'];
    $appointment_id = $_POST['id'];


    approve_appointment($id, $appointment_id);
}
if (isset($_POST['reject'])) {

    $id = $_SESSION['id'];
    $appointment_id = $_POST['id'];


    approve_appointment($id, $appointment_id);
}
?>



<main class="py-5">

    <div class="container">
        <table class="table table-bordered">
            <thead class="table-dark">
                <td>Student Name</td>
                <td>Time of the day</td>
                <td>Date</td>
                <td>Actions</td>

            </thead>
            <tbody>
                <?php foreach (show_pending_appointment($_SESSION['id']) as $row) : ?>
                    <tr>
                        <td><?php echo show_data('users', 'id', $row['student_id'])['fname'] . " " . show_data('users', 'id', $row['student_id'])['lname'] ?></td>
                        <td class="text-uppercase font-monospace"><?php echo $row['time'] ?></td>
                        <td class="font-monospace"><?php echo $row['date'] ?></td>
                        <td>
                            <?php if ($row['status'] == 'not approved') : ?>
                                <form action="" method="post" class="d-inline">
                                    <!-- <input type="hidden" name="status" value="approved"> -->
                                    <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                                    <button type="submit" name="approve" class="btn btn-warning">Approve <i class="fas fa-question"></i> 
                                </form>
                                
                            <?php else: ?>
                                <span class="badge bg-success">
                                    Approved <i class="fas fa-check-circle"></i>
                                </span>
                            <?php endif; ?>
                        </td>

                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</main>



<?php include '../html/foot.html'; ?>