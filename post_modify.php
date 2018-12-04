<?php
    session_start();
    $id = $_GET['id'];
    $con = mysqli_connect('localhost','root','kang1318','user_db');
    $query = "SELECT * FROM post WHERE id='$id'";
    $result = mysqli_query($con, $query);
    $row = mysqli_fetch_array($result);
    $school = 0;
?>

<html lang="ko-KR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>글 수정</title>
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
                        <a href="index.php" class="list-group-item list-group-item-action list-group-item-light"><b>전체보기</b><br>View All</a>
                        <a href="hansung.php" class="list-group-item list-group-item-action list-group-item-light"><b>한성대학교</b><br>Hansung University</a>
                        <a href="kokmin.php" class="list-group-item list-group-item-action list-group-item-light"><b>국민대학교</b><br>Kokmin University</a>
                        <a href="hongik.php" class="list-group-item list-group-item-action list-group-item-light"><b>홍익대학교</b><br>Hongik University</a>
                        <a href="konkuk.php" class="list-group-item list-group-item-action list-group-item-light"><b>건국대학교</b><br>Konkuk University</a>
                        <a href="kyunghee.php" class="list-group-item list-group-item-action list-group-item-light"><b>경희대학교</b><br>Kyunghee University</a>
                        <a href="hanyang.php" class="list-group-item list-group-item-action list-group-item-light"><b>한양대학교</b><br>Hanyang University</a>
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
                    <h1>글 수정</h1>
                </div>
                <div class="form-group">
                    <label>ID</label>
                    <input type="text" class="form-control" placeholder="<?=$_SESSION['login']?>" disabled>
                </div>
                <form action="post_modify_ok.php?id=$id" method="POST" enctype="multipart/form-data">
                    <label>학교</label>
                    <?php
                        switch($row['board']) {
                            case 'hansung' :
                                $school = 1;
                                break;
                            case 'kookmin' :
                                $school = 2;
                                break;
                            case 'hongik' :
                                $school = 3;
                                break;
                            case 'konkuk' :
                                $school = 4;
                                break;
                            case 'kyunghee' :
                                $school = 5;
                                break;
                            case 'hanyang' :
                                $school = 6;
                                break;
                        }
                    ?>
                    <select name="board">
                        <option value="">학교 선택</option>
                        <option value="hansung" <?php if($school==1) {echo "selected";}?>>한성대학교</option>
                        <option value="kookmin" <?php if($school==2) {echo "selected";}?>>국민대학교</option>
                        <option value="hongik" <?php if($school==3) {echo "selected";}?>>홍익대학교</option>
                        <option value="konkuk" <?php if($school==4) {echo "selected";}?>>건국대학교</option>
                        <option value="kyunghee" <?php if($school==5) {echo "selected";}?>>경희대학교</option>
                        <option value="hanyang" <?php if($school==6) {echo "selected";}?>>한양대학교</option>
                    </select>
                    <div class="form-group">
                        <label>제목</label>
                        <input type="text" class="form-control" name="title" placeholder="게시글 제목을 입력하세요" value="<?=$row['title']?>">
                    </div>
                    <div class="form-group">
                        <label>사진</label>
                        <input type="file" name="image">
                    </div>
                    <div class="form-group">
                        <label>내용</label>
                        <textarea class="form-control" rows="5" name="comment" placeholder="내용을 입력하세요"><?=$row['comment']?></textarea>
                    </div>
                    <div class="col-sm-12" align="right">
                        <button type="submit" class="btn btn-primary" name="submit" onclick="return confirm('수정하시겠습니까?');">MODIFY</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>