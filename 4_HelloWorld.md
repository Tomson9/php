### 🚀 ***Écrire un "Hello World" avec PHP et son serveur intégré*** 

Voici la manière la plus simple de faire un **Hello World** en PHP avec le serveur intégré de PHP. 

## **Créer un fichier PHP**
1. Ouvre **VS Code** .  
2. Crée un dossier `hello_php` où tu veux (par exemple dans `C:\laragon\www\` si tu utilises laragon, sinon sur le Bureau).  
3. Dans ce dossier, crée un fichier nommé `index.php` et mets ce code dedans :

```php
<?php
echo "Hello, World!";
```
--- 

## **Lancer le serveur PHP**
1. Ouvre un terminal (CMD ou PowerShell).  
2. Va dans le dossier où se trouve `index.php`, par exemple :  
   ```sh
   cd C:\Users\ton-nom\Desktop\hello_php
   ```
3. Démarre le serveur PHP intégré avec la commande :  
   ```sh
   php -S localhost:8000
   ```
4. Ouvre ton navigateur et tape :  
   ```
   http://localhost:8000
   ```
Tu verras **"Hello, World!"** s'afficher ! 🎉🎉🎉  

---

## **📌 Explication**
- `php -S localhost:8000` → Démarre un serveur PHP local sur le port **8000**.
- `echo "Hello, World!";` → Affiche le texte sur la page.

---