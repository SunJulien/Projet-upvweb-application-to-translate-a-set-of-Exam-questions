<?php
    $servername = "localhost";
    $user = "example_user";
    $password = "password";
    $database = "question";
    $table = "question";
    // Récupérer les données soumises dans le formulaire
    $qType = str_replace("'", "''", $_POST['qType']);
    $libelle = str_replace("'", "''", $_POST['libelle']);
    $answer1 = str_replace("'", "''", $_POST['answer1']);
    $answer2 = str_replace("'", "''", $_POST['answer2']);
    $answer3 = str_replace("'", "''", $_POST['answer3']);
    $answer4 = str_replace("'", "''", $_POST['answer4']);
    $correct = str_replace("'", "''", $_POST['correct']);

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$database", $user, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO $table (qType, libelle, answer1, answer2, answer3 ,answer4 ,correct) 
        VALUES ('$qType', '$libelle', '$answer1', '$answer2', '$answer3', '$answer4', '$correct')";
        // use exec() because no results are returned
        $conn->exec($sql);
    } catch(PDOException $e) {
    }

    $conn = null;
?>


