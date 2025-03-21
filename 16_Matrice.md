### **📌 Les Tableaux Multidimensionnels en PHP**  
Un **tableau multidimensionnel** est un tableau qui **contient d'autres tableaux** comme éléments.  
Oui, on peut aussi appeler cela une **matrice** lorsqu'il s'agit d'un tableau à **deux dimensions avec des nombres** (comme en mathématiques).  

---

## **1. Tableau Multidimensionnel avec des Entiers**  
Un **exemple simple** d'une matrice (tableau 2D) contenant uniquement des nombres :  

```php
$matrice = [
    [1, 2, 3],
    [4, 5, 6],
    [7, 8, 9]
];
```
📌 **Accéder à un élément précis**  
```php
echo $matrice[0][1]; // Affiche 2
```
📌 **Boucle pour parcourir la matrice**  
```php
foreach ($matrice as $ligne) {
    foreach ($ligne as $valeur) {
        echo $valeur . " ";
    }
    echo "<br>";
}
```
💡 **Résultat attendu** :
```
1 2 3  
4 5 6  
7 8 9  
```

---

## **2. Tableau Multidimensionnel avec des Strings et des Nombres**  
On peut mélanger des **nombres et des chaînes de caractères** :

```php
$eleves = [
    ["nom" => "Alice", "age" => 18, "note" => 15],
    ["nom" => "Bob", "age" => 20, "note" => 12],
    ["nom" => "Charlie", "age" => 19, "note" => 17]
];
```
📌 **Accéder à un élément précis**  
```php
echo $eleves[1]["nom"]; // Affiche "Bob"
```
📌 **Parcourir le tableau avec une boucle**  
```php
foreach ($eleves as $eleve) {
    echo $eleve["nom"] . " a " . $eleve["age"] . " ans et a obtenu " . $eleve["note"] . "/20.<br>";
}
```
💡 **Résultat attendu** :
```
Alice a 18 ans et a obtenu 15/20.  
Bob a 20 ans et a obtenu 12/20.  
Charlie a 19 ans et a obtenu 17/20.  
```

---

## **3. Tableau Multidimensionnel Associatif (Plus complexe)**  
On peut créer une structure plus avancée, par exemple un **tableau de classes avec des élèves** :  
```php
$classes = [
    "Classe A" => [
        ["nom" => "Alice", "age" => 18],
        ["nom" => "Bob", "age" => 20]
    ],
    "Classe B" => [
        ["nom" => "Charlie", "age" => 19],
        ["nom" => "David", "age" => 21]
    ]
];
```
📌 **Accéder à un élément précis**  
```php
echo $classes["Classe A"][0]["nom"]; // Affiche "Alice"
```
📌 **Parcourir un tableau à plusieurs niveaux**  
```php
foreach ($classes as $classe => $eleves) {
    echo "📌 $classe :<br>";
    foreach ($eleves as $eleve) {
        echo "- " . $eleve["nom"] . ", " . $eleve["age"] . " ans<br>";
    }
}
```
💡 **Résultat attendu** :
```
📌 Classe A :
- Alice, 18 ans  
- Bob, 20 ans  

📌 Classe B :
- Charlie, 19 ans  
- David, 21 ans  
```

---

## **📌 Exercice Pratique**
💡 **Exercice : Manipulation de tableaux multidimensionnels**  
1. Crée un tableau qui représente une grille de 3x3 contenant des nombres (comme une matrice).  
2. Affiche un élément précis (par exemple, la case du milieu).  
3. Ajoute une nouvelle ligne de nombres.  
4. Parcours la matrice pour afficher tous les nombres sous forme de tableau.  

T'en sens tu  capable ? 😊