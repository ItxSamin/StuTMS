    <?php 
    include(__DIR__ . '/../includes/header.php');
    
    
    ?>


<div class="container">
    <div class="row" style="margin-top: 10vh;">
        <div class="col-md-10">
            <div class="card" style="padding: 20px;">
                <div class="card-header">
                    <h4>Admin_signup</h4>
                </div>
                <div class="card-body">
                    <form action= "/process" method="POST" style="margin-top: 20px;margin-right: 30vh;">
                            <div class="mb-3">
                                <label>User_name</label>
                                <input type="text" name ="username" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Pasword</label>
                                <input type="text" name ="password" class="form-control">
                            </div>
                            <button type="submit" name="signup_btn" class="btn btn-primary">Sign_up</button>
                        </fieldset>
                        </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>





    <?php include(__DIR__ . '/../includes/footer.php');?>
