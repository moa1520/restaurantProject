<?php
session_start();

if(isset($_GET['done'])) {
    echo "<script> alert('수정 완료되었습니다') </script>";
}

$con = mysqli_connect('localhost','root','kang1318','user_db');
$query = "SELECT id, title, data, comment FROM post order by id DESC";
$result = mysqli_query($con, $query);
$row = mysqli_fetch_array($result);

?>
<html lang="ko-KR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>대학별 맛집</title>
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
                        <!-- <ul class="list-group">
                            <li class="list-group-item">전체 보기</li>

                            <li class="list-group-item list-group-item-success"><b>한성대학교</b><br>Hansung University</li>
                            <li class="list-group-item list-group-item-success"><b>국민대학교</b><br>Kokmin University</li>
                            <li class="list-group-item list-group-item-success"><b>홍익대학교</b><br>Hongik University</li>
                            <li class="list-group-item list-group-item-success"><b>건국대학교</b><br>Konkuk University</li>
                            <li class="list-group-item list-group-item-success"><b>경희대학교</b><br>Kyunghee University</li>
                            <li class="list-group-item list-group-item-success"><b>한양대학교</b><br>Hanyang University</li>
                        </ul> -->
                        <a href="#" class="list-group-item list-group-item-action list-group-item-light"><b>전체보기</b><br>View All</a>
                        <a href="#" class="list-group-item list-group-item-action list-group-item-light"><b>한성대학교</b><br>Hansung University</a>
                        <a href="#" class="list-group-item list-group-item-action list-group-item-light"><b>국민대학교</b><br>Kokmin University</a>
                        <a href="#" class="list-group-item list-group-item-action list-group-item-light"><b>홍익대학교</b><br>Hongik University</a>
                        <a href="#" class="list-group-item list-group-item-action list-group-item-light"><b>건국대학교</b><br>Konkuk University</a>
                        <a href="#" class="list-group-item list-group-item-action list-group-item-light"><b>경희대학교</b><br>Kyunghee University</a>
                        <a href="#" class="list-group-item list-group-item-action list-group-item-light"><b>한양대학교</b><br>Hanyang University</a>
                        <!-- <a href="#" class="list-group-item">
                            <h4 class="list-group-item-heading">전체 보기</h4>
                            <p class="list-group-item-text">View All</p>
                        </a>
                        <a href="#" class="list-group-item">
                            <h4 class="list-group-item-heading">한성대학교</h4>
                            <p class="list-group-item-text">Hansung university</p>
                        </a>
                        <a href="#" class="list-group-item">
                            <h4 class="list-group-item-heading">국민대학교</h4>
                            <p class="list-group-item-text">Kookmin university</p>
                        </a>
                        <a href="#" class="list-group-item">
                            <h4 class="list-group-item-heading">홍익대학교</h4>
                            <p class="list-group-item-text">Hongik university</p>
                        </a>
                        <a href="#" class="list-group-item">
                            <h4 class="list-group-item-heading">건국대학교</h4>
                            <p class="list-group-item-text">Konkuk university</p>
                        </a>
                        <a href="#" class="list-group-item">
                            <h4 class="list-group-item-heading">경희대학교</h4>
                            <p class="list-group-item-text">Kyunghee university</p>
                        </a>
                        <a href="#" class="list-group-item">
                            <h4 class="list-group-item-heading">한양대학교</h4>
                            <p class="list-group-item-text">Hanyang university</p>
                        </a> -->
                        <br>
                        <?php
                            if(!isset($_SESSION['login'])) {
                                echo "<a href='admin_login.php' class='btn btn-light' role='button'>ADMIN LOGIN</a>";
                            }?>
                        
                        <!-- <a href="#" class="list-group-item">국민대학교</a>
                        <a href="#" class="list-group-item">홍익대학교</a>
                        <a href="#" class="list-group-item">건국대학교</a>
                        <a href="#" class="list-group-item">경희대학교</a>
                        <a href="#" class="list-group-item">한양대학교</a> -->
                    </div>
                </div>

            </div>
            <div class="col-sm-9">
                <div class="page-header">
                    <h1>전체 대학교 맛집 리스트</h1>
                </div>
                <?php
                    while($row) {
                ?>
                <a href="view.php?id=<?=$row['id']?>">
                    <div class="col-sm-4">
                        <div class="thumbnail" style="height:200px">
                            <img src="view.php?id=<?=$row['id']?>" style="width:100%; height:150px">
                            <div class="caption">
                                <p align='center'><b><?=$row['title']?></b></p>
                            </div>
                        </div>
                    </div>
                </a>
                <?php
                $row = mysqli_fetch_array($result);
                }
                ?>
                <div class="col-sm-12" align="right">
                    <?php 
                    if(isset($_SESSION['login'])) {
                        echo "<a href='write.php' class='btn btn-primary' role='button'>+ WRITE</a>";
                    }
                    ?>
                    <!-- <button type="submit" class="btn btn-primary" name="submit">+ WRITE</button> -->
                </div>
            </div>
        </div>
    </div>
</body>

</html>