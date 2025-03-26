## **Héritage, Polymorphisme, Classes Abstraites et Interfaces en PHP 🚀**

La Programmation Orientée Objet (POO) devient encore plus puissante avec ces concepts clés :

1️⃣ **L'héritage (`extends`)** : Permet à une classe d’hériter des propriétés et méthodes d’une autre classe.  
2️⃣ **Le polymorphisme** : Permet de redéfinir des méthodes pour obtenir des comportements différents.  
3️⃣ **Les classes abstraites** : Classes qui ne peuvent pas être instanciées directement.  
4️⃣ **Les interfaces** : Définitions strictes des méthodes que doivent implémenter les classes.  

---

## **1️⃣ L’Héritage (`extends`)**
L’héritage permet de **réutiliser le code** en créant une nouvelle classe à partir d’une autre.  
La classe enfant **hérite** des méthodes et propriétés de la classe parent.

### **🔹 Syntaxe :**
```php
class ParentClass {
    // Code commun
}

class EnfantClass extends ParentClass {
    // Code spécifique à l’enfant
}
```

### **🔹 Exemple :**
```php
<?php
class Animal {
    public $nom;

    public function __construct($nom) {
        $this->nom = $nom;
    }

    public function crier() {
        echo "Cet animal fait un bruit.";
    }
}

// La classe Chien hérite de Animal
class Chien extends Animal {
    public function crier() {
        echo $this->nom . " aboie : Ouaf ! Ouaf !";
    }
}

// Instanciation
$monChien = new Chien("Rex");
$monChien->crier(); // Affiche : Rex aboie : Ouaf ! Ouaf !
?>
```
✅ **Avantages** : Réutilisation du code, évite la duplication.

---

## **2️⃣ Le Polymorphisme**
Le polymorphisme signifie que **les classes héritées peuvent redéfinir des méthodes** pour avoir un comportement différent.

### **🔹 Exemple de polymorphisme avec redéfinition (`override`)**
```php
<?php
class Animal {
    public function crier() {
        echo "Cet animal fait un bruit.";
    }
}

class Chien extends Animal {
    public function crier() {
        echo "Ouaf ! Ouaf !"; // Redéfinition
    }
}

class Chat extends Animal {
    public function crier() {
        echo "Miaou !"; // Redéfinition
    }
}

// Utilisation
$chien = new Chien();
$chien->crier(); // Affiche : Ouaf ! Ouaf !

$chat = new Chat();
$chat->crier(); // Affiche : Miaou !
?>
```
✅ **Avantage** : Permet d’utiliser une seule méthode (`crier()`) pour plusieurs types d’objets.

---

## **3️⃣ Les Classes Abstraites (`abstract`)**
Une **classe abstraite** est une classe qui **ne peut pas être instanciée** directement.  
Elle **doit être héritée** par d’autres classes.

### **🔹 Règles :**
- Une classe abstraite **peut contenir** des **méthodes normales et abstraites**.
- Une méthode abstraite **n'a pas de corps** et doit être **implémentée dans les classes enfants**.

### **🔹 Exemple :**
```php
<?php
abstract class Forme {
    abstract public function aire(); // Méthode abstraite
}

class Carre extends Forme {
    private $cote;

    public function __construct($cote) {
        $this->cote = $cote;
    }

    public function aire() {
        return $this->cote * $this->cote;
    }
}

// $forme = new Forme(); ❌ Impossible d'instancier une classe abstraite

$carre = new Carre(4);
echo "Aire du carré : " . $carre->aire(); // Affiche : Aire du carré : 16
?>
```
✅ **Avantage** : Oblige les classes héritées à définir certaines méthodes.

---

## **4️⃣ Les Interfaces**
Une **interface** est un contrat qui oblige les classes à **implémenter toutes les méthodes définies**.  

### **🔹 Différences entre Interface et Classe Abstraite**
| **Classe Abstraite** | **Interface** |
|----------------------|--------------|
| Peut contenir des méthodes implémentées | Ne contient que des méthodes sans corps |
| Peut contenir des propriétés | Ne contient **pas** de propriétés |
| Une classe peut hériter d’UNE seule classe abstraite | Une classe peut implémenter PLUSIEURS interfaces |

### **🔹 Exemple :**
```php
<?php
interface AnimalInterface {
    public function crier();
}

class Chien implements AnimalInterface {
    public function crier() {
        echo "Ouaf ! Ouaf !";
    }
}

class Chat implements AnimalInterface {
    public function crier() {
        echo "Miaou !";
    }
}

$chien = new Chien();
$chien->crier(); // Affiche : Ouaf ! Ouaf !

$chat = new Chat();
$chat->crier(); // Affiche : Miaou !
?>
```
✅ **Avantage** : Permet d'assurer qu’une classe implémente bien certaines méthodes.

---

## **📌 Résumé**
✅ **Héritage (`extends`)** : Une classe hérite des propriétés et méthodes d’une autre.  
✅ **Polymorphisme** : Une méthode peut être redéfinie dans une classe héritée.  
✅ **Classe abstraite (`abstract`)** : Ne peut pas être instanciée, mais oblige les classes enfants à implémenter certaines méthodes.  
✅ **Interface (`interface`)** : Définit un contrat que les classes doivent respecter.

---

## **💡 Exercices Pratiques**
### **Exercice 1 : Héritage et Polymorphisme**
1. Crée une classe `Vehicule` avec une méthode `rouler()`.
2. Crée deux classes `Voiture` et `Moto` qui héritent de `Vehicule`.
3. Redéfinis la méthode `rouler()` pour chaque classe.

---

### **Exercice 2 : Classe Abstraite**
1. Crée une classe abstraite `Personnage` avec une méthode abstraite `attaquer()`.
2. Crée deux classes `Guerrier` et `Mage` qui héritent de `Personnage` et implémentent `attaquer()`.

---

### **Exercice 3 : Interface**
1. Crée une interface `MoyenTransport` avec la méthode `deplacer()`.
2. Crée les classes `Train` et `Bateau` qui implémentent `MoyenTransport`.

---

💬 **Prêt à tester tes connaissances ? A ton clavier!** 🚀