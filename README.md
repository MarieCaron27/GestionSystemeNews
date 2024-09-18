# Examen Web2 2021-2022

## Consignes générales 

### Objectifs
Il s'agit de remettre un dossier répondant aux consignes particulières d'un projet. 

### Consignes
Le projet doit être réalisé en utilant les langages `PHP`, `HTML`, `CSS` et un système de gestion de base de données `MySQL`. 

Le `PHP` sera employé dans sa version procédurale. Toutes utilisations de technique orienté objet devra être maîtrisée.

Il s'agit d'implémenter une solution respectant le modèle `MVC`.

Il faudra penser à appliquer les règles d’ergonomie tout au long du projet : organisation et cohérence, conventions, information et compréhension, assistance et gestion des erreurs (messages d’erreur, couleurs, …), etc.

### Evaluation
La maîtrise de votre code sera évaluée **oralement**. 

## Consignes particulières du projet
Il s'agit de créer le frontend/backend d'un site web permettant de gérer un système de News.

Pour le visiteur lambda, le site affichera les News disponibles, dans l'ordre antéchronologique (*frontend*).  

Un visiteur aura l'occasion de se logguer pour accéder à la partie backend.  
On prévoira la possibilité pour un visiteur de s'inscrire.  
La base de données retiendra le pseudo de l'utilisateur ainsi qu'un *password_hash* de son mot de passe.

Le backend permettra à l'utilisateur de manipuler les News (CRUD):

- Lister les News existantes
- Encoder une nouvelle News
- Modifier une News existante
- Supprimer une News existante

Une News consiste en
- une zone de texte non formaté contenant le corps de la News (obligatoire)
- un titre (obligatoire)
- une date de publication (obligatoire)
- une éventuelle date d'expiration
- une catégorie à sélectionner parmis la liste des catégories existant dans la base (obligatoire)
- le pseudo de l'utilisateur (obligatoire)

# GestionSystemeNews
