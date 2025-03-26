### 📌 **Notions Essentielles de la POO en PHP : Classes, Objets, Propriétés et Méthodes**  

Avant d’entrer dans le code, voici un aperçu des **concepts clés** :  

| **Concept**  | **Définition**  |
|-------------|---------------|
| **Classe**  | Modèle ou plan définissant les propriétés et méthodes d’un objet.  |
| **Objet**   | Instance d’une classe qui possède ses propres valeurs pour les propriétés.  |
| **Propriété** | Variable définie dans une classe, représentant un état ou une information d’un objet. |
| **Méthode** | Fonction définie dans une classe, représentant un comportement ou une action de l’objet. |

---

## **1️⃣ Définition d’une Classe**  

Une **classe** est un modèle qui définit ce qu’un objet doit contenir : **des propriétés (variables)** et **des méthodes (fonctions)**.  

```php
<?php
class Voiture {
    // Déclaration d'une propriété
    public $marque;
    
    // Déclaration d'une méthode
    public function demarrer() {
        echo "La voiture démarre !";
    }
}
?>
```
➡ **Explication** :
- `class Voiture` : Définit une classe appelée `Voiture`.
- `$marque` : Propriété de la voiture (modèle ou marque).
- `demarrer()` : Méthode qui affiche un message.

---

## **2️⃣ Création d’un Objet (Instanciation)**  

Un **objet** est une instance d’une classe. On utilise le mot-clé `new` pour le créer.

```php
<?php
// Instanciation d'un objet à partir de la classe Voiture
$maVoiture = new Voiture();

// Attribution d’une valeur à la propriété "marque"
$maVoiture->marque = "Toyota";

// Affichage de la propriété
echo $maVoiture->marque; // Affiche : Toyota

// Appel de la méthode "demarrer"
$maVoiture->demarrer(); // Affiche : La voiture démarre !
?>
```

➡ **Explication** :
- `$maVoiture = new Voiture();` → Création d’un objet basé sur la classe `Voiture`.
- `$maVoiture->marque = "Toyota";` → Affectation d’une valeur à la propriété `marque`.
- `echo $maVoiture->marque;` → Affichage de la marque.
- `$maVoiture->demarrer();` → Appel de la méthode.

---

## **3️⃣ Propriétés : Définition et Accès**
### **Déclaration des Propriétés**
Une propriété est une **variable contenue dans une classe**.  
Elle est définie avec une **visibilité (`public`, `private`, `protected`)**.

```php
<?php
class Utilisateur {
    public $nom = "Alice"; // Propriété accessible partout
}
?>
```

### **Accès aux Propriétés**
L’accès se fait avec l’opérateur `->`.

```php
<?php
$user = new Utilisateur();
echo $user->nom; // Affiche : Alice
?>
```

➡ **Remarque** :  
Si la propriété est `private`, elle ne sera **pas accessible directement**.

---

## **4️⃣ Méthodes : Définition et Appel**
### **Déclaration des Méthodes**
Une **méthode** est une **fonction définie dans une classe**.

```php
<?php
class Chien {
    public function aboyer() {
        echo "Wouf Wouf !";
    }
}
?>
```

### **Appel des Méthodes**
On utilise **l’opérateur `->`** pour appeler une méthode.

```php
<?php
$monChien = new Chien();
$monChien->aboyer(); // Affiche : Wouf Wouf !
?>
```

➡ **Explication** :
- `$monChien->aboyer();` → Appelle la méthode `aboyer()` définie dans la classe `Chien`.

---

## **🛠 Exercices Pratiques**
### **Exercice 1 : Créer une classe `Personne`**
1. Créer une classe `Personne` avec :
   - Une propriété `nom` (publique).
   - Une méthode `saluer()` qui affiche `"Bonjour, je suis " . $nom`.
2. Instancier un objet de cette classe avec le nom `"John"`, puis appeler `saluer()`.

---

### **Exercice 2 : Créer une classe `Rectangle`**
1. Créer une classe `Rectangle` avec :
   - Deux propriétés `longueur` et `largeur` (publiques).
   - Une méthode `calculerAire()` qui retourne `longueur * largeur`.
2. Instancier un objet, attribuer des valeurs, et afficher l’aire.


---

### **🌟 En Résumé**
✅ Une **classe** est un modèle définissant **des propriétés et méthodes**.  
✅ Un **objet** est une instance d’une classe.  
✅ Une **propriété** est une variable contenue dans une classe.  
✅ Une **méthode** est une fonction définie dans une classe.  
✅ **L’opérateur `->`** permet d’accéder aux propriétés et méthodes d’un objet.  

➡ **🔜 Prochaine Étape** : Comprendre **les constructeurs** (`__construct`) et la gestion de **la visibilité** (`public`, `private`, `protected`) 🚀.