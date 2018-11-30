<?php
    session_start();
    $con = mysqli_connect("localhost","root","kang1318","user_db");

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $error = $_FILES['image']['error'];

        $username = $_SESSION['login'];

        if(empty($_POST['title'])) {
            echo "<script> alert('제목을 입력해주세요') </script>";
        } else {
            $title = $_POST['title'];
        }

        if($_POST['board'] == "") {
            echo "<script> alert('학교를 선택해주세요') </script>";
        } else {
            $board = $_POST['board'];
        }

        if($error != UPLOAD_ERR_OK) {
            echo "<script> alert('사진을 업로드 해주세요') </script>";
        } else {
            $file = $_FILES['image']['tmp_name'];
        }

        if(empty($_POST['comment'])) {
            echo "<script> alert('내용을 입력해주세요') </script>";
        } else {
            $comment = $_POST['comment'];
        }

        if(isset($file)) {
            $image_data = addslashes(file_get_contents($_FILES['image']['tmp_name']));
            $image_name = addslashes($_FILES['image']['name']);
            $image_size = getimagesize($_FILES['image']['tmp_name']);

            if($image_size == FALSE) {
                echo "<script> alert('사진이 아닙니다') </script>";
            } else {
                $sql = "INSERT INTO post VALUES(NULL, '$username', '$board', '$title', '$image_name','$image_data', '$comment')";

                if(!mysqli_query($con, $sql)) {
                    echo "Problem in uploading image" . mysqli_error($con);
                } else {
                    header("Location: index.php");
                }
            }
        }
    }
?>
<html lang="ko-KR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>맛집 작성</title>
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
                    <h1>맛집 작성</h1>
                </div>
                <div class="form-group">
                    <label>ID</label>
                    <input type="text" class="form-control" placeholder="<?=$_SESSION['login']?>" disabled>
                </div>
                <form action="write.php" method="POST" enctype="multipart/form-data">
                    <label>학교</label>
                    <select name="board">
                        <option value="">학교 선택</option>
                        <option value="hansung">한성대학교</option>
                        <option value="kookmin">국민대학교</option>
                        <option value="hongik">홍익대학교</option>
                        <option value="konkuk">건국대학교</option>
                        <option value="kyunghee">경희대학교</option>
                        <option value="hanyang">한양대학교</option>
                    </select>
                    <div class="form-group">
                        <label>제목</label>
                        <input type="text" class="form-control" name="title" placeholder="게시글 제목을 입력하세요">
                    </div>
                    <div class="form-group">
                        <label>사진</label>
                        <input type="file" name="image">
                    </div>
                    <div class="form-group">
                        <label>내용</label>
                        <textarea class="form-control" rows="5" name="comment" placeholder="내용을 입력하세요"></textarea>
                    </div>
                    <div class="col-sm-12" align="right">
                        <button type="submit" class="btn btn-primary" name="submit">CONFIRM</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>