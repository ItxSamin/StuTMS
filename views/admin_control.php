    <?php session_start();
    include('includes/header.php');
    
            auth();
            a_auth();
    $connection = mysqli_connect("localhost", "root", "", "stutms");
?>
      <div class="container">
        <div class="row">
            <div class="col-md-12 mt-5" >
                <div class="card">
                    <div class="card-header" style = "background-color: #23d0e3ff">
                        <h4>Student_Results</h4>
                        <a href="/add_stu" class="btn btn-primary float-right">Add-Student</a>
                        <a href="/add_tea" class="btn btn-primary float-right">Add-Teacher</a>
                    </div>
                    <div class="card-body">
                        <?php
                        $query = "SELECT * FROM results";
                        $query_run = mysqli_query($connection, $query);
                        if(mysqli_num_rows($query_run) > 0)
                        {?>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                <th scope="col">Test_#</th>
                                <th scope="col">Roll_num</th>
                                <th scope="col">Name</th>
                                <th scope="col">Total-marks</th>
                                <th scope="col">Obtained Marks</th>
                                </tr>
                            </thead>
                            <?php
                            while ($reg_row = mysqli_fetch_array($query_run)) {
                            $queryn = "SELECT Name FROM students WHERE Roll_num = '{$reg_row['Student_id']}'";
                            $reg_n = mysqli_fetch_array(mysqli_query($connection, $queryn))

                                ?>
                            <tbody>
                                <tr>
                                <th><?php echo($reg_row['id'])?></th>
                                <th><?php echo($reg_row['Student_id'])?></th>
                                <td><?php echo($reg_n['Name'])?></td>
                                <td><?php echo($reg_row['Total_marks'])?></td>
                                <td><?php echo($reg_row['Obtained_marks'])?></td>
                                </tr>
                            </tbody>
                            <?php
                            }
                            ?>
                            </table>


                         <?php   }
                        else
                        {
                            echo "No Record Found";
                        }

                            ?>
                    </div>
                    <div class="card-footer" style = "background-color: #23d0e3ff">
                            <a href="/logout" class="btn btn-danger" style = "margin-left: 1150px; margin-top: 10px; margin-bottom: 10px">Logout</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include('includes/footer.php');?>