    <?php session_start();
    include(__DIR__ . '/../includes/header.php');
    
            auth();
            t_auth();

    $connection = mysqli_connect("localhost", "root", "", "stutms");
    $query = "SELECT * FROM results WHERE id = $id";
    $query_run = mysqli_query($connection, $query);
    
    ?>


<div class="container">
    <div class="row" style="margin-top: 10vh;">
        <div class="col-md-10">
            <div class="card" style="padding: 20px;">
                <div class="card-header">
                    <h4>Result Edit here!</h4>
                </div>
                <div class="card-body">
                    
                        <?php if(mysqli_num_rows($query_run) > 0)
                        {?>
                    <form action= "/process" method="POST" style="margin-top: 20px;margin-right: 30vh;">
                        <?php while ($row = mysqli_fetch_array($query_run)) {
                            $queryn = "SELECT Name FROM students WHERE Roll_num = '{$row['Student_id']}'";
                            $row_n = mysqli_fetch_array(mysqli_query($connection, $queryn))
                            ?>
                            <div class="mb-3">
                                <label>Name</label>
                                <input type="text" name ="name" class="form-control" value= "<?php echo $row_n['Name'];?>">
                            </div>
                            <div class="mb-3">
                                <label>Total_Marks</label>
                                <input type="text" name ="tmarks" class="form-control" value = "<?php echo $row['Total_marks'];?>">
                            </div>
                            <div class="mb-3">
                                <label>Obtained_Marks</label>
                                <input type="text" name ="omarks" class="form-control" value = "<?php echo $row['Obtained_marks'];?>">
                            
                            </div>
                            <div class="mb-3">
                                <input type="hidden" name ="id" class="form-control" value = "<?php echo $row['id'];?>">
                            </div>
                            <div class="mb-3">
                            </div>
                            <button type="submit" name="edit_btn" class="btn btn-primary">Enter</button>
                        </fieldset>
                        </form>
                        <?php }
                        } else {
                            echo "No Record Found";
                        }?>
                    
                </div>
            </div>
        </div>
    </div>
</div>





    <?php include(__DIR__ . '/../includes/footer.php');?>
