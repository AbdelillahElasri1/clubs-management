<?php
    require "./../DB/config.php";
    if(!isset($_SESSION['userid'])){
        $tmp = new DB();
        $tmp->init();
        $query = "UPDATE apprenant SET responsable = 0 WHERE responsable = 1;";
        //echo $query;
        $tmp->conn->query($query);
        $query = "UPDATE apprenant SET responsable = 1 WHERE id = {$_POST["apprenant"]};";
        $tmp->conn->query($query);
        //echo $query;
        header("Location: ./../club.php?id={$_POST["club_id"]}");
    }
    else{
        header("Location: ./../index.php");
        exit();
    }
?>