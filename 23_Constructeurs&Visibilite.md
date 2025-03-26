### 📌 **Les Constructeurs et la Gestion de la Visibilité (`public`, `private`, `protected`) en PHP**  

Maintenant que tu maîtrises les bases des classes, objets, propriétés et méthodes, voyons deux notions essentielles en POO :  

1️⃣ **Les constructeurs (`__construct`)** : Permettent d'initialiser un objet dès sa création.  
2️⃣ **La gestion de la visibilité** : Définit comment les propriétés et méthodes peuvent être accédées.  

---

## **1️⃣ Le Constructeur `__construct()`**
Un **constructeur** est une **méthode spéciale** qui est **automatiquement exécutée** lors de la création d'un objet.  
Il est défini avec le mot-clé `__construct()`.

### **💡 Pourquoi l’utiliser ?**
- Évite d’avoir à définir les valeurs après instanciation.
- Automatise l’initialisation des propriétés.

### **Exemple sans constructeur**
```php
<?php
class Utilisateur {
    public $nom;

    public function saluer() {
        echo "Bonjour, je suis " . $this->nom;
    }
}

$u = new Utilisateur();
$u->nom = "Alice"; // Obligé d’attribuer la valeur après création
$u->saluer(); // Affiche : Bonjour, je suis Alice
?>
```

### **Exemple avec constructeur**
```php
<?php
class Utilisateur {
    public $nom;

    // Constructeur qui initialise la propriété $nom
    public function __construct($nom) {
        $this->nom = $nom;
    }

    public function saluer() {
        echo "Bonjour, je suis " . $this->nom;
    }
}

// Création d’un objet en passant directement le nom
$u = new Utilisateur("Alice");
$u->saluer(); // Affiche : Bonjour, je suis Alice
?>
```

✅ **Avantage** : On ne **définit plus `nom` séparément**, il est automatiquement attribué lors de la création.  

---

## **2️⃣ La Gestion de la Visibilité (`public`, `private`, `protected`)**
### **Définition**
Les mots-clés **`public`**, **`private`** et **`protected`** contrôlent l’accès aux **propriétés et méthodes** d’une classe.

| **Visibilité** | **Accessibilité depuis...** | **Exemple** |
|--------------|---------------------------|------------|
| **public** | Partout (dans la classe, les objets, les classes héritées) | ✅ Le plus utilisé |
| **private** | Seulement dans la classe qui le définit | 🔒 Invisible en dehors |
| **protected** | Dans la classe qui le définit **et** les classes héritées | 🔐 Utile pour l’héritage |

### **Exemple de chaque visibilité**
```php
<?php
class Compte {
    public $nom; // Accessible partout
    private $solde = 1000; // Accessible uniquement dans la classe
    protected $codeSecret = "1234"; // Accessible dans la classe et les classes héritées

    public function afficherSolde() {
        echo "Solde: " . $this->solde;
    }
}

$monCompte = new Compte();
$monCompte->nom = "Jean";
echo $monCompte->nom; // ✅ Fonctionne

$monCompte->afficherSolde(); // ✅ Fonctionne

echo $monCompte->solde; // ❌ Erreur ! solde est privé
echo $monCompte->codeSecret; // ❌ Erreur ! codeSecret est protégé
?>
```

✅ **Règles à retenir** :
- **`public`** → Accessible partout.
- **`private`** → Accessible seulement dans la classe.
- **`protected`** → Accessible dans la classe et les classes héritées.

---

## **3️⃣ Accès aux Propriétés Privées : Getters et Setters**
Les propriétés `private` et `protected` **ne sont pas accessibles directement**.  
On utilise des **méthodes getter et setter** pour y accéder **de manière contrôlée**.

### **Exemple avec getter et setter**
```php
<?php
class Compte {
    private $solde = 1000; // Solde protégé

    // Getter : permet de récupérer la valeur de $solde
    public function getSolde() {
        return $this->solde;
    }

    // Setter : permet de modifier la valeur de $solde en s'assurant que c'est positif
    public function setSolde($nouveauSolde) {
        if ($nouveauSolde >= 0) {
            $this->solde = $nouveauSolde;
        } else {
            echo "Le solde ne peut pas être négatif.";
        }
    }
}

$monCompte = new Compte();

// Accès sécurisé au solde via le getter
echo $monCompte->getSolde(); // ✅ Affiche : 1000

// Modification du solde via le setter
$monCompte->setSolde(2000);
echo $monCompte->getSolde(); // ✅ Affiche : 2000

// Tentative d’attribuer un solde négatif
$monCompte->setSolde(-500); // ❌ Affiche : Le solde ne peut pas être négatif.
?>
```

✅ **Avantages des getters et setters** :
- **Sécurisent l’accès aux propriétés privées**.
- **Permettent d’ajouter des vérifications** (ex: empêcher un solde négatif).
- **Encapsulent les données** et évitent des modifications involontaires.

---

## **4️⃣ Exercices Pratiques**
### **Exercice 1 : Créer une classe `Voiture` avec un constructeur**
1. Créer une classe `Voiture` avec :
   - Une propriété `marque` (privée).
   - Un constructeur qui initialise `marque`.
   - Une méthode `afficherMarque()` qui affiche la marque.
2. Instancier un objet `Voiture` et afficher la marque.

---

### **Exercice 2 : Créer une classe `CompteBancaire`**
1. Créer une classe `CompteBancaire` avec :
   - Une propriété privée `solde` initialisée à 1000.
   - Un constructeur pour donner un solde initial.
   - Un `getter` `getSolde()` pour afficher le solde.
   - Un `setter` `deposer()` pour ajouter de l’argent.
   - Une méthode `retirer()` qui enlève de l’argent mais empêche un solde négatif.


---

## **🌟 En Résumé**
✅ **`__construct()`** permet d’initialiser un objet dès sa création.  
✅ La visibilité contrôle l’accès aux propriétés et méthodes (`public`, `private`, `protected`).  
✅ **Les getters et setters** permettent d’accéder et modifier **les propriétés privées**.  

➡ **🔜 Prochaine Étape** : **L’héritage (`extends`), les classes abstraites et les interfaces**. Jusque la j'espère que ca va ? 🚀