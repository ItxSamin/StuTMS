
    <?php session_start();
include(__DIR__ . '/../includes/header.php');
$connection = mysqli_connect("localhost", "root", "", "stutms");

            auth();

            t_auth();
?>
<div class="container">
    <div class="row">
        <div class="col-md-12 mt-5">
            <div class="card">
                <div class="card-header">
                    <h4>Student_Results</h4>
                    <a href="/entry" class="btn btn-primary float-right">Register/Add</a>
                </div>
                <div class="card-body">
                    <?php
                    $query = "SELECT * FROM `students`";
                    $query_run = mysqli_query($connection, $query);
                    if (mysqli_num_rows($query_run) > 0) {
                    ?>
                            <form action="/process" method="post">
                                <div class="form-group">
                                    <label for="common_total_marks">Total Marks (for all students)</label>
                                    <input type="number" name="common_total_marks" class="form-control mb-3" required>
                                </div>
                                
                                <div class="form-group">
                                    <label for="test_number">Test Number</label>
                                    <input type="text" name="test_number" class="form-control mb-3" required>
                                </div>
                                
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col">Roll_num</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Obtained Marks</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        while ($reg_row = mysqli_fetch_array($query_run)) {
                                        ?>
                                        <tr>
                                            <td>
                                                <?php echo $reg_row['Roll_num']; ?>
                                                <input type="hidden" name="roll_num[]" value="<?php echo $reg_row['Roll_num']; ?>">
                                            </td>
                                            <td><?php echo $reg_row['Name']; ?></td>
                                            <td><input type="number" name="obtained_marks[]" class="form-control" required></td>
                                            <td><input type="hidden" name="teacher_id" value="<?php echo $_SESSION['username'];?>"></td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                                <button type="submit" class="btn btn-success" name="submit_all">Submit All</button>
                            </form>
                    <?php } else {
                        echo "<h5>No records found</h5>";
                    } ?>
                </div>
            </div>
        </div>
    </div>
</div>

 <?php
    include(__DIR__ . '/../includes/footer.php');
?>