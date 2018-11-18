<?php
session_start();
?>
<html lang="ko-KR">

<head>
    <meta charset="utf-8">
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
                    <h2>대학 맛집 리스트</h2>
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
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>사진</th>
                            <th>이름</th>
                            <th>정보</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>John</td>
                            <td>Doe</td>
                            <td>john@example.com</td>
                        </tr>
                        <tr>
                            <td>July</td>
                            <td>Dooley</td>
                            <td>july@example.com</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>