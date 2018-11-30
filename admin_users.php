<?php
session_start();
if(!isset($_SESSION['adminlogin'])) {
    header("Location: index.php");
}
?>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>관리자 페이지</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
<h1> Admin Panel for Users Management </h1>
<table class="table table-striped">
    <thead>
        <tr>
            <th>id</th>
            <th>name</th>
            <th>password</th>
            <th>e-mail</th>
            <th>password modify</th>
            <th>delete</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $con = mysqli_connect('localhost','root','kang1318','user_db');
        $query = "SELECT * FROM users order by id DESC";
        $result = mysqli_query($con, $query);

        while($row = mysqli_fetch_array($result)) {
            $id = $row[0];
            $username = $row[1];
            $password = $row[2];
            $email = $row[3];
            ?>
        <tr>
            <td> <?=$id?> </td>
            <td> <?=$username?> </td>
            <td> <?=$password?> </td>
            <td> <?=$email?> </td>
            <td>
                <a href="modify.php?mod=<?=$id?>&name=<?=$username?>" class="btn btn-success" role="button">Modify</a>
            </td>
            <td>
                <a href="delete.php?del=<?=$id?>" class="btn btn-danger" role="button" onclick="return confirm('정말 삭제할까요?');">Delete</a>
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>
<a href='logout.php' class='btn btn-default' role='button'>LOGOUT</a>
</div>
</body>
</html>