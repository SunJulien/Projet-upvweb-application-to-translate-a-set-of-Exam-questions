<?php

    /**
    @file
    This file contains a PHP script for generating an XML file from form inputs.
    PHP version 7.4
    @author Sun Julien
     */

    // Enable error reporting for debugging
    ini_set('display_errors', 1);
    error_reporting(E_ALL);

    // Start output buffering
    ob_start();

    // Get form inputs from POST request
    $Content = $_POST['TextArea1'];
    $Filename = $_POST['filename']. ".xml";
    $Theme = $_POST['theme'];

    // Regular expression to match text between XML tags
    $expressionReguliere = '/(?<=<)([^<>]+)(?=>)/';
    // Replace all occurrences of the regular expression with the text in uppercase
    $Content = preg_replace_callback($expressionReguliere, function($match) {
        return strtoupper($match[1]);
    }, $Content);

    // Split the input into an array of lines
    $line = explode("\r\n", $Content);
    // Encode special characters in each line
    $line_encode = array_map('htmlspecialchars', $line);

    // Get the number of lines in the input
    $size = count($line);
    // Set initial values for some variables
    $ident_value = 9960884;
    $question_counter = 4;

    // Create a new DOMDocument object
    $doc = new DOMDocument('1.0', 'UTF-8');
    // Set some options for the document
    $doc->xmlStandalone = true;
    $doc->formatOutput = true;

    // Create the root element of the document
    $questestinterop = $doc->createElement('questestinterop');
    $doc->appendChild($questestinterop);

    // Include some general XML elements
    include ('xmlgeneral.php');

    // Loop through each line of the input
    for ($x = 0; $x <= $size; $x++) {
        if (strlen($line_encode[$x]) > 0){
            // Check if the line contains the start tag for a question type
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
            if(strpos($line_encode[$x], "&lt;QTF&gt;")!== false){
                $question_type= "&lt;QTF&gt;";
                $line_encode[$x] = str_replace("&lt;QTF&gt;", "", $line_encode[$x]);
                $pluspoint = 1;
                $minuspoint = 0;
            }

            // Include the appropriate file for the question type
            if($question_type== "&lt;QF&gt;"){
                include ('fill.php');
            }
            if($question_type== "&lt;QN&gt;"){
                include ('numeric.php');
            }
            if($question_type== "&lt;QM&gt;"){
                include ('multi.php');
            }
            if($question_type== "&lt;QTF&gt;"){
                include ('TrueFalse.php');
            }

            // Check if the line contains the end tag for a question
            if(strpos($line_encode[$x], "&lt;/Q&gt;")!== false){
                $question_type= "";
                $line_encode[$x] = str_replace("&lt;/Q&gt;", "", $line_encode[$x]);
                $question_counter = 4;
                unset($correctawnserfeedback);
                $correctawnserfeedback = [];
                unset($incorrectawnserfeedback);
                $incorrectawnserfeedback = [];
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

