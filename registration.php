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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
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
        <div align="center">
            <h2><p style="color:forestgreen"><b>Registration</b></p></h2>
            <form method="post" action="registration.php">
                <table>
                    <tbody align='center'>
                        <tr>
                            <td>
                                <div class="form-group">
                                    <input type="text" size="60" name="username" placeholder="ID" class="form-control">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-group">
                                    <input type="password" name="password" placeholder="Password" class="form-control">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-group">
                                    <input type="text" name="email" placeholder="E-mail" class="form-control">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <button type="submit" class="btn btn-success btn-lg btn-block" name="submit">Sign-up</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </form>
            <b>Already registered? <a href="login.php"> Login </a></b>
        </div>
    </div>
</body>
</html>