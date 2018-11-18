<?php
session_start();

$con = mysqli_connect('localhost','root','kang1318','user_db');
if(isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];

    if(empty($_POST['username']) || empty($_POST['password']) || empty($_POST['email'])) {
        echo "<script> alert('Please enter all required field!') </script>";
    } else {
        $query = "SELECT * FROM users WHERE name='$username' OR email='$email'";
        $result = mysqli_query($con, $query);

        if(mysqli_num_rows($result) > 0) {
            header("Location: registration.php?MSG=Username:$username or E-mail:$email is already exist, please use another one!");
        } else {
            $query = "INSERT INTO users(name, pass, email) VALUES('$username','$password','$email')";
            if(mysqli_query($con, $query)) {
                $_SESSION['login'] = $username;
                header("Location: index.php");
            }
        }
    }
}
?>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>회원가입</title>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>
<?php
if(isset($_GET['MSG'])) {
    echo $_GET['MSG'];
}
?>
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <h2>회원가입</h2>
                <form method="post" action="registration.php">
                    <table class="table">
                        <tr>
                            <td>UserName</td>
                            <td><input type="text" name="username"></td>
                        </tr>
                        <tr>
                            <td>Password</td>
                            <td><input type="password" name="password"></td>
                        </tr>
                        <tr>
                            <td>E-mail</td>
                            <td><input type="text" name="email"></td>
                        </tr>
                        <tr>
                            <td colspan="2">
                            <button type="submit" class="btn btn-default" name="submit">Sign-up</button>
                            </td>
                        </tr>
                    </table>
                </form>
                <b>Already registered? <a href="login.php"> Login </a></b>
            </div>
        </div>
    </div>
</body>
</html>