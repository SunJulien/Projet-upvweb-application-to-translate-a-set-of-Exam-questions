<?php
    $user = "example_user";
    $password = "password";
    $database = "example_database";
    $table = "todo_list";
    // Récupérer les données soumises dans le formulaire
    $nom = $_POST['nom'];
    $email = $_POST['email'];
    require_once('db.php');

    try {
        $db = new PDO("mysql:host=localhost;dbname=$database", $user, $password);
        foreach($db->query("SELECT content FROM $table") as $row) {
            echo "<li>" . $row['content'] . "</li>";
        }
        echo "</ol>";
    } catch (PDOException $e) {
        print "Error!: " . $e->getMessage() . "<br/>";
        die();
    }
?>


