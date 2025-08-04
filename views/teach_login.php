<?php include ('includes/header.php');
session_start();
$conn = mysqli_connect("localhost", "root", "", "stutms");
    $username = $_SESSION['username'];
    $auth_query = "SELECT * FROM `teachers` WHERE `id` = '$username'";
    $auth_query_run = mysqli_query($conn, $auth_query);
    $auth_verify = mysqli_fetch_array($auth_query_run);

    if ($_SESSION['username'] == true && $_SESSION['username'] == $auth_verify['id']){
        header("Location:/teacher_control");
    }
    else {?>
  

<div style="display: flex; justify-content: center; align-items: center; height: 100vh;">
    <div style="width: 50%;">
        <div class="card">
            <div class="card-header">
                <h4>Teacher-Login</h4>
            </div>
    <div class="card-body">
        <form action="/process" method="POST">
  <div class="mb-3">
    <label class="form-label">User_name</label>
    <input type="text" class="form-control" name="username" placeholder="Enter username">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control" name="password" placeholder="Enter password">
  </div>
    <button type="submit" class="btn btn-primary" name= "teacher_login_btn">Login</button>
</form>


</div>
<div class="card-footer">
</div>
    </div>
</div>
<?php include ('includes/footer.php');?>

   <?php }
  ?>
