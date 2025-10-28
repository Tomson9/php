<?php

echo "Traitement des données du formulaire<br>";
$post = htmlspecialchars($_POST['noms']) ;
$var = $_FILES ;
echo"<pre>";
print_r($var);   
echo"</pre>";



if ($_FILES["telecharger"]["error"] == UPLOAD_ERR_OK) {// Vérifie si le fichier a été téléchargé sans erreur
    $nom_temporaire = $_FILES["telecharger"]["tmp_name"];
    $nom_fichier = basename($_FILES["telecharger"]["name"]);
    // $nom_fichier = "test";
    move_uploaded_file($nom_temporaire, "../../" . $nom_fichier);
    echo "Fichier téléchargé avec succès !";
} else {
    echo "Erreur lors de l'upload.";
}




echo"<a href=\"index.php\">Retour au formulaire</a>";