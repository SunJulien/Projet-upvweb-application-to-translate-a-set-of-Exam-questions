<!DOCTYPE html>
<html>
<head>
    <title> help</title>
    <title>upvsun website</title>

</head>
<body style="background-color: #f7f7f7">
    <?php
    ini_set('display_errors', 1);
    error_reporting(E_ALL);
    ob_start();
    $Content = $_POST['TextArea1'];
    $Filename = $_POST['filename']. ".xml";
    $Theme = $_POST['theme'];
    $lines = explode("\r\n", $Content);
    $question = "";
    // Créer un objet DOMDocument
    $doc = new DOMDocument('1.0', 'UTF-8');

    // Créer l'élément racine du document
    $bibliotheque = $doc->createElement('questestinterop');
    $doc->appendChild($bibliotheque);


    // Ajouter des éléments pour chaque livre
    $assessment = $doc->createElement("assessment");
    $assessment->setAttribute('ident', '333283');
    $assessment->setAttribute('title', $Theme);

    include ('xmlgeneral.php');

    // Parcourir les lignes et les afficher
    foreach ($lines as $line) {
        $line = htmlspecialchars($line);
        if (strlen($line) > 0){
            //Reconnais la premier balise
            if(strpos($line, "&lt;QF&gt;")!== false){
                $question= "&lt;QF&gt;";
                $line = str_replace("&lt;QF&gt;", "", $line);
            }
            if(strpos($line, "&lt;QN&gt;")!== false){
                $question= "&lt;QN&gt;";
                $line = str_replace("&lt;QN&gt;", "", $line);
            }
            if(strpos($line, "&lt;QM&gt;")!== false){
                $question= "&lt;QM&gt;";
                $line = str_replace("&lt;QM&gt;", "", $line);
            }
            //Efface la balisede fin
            if(strpos($line, "&lt;/Q&gt;")!== false){
                $line = str_replace("&lt;/Q&gt;", "", $line);
            }
            //Va dans le programme en fonction de la balise reconnue
            if($question== "&lt;QF&gt;"){
                include ('fill.php');
            }
            if($question== "&lt;QN&gt;"){
                include ('number.php');
            }
            if($question== "&lt;QM&gt;"){
                include ('multi.php');
            }
        }
    }

    $bibliotheque->appendChild($assessment);

    // Générer le fichier XML
    $doc->formatOutput = true; // Pour formater le document avec des indentations
    $doc->save($Filename);

    // chemin absolu du fichier à télécharger
    $cheminFichier = '/var/www/upvsun/' . $Filename;

    $xml = file_get_contents($Filename);

    // envoi des entêtes HTTP pour indiquer que le fichier doit être téléchargé
    header('Content-Type: text/xml');
    header('Content-Disposition: attachment; filename="' . basename($Filename) . '"');
    while (ob_get_level()) {
        ob_end_clean();
    }
    // lecture et envoi du contenu du fichier
    echo $xml;
    unlink($Filename);
    exit;

    ?>

</body>
