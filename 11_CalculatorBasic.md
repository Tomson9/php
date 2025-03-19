### **📌 Exercice : Calculatrice Basique avec `$_GET` en PHP**

#### **🎯 Objectif :**  
Créer une calculatrice simple en PHP qui effectue une opération mathématique de base (addition, soustraction, multiplication ou division) en utilisant les paramètres `$_GET` dans l'URL.  

#### **📌 Consignes :**  
1. **Créer un fichier PHP** qui récupère deux nombres (`num1` et `num2`) passés dans l'URL.  
2. L'URL doit être structurée comme suit :  
   ```
   http://localhost/calculatrice.php?num1=5&num2=3
   ```
3. **Effectuer le calcul** en fonction des nombres fournis dans l'URL.  
   - Si les deux paramètres sont présents, effectuer une **addition** et afficher le résultat.  
   - Si l'un ou les deux paramètres sont manquants, afficher un message d'erreur demandant à l'utilisateur de spécifier les deux nombres.  

4. **Bonus :**  
   - Ajouter une fonctionnalité pour effectuer d'autres opérations (soustraction, multiplication, division) en fonction d'un paramètre supplémentaire `operation` dans l'URL. Exemple :  
     ```
     http://localhost/calculatrice.php?num1=5&num2=3&operation=*
     ```
     Cela permettra d'effectuer la multiplication entre `num1` et `num2`.

#### **📂 Exemple d'URL :**
- **Addition :**
   ```
   http://localhost/calculatrice.php?num1=5&num2=3
   ```
   **Sortie attendue :**  
   ```
   Résultat : 5 + 3 = 8
   ```

- **Multiplication :**
   ```
   http://localhost/calculatrice.php?num1=5&num2=3&operation=*
   ```
   **Sortie attendue :**  
   ```
   Résultat : 5 * 3 = 15
   ```

🚀 **Prêt à coder ta calculatrice ?** 😃