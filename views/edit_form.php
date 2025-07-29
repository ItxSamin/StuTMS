    <?php 
    include(__DIR__ . '/../includes/header.php');
    $connection = mysqli_connect("localhost", "root", "", "stutms");
    $query = "SELECT * FROM results WHERE ROll_num = $id";
    $query_run = mysqli_query($connection, $query);
    
    ?>


<div class="container">
    <div class="row" style="margin-top: 10vh;">
        <div class="col-md-10">
            <div class="card" style="padding: 20px;">
                <div class="card-header">
                    <h4>Result Enter here!</h4>
                </div>
                <div class="card-body">
                    
                        <?php if(mysqli_num_rows($query_run) > 0)
                        {?>
                    <form action= "/process" method="POST" style="margin-top: 20px;margin-right: 30vh;">
                        <?php while ($row = mysqli_fetch_array($query_run)) {?>
                            <div class="mb-3">
                                <label>Name</label>
                                <input type="text" name ="name" class="form-control" value= "<?php echo $row['Name'];?>">
                            </div>
                            <div class="mb-3">
                                <label>Semester</label>
                                <input type="text" name ="semester" class="form-control" value = "<?php echo $row['Semester'];?>">
                            </div><div class="mb-3">
                                <label>Total_Marks</label>
                                <input type="text" name ="tmarks" class="form-control" value = "<?php echo $row['Total_marks'];?>">
                            </div><div class="mb-3">
                                <label>Obtained_Marks</label>
                                <input type="text" name ="omarks" class="form-control" value = "<?php echo $row['Obtained_marks'];?>">
                            
                            </div>
                            <div class="mb-3">
                                <input type="hidden" name ="roll_number" class="form-control" value = "<?php echo $row['Roll_num'];?>">
                            
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
