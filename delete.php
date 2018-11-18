<?php
$con = mysqli_connect('localhost','root','kang1318','user_db');
$delete_id = $_GET['del'];
$query = "DELETE FROM users WHERE id='$delete_id'";
if(mysqli_query($con, $query)) {
    header("Location: admin_users.php");
}
?>