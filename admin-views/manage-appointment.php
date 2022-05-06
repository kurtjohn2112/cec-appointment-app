<?php include '../html/head.html';
include '../functions/user-logic.php';

include 'navbar.php'

?>



<main class="py-5">

    <div class="container">
            <table class="table table-bordered">
                <thead class="table-dark">
                    <td>Teacher Name</td>
                    <td>Time of the day</td>
                    <td>Date</td>
                    <td>Actions</td>
                    
                </thead>
                <tbody>
                    <?php foreach( show('schedules') as $row ): ?>
                        <tr>
                            <td><?php echo show_data('teachers','id',$row['teacher_id'])['fullname'] ?></td>
                            <td class="text-uppercase font-monospace"><?php echo $row['time'] ?></td>
                            <td class="font-monospace"><?php echo $row['date'] ?></td>
                            <td>
                                <form action="" method="post" class="d-inline">
                                    <input type="hidden" name="status" value="approved">
                                    <button type="submit" class="btn btn-success">Approve <i class="fas fa-check    "></i></button>
                                </form>
                                <form action="" method="post" class="d-inline">
                                    <input type="hidden" name="status" value="reject">
                                    <button type="submit" class="btn btn-danger">Reject <i class="fas fa-times    "></i> </button>
                                </form>
                            </td>
                            
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
    </div>
</main>



<?php include '../html/foot.html'; ?>