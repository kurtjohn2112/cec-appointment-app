<?php include '../html/head.html';
include '../functions/user-logic.php';

include 'navbar.php'

?>



<main class="py-5">

    <div class="container">
        <h1 class="display-1 text-center">
            CREATE YOUR UI HERE..
        </h1>
        
        <div class="card w-75 mx-auto shadow mt-5">
            <div class="card-header bg-success text-light p-3">
                <p>Welcome Admin <?php echo $_SESSION['fullname'] ?></p>
            </div>
            <div class="card-body">
                <p class="fst-italic">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dolorum ipsa doloribus porro nostrum illo quidem vel voluptatibus sequi, placeat voluptas omnis, aut voluptatum quod obcaecati minima impedit nam! Ipsum, voluptatibus quod voluptas eligendi quae totam commodi assumenda ut dolorum veritatis, perferendis similique unde deserunt incidunt maxime asperiores ea accusantium libero?</p>
            </div>
        </div>
    </div>
</main>



<?php include '../html/foot.html'; ?>