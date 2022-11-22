<?php
require_once "./../DB/config.php";
session_start();
if (isset($_SESSION['userid'])) {
    $tmp = new DB();
    $tmp->init();
    $query = "DELETE FROM apprenant WHERE id = {$_POST['id']};";
    //echo $query;
    $tmp->conn->query($query);
    unlink("./../assets/apprenants/{$_POST['image']}");
    $tmp->close();
    header("Location: ./../index.php");
} else
    header("Location: ./../index.php");
