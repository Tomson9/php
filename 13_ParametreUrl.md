### 📌 **Les Paramètres d’URL en PHP**  

Les **paramètres d'URL** permettent de transmettre des données via l'adresse d'une page web. PHP peut les récupérer et les utiliser pour personnaliser le contenu affiché.

---

## ✅ **1. Qu'est-ce qu'un paramètre d'URL ?**  
Un paramètre d'URL est une valeur ajoutée à la fin d'une URL sous la forme **clé=valeur**.  
Ils sont précédés d'un **"?"** et peuvent être multiples, séparés par **"&"**.

### **Exemple :**
```
http://localhost/page.php?nom=Alice&age=25
```
- `nom` est un paramètre avec la valeur `"Alice"`.  
- `age` est un paramètre avec la valeur `25`.

---

## ✅ **2. Récupérer les paramètres avec `$_GET`**  
PHP utilise la superglobale `$_GET` pour accéder aux paramètres de l’URL.

### **Exemple simple :**
```php
<?php
// Vérifie si les paramètres existent avant de les afficher
if (isset($_GET['nom']) && isset($_GET['age'])) {
    $nom = htmlspecialchars($_GET['nom']); // Sécuriser l'entrée utilisateur
    $age = (int) $_GET['age']; // Convertir en nombre

    echo "Bonjour $nom, tu as $age ans.";
} else {
    echo "Veuillez fournir un nom et un âge.";
}
?>
```
📝 **Sécurisation :**  
- `htmlspecialchars()` empêche l'injection de code malveillant.  
- `(int)` assure que `age` est bien un nombre.

---

## ✅ **3. Passer plusieurs paramètres d'URL avec un lien**  
Un lien peut inclure des paramètres pour transmettre des données.

### **Exemple :**
```php
<a href="page.php?nom=Alice&age=25">Voir le profil d'Alice</a>
```
Si l’utilisateur clique sur ce lien, il sera redirigé vers `page.php` avec les valeurs `nom=Alice` et `age=25`.

---

## ✅ **4. Vérifier et gérer des valeurs optionnelles**
Tous les paramètres d’URL ne sont pas obligatoires. Il faut toujours les **vérifier** avant de les utiliser.

### **Exemple avec valeur par défaut :**
```php
<?php
$nom = isset($_GET['nom']) ? htmlspecialchars($_GET['nom']) : "Inconnu";
$age = isset($_GET['age']) ? (int)$_GET['age'] : "non précisé";

echo "Bonjour $nom, votre âge est $age.";
?>
```
- Si l'URL est `page.php?nom=Alice`, `age` sera "non précisé".
- Si aucun paramètre n'est fourni, `nom` affichera `"Inconnu"`.

---

## ✅ **5. Gérer plusieurs paramètres et éviter les erreurs**  
Si l'on attend plusieurs paramètres, il est bon de vérifier qu'ils sont tous présents avant d’exécuter du code.

### **Exemple avec message d’erreur :**
```php
<?php
if (!isset($_GET['nom']) || !isset($_GET['age'])) {
    echo "Erreur : Nom et âge requis.";
    exit; // Stopper l'exécution
}

$nom = htmlspecialchars($_GET['nom']);
$age = (int)$_GET['age'];

echo "Bienvenue $nom, vous avez $age ans.";
?>
```

---

## ✅ **6. Encodage et décodage des URL (`urlencode` et `urldecode`)**  
Les paramètres d'URL ne doivent pas contenir d'espaces ou de caractères spéciaux.  
On peut les encoder et les décoder avec `urlencode()` et `urldecode()`.

### **Exemple :**
```php
<?php
$nom = "Jean Dupont";
$url = "page.php?nom=" . urlencode($nom);
echo "<a href='$url'>Profil de $nom</a>";
?>
```
🔹 **Résultat :**  
L'URL générée sera :  
```
page.php?nom=Jean+Dupont
```
✅ `urldecode($_GET['nom'])` permet de récupérer la valeur correcte.

---

## ✅ **7. Exercice : Affichage d'un profil utilisateur**  
📌 **Objectif :** Créer une page `profil.php` qui affiche un message en fonction des paramètres passés dans l'URL.

### **Étapes :**
1. Demander un `nom`, un `âge` et une `ville` dans l'URL.  
2. Vérifier si les valeurs sont présentes, sinon afficher un message d’erreur.  
3. Afficher un message de bienvenue.

### **Test avec URL :**  
```
http://localhost/profil.php?nom=Alice&age=30&ville=Los+Angeles
```
🔹 **Affichage :**  
> Bonjour Alice, vous avez 30 ans et vous habitez à Los Angeles.

---

## ✅ **Conclusion**
✔ Les paramètres d'URL permettent de transmettre des données entre pages.  
✔ On les récupère en PHP avec `$_GET`.  
✔ Toujours vérifier la présence et la validité des paramètres.  
✔ `urlencode()` permet d'éviter les problèmes avec les caractères spéciaux.  

💡 **Tu peux maintenant passer à la suite !** 🚀