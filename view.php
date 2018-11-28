<?php
    $con = mysqli_connect('localhost','root','kang1318','user_db');
    extract($_REQUEST);
    $query = "SELECT * FROM post WHERE id=$id";
    $result = mysqli_query($con, $query);
    $row = mysqli_fetch_array($result);

    header("Content-type: image/jpeg");
    echo $row['data'];
    mysqli_close();
?>