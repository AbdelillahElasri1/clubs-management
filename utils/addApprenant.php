<?php
require "./../DB/config.php";
session_start();
if (isset($_SESSION['userid'])) {
    if (isset($_FILES['image'])) {
        $tmp = new DB();
        $tmp->init();
        //vérification de l'existance de l'utilisateur
        //si oui
        $query =  "SELECT * FROM apprenant WHERE nom = '{$_POST['nom']}' AND prenom = '{$_POST['prenom']}';";
        $result = $tmp->conn->query($query);
        if ($result->num_rows >= 1) {
            header("Location: ./../club.php?id={$_POST['club_id']}&error=exist");
            exit();
        }
        //si non
        else {
            $query = "INSERT INTO apprenant(nom, prenom, classe, annee, img_profile, club_id) VALUES ('{$_POST['nom']}', '{$_POST['prenom']}', '{$_POST['classe']}', {$_POST['annee']}, '{$_FILES['image']['name']}', {$_POST['club_id']});";
            $tmp->conn->query($query);
            move_uploaded_file($_FILES['image']['tmp_name'], "/var/www/html/assets/apprenants/" . $_FILES['image']['name']);
            if (isset($_POST["represenant"])) {
                $query = "UPDATE apprenant SET responsable = true WHERE id = {$tmp->conn->insert_id};";
                $tmp->conn->query($query);
            }
            header("Location: ./../club.php?id={$_POST['club_id']}");
            exit();
        }
    }
} else {
    header("Location: ./../index.php");
    exit();
}
