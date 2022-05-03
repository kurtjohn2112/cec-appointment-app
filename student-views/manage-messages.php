<?php include '../html/head.html';
include '../functions/user-logic.php';

include 'navbar.php';


if (isset($_POST['send_message'])) {

    $id = $_SESSION['id'];
    $teacher_id = $_POST['teacher_id'];
    $message = $_POST['message'];

    sendMessage($id, $teacher_id, $message);
}

?>



<main class="py-5">

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-8">
                <form action="" method="post">
                    <select name="teacher_id" class="form-select" id="">
                        <option value="" selected disabled hidden>Teacher name</option>
                        <?php foreach (show('teachers') as $row) : ?>
                            <option value="<?php echo $row['id'] ?>"><?php echo $row['fullname'] ?></option>
                        <?php endforeach; ?>
                    </select>
                    <div class="mt-3">
                        <textarea name="message" id="" rows="10" class="form-control" placeholder="Start writing"></textarea>
                    </div>
                    <button class="px-3 btn btn-dark mt-3" name="send_message">Send message</button>
                </form>
            </div>
            <div class="col-4">


                <?php if (!empty(show_data_multiple('teach_messages', 'student_id', $_SESSION['id']))) : ?>

                    <?php foreach (show_data_multiple('teach_messages', 'teacher_id', $_SESSION['id']) as $row) : ?>
                        <div class="border p-3">
                            <p class="font-monospace">Sender: <?php echo  show_data('teachers','id',$row['teacher_id'])['fullname'] ?></p>
                            <p class="fst-italic">
                                <?php echo $row['message'] ?>
                            </p>
                        </div>

                    <?php endforeach; ?>
                <?php else : ?>
                    <div class="alert alert-secondary">No Messages yet</div>
                <?php endif ?>
            </div>
        </div>
    </div>
</main>



<?php include '../html/foot.html'; ?>