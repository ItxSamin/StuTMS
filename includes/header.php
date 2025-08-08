<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>STUMS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.0/css/all.min.css">
    <script type="text/javascript" src="../controller/jquery.js"></script>

  </head>

  <body>
    <?php
    function auth(){
    $username = $_SESSION['username'];

    if ($username == true){

    }
    else {
         header("Location:/");
        
    }}

    function t_auth(){
      $conn = mysqli_connect("localhost", "root", "", "stutms");
    $username = $_SESSION['username'];
    $auth_query = "SELECT * FROM `teachers` WHERE `id` = '$username'";
    $auth_query_run = mysqli_query($conn, $auth_query);
    $auth_verify = mysqli_fetch_array($auth_query_run);

    if ($_SESSION['username'] == $auth_verify['id']){

    }
    else {
         header("Location:/");
        
    }}

    function a_auth(){
      $conn = mysqli_connect("localhost", "root", "", "stutms");
    $username = $_SESSION['username'];
    $auth_query = "SELECT * FROM `admin` WHERE `username` = '$username'";
    $auth_query_run = mysqli_query($conn, $auth_query);
    $auth_verify = mysqli_fetch_array($auth_query_run);

    if ($auth_verify['username'] == $username){

    }
    else {
         header("Location:/");
    }}

    ?>
    <div class="background">
  
  <!-- Using common classes to minimize redundancy -->
  <span class="ball"></span>
  <span class="ball"></span>
  <span class="ball"></span>
  <span class="ball"></span>
  <span class="ball"></span>
  <span class="ball"></span>
</div>