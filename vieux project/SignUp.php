<?php
    $servername = "localhost";
    $username = "betatester";
    $password = "password";
    $database = "QTIphp";
    $table = "users";
    // Récupérer les données soumises dans le formulaire
    $user=$_POST['user'];
    $email =  $_POST['email'];
    $password = $_POST['password'];

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO $table (user, email, password) 
            VALUES ('$user', '$email', '$password')";
        // use exec() because no results are returned
        $conn->exec($sql);
    } catch(PDOException $e) {
    }

    $conn = null;
?>