### **📌 SESSIONS**  

Les sessions sont utilisées en PHP pour **stocker temporairement des informations sur un utilisateur** tout au long de sa navigation sur un site web. Elles sont particulièrement utiles lorsque les données ne doivent pas être perdues à chaque changement de page.  

---

## **📌 1. Pourquoi utiliser les sessions ?**
### **✅ Garder des données d'un utilisateur sur plusieurs pages**
➡️ Contrairement aux variables classiques qui disparaissent à chaque chargement de page, les sessions permettent de **conserver des informations d'une page à une autre**.  
Exemple : Après une connexion, un utilisateur peut rester authentifié sur toutes les pages du site.  

### **✅ Sécuriser certaines données**
➡️ Les sessions sont stockées **côté serveur**, donc elles ne peuvent pas être modifiées par un utilisateur malveillant, contrairement aux cookies qui sont stockés dans le navigateur du client.  

### **✅ Remplacer les cookies pour des informations sensibles**
➡️ Les cookies stockent des informations sur l'ordinateur du client, ce qui peut être risqué si les données sont sensibles (ex: mots de passe). Les sessions permettent d'éviter ce problème.  

### **✅ Stocker temporairement des informations**
➡️ Les sessions sont souvent utilisées pour des **paniers d'achat**, des **informations de connexion**, ou des **préférences utilisateur**.  

---

## **📌 2. Comment fonctionne une session ?**
1️⃣ Le serveur crée un **identifiant unique** (un ID de session).  
2️⃣ Cet identifiant est stocké dans un **cookie de session** dans le navigateur de l’utilisateur.  
3️⃣ Les données de session sont stockées **côté serveur** et peuvent être récupérées sur plusieurs pages.  

---

## **📌 3. Exemple simple d'utilisation d'une session en PHP**
### **1️⃣ Démarrer une session et stocker des informations**
Avant d'utiliser une session, il faut **toujours** la démarrer avec `session_start();`.  
```php
<?php
session_start(); // Démarre la session
$_SESSION['username'] = "Alice"; // Stocke une valeur
echo "Bienvenue, " . $_SESSION['username']; // Affiche la valeur
?>
```

---

### **2️⃣ Récupérer une session sur une autre page**
Même après avoir changé de page, l'utilisateur reste identifié grâce à la session.  
```php
<?php
session_start();
echo "Bienvenue à nouveau, " . $_SESSION['username']; // Toujours accessible
?>
```

---

### **3️⃣ Supprimer une session**
#### **🔹 Supprimer une seule variable de session**
```php
<?php
session_start();
unset($_SESSION['username']); // Supprime une variable de session
?>
```
#### **🔹 Détruire complètement une session**
```php
<?php
session_start();
session_destroy(); // Supprime toutes les données de session
?>
```

---

## **📌 4. Différence entre session et cookie**
| **Caractéristique**  | **Session (`$_SESSION`)** | **Cookie (`$_COOKIE`)** |
|----------------|----------------|---------------|
| **Stockage** | Côté serveur | Côté client (navigateur) |
| **Sécurité** | Plus sécurisé | Moins sécurisé (modifiable) |
| **Durée de vie** | Jusqu'à fermeture du navigateur (ou suppression manuelle) | Définie par l'expiration |
| **Taille des données** | Illimité (selon la mémoire du serveur) | Limité à **4 Ko** |
| **Exemple d'usage** | Connexion utilisateur, panier d’achat | Préférences utilisateur, suivi publicitaire |

---

### **📌 Conclusion**
✔️ **On utilise les sessions pour stocker temporairement des informations sur un utilisateur sans dépendre du stockage sur le navigateur.**  
✔️ **Les sessions sont plus sécurisées que les cookies car elles ne sont pas modifiables par l'utilisateur.**  
✔️ **Elles sont essentielles pour gérer les connexions utilisateur et les paniers d’achat.**  