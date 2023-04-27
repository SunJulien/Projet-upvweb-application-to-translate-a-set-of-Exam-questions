<?php
    ini_set('display_errors', 1);
    error_reporting(E_ALL);
    ob_start();
    $Content = $_POST['TextArea1'];
    $Filename = $_POST['filename']. ".xml";
    $Theme = $_POST['theme'];

    $line = explode("\r\n", $Content);
    $line_encode = array_map('htmlspecialchars', $line);

    $size = count($line);
    $ident_value = 9960884;
    $question_counter = 4;
    $pluspoint = 1;
    $minuspoint = 0;

    // Créer un objet DOMDocument
    $doc = new DOMDocument('1.0', 'UTF-8');
    $doc->xmlStandalone = true;
    $doc->formatOutput = true;

    // Créer l'élément racine du document
    $questestinterop = $doc->createElement('questestinterop');
    $doc->appendChild($questestinterop);

    include ('xmlgeneral.php');

    // Parcourir les lignes
    for ($x = 0; $x <= $size; $x++) {
        $compteurbisRC = 0;
        if (strlen($line_encode[$x]) > 0){
            //Reconnais la premier balise
            if(strpos($line_encode[$x], "&lt;QF&gt;")!== false){
                $question_type= "&lt;QF&gt;";
                $line_encode[$x] = str_replace("&lt;QF&gt;", "", $line_encode[$x]);
                $pluspoint = 1;
                $minuspoint = 0;
            }
            if(strpos($line_encode[$x], "&lt;QN&gt;")!== false){
                $question_type= "&lt;QN&gt;";
                $line_encode[$x] = str_replace("&lt;QN&gt;", "", $line_encode[$x]);
                $pluspoint = 1;
                $minuspoint = 0;
            }
            if(strpos($line_encode[$x], "&lt;QM&gt;")!== false){
                $question_type= "&lt;QM&gt;";
                $line_encode[$x] = str_replace("&lt;QM&gt;", "", $line_encode[$x]);
                $pluspoint = 1;
                $minuspoint = 0;
            }

            if($question_type== "&lt;QF&gt;"){
                include ('fill.php');
            }
            if($question_type== "&lt;QN&gt;"){
                include ('numeric.php');
            }
            if($question_type== "&lt;QM&gt;"){
                include ('multi.php');
            }
            //Efface la balise de fin
            if(strpos($line_encode[$x], "&lt;/Q&gt;")!== false){
                $question_type= "";
                $line_encode[$x] = str_replace("&lt;/Q&gt;", "", $line_encode[$x]);
                // Vider le tableau
                $tableau = array();
                $question_counter = 4;
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

