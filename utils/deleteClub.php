<?php
    require_once "./../DB/config.php";

    if(!isset($_SESSION["userid"])){
        $tmp = new DB();
        $tmp->init();
        $query = "DELETE FROM club WHERE id = {$_POST["id"]};";
        echo $query;
        $tmp->conn->query($query);
        unlink("./../assets/clubs/{$_POST['image']}");
        $tmp->close();
        header("Location: ./../index.php");
    }else
        header("Location: ./../index.php");
