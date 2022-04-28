<?php include '../html/head.html';
include '../functions/admin-logic.php';

include 'navbar.php';




?>



<main class="py-5">

    <div class="container">
        <div class="card">
            <div class="card-header">
                <p>Messages | Inbox </p>
            </div>
            <div class="card-body">
                <?php if( !empty(show_data_multiple('std_messages','teacher_id',$_SESSION['id'])) ): ?>
                    <?php foreach(show_data_multiple('std_messages','teacher_id',$_SESSION['id']) as $row): ?>
                      <div class="my-3 p-3 border">
                            <a href="#" class="text-decoration-none"><?php echo show_data('users','id',$row['student_id'])['fname']." ".show_data('users','id',$row['student_id'])['lname']  ?></a>
                            <p class="fst-italic mt-3">
                                <?php echo $row['message'] ?>
                            </p>
                      </div>
                    <?php endforeach; ?>
                    <?php else: ?>
                        <div class="alert alert-secondary">
                            No messages yet
                        </div>
                <?php endif ?>
               
            </div>
        </div>
    </div>
</main>



<?php include '../html/foot.html'; ?>