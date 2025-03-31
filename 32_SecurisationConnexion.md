### **🔐 Sécurisation avec JWT (JSON Web Token) et Sessions en PHP**  

Quand on parle de sécurisation des connexions et de gestion des sessions en PHP, on a deux approches principales :  
- **Les sessions PHP** (stockées côté serveur)  
- **Les JWT (JSON Web Token)** (stockés côté client)  

Nous allons voir **les avantages, les inconvénients et comment implémenter chaque approche**.  

---

## **📌 1. Gestion des sessions PHP**
### **🔹 Comment fonctionne une session ?**  
1. Lorsqu’un utilisateur se connecte, PHP génère un **identifiant unique de session (PHPSESSID)**.  
2. Cet ID est stocké côté client (dans un cookie).  
3. PHP garde les **données de session** côté serveur (dans `$_SESSION`).  

### **📝 Exemple : Système d'authentification avec sessions**
#### **1️⃣ Page d'inscription (`register.php`)**
On hache le mot de passe avant de l’enregistrer en base.  
```php
<?php
session_start();
$pdo = new PDO("mysql:host=localhost;dbname=test_db", "root", "");

// Récupération des données du formulaire
$email = $_POST["email"];
$password = password_hash($_POST["password"], PASSWORD_DEFAULT);

$sql = "INSERT INTO utilisateurs (email, password) VALUES (:email, :password)";
$stmt = $pdo->prepare($sql);
$stmt->execute(["email" => $email, "password" => $password]);

echo "Inscription réussie !";
?>
```

#### **2️⃣ Page de connexion (`login.php`)**
On vérifie l’utilisateur et on stocke son ID en session.  
```php
<?php
session_start();
$pdo = new PDO("mysql:host=localhost;dbname=test_db", "root", "");

$email = $_POST["email"];
$password = $_POST["password"];

$sql = "SELECT * FROM utilisateurs WHERE email = :email";
$stmt = $pdo->prepare($sql);
$stmt->execute(["email" => $email]);
$user = $stmt->fetch();

if ($user && password_verify($password, $user["password"])) {
    $_SESSION["user_id"] = $user["id"];
    echo "Connexion réussie !";
} else {
    echo "Identifiants incorrects.";
}
?>
```

#### **3️⃣ Page sécurisée (`dashboard.php`)**
Seul un utilisateur connecté peut voir cette page.  
```php
<?php
session_start();
if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit();
}
echo "Bienvenue sur votre tableau de bord !";
?>
```

#### **4️⃣ Déconnexion (`logout.php`)**
On détruit la session.  
```php
<?php
session_start();
session_destroy();
header("Location: login.php");
?>
```

### **✅ Avantages des sessions**
✔ Simple à mettre en place  
✔ Stocké côté serveur = plus sécurisé  
✔ Bonne solution pour les **applications PHP classiques**  

### **❌ Inconvénients des sessions**
❌ Moins adapté aux **API RESTful**  
❌ Pas pratique si l’on veut **authentifier un utilisateur sur plusieurs services**  

---

## **📌 2. Sécurisation avec JWT (JSON Web Token)**
### **🔹 C’est quoi un JWT ?**  
Un JWT est un **jeton sécurisé** qui contient des informations encodées sous forme de **JSON**. Il est utilisé pour **authentifier un utilisateur sans sessions côté serveur**.

📌 **Format d’un JWT**
```
eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9
.
eyJ1c2VyX2lkIjoxLCJleHAiOjE2Nzg5NzM2MDB9
.
SflKxwRJSMeKKF2QT4fwpMeJf36POk6yJV_adQssw5c
```
- **Header** : Indique l’algorithme utilisé  
- **Payload** : Contient les données (ex: `user_id`)  
- **Signature** : Vérifie l’intégrité du token  

### **📝 Implémentation d’un système d'authentification avec JWT**
Pour utiliser JWT en PHP, on a besoin de **Firebase PHP-JWT**  
📌 **Installation avec Composer**  
```sh
composer require firebase/php-jwt
```

#### **1️⃣ Génération du JWT lors de la connexion (`login.php`)**
```php
<?php
require 'vendor/autoload.php';
use Firebase\JWT\JWT;

$pdo = new PDO("mysql:host=localhost;dbname=test_db", "root", "");
$secret_key = "votre_clé_secrète"; // À stocker dans un fichier .env

$email = $_POST["email"];
$password = $_POST["password"];

$sql = "SELECT * FROM utilisateurs WHERE email = :email";
$stmt = $pdo->prepare($sql);
$stmt->execute(["email" => $email]);
$user = $stmt->fetch();

if ($user && password_verify($password, $user["password"])) {
    $payload = [
        "user_id" => $user["id"],
        "exp" => time() + 3600 // Expire dans 1 heure
    ];
    
    $jwt = JWT::encode($payload, $secret_key, 'HS256');
    echo json_encode(["token" => $jwt]);
} else {
    echo json_encode(["error" => "Identifiants incorrects"]);
}
?>
```
✔ On renvoie le **JWT** au client au lieu d’une session.  

---

#### **2️⃣ Vérification du JWT sur une page sécurisée (`dashboard.php`)**
```php
<?php
require 'vendor/autoload.php';
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

$secret_key = "votre_clé_secrète";

$headers = getallheaders();
if (!isset($headers["Authorization"])) {
    echo json_encode(["error" => "Accès refusé"]);
    exit();
}

$jwt = str_replace("Bearer ", "", $headers["Authorization"]);

try {
    $decoded = JWT::decode($jwt, new Key($secret_key, 'HS256'));
    echo json_encode(["message" => "Bienvenue, utilisateur ".$decoded->user_id]);
} catch (Exception $e) {
    echo json_encode(["error" => "Token invalide"]);
}
?>
```
✔ Si le JWT est **valide**, l’utilisateur peut accéder à la page.  

---

### **✅ Avantages de JWT**
✔ Parfait pour les **API RESTful** et les applications mobiles  
✔ Fonctionne sans session côté serveur  
✔ Permet de s’authentifier sur plusieurs services avec un seul jeton  

### **❌ Inconvénients de JWT**
❌ Un JWT **ne peut pas être révoqué** une fois émis  
❌ Plus lourd à mettre en place qu’une session PHP  

---

## **📌 3. Quand utiliser les sessions ou JWT ?**
| Critère | **Sessions PHP** | **JWT** |
|---------|----------------|---------|
| Stockage | Serveur | Client |
| Sécurité | Plus sécurisé (stocké côté serveur) | Moins sécurisé (stocké côté client) |
| Utilisation | Applications Web classiques | API REST, applications mobiles |
| Gestion des accès | Facile à gérer | Difficile à révoquer un token |

📌 **👉 En résumé**  
✔ Utiliser **les sessions PHP** pour une **application classique** avec PHP  
✔ Utiliser **JWT** pour une **API RESTful** qui doit gérer plusieurs clients  

---

### **🎯 Exercice pratique**
1. **Créer une API en PHP** qui :
   - Utilise **JWT** pour l’authentification
   - Stocke les utilisateurs en base de données
   - Protège les routes avec le JWT  
2. **Faire un système de connexion en PHP avec sessions**
   - Utiliser `$_SESSION` pour garder l’utilisateur connecté  
   - Ajouter une page sécurisée (`dashboard.php`)  

---

🔥 **Tu veux approfondir un point précis (sécurité, OAuth, stockage sécurisé) ?** Jettes un coup d'oeil à l'extrat (21.1)😃