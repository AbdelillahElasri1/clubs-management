<?php
    require "./../DB/config.php";
    if(!isset($_SESSION['userid'])){
        if(isset($_FILES['img_club'])){
            $tmp = new DB();
            $tmp->init();
            $query = "INSERT INTO club(nom, titre, img_club) VALUES ('{$_POST['nom']}', '{$_POST['titre']}', '{$_FILES['img_club']['name']}')";
            $tmp->conn->query($query);
            move_uploaded_file($_FILES['img_club']['tmp_name'], "/var/www/html/assets/clubs/".$_FILES['img_club']['name']);
        }
        header("Location: ./../index.php");
        die;
    }
    else{
        return header("Location: ./../index.php");
    }
?>