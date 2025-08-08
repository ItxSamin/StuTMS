<?php 
session_start();

    $connection = mysqli_connect("localhost", "root", "", "stutms");
    
    $querym = "SELECT teachers.Teacher_name, messages.message 
           FROM messages, teachers 
           WHERE messages.to_id = '{$_SESSION['username']}' 
           AND messages.status = '0' 
           AND teachers.id = messages.from_id";
    $queryup = "UPDATE messages SET status = '1' WHERE to_id = '{$_SESSION['username']}' AND status = '0'"; 
    $querym_run = mysqli_query($connection, $querym);
    $num_rows = mysqli_num_rows($querym_run);

    if ($num_rows > 0){
                        while ($messages = mysqli_fetch_array($querym_run)){?><li>
                            <div class="card" style = "width: 300px; border-radius: 0px">
                                <div class="card-body" style = "text-align: left">
                                
                                    <p class="card-text" >
                                        <strong>
                                    <?php echo "From: "; echo $messages['Teacher_name']; ?> :
                                </strong>
                                        <?php echo $messages['message'];?></p>
                                </div>
                            </div>
                        </li><?php } } 
    
    
    if(isset($_POST['read']) && $_POST['read'] == 'true') {
    $queryup = "UPDATE messages SET status = '1' WHERE to_id = '{$_SESSION['username']}' AND status = '0'";
    mysqli_query($connection, $queryup);
}?>

    
