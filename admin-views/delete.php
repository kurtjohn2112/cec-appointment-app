<?php 
include '../functions/admin-logic.php';


if(isset($_GET['teacher_id'])):
    destroy($_GET['teacher_id'],'id','teachers');

endif;



?>