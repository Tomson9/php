## 📌 **Les Fonctions en PHP**  

Les **fonctions** permettent de **réutiliser du code** en regroupant des instructions sous un nom spécifique. Cela évite la répétition et rend le code plus structuré et plus lisible.  

---

## **1️⃣ Définition et Utilisation des Fonctions**
### **🔹 Définir une fonction**
📌 **Syntaxe :**  
```php
function nomDeLaFonction() {
    // Instructions
}
```
📌 **Exemple :**  
```php
function bonjour() {
    echo "Bonjour !";
}

// Appel de la fonction
bonjour(); // Affiche : Bonjour !
```

---

### **🔹 Fonction avec Paramètres**
On peut **passer des valeurs** à une fonction pour qu’elle travaille avec.  

📌 **Exemple :**  
```php
function saluer($nom) {
    echo "Bonjour, $nom !<br>";
}

saluer("Alice");  // Affiche : Bonjour, Alice !
saluer("Bob");    // Affiche : Bonjour, Bob !
```
💡 **Explication :**  
- `$nom` est un **paramètre**. Il reçoit une valeur lors de l'appel de la fonction.  
- On peut appeler la fonction avec **différents noms**.  

---

### **🔹 Fonction avec Valeur de Retour (`return`)**
📌 **Exemple :**  
```php
function addition($a, $b) {
    return $a + $b;
}

$resultat = addition(3, 5);
echo "Résultat : $resultat"; // Affiche : Résultat : 8
```
💡 **Explication :**  
- `return` **renvoie** un résultat que l'on peut stocker dans une variable (`$resultat`).  

---

### **🔹 Valeur par Défaut dans les Paramètres**
Si un paramètre n’est pas fourni, une valeur **par défaut** est utilisée.  

📌 **Exemple :**  
```php
function direBonjour($nom = "Visiteur") {
    echo "Bonjour, $nom !<br>";
}

direBonjour();        // Affiche : Bonjour, Visiteur !
direBonjour("Alice"); // Affiche : Bonjour, Alice !
```
💡 **Explication :**  
- Si aucun nom n’est donné, `"Visiteur"` est utilisé.  

---

### **🔹 Paramètres Multiples avec `func_get_args()`**
📌 **Exemple :**  
```php
function somme() {
    $nombres = func_get_args(); // Récupère tous les arguments sous forme de tableau
    return array_sum($nombres);
}

echo somme(2, 4, 6); // Affiche : 12
```
💡 **Explication :**  
- `func_get_args()` permet de récupérer **tous** les paramètres sous forme de tableau.  
- `array_sum()` additionne tous les éléments.  

---

## **2️⃣ Les Fonctions Fléchées (`Arrow Functions`)**
Les **fonctions fléchées** sont une **syntaxe raccourcie** pour écrire des fonctions anonymes.  

📌 **Syntaxe :**  
```php
$nomDeLaFonction = fn($param1, $param2) => expression;
```

📌 **Exemple :**  
```php
$carre = fn($x) => $x * $x;

echo $carre(4); // Affiche : 16
```
💡 **Explication :**  
- Pas besoin d’écrire `return` ni d’ouvrir des `{}`.  
- Une seule expression est retournée automatiquement.  

---

### **🔹 Différence avec une Fonction Anonyme Classique**
📌 **Fonction anonyme :**  
```php
$carre = function($x) {
    return $x * $x;
};
```

📌 **Fonction fléchée équivalente :**  
```php
$carre = fn($x) => $x * $x;
```
✅ **Les fonctions fléchées sont plus concises !**  

---

### **🔹 Utilisation avec `array_map()`**
📌 **Exemple :**  
```php
$nombres = [1, 2, 3, 4];

$cubes = array_map(fn($x) => $x ** 3, $nombres);

print_r($cubes); // Affiche : [1, 8, 27, 64]
```
💡 **Explication :**  
- `array_map(fn($x) => $x ** 3, $nombres)` applique une **fonction fléchée** à chaque élément du tableau.  

---

## **📌 Exercice Pratique**
1. Crée une fonction **`multiplication`** qui prend **deux nombres** en paramètre et **retourne leur produit**.  
2. Crée une **fonction fléchée** qui retourne la longueur d’une chaîne de caractères.  
3. Crée une fonction qui prend un tableau de nombres et retourne **leur somme** en utilisant `array_sum()`.  

💡 **Qu'en penses-tu ?** 😊


