<?php
    session_start();
    $username = $_SESSION['login'];
    $con = mysqli_connect('localhost','root','kang1318','user_db');
    $query = "SELECT * FROM users WHERE name='$username'";
    $result = mysqli_query($con, $query);
    $row = mysqli_fetch_array($result);

    if(isset($_GET['nopw'])) {
        echo "<script> alert('비밀번호를 입력하세요') </script>";
    }
    if($_POST['password'] == "") {
        header("Location: usermodify.php?nopw=1");
    }
    if($_POST['newpass1'] != "") {
        $newpass = $_POST['newpass1'];
        $newemail = $_POST['email'];

        if($_POST['newpass1'] == $_POST['newpass2'] && $_POST['password'] == $row['pass']) {
            $query = "UPDATE users SET pass='$newpass', email='$newemail' WHERE name='$username'";
            if(mysqli_query($con, $query)) {
                header("Location: index.php?done=1");
            }
        } else {
            if($_POST['newpass1'] != $_POST['newpass2']){
                header("Location: usermodify.php?word=1");
            } else {
                header("Location: usermodify.php?current=1");
            }
        }
    } else {
        if($_POST['password'] == $row['pass']) {
            $newemail = $_POST['email'];
            $query = "UPDATE users SET email='$newemail' WHERE name='$username'";
            if(mysqli_query($con, $query)){
                header("Location: index.php?done=1");
            }
        } else {
            header("Location: usermodify.php?current=1");
        }
    }
?>