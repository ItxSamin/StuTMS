    <?php session_start();
    include(__DIR__ . '/../includes/header.php');
    
    
            auth();
            a_auth();
    ?>


<div class="container">
    <div class="row" style="margin-top: 10vh;">
        <div class="col-md-10">
            <div class="card" style="padding: 20px;">
                <div class="card-header">
                    <h4>Add New Student</h4>
                </div>
                <div class="card-body">
                    <form action= "/process" method="POST" style="margin-top: 20px;margin-right: 30vh;">
                            <div class="mb-3">
                                <label>Name</label>
                                <input type="text" name ="name" class="form-control" placeholder="Enter Student Name">
                            </div>
                            <div class="mb-3">
                                <label>Email</label>
                                <input type="text" name ="email" class="form-control" placeholder="Enter Student Name">
                            </div>
                            <div class="mb-3">
                                <label>Phone</label>
                                <input type="text" name ="phone" class="form-control" placeholder="Enter Student Name">
                            </div>
                            <button type="submit" name="add_stu_btn" class="btn btn-primary">Sign_up</button>
                        </fieldset>
                        </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>





    <?php include(__DIR__ . '/../includes/footer.php');?>
