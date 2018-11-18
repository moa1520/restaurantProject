<?php
$con = mysqli_connect('localhost','root','kang1318','user_db');
if(isset($_GET['mod'])) {
    $mod_id = $_GET['mod'];
    $mod_name = $_GET['name'];
}
if(isset($_GET['word'])) {
    echo "<script> alert('Not matched each other') </script>";
}
?>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>비밀번호 변경</title>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
    <form action="modify_ok.php?mod=<?=$mod_id?>&name=<?=$mod_name?>" method='post'>
        <div class="row">
            <div class="col-sm-6">
                <h2>비밀번호 변경</h2>
                    <table class="table">
                        <tr>
                            <td>이름</td>
                            <td><?=$mod_name?></td>
                        </tr>
                        <tr>
                            <td>변경할 비밀번호 입력</td>
                            <td><input type="password" name="password1"></td>
                        </tr>
                        <tr>
                            <td>비밀번호 다시입력</td>
                            <td><input type="password" name="password2"></td>
                        </tr>
                        <tr>
                            <td colspan="2">
                            <button type="submit" class="btn btn-default" name="submit">Submit</button>
                            </td>
                        </tr>
                    </table>
                <b><a href="admin_users.php"> 뒤로가기 </a></b>
            </div>
        </div>
    </div>
</form>
</body>
</html>