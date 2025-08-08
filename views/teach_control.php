    <?php session_start();
    include('includes/header.php');
    
            auth();
            t_auth();
    $connection = mysqli_connect("localhost", "root", "", "stutms");
    $queryu = "SELECT * FROM teachers WHERE id = '{$_SESSION['username']}'";
    $querym = "SELECT teachers.Teacher_name, messages.message 
           FROM messages, teachers 
           WHERE messages.to_id = '{$_SESSION['username']}' 
           AND messages.status = '0' 
           AND teachers.id = messages.from_id";
    $queryup = "UPDATE messages SET status = '1' WHERE to_id = '{$_SESSION['username']}'";
    $querym_run = mysqli_query($connection, $querym);
    $num_rows = mysqli_num_rows($querym_run);

    $query_runu = mysqli_query($connection, $queryu);
    $verifyu = mysqli_fetch_array($query_runu);
?>
        <nav class="navbar navbar-expand-lg" style = "border-bottom: 4px solid #23d0e3ff">
        <div class="container-fluid">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                <div class="dropdown">
                    <a class="dropdown-toggle fa-solid fa-bell" id = "ntf_btn"  data-bs-toggle="dropdown" aria-expanded="false" style = "font-size: 20px; color: blue; cursor: pointer;" onmouseover="this.style.color='#b9bcbcff'" onmouseout="this.style.color='blue'">
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" style = "font-size: 10px">
                            <?php echo $num_rows;?>
                        </span>
                        
                    </a>

                    <ul class="dropdown-menu" id = "ntf">
                        
                        
                    </ul>
                    </div>
                </li>
            </ul>
            <div class="d-flex">
                <a class="btn btn-primary" href="/post" style = "bg-color: #23d0e3ff">Message</a>
                </div>

            </div>
        </div>
        </nav>
      <div class="container">
        <div class="row">
            <div class="col-md-12 mt-5" >
                <div class="card">
                    <div class="card-header" style = "background-color: #23d0e3ff">
                        <h4>Student_Results</h4>
                        <a href="/entry" class="btn btn-primary float-right">Add-Result</a>
                        <a href="/logout" class="btn btn-danger" style = "float: right; margin-left: 5px;">Logout</a>
                        <h5 style = "float: right; background-color: #c5edf2ff; border-radius: 5px; padding: 5px">Teacher Name: <?php echo $verifyu['Teacher_name']; ?></h5>
                    </div>
                    <div class="card-body">
                        <?php
                        $query = "SELECT * FROM results WHERE Teacher_id = '{$_SESSION['username']}'";
                        $query_run = mysqli_query($connection, $query);
                        if(mysqli_num_rows($query_run) > 0)
                        {?>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                <th scope="col">Test_num</th>
                                <th scope="col">Name</th>
                                <th scope="col">Total-marks</th>
                                <th scope="col">Obtained Marks</th>
                                <th scope="col">Edit</th>
                                <th scope="col">Delete</th>
                                </tr>
                            </thead>
                            <?php
                            while ($reg_row = mysqli_fetch_array($query_run)) {
                            $queryn = "SELECT Name FROM students WHERE Roll_num = '{$reg_row['Student_id']}'";
                            $reg_n = mysqli_fetch_array(mysqli_query($connection, $queryn))

                                ?>
                            <tbody>
                                <tr>
                                <th><?php echo($reg_row['Test_num'])?></th>
                                <td><?php echo($reg_n['Name'])?></td>
                                <td><?php echo($reg_row['Total_marks'])?></td>
                                <td><?php echo($reg_row['Obtained_marks'])?></td>
                                <td><a href="/edit_form/<?php echo($reg_row['id'])?>" class="btn btn-info">Edit</a></td>
                                <td>
                                    <form action="/process" method="POST">
                                            <input type="hidden" name ="result_id" class="form-control" value = "<?php echo $reg_row['id'];?>">
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
                    <div class="card-footer" style = "background-color: #23d0e3ff">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- <script type="text/javascript">
        $(document).ready(function(){
            $('#ntf_btn').click(function(){
                $.ajax({
                    url: '/notif_chk',
                    type: 'POST',
                    success: function(response){
                        $('#ntf').html(response);
                    }
                })
            })
        })
    </script> -->

    <script type="text/javascript">
$(document).ready(function(){
    function updateCount() {
        $.ajax({
            url: '/unread',
            type: 'GET',
            success: function(count) {
                $('.badge').text(count);
            }
        });
    }

    
    function loadNotifications() {
        $.ajax({
            url: '/notif_chk',
            type: 'POST',
            data: { read: 'true' },
            success: function(response) {
                $('#ntf').html(response);
                updateCount();
            }
        });
    }

   
    setInterval(updateCount, 10000);

    $('#ntf_btn').click(function(){
        loadNotifications();
    });
});
</script>

    <?php include('includes/footer.php');?>