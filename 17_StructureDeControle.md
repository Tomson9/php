### **📌 Les Structures de Contrôle en PHP**  

Les **structures de contrôle** permettent d'exécuter du code **de manière conditionnelle** ou **répétitive** en fonction de certaines règles. Elles sont **essentielles** en programmation pour prendre des décisions et automatiser des tâches.  

Elles se divisent en deux grandes catégories :
1. **Les structures conditionnelles** (permettent d’exécuter du code sous certaines conditions).
2. **Les structures itératives (boucles)** (permettent d’exécuter un bloc de code plusieurs fois).  

---

## **1️⃣ Les Structures Conditionnelles**
Elles permettent de **tester une condition** et d'exécuter du code si la condition est vraie.

### **1.1 - `if`, `else if`, `else`**  
📌 **Syntaxe :**  
```php
$age = 18;

if ($age < 18) {
    echo "Mineur";
} elseif ($age == 18) {
    echo "Tout juste majeur";
} else {
    echo "Majeur";
}
```
💡 **Explication :**  
- **Si `$age` est inférieur à 18**, on affiche `"Mineur"`.  
- **Si `$age` est exactement 18**, on affiche `"Tout juste majeur"`.  
- **Sinon (`else`)**, on affiche `"Majeur"`.  

---

### **1.2 - `switch` (Alternative à `if` pour plusieurs cas)**
📌 **Exemple :**  
```php
$jour = "Lundi";

switch ($jour) {
    case "Lundi":
        echo "Début de semaine 😩";
        break;
    case "Vendredi":
        echo "Bientôt le week-end 🎉";
        break;
    case "Samedi":
    case "Dimanche":
        echo "C'est le week-end 🏖️";
        break;
    default:
        echo "Journée normale 😐";
}
```
💡 **Explication :**  
- On teste **plusieurs cas possibles** pour `$jour`.  
- Si `$jour == "Lundi"`, on affiche `"Début de semaine 😩"`.  
- Le `break` permet d'arrêter l'exécution une fois qu'une condition est satisfaite.  
- `default` s'exécute si **aucune condition n'est remplie**.  

---

## **2️⃣ Les Structures Itératives (Boucles)**
Les **boucles** permettent d'exécuter un bloc de code **plusieurs fois**.

### **2.1 - `while` (Tant qu'une condition est vraie)**
📌 **Exemple :**  
```php
$i = 1;

while ($i <= 5) {
    echo "Numéro : $i <br>";
    $i++;
}
```
💡 **Explication :**  
- Tant que `$i <= 5`, on affiche `"Numéro : $i"` puis on **incrémente** `$i`.  

---

### **2.2 - `do...while` (S'exécute au moins une fois)**
📌 **Exemple :**  
```php
$i = 1;

do {
    echo "Valeur : $i <br>";
    $i++;
} while ($i <= 3);
```
💡 **Différence avec `while` :**  
- **La boucle s'exécute au moins une fois** (même si `$i > 3`).  

---

### **2.3 - `for` (Boucle avec compteur)**
📌 **Exemple :**  
```php
for ($i = 1; $i <= 5; $i++) {
    echo "Itération $i <br>";
}
```
💡 **Explication :**  
- On initialise `$i = 1`.  
- On répète tant que `$i <= 5`.  
- On incrémente `$i` après chaque tour (`$i++`).  

---

### **2.4 - `foreach` (Parcourir un tableau)**
📌 **Exemple :**  
```php
$fruits = ["Pomme", "Banane", "Cerise"];

foreach ($fruits as $fruit) {
    echo "Fruit : $fruit <br>";
}
```
💡 **Explication :**  
- `foreach` parcourt **chaque élément** du tableau `$fruits` et l'affecte à `$fruit`.  

---

## **3️⃣ `break` et `continue` (Contrôle de boucles)**
📌 **`break` (Arrête la boucle)**  
```php
for ($i = 1; $i <= 10; $i++) {
    if ($i == 5) {
        break; // Arrête la boucle à 5
    }
    echo "Valeur : $i <br>";
}
```
---

📌 **`continue` (Saute une itération et continue)**  
```php
for ($i = 1; $i <= 5; $i++) {
    if ($i == 3) {
        continue; // Ignore 3
    }
    echo "Numéro : $i <br>";
}
```
💡 **Explication :**  
- Si `$i == 3`, on saute cette itération et on passe directement à `$i = 4`.  

---

## **📌 Exercice Pratique**
1. Écris un script qui affiche **les nombres pairs de 1 à 10** en utilisant `for`.  
2. Écris une boucle `while` qui affiche `"Tic Tac"` 5 fois.  
3. Écris une boucle `foreach` qui affiche tous les jours de la semaine stockés dans un tableau associatif avec leur équivalent en anglais.  

Facile n'est-ce pas? 😊