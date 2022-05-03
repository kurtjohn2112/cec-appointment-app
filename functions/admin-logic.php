<?php

include 'connection.php';



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
    $sql = "SELECT * FROM $table_name WHERE $pk = '$id' ORDER BY $pk ASC";
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

#------------------ teachers queries

function create_teacher($fullname, $contact, $username, $password)
{
    $conn = connect();
    $sql = "INSERT INTO teachers(fullname,contact,username,password)VALUES('$fullname','$contact','$username','$password')";
    $result = $conn->query($sql);

    if ($result == TRUE) {
        success_message('Teacher added successfully!');
    } else {
        die('ERROR: ' . $conn->error);
    }
}
function login($username, $password)
{
    $conn = connect();
    $sql = "SELECT * FROM teachers WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows  == 1) {
        $row = $result->fetch_assoc();

        $_SESSION['fullname'] = $row['fullname'];
        $_SESSION['id'] = $row['id'];

        header('location: teacher-views/teacher-dashboard.php');
    } else {
        echo "ERROR: INVALID CREDENTIALS";
    }
}

function teacher_send_message($t_id, $s_id, $message)
{

    $conn = connect();
    $sql = "INSERT INTO teach_messages(teacher_id,student_id,message)VALUES('$t_id','$s_id','$message')";
    $result = $conn->query($sql);

    if ($result == TRUE) {
        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                <strong>Message sent successfully</strong> 
             </div>';
    } else {
        die('ERROR: ' . $conn->error);
    }
}

function approve_appointment($teacher_id,$appointment_id){
    $conn = connect();
    $sql = "UPDATE schedules SET status = 'approved' WHERE teacher_id = '$teacher_id' AND id = '$appointment_id'";
    $result = $conn->query($sql);

    if ($result == TRUE) {
        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                <strong>Approved sent successfully</strong> 
             </div>';
    } else {
        die('ERROR: ' . $conn->error);
    }

}

function show_pending_appointment($id)
{
    $conn = connect();
    $sql = "SELECT  * FROM schedules WHERE teacher_id = '$id' ORDER BY id DESC ";
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
function show_pending_appointment_students($id)
{
    $conn = connect();
    $sql = "SELECT  * FROM schedules WHERE student_id = '$id'  ORDER BY id DESC ";
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
