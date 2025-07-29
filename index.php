    <?php session_start();
    include('includes/header.php');
    
            auth();
    $connection = mysqli_connect("localhost", "root", "", "stutms");
?>
      <div class="container">
        <div class="row">
            <div class="col-md-12 mt-5" >
                <div class="card">
                    <div class="card-header">
                        <h4>Student_Results</h4>
                        <a href="/entry" class="btn btn-primary float-right">Register/Add</a>
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
                                <th scope="col">Roll_num</th>
                                <th scope="col">Name</th>
                                <th scope="col">Semester</th>
                                <th scope="col">Total-marks</th>
                                <th scope="col">Obtained Marks</th>
                                <th scope="col">Edit</th>
                                <th scope="col">Delete</th>
                                </tr>
                            </thead>
                            <?php
                            while ($reg_row = mysqli_fetch_array($query_run)) {
                                ?>
                            <tbody>
                                <tr>
                                <th><?php echo($reg_row['Roll_num'])?></th>
                                <td><?php echo($reg_row['Name'])?></td>
                                <td><?php echo($reg_row['Semester'])?></td>
                                <td><?php echo($reg_row['Total_marks'])?></td>
                                <td><?php echo($reg_row['Obtained_marks'])?></td>
                                <td><a href="/edit_form/<?php echo($reg_row['Roll_num'])?>" class="btn btn-info">Edit</a></td>
                                <td>
                                    <form action="/process" method="POST">
                                            <input type="hidden" name ="roll_number" class="form-control" value = "<?php echo $reg_row['Roll_num'];?>">
                                        <button type="submit" class="btn btn-danger" name = "Delete_btn">Delete</button>
                                    </form>

                                </td>
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
                    <div class="card-footer">
                            <a href="/admin_signup" class="btn btn-primary">New Admin</a>
                            <a href="/logout" class="btn btn-danger" style = "margin-left: 985px">Logout</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include('includes/footer.php');?>