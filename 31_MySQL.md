### 📌 **Introduction à MySQL avec PHP**  

MySQL est une base de données relationnelle qui permet de **stocker, organiser et gérer des données efficacement**. PHP offre plusieurs extensions pour interagir avec MySQL, notamment :  

- **MySQLi (MySQL Improved)** : Recommandé pour les nouvelles applications.  
- **PDO (PHP Data Objects)** : Prend en charge plusieurs bases de données (MySQL, PostgreSQL, SQLite, etc.).  

Nous allons voir comment **se connecter**, **insérer**, **mettre à jour**, **supprimer** et **récupérer des données** dans une base MySQL avec PHP.  

---

## **📌 1. Connexion à une base de données MySQL**
Avant d’interagir avec MySQL, nous devons établir une connexion.  

### **🔹 Connexion avec MySQLi**
```php
<?php
$serveur = "localhost";
$utilisateur = "root";
$motDePasse = "";
$baseDeDonnees = "test_db";

// Connexion
$conn = new mysqli($serveur, $utilisateur, $motDePasse, $baseDeDonnees);

// Vérification
if ($conn->connect_error) {
    die("Échec de connexion : " . $conn->connect_error);
} 

echo "Connexion réussie !";
?>
```
📌 **Explication** :  
- `new mysqli()` : Crée une connexion MySQL.  
- `connect_error` : Vérifie s'il y a une erreur de connexion.  

---

### **🔹 Connexion avec PDO**
```php
<?php
try {
    $pdo = new PDO("mysql:host=localhost;dbname=test_db", "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connexion réussie !";
} catch (PDOException $e) {
    die("Erreur : " . $e->getMessage());
}
?>
```
📌 **Pourquoi utiliser PDO ?**  
✔ Sécurisé (protège contre les injections SQL).  
✔ Compatible avec plusieurs bases de données (MySQL, PostgreSQL, SQLite…).  

---

## **📌 2. Création d'une table en PHP**
Une fois connecté, nous pouvons créer une table avec `CREATE TABLE`.

```php
<?php
$sql = "CREATE TABLE utilisateurs (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(50) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    age INT(3)
)";

if ($conn->query($sql) === TRUE) {
    echo "Table créée avec succès !";
} else {
    echo "Erreur : " . $conn->error;
}
?>
```
📌 **Explication** :  
- `AUTO_INCREMENT` : Génère un ID unique automatiquement.  
- `PRIMARY KEY` : Définit l'ID comme clé unique.  
- `NOT NULL` : Indique qu'un champ ne peut pas être vide.  
- `UNIQUE` : Garantit l’unicité des emails.  

---

## **📌 3. Insérer des données**
### **🔹 Avec MySQLi**
```php
<?php
$sql = "INSERT INTO utilisateurs (nom, email, age) VALUES ('Jean Dupont', 'jean@mail.com', 28)";
if ($conn->query($sql) === TRUE) {
    echo "Nouvel utilisateur ajouté !";
} else {
    echo "Erreur : " . $conn->error;
}
?>
```

### **🔹 Avec PDO (Recommandé)**
```php
<?php
$sql = "INSERT INTO utilisateurs (nom, email, age) VALUES (:nom, :email, :age)";
$stmt = $pdo->prepare($sql);
$stmt->execute([
    'nom' => 'Alice Martin',
    'email' => 'alice@mail.com',
    'age' => 25
]);
echo "Utilisateur ajouté avec succès !";
?>
```
📌 **Utilisation des requêtes préparées pour éviter les injections SQL.**  

---

## **📌 4. Lire des données**
### **🔹 Récupérer et afficher les utilisateurs**
```php
<?php
$sql = "SELECT * FROM utilisateurs";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "ID : " . $row["id"] . " - Nom : " . $row["nom"] . " - Email : " . $row["email"] . "<br>";
    }
} else {
    echo "Aucun utilisateur trouvé.";
}
?>
```

---

## **📌 5. Modifier des données**
```php
<?php
$sql = "UPDATE utilisateurs SET age = 30 WHERE nom = 'Jean Dupont'";

if ($conn->query($sql) === TRUE) {
    echo "Mise à jour réussie !";
} else {
    echo "Erreur : " . $conn->error;
}
?>
```
📌 **Met à jour l'âge de Jean Dupont à 30 ans.**  

---

## **📌 6. Supprimer des données**
```php
<?php
$sql = "DELETE FROM utilisateurs WHERE nom = 'Alice Martin'";

if ($conn->query($sql) === TRUE) {
    echo "Utilisateur supprimé !";
} else {
    echo "Erreur : " . $conn->error;
}
?>
```
📌 **Supprime Alice Martin de la base de données.**  

---

## **📌 7. Exercice pratique**  
### **🎯 Exercice : Création d'un mini-système de gestion des utilisateurs**
1. **Créer une base de données `gestion_users`** et une table `utilisateurs`.  
2. **Créer un formulaire HTML** permettant d'ajouter un utilisateur (nom, email, âge).  
3. **Créer une page qui affiche la liste des utilisateurs** sous forme de tableau.  
4. **Ajouter un bouton de suppression** à côté de chaque utilisateur.  

### **📖 Code HTML du formulaire**
```html
<form action="ajouter.php" method="post">
    <input type="text" name="nom" placeholder="Nom" required>
    <input type="email" name="email" placeholder="Email" required>
    <input type="number" name="age" placeholder="Âge" required>
    <button type="submit">Ajouter</button>
</form>
```

### **📖 Fichier `ajouter.php` (Traitement du formulaire)**
```php
<?php
$pdo = new PDO("mysql:host=localhost;dbname=gestion_users", "root", "");
$sql = "INSERT INTO utilisateurs (nom, email, age) VALUES (:nom, :email, :age)";
$stmt = $pdo->prepare($sql);
$stmt->execute([
    'nom' => $_POST["nom"],
    'email' => $_POST["email"],
    'age' => $_POST["age"]
]);
header("Location: liste.php");
?>
```

### **📖 Fichier `liste.php` (Affichage des utilisateurs)**
```php
<?php
$pdo = new PDO("mysql:host=localhost;dbname=gestion_users", "root", "");
$sql = "SELECT * FROM utilisateurs";
$stmt = $pdo->query($sql);

echo "<table border='1'>";
echo "<tr><th>ID</th><th>Nom</th><th>Email</th><th>Âge</th><th>Action</th></tr>";
while ($row = $stmt->fetch()) {
    echo "<tr>";
    echo "<td>" . $row["id"] . "</td>";
    echo "<td>" . $row["nom"] . "</td>";
    echo "<td>" . $row["email"] . "</td>";
    echo "<td>" . $row["age"] . "</td>";
    echo "<td><a href='supprimer.php?id=" . $row["id"] . "'>Supprimer</a></td>";
    echo "</tr>";
}
echo "</table>";
?>
```

### **📖 Fichier `supprimer.php`**
```php
<?php
$pdo = new PDO("mysql:host=localhost;dbname=gestion_users", "root", "");
$sql = "DELETE FROM utilisateurs WHERE id = :id";
$stmt = $pdo->prepare($sql);
$stmt->execute(['id' => $_GET["id"]]);
header("Location: liste.php");
?>
```

---

Tu veux approfondir **la sécurisation des requêtes MySQL et PHP** avec **les injections SQL et les bonnes pratiques** ? 🔐 Jettes un coup d'oeil à l'extrat (31.1)😃