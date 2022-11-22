<?php
require "./../DB/config.php";
if (!isset($_SESSION['userid'])) {
    $tmp = new DB();
    $tmp->init();
    $query = "UPDATE apprenant SET nom = '{$_POST['nom']}', prenom = '{$_POST['prenom']}', classe = '{$_POST['classe']}', annee = {$_POST['annee']} WHERE id = {$_POST['id']};";
    //echo $query;
    $tmp->conn->query($query);
    if (isset($_POST['mdp'])) {
        $option = [
            'cost' => 12,
        ];
        $mdp = password_hash($_POST['mdp'], PASSWORD_BCRYPT, $option);
        $query = "UPDATE apprenant SET mdp = '{$mdp}' WHERE id = {$_SESSION['userid']};";
        $tmp->conn->query($query);
    }
    $tmp->close();
    header("Location: ./../settings.php");
    exit();
} else {
    header("Location: ./../index.php");
    exit();
}