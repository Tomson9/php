### **📌 Exercice : Créer un jeu Mad Libs en PHP**  

#### **🎯 Objectif :**  
Créer un jeu **Mad Libs** en PHP où l'utilisateur saisit plusieurs mots dans un formulaire, puis une histoire générée dynamiquement affiche ces mots de manière amusante.

#### **📌 Consignes :**  
1. **Créer un fichier PHP** contenant un formulaire HTML où l'utilisateur peut entrer :  
   - Un prénom  
   - Un animal  
   - Un lieu  
   - Un objet  
   - Une activité  

2. **Lorsque l'utilisateur soumet le formulaire**, afficher une histoire générée dynamiquement en insérant les mots dans un texte pré-écrit.

3. **Bonus :**  
   - Vérifier que tous les champs sont bien remplis avant d'afficher l'histoire.  
   - Permettre à l'utilisateur de recommencer une nouvelle histoire.


---

### **📌 Exemple d'utilisation :**  
#### **Entrées de l'utilisateur :**  
- **Prénom :** Alice  
- **Animal :** Chat  
- **Lieu :** Forêt  
- **Objet :** Livre  
- **Activité :** Danser  

#### **Sortie attendue :**  
> Un jour, **Alice** se promenait à **Forêt** lorsqu'elle a aperçu un **Chat** étrange.  
> Curieuse, elle s'est approchée et a découvert que l'animal tenait un **Livre** dans ses pattes !  
> Étonnée, Alice a décidé de l'observer en train de **Danser**.  
> C'était une journée vraiment inoubliable !

---

### **💡 Astuces :**
- `htmlspecialchars()` est utilisé pour éviter les failles XSS en affichant les entrées de l'utilisateur.  
- `$_POST` permet de récupérer les données soumises via le formulaire.  
- Un bouton "Rejouer" est ajouté pour permettre de recommencer avec de nouvelles entrées.

🚀 **Amuse-toi bien avec Mad Libs en PHP !** 😃