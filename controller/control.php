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
        $email = $_POST['email'];
        $phone = $_POST['phone'];

        $query = "INSERT INTO `students`(`Name`, `Email`, `Phone`) VALUES ('$name','$email','$phone')";
        $query_run = mysqli_query($connection, $query);
        if($query_run){
            $_SESSION['status'] = "Entry Successful";
        $_SESSION['status_code'] = "success";
            header("Location: /admin_control");
        } else {
            $_SESSION['status'] = "Error Occurred";
        $_SESSION['status_code'] = "error";
            header("Location: /add_stu");
        }
    }


    if(isset($_POST['add_tea_btn'])){

        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $password = $_POST['password'];

        $query = "INSERT INTO `teachers`(`Teacher_name`,`password`, `Email`, `Phone`) VALUES ('$name','$password','$email','$phone')";
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
                $obtained_marks = $_POST['obtained_marks'];
                $common_total_marks = $_POST['common_total_marks'];
                $test_number = $_POST['test_number'];
                $teacher = $_SESSION['username'];
                // foreach($roll_nums as $key=>$row){
                //     var_dump($roll_nums[$key]);die;
                // }
                for ($i = 0; $i < count($roll_nums); $i++) {
                    $roll = $roll_nums[$i];
                    $obtained = $obtained_marks[$i];

                    $query = "INSERT INTO results (Student_id, Total_marks, Obtained_marks, Teacher_id, Test_num)
                            VALUES ('$roll', '$common_total_marks', '$obtained', '$teacher', '$test_number')";
                    mysqli_query($connection, $query);
                }

                $_SESSION['status'] = "Marks Added Successfully";
                $_SESSION['status_code'] = "success";
                header("Location: /teacher_control");
            }




    if(isset($_POST['post_btn'])){
        
        $to_id = $_POST['to_id'];
        $from_id = $_SESSION['username'];
        $message = $_POST['message'];

        $query = "INSERT INTO `messages`(`from_id`, `to_id`, `message`) VALUES ('$from_id','$to_id','$message')";
        $query_run = mysqli_query($connection, $query);
        if($query_run){
            $_SESSION['status'] = "Message Sent";
        $_SESSION['status_code'] = "success";
            header("Location: /post");
        } else {
            $_SESSION['status'] = "Error Occurred";
        $_SESSION['status_code'] = "error";
            header("Location: /post");
        }
    }


?>