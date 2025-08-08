<?php
session_start();
$connection = mysqli_connect("localhost", "root", "", "stutms");
$query = "SELECT COUNT(*) as count FROM messages 
          WHERE to_id = '{$_SESSION['username']}' 
          AND status = '0'";
$result = mysqli_query($connection, $query);
$row = mysqli_fetch_assoc($result);

echo $row['count'];
?>