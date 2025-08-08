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
                        <a href="/logout" class="btn btn-danger" style = "float: right; margin: 5px">Logout</a>
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
                                <th scope="col">Test_num</th>
                                <th scope="col">Teacher</th>
                                <th scope="col">Name</th>
                                <th scope="col">Total-marks</th>
                                <th scope="col">Obtained Marks</th>
                                </tr>
                            </thead>
                            <?php
                            while ($reg_row = mysqli_fetch_array($query_run)) {
                            $queryn = "SELECT Name FROM students WHERE Roll_num = '{$reg_row['Student_id']}'";
                            $reg_n = mysqli_fetch_array(mysqli_query($connection, $queryn));
                            $queryu = "SELECT Teacher_name FROM teachers WHERE id = '{$reg_row['Teacher_id']}'";
                            $reg_u = mysqli_fetch_array(mysqli_query($connection, $queryu));
                                ?>
                            <tbody>
                                <tr>
                                <th><?php echo($reg_row['Test_num'])?></th>
                                <td><?php echo($reg_u['Teacher_name'])?></td>
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
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-5" >
                <div class="card">
                    <div class="card-header" style = "background-color: #23d0e3ff">
                        <h4>Teachers_List</h4>
                        <a href="/add_tea" class="btn btn-primary float-right">Add-Teacher</a>
                    </div>
                    <div class="card-body">
                        <?php
                        $querye = "SELECT * FROM teachers";
                        $querye_run = mysqli_query($connection, $querye);
                        if(mysqli_num_rows($querye_run) > 0)
                        {?>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                <th scope="col">Teacher_ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Phone</th>
                                </tr>
                            </thead>
                            <?php
                            while ($reg_e = mysqli_fetch_array($querye_run)) {
                                ?>
                            <tbody>
                                <tr>
                                <th><?php echo($reg_e['id'])?></th>
                                <td><?php echo($reg_e['Teacher_name'])?></td>
                                <td><?php echo($reg_e['Email'])?></td>
                                <td><?php echo($reg_e['Phone'])?></td>
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
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include('includes/footer.php');?>