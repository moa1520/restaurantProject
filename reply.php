<?php
    session_start();
    $username = $_SESSION['login'];
    $post_id = $_POST['id'];
    $comment = $_POST['comment'];
    $con = mysqli_connect('localhost','root','kang1318','user_db');
    $username = $_SESSION['login'];
    $query = "INSERT INTO reply VALUES(NULL, '$username','$post_id','$comment',now())";
    $result = mysqli_query($con, $query);

    if($result) {
        header("Location: detail.php?id=$post_id");
    } else {
        echo "Error";
    }
?>