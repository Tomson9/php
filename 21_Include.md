### **📌 Inclure du Code HTML en PHP : Pourquoi et Comment ?**  

PHP est un **langage côté serveur**, mais il est souvent utilisé pour **générer du code HTML dynamique**. Cela permet de créer des **pages web interactives** en fonction des données du serveur ou des entrées utilisateur.  

---

# ✅ **Pourquoi Inclure du Code HTML en PHP ?**  

### 🎯 **Avantages :**  
1. **Créer des pages dynamiques** (ex: afficher les articles d'une base de données).  
2. **Séparer la logique et l’affichage** en utilisant des fichiers PHP et HTML.  
3. **Réutiliser des morceaux de code** avec `include` et `require`.  
4. **Personnaliser l'affichage** en fonction des utilisateurs (ex: afficher un message de bienvenue).  

---

# ✅ **1. Méthode Basique : PHP dans du HTML**  
Dans un fichier `.php`, on peut insérer du PHP à l'intérieur d'un fichier HTML.  

### **📌 Exemple : Afficher un message dynamique**
```php
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Page PHP et HTML</title>
</head>
<body>
    <h1>Bienvenue sur mon site</h1>
    
    <p>
        Aujourd’hui, nous sommes le  
        <?php echo date("d/m/Y"); ?>. <!-- Insère la date actuelle -->
    </p>
</body>
</html>
```
👉 **Ici, PHP est utilisé pour générer la date du jour dynamiquement.**  

---

# ✅ **2. Générer du HTML avec du PHP**  
On peut aussi utiliser PHP pour **générer entièrement le HTML** à l’intérieur des balises PHP.  

### **📌 Exemple : Liste dynamique**
```php
<?php
echo "<ul>";
for ($i = 1; $i <= 5; $i++) {
    echo "<li>Élément $i</li>";
}
echo "</ul>";
?>
```
👉 Cela génère une liste `<ul>` avec 5 `<li>`.  

---

# ✅ **3. Utiliser `include` et `require` pour Modulariser le Code**  

Au lieu de répéter du code HTML dans chaque page, on peut **inclure des fichiers PHP contenant du HTML** pour éviter la duplication de code.

### **📌 Exemple : Utilisation de `include`**  
#### **Fichier `header.php`**
```php
<header>
    <h1>Mon Site Web</h1>
    <nav>
        <a href="index.php">Accueil</a>
        <a href="contact.php">Contact</a>
    </nav>
</header>
```
#### **Fichier `index.php`**
```php
<!DOCTYPE html>
<html>
<head>
    <title>Page d'Accueil</title>
</head>
<body>
    <?php include "header.php"; ?> <!-- Inclusion du header -->
    <p>Bienvenue sur la page d'accueil !</p>
</body>
</html>
```
👉 **Avantage** : Si on modifie `header.php`, toutes les pages qui l’incluent seront mises à jour automatiquement !  

#### 🛑 **Différence entre `include` et `require`**  
| Fonction | Comportement en cas d'erreur |
|----------|----------------------------|
| `include` | Affiche un avertissement mais continue l’exécution |
| `require` | Génère une erreur fatale et arrête l’exécution |

---

# ✅ **4. Générer du HTML Dynamique avec des Variables PHP**  

### **📌 Exemple : Message de Bienvenue**
```php
<?php
$nom = "Alice";
?>
<!DOCTYPE html>
<html>
<head>
    <title>Bienvenue</title>
</head>
<body>
    <h1>Bonjour, <?php echo $nom; ?> !</h1>
</body>
</html>
```
👉 Ici, la variable `$nom` permet d'afficher un message personnalisé.  

---

# ✅ **5. Formulaire HTML avec PHP**  

On peut combiner **HTML et PHP** pour créer des **formulaires dynamiques**.  

### **📌 Exemple : Formulaire de connexion**
```php
<!DOCTYPE html>
<html>
<head>
    <title>Formulaire</title>
</head>
<body>
    <form method="POST" action="">
        <label for="nom">Nom :</label>
        <input type="text" id="nom" name="nom">
        <button type="submit">Envoyer</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nom = htmlspecialchars($_POST["nom"]); // Sécuriser l'entrée
        echo "<p>Bienvenue, $nom !</p>";
    }
    ?>
</body>
</html>
```
👉 Ce formulaire récupère le nom entré et l’affiche dynamiquement.  

---

# ✅ **Conclusion**  
Inclure du HTML en PHP permet de **créer des pages dynamiques**, de **générer des interfaces utilisateur personnalisées** et d’optimiser la structure du code avec `include`.  

🚀 **Maintenant, à toi de jouer ! Essaye de créer une page HTML avec un peu de PHP dedans.** 😃