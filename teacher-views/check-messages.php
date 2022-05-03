<?php include '../html/head.html';
include '../functions/admin-logic.php';

include 'navbar.php';

if(isset($_POST['send_message'])){
    $teacher_id = $_SESSION['id'];
    $id = $_POST['student_id'];
    $message = $_POST['message'];

    teacher_send_message($teacher_id,$id,$message);
}


?>



<main class="py-5">

    <div class="container">
        <form action="" method="post">
            <div class="mb-3">
                <select name="student_id" id="" class="form-select">
                    <option value="" hidden selected disabled>Select a student</option>
                    <?php foreach (show('users') as $row) :  ?>
                        <option value="<?php echo $row['id'] ?>"><?php echo $row['fname'] . " " . $row['lname'] ?></option>
                    <?php endforeach;  ?>
                </select>

            </div>
            <div class="mb-3">
                <textarea name="message" id="" cols="30" placeholder="Start writing" rows="10" class="form-control"></textarea>

            </div>
            <div class="mb-3">
                <button type="submit" name="send_message" class="btn btn-secondary">Submit</button>
            </div>

        </form>

        <div class="card mt-5">
            <div class="card-header">
                <p>Messages | Inbox </p>
            </div>
            <div class="card-body">
                <?php if (!empty(show_data_multiple('std_messages', 'teacher_id', $_SESSION['id']))) : ?>
                    <?php foreach (show_data_multiple('std_messages', 'teacher_id', $_SESSION['id']) as $row) : ?>
                        <div class="my-3 p-3 border">
                            <a href="#" class="text-decoration-none"><?php echo show_data('users', 'id', $row['student_id'])['fname'] . " " . show_data('users', 'id', $row['student_id'])['lname']  ?></a>
                            <p class="fst-italic mt-3">
                                <?php echo $row['message'] ?>
                            </p>
                        </div>
                    <?php endforeach; ?>
                <?php else : ?>
                    <div class="alert alert-secondary">
                        No messages yet
                    </div>
                <?php endif ?>

            </div>
        </div>
    </div>
</main>



<?php include '../html/foot.html'; ?>