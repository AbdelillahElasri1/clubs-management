<?php
require "./../DB/config.php";
if (!isset($_SESSION['userid'])) {
    $tmp = new DB();
    $tmp->init();
    $query = "UPDATE apprenant SET nom = '{$_POST['nom']}', prenom = '{$_POST['prenom']}', classe = '{$_POST['classe']}', annee = {$_POST['annee']} WHERE id = {$_POST['id']};";
    //echo $query;
    $tmp->conn->query($query);
    // if (isset($_POST['image'])) {
    //     unlink("./../assets/apprenants/{$_POST['img_profile']}");
    //     move_uploaded_file($_FILES['image']['tmp_name'], "/var/www/html/assets/apprenants/" . $_FILES['image']['name']);
    // }
    header("Location: ./../club.php?id={$_POST['club_id']}");
    exit();
} else {
    header("Location: ./../club.php?id={$_POST['club_id']}");
    exit();
}
