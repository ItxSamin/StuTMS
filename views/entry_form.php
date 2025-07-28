    <?php 
    include(__DIR__ . '/../includes/header.php');
    
    
    ?>


<div class="container">
    <div class="row" style="margin-top: 10vh;">
        <div class="col-md-10">
            <div class="card" style="padding: 20px;">
                <div class="card-header">
                    <h4>Result Enter here!</h4>
                </div>
                <div class="card-body">
                    <form action= "/process" method="POST" style="margin-top: 20px;margin-right: 30vh;">
                            <div class="mb-3">
                                <label>Name</label>
                                <input type="text" name ="name" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Semester</label>
                                <input type="text" name ="semester" class="form-control">
                            </div><div class="mb-3">
                                <label>Total_Marks</label>
                                <input type="text" name ="tmarks" class="form-control">
                            </div><div class="mb-3">
                                <label>Obtained_Marks</label>
                                <input type="text" name ="omarks" class="form-control">
                            
                            </div>
                            <div class="mb-3">
                            </div>
                            <button type="submit" name="entry_btn" class="btn btn-primary">Enter</button>
                        </fieldset>
                        </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>





    <?php include(__DIR__ . '/../includes/footer.php');?>
