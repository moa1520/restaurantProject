<?php
$con = mysqli_connect('localhost','root','kang1318','user_db');
$mod_id = $_GET['mod'];
$mod_name = $_GET['name'];
$newpass = $_POST['password1'];
$query = "UPDATE users SET pass='$newpass' WHERE id='$mod_id'";
if($_POST['password1'] == $_POST['password2']) {
    if(mysqli_query($con, $query)) {
        header("Location: admin_users.php");
    }
} else {
    $word = "";
    header("Location: modify.php?mod=$mod_id&name=$mod_name&word=$word");
}
?>