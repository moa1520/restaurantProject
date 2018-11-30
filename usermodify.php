<?php
    session_start();
    if(isset($_GET['word'])) {
        echo "<script> alert('새로운 비밀번호끼리 맞지 않습니다') </script>";
    }
    if(isset($_GET['current'])) {
        echo "<script> alert('현재 비밀번호가 맞지 않습니다') </script>";
    }

    $username = $_SESSION['login'];

    $con = mysqli_connect('localhost','root','kang1318','user_db');
    $query = "SELECT * FROM users WHERE name='$username'";
    $result = mysqli_query($con, $query);
    $row = mysqli_fetch_array($result);
?>
<html lang="ko-KR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>회원정보 수정</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container">
        <div align="center">
            <h2><p style="color:forestgreen"><b>MODIFY</b></p></h2>
            <form action="usermodify_ok.php" method="post">
                <table>
                    <tbody align="center">
                    <tr>
                        <td>
                            <div class="form-group">ID</div>
                        </td>
                        <td>
                        <div class="form-group">
                            <input type="text" size="30" readonly class="form-control-plaintext" value="<?=$username?>">
                        </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="form-group">Password</div>
                        </td>
                        <td>
                        <div class="form-group">
                            <input type="password" class="form-control" name="password" placeholder="Password">
                        </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="form-group">New password</div>
                        </td>
                        <td>
                        <div class="form-group">
                            <input type="password" class="form-control" name="newpass1" placeholder="New password">
                        </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="form-group">Retype password</div>
                        </td>
                        <td>
                        <div class="form-group">
                            <input type="password" class="form-control" name="newpass2" placeholder="New password">
                        </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="form-group">E-mail</div>
                        </td>
                        <td>
                        <div class="form-group">
                            <input type="text" class="form-control" name="email" value="<?=$row['email']?>">
                        </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <button type="submit" class="btn btn-success btn-md btn-block">MODIFY</button>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </form>
            <a href="index.php"><b>Home</b></a>
        </div>
    </div>
</body>

</html>