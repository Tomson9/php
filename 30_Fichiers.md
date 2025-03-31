### 📂 **Les fichiers en PHP : Pourquoi et Comment les utiliser ?**  

En PHP, les fichiers sont utilisés pour **stocker, lire et manipuler des données de manière persistante**. Contrairement aux variables et aux sessions, les fichiers permettent de **conserver les informations même après la fermeture du navigateur** ou l'arrêt du serveur.

---

## **📌 Pourquoi utiliser des fichiers en PHP ?**
✅ **Stockage de données** : Enregistrer des informations sans base de données (logs, configuration, etc.).  
✅ **Persistance** : Conserver des informations après l'exécution d'un script.  
✅ **Traitement de fichiers** : Lire, écrire et modifier des fichiers textes, CSV, JSON, etc.  
✅ **Import/Export** : Manipuler des fichiers utilisateurs (ex. : upload d'images, rapports PDF).  

---

## **📌 Comment utiliser les fichiers en PHP ?**  
PHP fournit plusieurs fonctions pour manipuler les fichiers. Voici les opérations de base :  

### **1️⃣ Ouvrir et fermer un fichier**  
Avant d’écrire ou de lire un fichier, il faut **l’ouvrir avec `fopen()` et le fermer avec `fclose()`**.

```php
<?php
// Ouvrir un fichier en mode écriture
$fichier = fopen("monfichier.txt", "w");

// Vérifier si l'ouverture a réussi
if ($fichier) {
    echo "Fichier ouvert avec succès.";
    fclose($fichier); // Toujours fermer un fichier après l'utilisation
} else {
    echo "Erreur d'ouverture du fichier.";
}
?>
```
📌 **Modes d’ouverture les plus courants** :  
- `"r"` : Lecture seule.  
- `"w"` : Écriture (efface le contenu existant).  
- `"a"` : Ajout en fin de fichier (conserve les données existantes).  
- `"r+"` : Lecture et écriture sans effacer le fichier.  
- `"w+"` : Lecture et écriture (efface le fichier).  

---

### **2️⃣ Lire un fichier**
Pour récupérer le contenu d’un fichier, plusieurs méthodes existent :

#### ✅ **Lire tout le fichier avec `file_get_contents()`**
```php
<?php
$contenu = file_get_contents("monfichier.txt");
echo $contenu;
?>
```
📌 **Avantages** : Simple et rapide, lit tout le fichier en une seule fois.

#### ✅ **Lire ligne par ligne avec `fgets()`**
```php
<?php
$fichier = fopen("monfichier.txt", "r");

while (!feof($fichier)) {
    echo fgets($fichier) . "<br>"; // Lire et afficher chaque ligne
}

fclose($fichier);
?>
```
📌 **Utile pour lire un fichier très volumineux sans surcharger la mémoire.**

---

### **3️⃣ Écrire dans un fichier**
#### ✅ **Remplacer le contenu avec `file_put_contents()`**
```php
<?php
file_put_contents("monfichier.txt", "Nouvelle ligne de texte !");
?>
```
📌 **Efface l’ancien contenu et écrit la nouvelle donnée.**  

#### ✅ **Ajouter du texte avec `fwrite()`**
```php
<?php
$fichier = fopen("monfichier.txt", "a"); // Mode "a" pour ajouter du texte
fwrite($fichier, "Texte ajouté à la fin du fichier.\n");
fclose($fichier);
?>
```
📌 **Ajoute du contenu sans effacer l’existant.**  

---

### **4️⃣ Supprimer un fichier**
Pour supprimer un fichier, on utilise `unlink()`. ⚠ **Action irréversible** !

```php
<?php
if (file_exists("monfichier.txt")) {
    unlink("monfichier.txt");
    echo "Fichier supprimé.";
} else {
    echo "Le fichier n'existe pas.";
}
?>
```

---

### **5️⃣ Vérifier si un fichier existe**
Avant de lire ou modifier un fichier, il est bon de vérifier s'il existe.

```php
<?php
if (file_exists("monfichier.txt")) {
    echo "Le fichier existe.";
} else {
    echo "Le fichier n'existe pas.";
}
?>
```

---

### **6️⃣ Gérer les fichiers avec un formulaire (upload d’un fichier)**
Voici un exemple simple d’upload de fichier.

#### **📝 Formulaire HTML (upload.html)**
```html
<form action="upload.php" method="POST" enctype="multipart/form-data">
    <input type="file" name="fichier">
    <button type="submit">Envoyer</button>
</form>
```

#### **📝 Script PHP (upload.php)**
```php
<?php
if (isset($_FILES["fichier"])) {
    $nom_fichier = $_FILES["fichier"]["name"];
    $tmp_path = $_FILES["fichier"]["tmp_name"];
    $destination = "uploads/" . $nom_fichier;

    if (move_uploaded_file($tmp_path, $destination)) {
        echo "Fichier uploadé avec succès : " . $nom_fichier;
    } else {
        echo "Erreur lors de l'upload.";
    }
}
?>
```
📌 **Explication** :  
✅ `$_FILES["fichier"]["name"]` → Nom du fichier.  
✅ `$_FILES["fichier"]["tmp_name"]` → Chemin temporaire sur le serveur.  
✅ `move_uploaded_file()` → Déplace le fichier vers le dossier `uploads/`.  

---

## **📌 Exercices pratiques**
### **🎯 Exercice 1 : Lire et afficher un fichier texte**
1. Crée un fichier `message.txt` avec du texte.  
2. Écris un script PHP qui affiche son contenu.  

### **🎯 Exercice 2 : Système de journalisation (log)**
1. Crée un fichier `log.txt`.  
2. À chaque chargement de la page, ajoute une ligne avec la date et l’heure.  

```php
<?php
$fichier = fopen("log.txt", "a");
$date = date("Y-m-d H:i:s");
fwrite($fichier, "Accès au site : $date\n");
fclose($fichier);
?>
```

---

## **📌 Conclusion**
✔ **Les fichiers permettent de stocker et manipuler des données en PHP.**  
✔ **On peut lire, écrire, supprimer des fichiers avec des fonctions comme `file_get_contents()`, `fwrite()`, `unlink()`.**  
✔ **Les fichiers sont souvent utilisés pour les logs, les sauvegardes ou les uploads.**  

Tu veux approfondir **les fichiers CSV, JSON ou XML** ? Jettes un coup d'oeil à l'extrat (30.1) 😊