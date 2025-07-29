<?php 
include('includes/header.php');
    $connection = mysqli_connect("localhost", "root", "", "stutms");
if(isset($_POST["chk_btn"])) {
    $id = $_POST['rollnumber'];

    $query = "SELECT * FROM `results` WHERE `Roll_num` = '$id'";
    $query_run = mysqli_query($connection, $query);
    
    if(mysqli_num_rows($query_run) > 0) {
        $row = mysqli_fetch_array($query_run);
        ?>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Student_Results</h4>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">Roll_num</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Semester</th>
                                        <th scope="col">Total-marks</th>
                                        <th scope="col">Obtained Marks</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th><?php echo ($row['Roll_num']); ?></th>
                                        <td><?php echo ($row['Name']); ?></td>
                                        <td><?php echo ($row['Semester']); ?></td>
                                        <td><?php echo ($row['Total_marks']); ?></td>
                                        <td><?php echo ($row['Obtained_marks']); ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
    } else {
        header("Location: /stu_login");
    }
} else {
    ?>
    <div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body" style="padding: 70px">
                        <form action="/stu_result" method="POST" style="width: 300px;">
                            <div class="mb-3">
                                <label class="form-label">User Name</label>
                                <input type="text" class="form-control" name="rollnumber" placeholder="Enter Rollnumber">
                            </div>
                            <button type="submit" name="chk_btn" class="btn btn-primary">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
}

include('includes/footer.php');
?>