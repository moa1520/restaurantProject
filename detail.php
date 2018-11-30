<?php
    session_start();
    $id = $_GET['id'];
    $con = mysqli_connect("localhost","root","kang1318","user_db");
    $query = "SELECT * FROM post WHERE id='$id'";
    $result = mysqli_query($con, $query);
    $row = mysqli_fetch_array($result);

    function change($str) {
        switch($str) {
            case 'hansung':
                return "한성대학교";
                break;
            case 'kookmin':
                return "국민대학교";
                break;
            case 'hongik':
                return "홍익대학교";
                break;
            case 'konkuk':
                return "건국대학교";
                break;
            case 'kyunghee':
                return "경희대학교";
                break;
            case 'hanyang':
                return "한양대학교";
                break;
        }
    }
    $university = change($row['board']);
?>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title><?=$row['title']?></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="row" style="padding: 10px">
                    <a href="index.php" style="color: black; text-decoration: none"><h2><p style="color:black; font-weight:bold">대학 맛집 리스트</p></h2></a>
                </div>
                <div>
                    <div class="list-group">
                        <?php
                        if(!isset($_SESSION['login'])) {
                            echo "<a href='login.php' class='btn btn-success' role='button'>LOGIN</a>";
                            echo "<a href='registration.php' class='btn btn-light' role='button' style='margin-top:10px'>REGISTRATION</a>";
                        } else { ?>
                        <p style="font-size:16pt; color:forestgreen">Welcome <b><?= $_SESSION['login'] ?></b></p>
                        <a href='usermodify.php' class='btn btn-success' role='button'>MODIFY</a>
                        <a href="logout.php" class='btn btn-danger' role='button' style="margin-top:10px">LOGOUT</a>
                        <?php } ?>
                        <br>
                        <a href="#" class="list-group-item list-group-item-action list-group-item-light"><b>전체보기</b><br>View All</a>
                        <a href="#" class="list-group-item list-group-item-action list-group-item-light"><b>한성대학교</b><br>Hansung University</a>
                        <a href="#" class="list-group-item list-group-item-action list-group-item-light"><b>국민대학교</b><br>Kokmin University</a>
                        <a href="#" class="list-group-item list-group-item-action list-group-item-light"><b>홍익대학교</b><br>Hongik University</a>
                        <a href="#" class="list-group-item list-group-item-action list-group-item-light"><b>건국대학교</b><br>Konkuk University</a>
                        <a href="#" class="list-group-item list-group-item-action list-group-item-light"><b>경희대학교</b><br>Kyunghee University</a>
                        <a href="#" class="list-group-item list-group-item-action list-group-item-light"><b>한양대학교</b><br>Hanyang University</a>
                        <br>
                        <form class="form-inline my-2 my-lg-0">
                            <input class="form-control mr-sm-3" type="search" placeholder="Search">
                            <button class="btn btn-success my-2 my-sm-0" type="submit">Search</button>
                        </form>
                        <br>
                        <?php
                            if(!isset($_SESSION['login'])) {
                                echo "<a href='admin_login.php' class='btn btn-light' role='button'>ADMIN LOGIN</a>";
                            }?>
                    </div>
                </div>

            </div>
            <div class="col-sm-9">
                <div class="page-header">
                    <h1>전체 대학교 맛집 리스트</h1>
                </div>
                <div class="card sm-3">
                    <img class="card-img-top" src="view.php?id=<?=$row['id']?>" alt="Card image cap" height="500">
                    <div class="card-body">
                        <h5 class="card-title"><b><?=$row['title']?></b></h5>
                        <p class="card-text"><?=$row['comment']?></p>
                        <p class="card-text"><small class="text-muted">작성자 : <?=$row['username']?></small></p>
                        <p class="card-text"><small class="text-muted"><?=substr($row['regdate'],5,11)?></small></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>