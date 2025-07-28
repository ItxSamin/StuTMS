<?php

    $connection = mysqli_connect("localhost", "root", "", "stutms");



    if(isset($_POST['entry_btn'])){

        $name = $_POST['name'];
        $semester = $_POST['semester'];
        $tmarks = $_POST['tmarks'];
        $omarks = $_POST['omarks'];


        $query = "INSERT INTO `results`(`Name`, `Semester`, `Total_marks`, `Obtained_marks`) VALUES ('$name','$semester','$tmarks','$omarks')";
        $query_run = mysqli_query($connection, $query);
        if($query_run){
            header("Location: /");
        } else {
            header("Location: /");
        }
    }


        if(isset($_POST['signup_btn'])){

        $username = $_POST['username'];
        $password = $_POST['password'];

        $query = "INSERT INTO `admin`(`username`, `password`) VALUES ('$username','$password')";
        $query_run = mysqli_query($connection, $query);
        if($query_run){
            header("Location: /");
        } else {
            header("Location: /");
        }
    }

?>