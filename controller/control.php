<?php
session_start();

    $connection = mysqli_connect("localhost", "root", "", "stutms");



    if(isset($_POST['entry_btn'])){

        $name = $_POST['name'];
        $semester = $_POST['semester'];
        $tmarks = $_POST['tmarks'];
        $omarks = $_POST['omarks'];


        $query = "INSERT INTO `results`(`Name`, `Semester`, `Total_marks`, `Obtained_marks`) VALUES ('$name','$semester','$tmarks','$omarks')";
        $query_run = mysqli_query($connection, $query);
        if($query_run){
            $_SESSION['status'] = "Data Inserted Successfully";
        $_SESSION['status_code'] = "success";
            header("Location: /");
        } else {
            $_SESSION['status'] = "Error Occurred";
        $_SESSION['status_code'] = "error";
            header("Location: /");
        }
    }


        if(isset($_POST['signup_btn'])){

        $username = $_POST['username'];
        $password = $_POST['password'];

        $query = "INSERT INTO `admin`(`username`, `password`) VALUES ('$username','$password')";
        $query_run = mysqli_query($connection, $query);
        if($query_run){
            $_SESSION['status'] = "Signup Successful";
        $_SESSION['status_code'] = "success";
            header("Location: /");
        } else {
            $_SESSION['status'] = "Error Occurred";
        $_SESSION['status_code'] = "error";
            header("Location: /");
        }
    }

    if(isset($_POST['edit_btn'])){

        $tmarks = $_POST['tmarks'];
        $omarks = $_POST['omarks'];
        $id = $_POST['id'];

        $query = "UPDATE `results` SET `Total_marks`='$tmarks',`Obtained_marks`='$omarks' WHERE `id` = $id";
        $query_run = mysqli_query($connection, $query);
        if($query_run){
            $_SESSION['status'] = "Data Updated Successfully";
        $_SESSION['status_code'] = "success";
            header("Location: /teacher_control");
        } else {
            $_SESSION['status'] = "Error Occurred";
        $_SESSION['status_code'] = "error";
        }
    }


    if(isset($_POST['Delete_btn'])){
        $id = $_POST['result_id'];

        $query = "DELETE FROM `results` WHERE `id` = $id";
        $query_run = mysqli_query($connection, $query);
        if($query_run){
            $_SESSION['status'] = "Data Deleted Successfully";
        $_SESSION['status_code'] = "success";
            header("Location: /");
        } else {
            $_SESSION['status'] = "Error Occurred";
        $_SESSION['status_code'] = "error";
            header("Location: /");
        }
    }


    if(isset($_POST['admin_login_btn'])){

        $username = $_POST['username'];
        $password = $_POST['password'];

        $query = "SELECT * FROM `admin` WHERE `username` = '$username'";
        $query_run = mysqli_query($connection, $query);
        $verify = mysqli_fetch_array($query_run);

        if($verify['username'] == $username && $verify['password'] == $password){
            $_SESSION['username'] = $username;
            $_SESSION['status'] = "Login Successful";
        $_SESSION['status_code'] = "success";
            header("Location: /admin_control");
        }
        else {
            $_SESSION['status'] = "Error Occurred";
        $_SESSION['status_code'] = "error";
            header("Location: /admin_login");
        }
        } 


        if(isset($_POST['teacher_login_btn'])){

        $username = $_POST['username'];
        $password = $_POST['password'];

        $query = "SELECT * FROM `teachers` WHERE `Teacher_name` = '$username'";
        $query_run = mysqli_query($connection, $query);
        $verify = mysqli_fetch_array($query_run);

        if($verify['Teacher_name'] == $username && $verify['password'] == $password){
            $_SESSION['username'] = $verify['id'];
            $_SESSION['status'] = "Login Successful";
        $_SESSION['status_code'] = "success";
            header("Location: /teacher_control");
        }
        else {
            $_SESSION['status'] = "Error Occurred";
        $_SESSION['status_code'] = "error";
            header("Location: /teacher_login");
        }
        } 




        if(isset($_POST['add_stu_btn'])){

        $name = $_POST['name'];

        $query = "INSERT INTO `students`(`Name`) VALUES ('$name')";
        $query_run = mysqli_query($connection, $query);
        if($query_run){
            $_SESSION['status'] = "Entry Successful";
        $_SESSION['status_code'] = "success";
            header("Location: /");
        } else {
            $_SESSION['status'] = "Error Occurred";
        $_SESSION['status_code'] = "error";
            header("Location: /");
        }
    }


    if(isset($_POST['add_tea_btn'])){

        $name = $_POST['name'];
        $password = $_POST['password'];

        $query = "INSERT INTO `teachers`(`Teacher_name`,`password`) VALUES ('$name','$password')";
        $query_run = mysqli_query($connection, $query);
        if($query_run){
            $_SESSION['status'] = "Entry Successful";
        $_SESSION['status_code'] = "success";
            header("Location: /admin_control");
        } else {
            $_SESSION['status'] = "Error Occurred";
        $_SESSION['status_code'] = "error";
            header("Location: /add_tea");
        }
    }


    if (isset($_POST['submit_all'])) {

    $roll_nums = $_POST['roll_num'];
    $total_marks = $_POST['total_marks'];
    $obtained_marks = $_POST['obtained_marks'];

    for ($i = 0; $i < count($roll_nums); $i++) {
        $roll = $roll_nums[$i];
        $total = $total_marks[$i];
        $obtained = $obtained_marks[$i];
        $teacher = $_SESSION['username'];

        $query = "INSERT INTO results (Student_id, Total_marks, Obtained_marks, Teacher_id)
                  VALUES ('$roll', '$total', '$obtained', '$teacher')";
        mysqli_query($connection, $query);
    }

    $_SESSION['status'] = "Marks Added Successfully";
    $_SESSION['status_code'] = "success";
    header("Location: /entry");
}



?>