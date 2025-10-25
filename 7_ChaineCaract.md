### 🔍 **Explication de la ligne :**  
```php
echo "Hello, World!";
```

---

## 📌 **1️⃣ Comprendre `echo`**
`echo` est une **instruction** en PHP qui permet d'afficher du texte ou du contenu sur une page web.  

Exemples :  
```php
echo "Bonjour !";
echo 42;
echo "Le prix est de " . 10 . "€";
```
💡 `echo` **n'est pas une fonction**, donc il ne nécessite pas de parenthèses comme `echo("Hello");`, bien que cela soit possible.

---

## 📌 **2️⃣ `"Hello, World!"`**
- **Les guillemets `"` entourent une chaîne de caractères** (string).  
- PHP comprend que tu veux afficher le texte `"Hello, World!"` tel quel.  

Exemple :  
```php
echo "Ceci est un texte";
```
affichera :  
```
Ceci est un texte
```

Tu peux aussi utiliser des guillemets simples `'` :  
```php
echo 'Hello, World!';
```
⚠️ **Différence entre `"` et `'` :**  
- **`"` permet d'interpréter les variables**
- **`'` affiche le texte tel quel**

Exemple :
```php
$nom = "Alice";
echo "Bonjour $nom"; // Affiche : Bonjour Alice
echo 'Bonjour $nom'; // Affiche : Bonjour $nom
```

---

## 📌 **3️⃣ Terminer avec `;`**
En PHP, chaque instruction doit **se terminer par un point-virgule (`;`)**, sinon tu auras une erreur.  

Exemple incorrect ❌ :
```php
echo "Salut"
echo "Ça ne marchera pas !"
```
Exemple correct ✅ :
```php
echo "Salut";
echo "Ça marche !";
```

<!-- https://www.w3schools.com/php/php_string.asp -->
---

## 📌 **4️⃣ Affichage dans un navigateur**
Si tu mets ce code dans un fichier `index.php` et que tu l'exécutes avec un serveur PHP (`php -S localhost:8000`), tu verras **Hello, World!** affiché sur la page web.

---

## 📌 **5️⃣ Autres façons d'afficher du texte**
1. **Avec `print`** (comme `echo`, mais retourne une valeur)
   ```php
   print "Bonjour le monde !";
   ```
2. **Avec `echo` et plusieurs valeurs**
   ```php
   echo "Bonjour", " ", "le monde !";
   ```
3. **Avec HTML intégré**
   ```php
   echo "<h1>Hello, World!</h1>";
   ```

---

## 🎯 **Résumé**
| Expression | Résultat |
|------------|---------|
| `echo "Hello, World!";` | Affiche "Hello, World!" |
| `echo 'Hello, World!';` | Affiche "Hello, World!" |
| `echo "Bonjour $nom";` | Interprète `$nom` |
| `echo 'Bonjour $nom';` | Affiche `$nom` tel quel |

Tu veux tester d'autres affichages ? 😊
