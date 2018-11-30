<?php
session_start();

$con = mysqli_connect('localhost','root','kang1318','user_db');
if(isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if(empty($_POST['username'])) {
        echo "<script> alert('Please enter your ID') </script>";
    }
    if(empty($_POST['password'])) {
        echo "<script> alert('Please enter your password') </script>";
    }

    $query = "SELECT name, pass FROM users WHERE name='$username' AND pass='$password'";
    $result = mysqli_query($con, $query);

    if(mysqli_num_rows($result) > 0) {
        $_SESSION['login'] = $username;
        header("Location: index.php");
    } else {
        echo "<script> alert('Wrong username or password') </script>";
    }
}
?>
<html lang="ko-KR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>로그인</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script>
        function showHint(str) {
            if(str.length==0) {
                document.getElementById("hint").innerHTML="";
                return;
            }
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if(xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    document.getElementById("hint").innerHTML = xmlhttp.responseText;
                }
            }
            xmlhttp.open("GET","gethint.php?q="+str,true);
            xmlhttp.send();
        }
    </script>
</head>

<body>
    <div class="container">
        <div align='center'>
                <h2><p style="color:forestgreen"><b>Login</b></p></h2>
                <form method="post" action="login.php">
                    <table>
                        <tbody align='center'>
                            <tr>
                                <td colspan="2">
                                    <div class="form-group">
                                        <input type="text" size="60" name="username" class="form-control" placeholder="ID" onkeyup="showHint(this.value)">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <div class="form-group">
                                        <input type="password" name="password" class="form-control" placeholder="Password">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <p align='left'>Suggestion: <span id="hint"></span></p>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <button type="submit" class="btn btn-success btn-lg btn-block" name="submit">Login</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </form>
                <b>Aren't you a member? <a href="registration.php"> Registration </a></b>
            </div>
    </div>
</body>

</html>