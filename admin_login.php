<?php
session_start();

$con = mysqli_connect('localhost','root','kang1318','user_db');
if(isset($_POST['submit'])) {
    $adminname = $_POST['adminname'];
    $adminpass = $_POST['adminpass'];

    if(empty($_POST['adminname'])) {
        echo "<script> alert('Please enter your name!')</script>";
    }
    if(empty($_POST['adminpass'])) {
        echo "<script> alert('Please enter your password!')</script>";
    }

    $query = "SELECT name, pass FROM admin WHERE name='$adminname' AND pass='$adminpass'";
    $result = mysqli_query($con, $query);

    if(mysqli_num_rows($result) > 0) {
        $_SESSION['adminlogin'] = $adminname;
        header("Location: admin_users.php");
    } else {
        echo "<script> alert('Wrong name or password !')</script>";
    }
}
?>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>관리자 로그인</title>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
    <form method="post" action="admin_login.php">
    <div class="col-sm-4">
    <table class="table">
    <thead>
        <tr>
            <th colspan="2">Admin Login</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>
                Admin Name
            </td>
            <td>
                <input type="text" name="adminname">
            </td>
        </tr>
        <tr>
            <td>
                Admin Password
            </td>
            <td>
                <input type="password" name="adminpass">
            </td>
        </tr>
        <tr>
            <td colspan="2" align=center>
                <input type="submit" name="submit" value="Admin Log-in">
            </td>
        </tr>
        </tbody>
    </table>
    </div>
</form>
</div>
</body>
</html>