<?php

include 'connection.php';


#_______________________ dynamic queries

function show($table_name)
{
    $conn = connect();
    $sql = "SELECT  * FROM $table_name ORDER BY id DESC";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $rows = array();
        while ($row  = $result->fetch_assoc()) {
            $rows[] = $row;
        }
        return $rows;
    } else {
        return FALSE;
    }
}
function destroy($id, $pk, $table_name)
{
    $conn = connect();
    $sql = "DELETE FROM $table_name WHERE $pk = '$id'";
    $result = $conn->query($sql);

    if ($result == TRUE) {
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
}
function show_data($table_name, $pk, $id)
{
    $conn = connect();
    $sql = "SELECT * FROM $table_name WHERE $pk = '$id'";
    $result = $conn->query($sql);

    if ($result == TRUE) {
        return $result->fetch_assoc();
    }
}

function upload_img($img_name, $img_src_id, $label)
{
    $conn = connect();
    $sql = "INSERT INTO images(img_name,img_src_id,label)VALUES('$img_name','$img_src_id','$label')";
    $result = $conn->query($sql);

    if ($result == TRUE) {
        return 1;
    } else {
        die('ERROR: ' . $conn->error);
    }
}

function show_uploaded_images($id, $label)
{
    $conn = connect();
    $sql = "SELECT * FROM images WHERE img_src_id = '$id' AND label  = '$label'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $rows = array();
        while ($row  = $result->fetch_assoc()) {
            $rows[] = $row;
        }
        return $rows;
    } else {
        return FALSE;
    }
}

function show_data_multiple($table_name, $pk, $id)
{
    $conn = connect();
    $sql = "SELECT * FROM $table_name WHERE $pk = '$id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $rows = array();
        while ($row  = $result->fetch_assoc()) {
            $rows[] = $row;
        }
        return $rows;
    } else {
        return FALSE;
    }
}
#__________________________ role-defined queries: student

function register($fname, $lname, $username, $password)
{
    $conn = connect();
    $sql = "INSERT INTO users (fname,lname,username,password) VALUES('$fname','$lname','$username','$password')";
    $result = $conn->query($sql);

    if ($result == TRUE) {
        login($username, $password);
    } else {
        die('ERROR: ' . $conn->error);
    }
}
function login($username, $password)
{
    $conn = connect();
    $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows  == 1) {
        $row = $result->fetch_assoc();
        if ($row['role'] == 'S') {
            $_SESSION['fullname'] = $row['fname'] . " " . $row['lname'];
            $_SESSION['id'] = $row['id'];
            header('location: student-views/dash-student.php');
        } else {
            $_SESSION['fullname'] = $row['fname'] . " " . $row['lname'];
            $_SESSION['id'] = $row['id'];
            header('location: admin-views/dash-admin.php');
        }
    } else {
    }
}

function show_week_date()
{
    $dt = new DateTime();
    $dates = [];
    for ($d = 1; $d <= 5; $d++) {
        $dt->setISODate($dt->format('o'), $dt->format('W'), $d);
        $dates[$dt->format('D')] = $dt->format('Y-m-d');
    }
    return $dates;
}

function book_schedule($id,$date,$time,$teacher){
    $conn = connect();
    $sql = "INSERT INTO schedules(student_id,date,time,teacher)VALUES('$id','$date','$time','$teacher')";
    $result  = $conn->query($sql);

    if($result){
        success_message('Appointment Booked Successfully!');
    }else{
        die('ERROR '. $conn->error);
    }
    
    

}

function show_specific_date_booking($id,$date)
{
    $conn = connect();
    $sql = "SELECT * FROM schedules WHERE student_id = '$id' AND date = '$date'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $rows = array();
        while ($row  = $result->fetch_assoc()) {
            $rows[] = $row;
        }
        return $rows;
    } else {
        return FALSE;
    }
}






#---------------------------------------- msg function
function success_message($message)
{

    echo "<div class='alert alert-success alert-dismissible fade show mt-5 container ' role='alert'>
          <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
          <strong>$message</strong> 
        </div>";
}
function failed_message($message)
{

    echo "<div class='alert alert-danger alert-dismissible fade show mt-5 ' role='alert'>
          <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
          <strong>$message</strong> 
        </div>";
}
