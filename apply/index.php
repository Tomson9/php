<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon premier site PHP</title>
</head>

<body>

    <h1>Bienvenue sur mon site</h1>
    <form action="traitement.php" method="post" enctype="multipart/form-data">

        <label for="nom">Nom : </label>
        <input type="text" name="noms" id="nom  ">
        <label for="age">Age : </label>
        <input type="text" name="age" id="age">
        <label for="telecharger">telecharge un fichier</label>
        <input type="file" name="telecharger" id="telecharger">
        <input type="submit" value="Envoyer">
    </form>
    <?php
    $nom = "Jean Dupont";
    $url = "traitement.php?nom=" . urlencode($nom);
    echo "<a href='$url'>Profil de $nom</a>";
    ?>
</body>

</html>