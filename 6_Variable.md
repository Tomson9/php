## 🚀 **Tout savoir sur les variables en PHP**  

### 📌 **1. Qu'est-ce qu'une variable en PHP ?**  
Une variable en PHP est un espace mémoire qui stocke une valeur. Elle est définie avec le symbole `$` suivi d’un nom.  

### 🔹 **Déclaration d'une variable**  
```php
$nom = "Alice";
$age = 25;
$estEtudiant = true;
```
### **Exercice 1 : Déclarer et afficher des variables**  
💡 Déclare une variable `$nom` et `$age`, puis affiche :  
```php
$nom = "Alice";
$age = 25;

// Résultat attendu : "Bonjour, je m'appelle Alice et j'ai 25 ans."
```

---

## 📌 **2. Règles de nommage des variables**  
✅ Doit commencer par `$`  
✅ Peut contenir des lettres (`a-z`, `A-Z`), des chiffres (`0-9`) et `_`  
✅ Ne peut pas commencer par un chiffre  
✅ Sensible à la casse (`$Nom` ≠ `$nom`)  
✅ Ne doit pas être un mot-clé réservé de PHP  

**Exemples valides** ✅  
```php
$nom;
$_age;
$NomComplet;
```
**Exemples invalides** ❌  
```php
$1nom; // Commence par un chiffre
$nom complet; // Contient un espace
```

---

## 📌 **3. Types de variables en PHP**  
PHP est un langage faiblement typé : tu peux changer le type d'une variable sans erreur.  

| Type | Exemple |
|------|---------|
| **String (chaîne de caractères)** | `$texte = "Bonjour";` |
| **Integer (entier)** | `$nombre = 42;` |
| **Float (nombre à virgule flottante)** | `$prix = 19.99;` |
| **Boolean (booléen)** | `$estValide = true;` |
| **Array (tableau)** | `$couleurs = ["Rouge", "Vert", "Bleu"];` |
| **Object (objet)** | `class Voiture { public $marque = "Toyota"; }` |

---

## 📌 **4. Opérations sur les variables**  
### 🔹 **Concaténation (Assembler des chaînes)**
```php
$prenom = "Alice";
$nom = "Dupont";
$nomComplet = $prenom . " " . $nom;
echo $nomComplet; // Alice Dupont
```

### 🔹 **Opérations mathématiques**
```php
$a = 10;
$b = 5;
$somme = $a + $b; // 15
$produit = $a * $b; // 50
$division = $a / $b; // 2
```

### 🔹 **Modification de valeur**
```php
$nombre = 10;
$nombre += 5; // équivalent à $nombre = $nombre + 5;
echo $nombre; // 15
```
### **Exercice 2 : Concaténation et Calculs**  
💡 Déclare deux nombres et affiche leur somme, leur différence et leur produit.  
```php
$a = 8;
$b = 4;

// Résultat attendu : "Somme : 12, Différence : 4, Produit : 32"
```
---

## 📌 **5. Variables Superglobales**  
Les superglobales sont des variables prédéfinies accessibles partout dans le script.  

| Superglobale | Description |
|-------------|------------|
| `$_GET` | Récupère les paramètres d’URL (`?nom=Alice`) |
| `$_POST` | Récupère les données envoyées via un formulaire |
| `$_SESSION` | Stocke des données de session |
| `$_COOKIE` | Stocke des données dans le navigateur |
| `$_SERVER` | Contient des infos sur le serveur |
| `$_FILES` | Gère l'upload de fichiers |

Exemple avec `$_GET` :
```php
// URL: http://localhost/test.php?nom=Alice
echo "Bonjour " . $_GET['nom']; // Bonjour Alice
```
### **Exercice 3 : Superglobale `$_GET`**  
💡 Crée un fichier `index.php` et affiche un nom passé en paramètre via l'URL.  
- URL : `http://localhost/index.php?nom=Alice`  
- Résultat attendu : `"Bienvenue Alice!"`

---

## 📌 **6. Variable et portée (Scope)**  
### 🔹 **Variable locale**
Une variable déclarée dans une fonction n’est accessible qu’à l’intérieur.  
```php
function test() {
    $message = "Ceci est local";
    echo $message;
}
test();
// echo $message; // Ceci est local
```

### 🔹 **Variable globale**
Une variable déclarée hors d'une fonction n’est pas accessible à l'intérieur, sauf en utilisant `global`.  
```php
$nom = "Alice";

function direBonjour() {
    global $nom;
    echo "Bonjour " . $nom;
}
direBonjour(); // Bonjour Alice
```

### 🔹 **Variables statiques**
Elles conservent leur valeur entre les appels de la fonction.  
```php
function compteur() {
    static $nombre = 0;
    $nombre++;
    echo $nombre;
}
compteur(); // 1
compteur(); // 2
compteur(); // 3
```
### **Exercice 4 : Portée des variables**  
💡 Corrige ce code pour qu’il fonctionne correctement.  
```php
$nom = "Alice";

function saluer() {
    echo "Salut, " . $nom;
}

saluer(); // Erreur, pourquoi ?
```
### **Exercice 5 : Variable statique**  
💡 Utilise une variable statique pour créer un décompteur d’appels à une fonction.  
```php
compteur(); // 5
compteur(); // 4
compteur(); // 3
```
---

## 📌 **7. Conversion de type (Type Casting)**  
Parfois, on doit forcer une variable à changer de type.  
```php
$nombre = "42"; 
$nombre = (int) $nombre; // Converti en entier
```

---

## 🎯 **Exercices d'Application**  

Essaie de créer un petit script qui demande le **nom** et **âge** de l’utilisateur via un formulaire, puis affiche un message personnalisé.  

Bonne chance😊 🚀