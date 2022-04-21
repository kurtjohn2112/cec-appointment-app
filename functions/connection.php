<?php 
session_start();

function connect(){
    return $conn = new mysqli('localhost','root', '', 'appointment_db');

}

$app_name = "CEC-APPOINTMENT APP";



?>