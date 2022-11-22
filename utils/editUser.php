<?php
require "./../DB/config.php";
session_start();
print_r($_SESSION);
if (isset($_SESSION['userid'])) {
    $tmp = new DB();
    $tmp->init();
    $query = "UPDATE user SET nom = '{$_POST['nom']}', prenom = '{$_POST['prenom']}', classe = '{$_POST['classe']}', annee = {$_POST['annee']} WHERE id = {$_POST['id']};";
    //echo $query;
    $tmp->conn->query($query);
    if (isset($_POST['mdp'])) {
        //echo $_POST["mdp"] . "\n";
        $option = [
            'cost' => 12,
        ];
        $mdp = password_hash($_POST['mdp'], PASSWORD_BCRYPT, $option);
        $query = "UPDATE user SET mdp = '{$mdp}' WHERE id = {$_SESSION['userid']};";
        //echo $query;
        $tmp->conn->query($query);
    }
    $tmp->close();
    header("Location: ./../settings.php");
    exit();
} else {
    header("Location: ./../index.php");
    exit();
}
