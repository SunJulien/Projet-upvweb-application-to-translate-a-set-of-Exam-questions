<?php
    // Récupérer les données soumises dans le formulaire
    $nom = $_POST['nom'];
    $email = $_POST['email'];

    // Ouvrir un fichier texte en écriture
    $fichier = fopen('nouveau_fichier.txt', 'w');

    // Écrire les données dans le fichier
    fwrite($fichier, "Nom : $nom\nEmail : $email");

    // Fermer le fichier
    fclose($fichier);

    // Afficher un message de confirmation
    echo "Le fichier a été créé avec succès !";

