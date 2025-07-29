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

        $name = $_POST['name'];
        $semester = $_POST['semester'];
        $tmarks = $_POST['tmarks'];
        $omarks = $_POST['omarks'];
        $id = $_POST['roll_number'];

        $query = "UPDATE `results` SET `Name`='$name',`Semester`='$semester',`Total_marks`='$tmarks',`Obtained_marks`='$omarks' WHERE `Roll_num` = $id";
        $query_run = mysqli_query($connection, $query);
        if($query_run){
            $_SESSION['status'] = "Data Updated Successfully";
        $_SESSION['status_code'] = "success";
            header("Location: /");
        } else {
            $_SESSION['status'] = "Error Occurred";
        $_SESSION['status_code'] = "error";
            header("Location: /");
        }
    }


    if(isset($_POST['Delete_btn'])){
        $id = $_POST['roll_number'];

        $query = "DELETE FROM `results` WHERE `Roll_num` = $id";
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


    if(isset($_POST['login-btn'])){

        $username = $_POST['username'];
        $password = $_POST['password'];

        $query = "SELECT * FROM `admin` WHERE `username` = '$username'";
        $query_run = mysqli_query($connection, $query);
        $verify = mysqli_fetch_array($query_run);

        if($verify['username'] == $username && $verify['password'] == $password){
            $_SESSION['username'] = $username;
            $_SESSION['status'] = "Login Successful";
        $_SESSION['status_code'] = "success";
            header("Location: /");
        }
        else {
            $_SESSION['status'] = "Error Occurred";
        $_SESSION['status_code'] = "error";
            header("Location: /admin_login");
        }
        } 


?>