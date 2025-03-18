En PHP, tu peux écrire du **HTML** directement dans un fichier `.php`. PHP est conçu pour être utilisé avec du HTML afin de générer des pages web dynamiques.  

---

## **📌 Exemple simple : HTML + PHP**
Tu peux mélanger **HTML** et **PHP** comme ceci :  

```php
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon premier site PHP</title>
</head>
<body>

    <h1>Bienvenue sur mon site</h1>
    <p><?php echo "Ceci est généré par PHP !"; ?></p>

</body>
</html>
```

---

## **📌 Explication :**
1. **Le fichier `.php` contient du HTML** normal.
2. **Le code PHP est inséré entre `<?php ... ?>`**.
3. **La fonction `echo` affiche du texte** dans la page HTML.

📢 **Important** : Tout ce qui est **en dehors des balises PHP (`<?php ?>`) est interprété comme du HTML**.

---

## **🚀 Exécution du code**
Si tu as suivi mes étapes précédentes :
1. **Crée un fichier `index.php`**.
2. **Colle le code ci-dessus dedans**.
3. **Démarre le serveur PHP** (si ce n'est pas encore fait) :
   ```sh
   php -S localhost:8000
   ```
4. **Ouvre ton navigateur et va sur** :  
   ```
   http://localhost:8000
   ```
   Tu verras ta page HTML avec du texte généré par PHP ! 🎉

5. **Complete ton code avec 3 autres paragraphes generer pas php 🧐**
---



