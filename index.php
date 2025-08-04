
<?php
include('includes/header.php'); ?>

<div class="container">
    <div class="row">
    <div class="column-md-10">
      <div class="card" style = "margin-top: 200px; margin-left: 450px; margin-right: 550px;">
        <div class="card-header" style = "background-color: #23d0e3ff">
          <h4 style = "color: white">Result Portal</h4>
        </div>
        <div class="card-body" style = "background-color: #23cae3ff">
          <a href="/stu_login" class="btn btn-primary">Check Result</a>
          <div class="dropdown" style='margin-top: 20px'>
                <button class="btn btn-light dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false" style = "border-color: #020504ff">
                  Login-as
                </button>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="/admin_login">Admin</a></li>
                  <li><a class="dropdown-item" href="/teacher_login">Teacher</a></li>
                </ul>
              </div>
        </div>
        <div class="card-footer">

        </div>
      </div>
    </div>
  </div>
  </div>
  


<?php include('includes/footer.php'); ?>