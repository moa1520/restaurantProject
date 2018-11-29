<?php
    $q = $_REQUEST['q'];
    $hint = "";

    $con = mysqli_connect('localhost','root','kang1318','user_db');
    $query = "SELECT name FROM users";
    $result = mysqli_query($con, $query);
    while($row = mysqli_fetch_array($result)) {
        $a[] = $row[0];
    }

    if($q !== "") {
        $q = strtolower($q);
        $len = strlen($q);
        foreach($a as $name) {
            if(stristr($q, substr($name,0,$len))) {
                if($hint === "") {
                    $hint = $name;
                } else {
                    $hint .= ", $name";
                }
            }
        }
    }

    echo $hint==="" ? "no suggestion" : $hint;
?>