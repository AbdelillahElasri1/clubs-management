<?php
    require "./../DB/config.php";
    if(!isset($_SESSION['userid'])){
        $tmp = new DB();
        $tmp->init();
        $query = "UPDATE apprenant SET responsable = true WHERE {$_POST["club_id"]};";
        $tmp->conn->query($query);
        header("Location: ./../club.php?id={$_POST["club_id"]}");
    }
    else{
        header("Location: ./../index.php");
        exit();
    }
?>