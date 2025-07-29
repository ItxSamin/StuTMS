<?php include ('includes/header.php');
session_start();?>


<div style="display: flex; justify-content: center; align-items: center; height: 100vh;">
    <div style="width: 50%;">
        <div class="card">
            <div class="card-header">
                <h4>Admin-Login</h4>
            </div>
    <div class="card-body">
        <form action="/process" method="POST">
  <div class="mb-3">
    <label class="form-label">Email address</label>
    <input type="text" class="form-control" name="username" placeholder="Enter username">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control" name="password" placeholder="Enter password">
  </div>
    <button type="submit" class="btn btn-primary" name= "login-btn">Login</button>
</form>


</div>
<div class="card-footer">
    <a href="/stu_login" class="btn btn-info">Check Result</a>
</div>
    </div>
</div>
<?php include ('includes/footer.php');?>