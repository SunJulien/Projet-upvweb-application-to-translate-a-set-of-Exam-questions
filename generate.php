<?php
    ini_set('display_errors', 1);
    error_reporting(E_ALL);
    ob_start();
    $Content = $_POST['TextArea1'];
    $Filename = $_POST['filename']. ".xml";
    $Theme = $_POST['theme'];
    $line = explode("\r\n", $Content);
    $size = count($line);
    $question = "";
    $ident_value = 9960884;
    $letraresp = 'A';
    $compteur = 4;

    // Créer un objet DOMDocument
    $doc = new DOMDocument('1.0', 'UTF-8');
    $doc->xmlStandalone = true;
    $doc->formatOutput = true;

    // Créer l'élément racine du document
    $questestinterop = $doc->createElement('questestinterop');
    $doc->appendChild($questestinterop);


    // Ajouter des éléments
    $assessment = $doc->createElement("assessment");
    $assessment->setAttribute('ident', '333283');
    $assessment->setAttribute('title', $Theme);

    include ('xmlgeneral.php');

    // Parcourir les lignes et les afficher
    for ($x = 0; $x <= $size; $x++) {
        $line[$x] = htmlspecialchars($line[$x]);
        if (strlen($line[$x]) > 0){
            //Reconnais la premier balise
            if(strpos($line[$x], "&lt;QF&gt;")!== false){
                $question= "&lt;QF&gt;";
                $line[$x] = str_replace("&lt;QF&gt;", "", $line[$x]);
            }
            if(strpos($line[$x], "&lt;QN&gt;")!== false){
                $question= "&lt;QN&gt;";
                $line[$x] = str_replace("&lt;QN&gt;", "", $line[$x]);
            }
            if(strpos($line[$x], "&lt;QM&gt;")!== false){
                $question= "&lt;QM&gt;";
                $line[$x] = str_replace("&lt;QM&gt;", "", $line[$x]);
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
            //Efface la balise de fin
            if(strpos($line[$x], "&lt;/Q&gt;")!== false){
                $question= "";
                $line[$x] = str_replace("&lt;/Q&gt;", "", $line[$x]);
                $compteur = 4;
            }
        }
    }

    $questestinterop->appendChild($assessment);

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

