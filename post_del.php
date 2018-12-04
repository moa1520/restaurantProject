<?php
    session_start();
    $id = $_GET['id'];
    $con = mysqli_connect('localhost','root','kang1318','user_db');
    $query = "DELETE FROM post WHERE id='$id'";
    if(mysqli_query($con,$query)) {
        header("Location: index.php");
    }
?>