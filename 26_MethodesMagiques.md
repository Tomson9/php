Les **méthodes magiques** en PHP sont des méthodes spéciales qui commencent par `__` (double underscore) et permettent d'intercepter certains comportements des objets.  

---

# **📌 Les Méthodes Magiques en PHP**

Ces méthodes sont définies dans une classe et sont appelées **automatiquement** par PHP lorsqu’un certain événement se produit.  

Voici les **plus importantes** et leur rôle :

| Méthode magique | Description |
|---------------|------------|
| `__construct()` | Méthode appelée **automatiquement** lors de l'instanciation d'un objet. |
| `__toString()` | Permet de **convertir un objet en chaîne de caractères** lorsqu’il est affiché. |
| `__get($property)` | Intercepte la lecture d'une propriété **inaccessible** (privée ou inexistante). |
| `__set($property, $value)` | Intercepte l’écriture d'une propriété **inaccessible**. |

---

## **1️⃣ `__construct()` – Le Constructeur**
La méthode `__construct()` est appelée **automatiquement** lorsqu'un nouvel objet est instancié.

### **Exemple :**
```php
<?php
class Utilisateur {
    public $nom;

    // Constructeur : appelé automatiquement lors de la création de l'objet
    public function __construct($nom) {
        $this->nom = $nom;
        echo "Nouvel utilisateur créé : $this->nom\n";
    }
}

// Instanciation de l'objet
$user1 = new Utilisateur("Alice");
$user2 = new Utilisateur("Bob");
?>
```
✅ **Explication :**  
- `__construct($nom)` est **appelé automatiquement** quand un nouvel objet est créé.  
- `$this->nom` stocke la valeur passée en paramètre.  
- Affiche `"Nouvel utilisateur créé : ..."`.  

---

## **2️⃣ `__toString()` – Convertir un Objet en Chaîne**
La méthode `__toString()` permet de **définir comment un objet doit être affiché sous forme de texte**.

### **Exemple :**
```php
<?php
class Utilisateur {
    public $nom;

    public function __construct($nom) {
        $this->nom = $nom;
    }

    // Méthode magique __toString()
    public function __toString() {
        return "Utilisateur : $this->nom";
    }
}

$user = new Utilisateur("Charlie");

// Affichage de l'objet (PHP appelle automatiquement __toString())
echo $user;
?>
```
✅ **Explication :**  
- Sans `__toString()`, un objet affiché avec `echo` provoquerait une erreur.  
- Avec `__toString()`, l’objet est **converti en une chaîne lisible**.  

---

## **3️⃣ `__get($property)` – Lire une Propriété Privée**
La méthode `__get($property)` est appelée lorsqu'on **essaie d'accéder** à une propriété **privée** ou **inexistante**.

### **Exemple :**
```php
<?php
class Utilisateur {
    private $email = "exemple@email.com";

    // Intercepte la lecture d'une propriété privée ou inexistante
    public function __get($nomPropriete) {
        return "⚠️ Erreur : '$nomPropriete' est inaccessible !";
    }
}

$user = new Utilisateur();

// Essaye d'accéder à une propriété privée
echo $user->email;
?>
```
✅ **Explication :**  
- `__get()` est **appelé automatiquement** quand une propriété **privée** ou **inexistante** est accédée.  
- Renvoie un message d'erreur personnalisé au lieu d'une erreur PHP classique.  

---

## **4️⃣ `__set($property, $value)` – Modifier une Propriété Privée**
La méthode `__set($property, $value)` est appelée lorsqu'on essaie de **modifier une propriété privée ou inexistante**.

### **Exemple :**
```php
<?php
class Utilisateur {
    private $email;

    // Intercepte l'écriture d'une propriété privée ou inexistante
    public function __set($nomPropriete, $valeur) {
        echo "⚠️ Impossible de modifier '$nomPropriete' directement !\n";
    }
}

$user = new Utilisateur();

// Essaye de modifier une propriété privée
$user->email = "new@email.com";
?>
```
✅ **Explication :**  
- `__set()` est **appelé automatiquement** si on essaie d’écrire dans une propriété **privée** ou **inexistante**.  
- Empêche la modification directe et affiche un message.  

---

# **🎯 Récapitulatif des Utilisations**
| Méthode | Quand est-elle appelée ? | Utilité principale |
|---------|-----------------|----------------|
| `__construct()` | Lors de la création d'un objet | Initialiser des valeurs |
| `__toString()` | Quand un objet est affiché avec `echo` | Représenter l'objet sous forme de texte |
| `__get()` | Lorsqu'on tente d'accéder à une propriété **privée** ou **inexistante** | Empêcher les accès non autorisés |
| `__set()` | Lorsqu'on tente de modifier une propriété **privée** ou **inexistante** | Empêcher les modifications non autorisées |

---

# **📌 Exercices 📝**
1️⃣ **Classe `Produit` avec `__construct()`**  
   - Crée une classe `Produit` avec les **propriétés privées** `nom` et `prix`.  
   - Initialise-les via un **constructeur**.  

2️⃣ **Classe `Personne` avec `__toString()`**  
   - Crée une classe `Personne` avec `nom` et `âge`.  
   - Définis `__toString()` pour afficher `"Nom: [nom], Âge: [âge]"`.  

3️⃣ **Classe `Banque` avec `__get()` et `__set()`**  
   - Crée une classe `Banque` avec une propriété **privée** `solde`.  
   - Utilise `__get()` pour afficher `"Accès interdit"`.  
   - Utilise `__set()` pour empêcher toute modification de `solde`.  

---