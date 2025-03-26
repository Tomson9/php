## **📌 Qu'est-ce qu'une exception en PHP ?**  
Une **exception** est une erreur qui interrompt le flux normal d'un programme. PHP permet de capturer et de gérer ces erreurs grâce au bloc **try...catch**.  

### **🚀 Syntaxe de base :**
```php
try {
    // Code susceptible de générer une erreur
} catch (Exception $e) {
    // Code exécuté si une exception est levée
} finally {
    // Code exécuté qu'il y ait une exception ou non (optionnel)
}
```

---

## **📌 1. Lever une Exception avec `throw`**
Tu peux lever une exception en utilisant le mot-clé **`throw`**.  

### **Exemple simple :**
```php
<?php
function diviser($a, $b) {
    if ($b == 0) {
        throw new Exception("Division par zéro interdite !");
    }
    return $a / $b;
}

try {
    echo diviser(10, 0);
} catch (Exception $e) {
    echo "Erreur : " . $e->getMessage();
}
?>
```
✅ **Explication :**  
- Si `$b` est **0**, une **exception est levée** (`throw new Exception`).
- **Le bloc `catch` intercepte l'exception** et affiche le message d'erreur.  

---

## **📌 2. Utilisation de `finally`**
Le bloc `finally` s'exécute **toujours**, qu'il y ait une exception ou non.  

### **Exemple :**
```php
<?php
try {
    echo diviser(10, 2);
} catch (Exception $e) {
    echo "Erreur : " . $e->getMessage();
} finally {
    echo "\nOpération terminée.";
}
?>
```
✅ **Explication :**  
- Si tout se passe bien, `finally` s'exécute **après le `try`**.
- Si une exception est levée, **`finally` s'exécute après `catch`**.

---

## **📌 3. Créer une Exception Personnalisée**
On peut créer une **classe d’exception personnalisée** en étendant `Exception`.

### **Exemple :**
```php
<?php
class MonException extends Exception {}

function verifierAge($age) {
    if ($age < 18) {
        throw new MonException("Accès refusé aux mineurs !");
    }
    return "Accès autorisé.";
}

try {
    echo verifierAge(16);
} catch (MonException $e) {
    echo "Erreur : " . $e->getMessage();
}
?>
```
✅ **Explication :**  
- `MonException` hérite de `Exception`, ce qui permet de **personnaliser le type d'erreur**.  
- L'exception est capturée par `catch (MonException $e)`.  

---

## **📌 4. Multicatch : Gérer plusieurs exceptions**
Si un code peut lever **différents types d'exceptions**, tu peux les traiter séparément.  

### **Exemple :**
```php
<?php
class ExceptionA extends Exception {}
class ExceptionB extends Exception {}

try {
    throw new ExceptionB("Erreur de type B");
} catch (ExceptionA $e) {
    echo "C'est une exception de type A : " . $e->getMessage();
} catch (ExceptionB $e) {
    echo "C'est une exception de type B : " . $e->getMessage();
}
?>
```
✅ **Explication :**  
- On capture **différents types d'exceptions** séparément.  
- Seule l'exception correspondante est exécutée.  

---

## **📌 5. Exemple Complet : Gestion d'un Paiement**
```php
<?php
class PaiementException extends Exception {}

function effectuerPaiement($montant) {
    if ($montant <= 0) {
        throw new PaiementException("Montant invalide !");
    }
    return "Paiement de $montant€ effectué.";
}

try {
    echo effectuerPaiement(-50);
} catch (PaiementException $e) {
    echo "Erreur de paiement : " . $e->getMessage();
} finally {
    echo "\nFin du processus de paiement.";
}
?>
```
✅ **Explication :**  
- Si `$montant` est **négatif ou nul**, on lève une `PaiementException`.  
- **L'erreur est capturée** et gérée proprement.  
- **`finally` affiche un message**, que le paiement réussisse ou non.  

---

## **📌 Exercices d'Application 📝**
1️⃣ **Validation de formulaire :**  
   - Crée une fonction qui valide un **nom d'utilisateur**.  
   - Si le nom est vide ou trop court (`< 3 caractères`), **lève une exception**.  
   - Capture l'erreur et affiche un message approprié.  

---