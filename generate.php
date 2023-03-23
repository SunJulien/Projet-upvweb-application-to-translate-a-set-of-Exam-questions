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
    $Filename = $_POST['filename'];
    $Theme = $_POST['theme'];
    $ext = '.xml';
    $Filename .= $ext;

    // Créer un objet DOMDocument
    $doc = new DOMDocument('1.0', 'UTF-8');

    // Créer l'élément racine du document
    $bibliotheque = $doc->createElement('bibliotheque');
    $doc->appendChild($bibliotheque);

    // Ajouter des éléments pour chaque livre
    $livre1 = $doc->createElement($Theme);
    $titre1 = $doc->createElement('Content', $Content);
    $livre1->appendChild($titre1);
    $bibliotheque->appendChild($livre1);

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
