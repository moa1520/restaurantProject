<?php
session_start();
?>
<html lang="ko-KR">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>대학별 맛집</title>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="row" style="padding: 10px">
                    <a href="index.php" style="color: black; text-decoration: none"><h2>대학 맛집 리스트</h2></a>
                    <?php
                    if(!isset($_SESSION['login'])) {
                        echo "<a href='login.php' class='btn btn-default' role='button'>로그인</a>";
                    } else { ?>
                    <h2><small>Welcome <?= $_SESSION['login'] ?></small>
                    <a href="logout.php" class="btn btn-default" role="button">Logout</a></h2>
                    <?php } ?>
                </div>
                <div class="row" style="padding: 10px">
                    <div class="list-group">
                        <a href="#" class="list-group-item">
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
                        </a>
                        <br>
                        <?php
                            if(!isset($_SESSION['login'])) {
                                echo "<a href='admin_login.php' class='btn btn-default' role='button'>관리자 로그인</a>";
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
                    <h1>xx대학교 맛집 리스트</h1>
                </div>
                <!-- <?php
                    $con = mysqli_connect('localhost','root','kang1318','user_db');
                    $query = "SELECT * FROM post";
                    $result = mysqli_query($con, $query);

                    while($row = mysqli_fetch_assoc($result)) {
                        $id = $row['id'];
                        $title = $row['title'];
                        $image = $row['data'];
                        $comment = $row['comment'];
                ?> -->
                <a href="#">
                    <div class="col-sm-4">
                        <div class="thumbnail">
                            <img src="https://www.w3schools.com/w3images/lights.jpg" style="width=100%">
                            <!-- <?php echo $image; ?> -->
                            <div class="caption">
                                <p>Lorem ipsum donec id elit non mi porta gravida at eget metus.</p>
                                <!-- <p><?=$id?></p> -->
                            </div>
                        </div>
                    </div>
                </a>
                <!-- <?php } ?> -->
                <a href="#">
                    <div class="col-sm-4">
                        <div class="thumbnail">
                            <img src="https://www.w3schools.com/w3images/nature.jpg" style="width=100%">
                            <div class="caption">
                                <p>Lorem ipsum donec id elit non mi porta gravida at eget metus.</p>
                            </div>
                        </div>
                    </div>
                </a>
                <a href="#">
                    <div class="col-sm-4">
                        <div class="thumbnail">
                            <img src="https://www.w3schools.com/w3images/fjords.jpg" style="width=100%">
                            <div class="caption">
                                <p>Lorem ipsum donec id elit non mi porta gravida at eget metus.</p>
                            </div>
                        </div>
                    </div>
                </a>
                <div class="col-sm-12" align="right">
                    <a href='write.php' class='btn btn-primary' role='button'>글쓰기</a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>