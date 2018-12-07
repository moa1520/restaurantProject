<?php
    session_start();
    $con = mysqli_connect('localhost','root','kang1318','user_db');
    $id = $_GET['id'];
    $board = $_POST['board'];
    $title = $_POST['title'];
    $comment = $_POST['comment'];
    $error = $_FILES['image']['error'];

    if($error == UPLOAD_ERR_NO_FILE) {
        $query = "UPDATE post SET board='$board', title='$title', comment='$comment' WHERE id='$id'";
        if(mysqli_query($con, $query)) {
            header("Location: index.php?done=1");
        }
    } else {
        $file = $_FILES['image']['tmp_name'];
    }

    if(isset($file)) {
        $image_data = addslashes(file_get_contents($_FILES['image']['tmp_name']));
        $image_name = addslashes($_FILES['image']['name']);
        $image_size = getimagesize($_FILES['image']['tmp_name']);

        if($image_size == FALSE) {
            echo "<script> alert('사진이 아닙니다') </script>";
        } else {
            $query = "UPDATE post SET board='$board', title='$title', data='$image_data', comment='$comment' WHERE id='$id'";

            if(!mysqli_query($con, $query)) {
                echo "Problem in uploading image" . mysqli_error($con);
            } else {
                header("Location: index.php?done=1");
            }
        }
    }
?>