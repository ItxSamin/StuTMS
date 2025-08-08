<?php include('includes/header.php');
session_start();
auth();
$connection = mysqli_connect("localhost", "root", "", "stutms");
$query = "SELECT * FROM `teachers`";
$query_run = mysqli_query($connection, $query);?>

    
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-transparent border-success">
                    <h1 style = "text-align: center">Post_Form</h1>
                </div>
                <div class="card-body">
                    <?php if(mysqli_num_rows($query_run) > 0){?>
                        <form action="/process" method="POST">
                        <select class="form-select" name = "to_id">
                        <option selected>Open this select menu</option>
                        <?php while ($row = mysqli_fetch_array($query_run)) {?>
                        <option name = "to_id" value = "<?php echo $row['id'];?>"><?php echo $row['Teacher_name'];?></option>
                        <?php }?>
                        </select>
                        <div class="mb-3 mt-3">
                                <label for="message" class="form-label"><strong>Message:</strong></label>
                                <textarea class="form-control" name="message" rows="3"></textarea>
                        </div>
                        <button type="submit" name="post_btn" class="btn btn-primary">Send</button>
                        <a href="/teacher_control" class = "btn btn-warning">Back</a>
                        </form>
                        <?php }
                        else {echo "No Users Found"; }?>
                        
                </div>
            </div>
        </div>
    </div>
</div>
<?php include('includes/footer.php');?>