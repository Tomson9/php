### **💡 Obtenir une Entrée Utilisateur en PHP**
En PHP, tu peux récupérer une entrée utilisateur de plusieurs façons selon le contexte :  

1️⃣ **Via le terminal (CLI)**  
2️⃣ **Via un formulaire HTML (`$_POST` et `$_GET`)**  
3️⃣ **Via l'URL (`$_GET`)**  
4️⃣ **Via la console PHP interactive**  

---

## **1️⃣ Obtenir une Entrée Utilisateur via le Terminal (CLI)**
Si tu exécutes ton script PHP dans un terminal, utilise `fgets(STDIN)`.  

### 📌 **Exemple : Demander un nom à l'utilisateur dans le terminal**
```php
<?php
// Demander le nom
echo "Entrez votre nom : ";

// Lire l'entrée de l'utilisateur
$nom = trim(fgets(STDIN)); 

// Afficher la réponse
echo "Bonjour, $nom !\n";
?>
```
✅ **Commande pour exécuter le script dans le terminal** :  
```bash
php mon_script.php
```

---

## **2️⃣ Obtenir une Entrée Utilisateur via un Formulaire HTML (`$_POST`)**
Si ton script PHP est exécuté via un serveur web (Apache, Nginx), utilise `$_POST` pour récupérer les données d’un formulaire.

### 📌 **Exemple : Formulaire HTML avec un champ de texte**
🔹 **Fichier `formulaire.html`**  
```html
<form action="traitement.php" method="POST">
    <label>Entrez votre nom :</label>
    <input type="text" name="nom">
    <button type="submit">Envoyer</button>
</form>
```
🔹 **Fichier `traitement.php`**  
```php
<?php
// Vérifie si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupère la valeur du champ "nom"
    $nom = htmlspecialchars($_POST['nom']);

    // Vérifie si le champ est vide
    if (empty($nom)) {
        echo "Erreur : Veuillez entrer un nom.";
    } else {
        echo "Bonjour, $nom !";
    }
}
?>
```
✅ **Le champ `name="nom"` correspond à `$_POST['nom']` en PHP.**  

---

## **3️⃣ Obtenir une Entrée Utilisateur via l’URL (`$_GET`)**
Tu peux passer des valeurs dans l'URL et les récupérer avec `$_GET`.

### 📌 **Exemple : Récupérer un paramètre depuis l’URL**
🔹 **URL :**
```bash
http://localhost/traitement.php?nom=Alice
```
🔹 **Fichier `traitement.php`**  
```php
<?php
// Vérifie si le paramètre "nom" est présent dans l'URL
if (isset($_GET['nom'])) {
    // Récupère et sécurise le paramètre
    $nom = htmlspecialchars($_GET['nom']);
    echo "Bonjour, $nom !";
} else {
    echo "Veuillez spécifier un nom dans l'URL.";
}
?>
```
✅ **Essaye en modifiant l’URL avec `?nom=Bob` !**  


---

## **🎯 Exercice : Formulaire avec `$_POST` et `$_GET`**
1️⃣ **Crée un formulaire HTML avec deux champs : `nom` et `age`.**  
2️⃣ **Fais un traitement PHP (`traitement.php`) qui récupère et affiche ces valeurs.**  
3️⃣ **Ajoute une validation pour éviter les champs vides.**  

---

💡 **Maintenant, tu sais comment récupérer une entrée utilisateur en PHP, que ce soit via le terminal, un formulaire ou l’URL ! 🚀**