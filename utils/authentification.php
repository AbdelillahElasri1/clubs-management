<?php
    require_once "./../DB/config.php";

    $email = $_POST["email"];
    $password = $_POST["password"];

    $db = new DB();
    $db->init();
    
    $query = "SELECT * FROM user WHERE email = '{$email}' LIMIT 1;";
    $result = $db->conn->query($query);
    $row = $result -> fetch_array(MYSQLI_NUM);
    // $option = [
    //     'cost' => 12,
    // ];

    // echo password_hash($password, PASSWORD_BCRYPT,$option)."   ////   ".$row[4];
    
    // echo password_verify($password, $row[4])."result";
    if(password_verify($password, $row[4])){
        session_start();
        $_SESSION['loggedin'] = true;
        $_SESSION['userid'] = $row[0];
        $_SESSION['nom'] = $row[2];
        $_SESSION['prenom'] = $row[3];
        header("Location: ./../index.php");
    }else
        header("Location: ./../login.php?error=error");

?>