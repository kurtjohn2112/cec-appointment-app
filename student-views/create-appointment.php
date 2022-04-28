<?php include '../html/head.html';
include '../functions/user-logic.php';

include 'navbar.php';

if (isset($_POST['book_date'])) {
    $date = $_POST['date'];
    $time = $_POST['schedule'];
    $id = $_SESSION['id'];
    $teacher = $_POST['teacher'];


    book_schedule($id, $date, $time, $teacher);
}


?>


<main class="py-5">

    <div class="container">
        <div class="row">
            <div class="col">
                <div class="border p-5 shadow">
                    <p class="lead">
                        You have choosen date: <span class="badge bg-success"> <?php echo $_GET['date'] ?></span>
                    </p>
                    <p class="lead">Day Schedule is <span class="font-monospace text-uppercase"><?php echo $_GET['time'] ?></span>
                        <?php if ($_GET['time'] == 'am') : ?>
                            - <span class="font-monospace">Morning</span>
                        <?php else : ?>
                            - <span class="font-monospace">Afternoon</span>
                        <?php endif; ?>
                    </p>
                    <form action="" method="post">
                        <input type="hidden" name="date" value="<?php echo $_GET['date'] ?>">
                        <input type="hidden" name="schedule" value="<?php echo $_GET['time'] ?>">
                        <select name="teacher" id="" class="form-select mb-3">
                            <option value="" selected disabled hidden>Select a teacher</option>
                            <?php foreach (show('teachers') as $row) : ?>
                                <option value="<?php echo $row['id'] ?>"><?php echo $row['fullname'] ?></option>
                            <?php endforeach; ?>
                        </select>
                        <button type="submit" name="book_date" class="btn btn-success"> <i class="fas fa-calendar    "></i> Book Schedule </button>
                    </form>
                </div>
            </div>
            <div class="col">
                <p class="lead text-center">Booked schedule on this day</p>
               
                <?php
                        $sched = show_specific_date_booking($_SESSION['id'], $_GET['date']);
                  if(!empty($sched)):
                        foreach ($sched as $row) : ?>
                            <p class="font-monospace"><?php echo $row['date'] ?> | <?php echo $row['time'] ?> |Appointment for Teacher: <?php echo show_data('teachers','id',$row['teacher_id'])['fullname'] ?></p>
                            <hr>
                        <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</main>



<?php include '../html/foot.html'; ?>