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
        <div class="row">
            <div class="col-sm-4">
                <h2>로그인</h2>
                <form method="post" action="login.php">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>PASSWORD</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <div class="form-group">
                                        <input type="text" name="username" class="form-control" placeholder="Enter ID" onkeyup="showHint(this.value)">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="password" name="password" class="form-control" placeholder="Enter Password">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <p>Suggestion: <span id="hint"></span></p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <button type="submit" class="btn btn-default" name="submit">Submit</button>
                                </td>
                                <td>
                                    <a href="registration.php" class="btn btn-default" role="button">Registration</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </form>
            </div>
        </div>
    </div>
</body>

</html>