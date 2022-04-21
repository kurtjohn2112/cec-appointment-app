<?php include '../html/head.html';
include '../functions/user-logic.php';

include 'navbar.php'

?>



<main class="py-5">

    <div class="container">
        <form action="" method="post">
            <div class="input-group">
                <input type="text" name="search-data" placeholder="Search a teacher" id="" class="form-control form-control-lg">
                <button type="submit" class="btn btn-success"> <i class="fas fa-search"></i> </button>
            </div>
        </form>
        <div class="card w-75 mx-auto shadow mt-5">
            <div class="card-header bg-success text-light p-3">
                <p>Welcome <?php echo $_SESSION['fullname'] ?></p>
            </div>
            <div class="card-body">
                <p class="lead">Your week's schedule</p>
                <div class="legend">
                    <p><span class="text-danger">Red</span> means you have a booking on that date</p>
                    <p><span class="text-info">Blue</span> means youre vacant on that date</p>
                </div>
                <table class="table table-bordered">
                    <thead class="table-dark">
                        <?php foreach (show_week_date() as $day => $date) : ?>
                            <td><?php echo $day ?> | <?php echo $date ?></td>
                        <?php endforeach ?>
                    </thead>
                    <tbody>
                        <tr>

                            <?php foreach (show_week_date() as $day => $date) : ?>
                                <td>AM | <a href="create-appointment.php?date=<?php echo $date  ?>&&time=am" class="text-decoration-none">See Morning schedule</a> </td>
                            <?php endforeach; ?>
                        </tr>
                        <tr>
                            <?php foreach (show_week_date() as $day => $date) : ?>
                                <td>PM | <a href="create-appointment.php?date=<?php echo $date  ?>&&time=pm" class="text-decoration-none">See Afternoon schedule</a> </td>
                            <?php endforeach; ?>



                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>



<?php include '../html/foot.html'; ?>