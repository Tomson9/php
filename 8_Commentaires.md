### **💡 Les Commentaires en PHP**
Les **commentaires** en PHP servent à **documenter le code** en ajoutant des explications que le moteur PHP **n'exécute pas**. Ils sont utiles pour **rendre le code plus compréhensible** pour toi et d'autres développeurs.

---

## **1️⃣ Les Types de Commentaires en PHP**
### 🔹 **1.1 Les Commentaires sur une Ligne**
Tu peux utiliser **`//`** ou **`#`** pour écrire un commentaire sur une seule ligne :

```php
<?php
// Ceci est un commentaire sur une ligne
echo "Hello World"; // Affiche "Hello World"

# Ceci est aussi un commentaire sur une ligne
echo "PHP est génial!";
?>
```

### 🔹 **1.2 Les Commentaires Multilignes**
Si tu veux écrire un **commentaire sur plusieurs lignes**, utilise `/* ... */` :

```php
<?php
/* 
   Ceci est un commentaire 
   sur plusieurs lignes
*/
echo "Bienvenue en PHP!";
?>
```

---

## **2️⃣ Pourquoi Utiliser les Commentaires ?**
✅ **Expliquer le code** pour d'autres développeurs ou pour toi-même plus tard.  
✅ **Désactiver temporairement** une ligne de code sans la supprimer.  
✅ **Ajouter des instructions** ou **marquer des sections importantes**.  

Exemple :
```php
<?php
// Initialisation de la variable
$nom = "Alice";

/* 
   Vérification du nom
   Si le nom est vide, on affiche un message d'erreur.
*/
if ($nom == "") {
    echo "Erreur : le nom est requis!";
} else {
    echo "Bienvenue, $nom!";
}
?>
```

---

## **3️⃣ Bonnes Pratiques avec les Commentaires**
✔ **Sois clair et concis** : Évite les commentaires inutiles qui répètent le code.  
❌ **Mauvais commentaire :**
```php
$x = 5; // On met 5 dans x
```
✔ **Bon commentaire :**
```php
$x = 5; // Nombre d'articles par défaut
```
✔ **Utilise les commentaires pour documenter les fonctions** :
```php
/**
 * Calcule la somme de deux nombres.
 *
 * @param int $a Premier nombre
 * @param int $b Deuxième nombre
 * @return int Somme des deux nombres
 */
function addition($a, $b) {
    return $a + $b;
}
```

---

## **🔥 Exercice Pratique**
Crée un fichier `calculer.php` et ajoute des **commentaires clairs** dans le code suivant :

```php
<?php
// 
function calculerAge($annee_naissance) {
    // 
    $annee_actuelle = date("Y");

    // 
    $age = $annee_actuelle - $annee_naissance;

    // 
    return $age;
}

// 
$naissance = 1995;

//
echo "Vous avez " . calculerAge($naissance) . " ans.";
?>
```
---

### **🎯 Défi Bonus**
🔹 Ajoute une **documentation de fonction** en utilisant `/** ... */` 

---



