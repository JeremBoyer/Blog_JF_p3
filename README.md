**Blog_JF_p3**
==============
#Projet 3: Créez un blog pour un écrivain. (*Chef de projet multimédia - Développement*)
##Introduction:
Ce projet représente mon projet 3(sur 6) de la formation Chef de projet multimédia - Développement d'[OpenClassrooms](https://openclassrooms.com).
##Énoncé
_"Vous venez de décrocher un contrat avec Jean Forteroche, acteur et écrivain. Il travaille actuellement sur son prochain roman, "Billet simple pour l'Alaska". Il souhaite innover et le publier par épisode en ligne sur son propre site._

_Seul problème : Jean n'aime pas WordPress et souhaite avoir son propre outil de blog, offrant des fonctionnalités plus simples._

_Le livre de Jean Forteroche reste à écrire... mais il sera publié en ligne !_
_Le livre de Jean Forteroche reste à écrire... mais il sera publié en ligne !_
_Vous développerez une application de blog simple en PHP et avec une base de données MySQL. Elle doit fournir une interface frontend (lecture des billets) et une interface backend (administration des billets pour l'écriture). On doit y retrouver tous les éléments d'un CRUD :_

* _Create : création de billets_
* _Read : lecture de billets_
* _Update : mise à jour de billets_
* _Delete : suppression de billets_

_Chaque billet doit permettre l'ajout de commentaires, qui pourront être modérés dans l'interface d'administration au besoin._
_Les lecteurs doivent pouvoir "signaler" les commentaires pour que ceux-ci remontent plus facilement dans l'interface d'administration pour être modérés._

_L'interface d'administration sera protégée par mot de passe. La rédaction de billets se fera dans une interface WYSIWYG basée sur TinyMCE, pour que Jean n'ait pas besoin de rédiger son histoire en HTML (on comprend qu'il n'ait pas très envie !)._

_Vous développerez en PHP sans utiliser de framework pour vous familiariser avec les concepts de base de la programmation. Le code sera construit sur une architecture MVC. Vous développerez autant que possible en orienté objet (au minimum, le modèle doit être construit sous forme d'objet)."_

### Compétences à valider:
* _Créer un site Internet, de sa conception à sa livraison_
* _Organiser le code en langage PHP_
* _Récupérer la saisie d’un formulaire utilisateur en langage PHP_
* _Analyser les données utilisées par le site ou l’application_
* _Construire une base de données_
* _Soutenir et argumenter ses propositions_
* _Insérer ou modifier les données d’une base_
* _Récupérer les données d’une base_

##Pour tester mon projet.
Pour WAMP: placez le dossier contenant tout le projet à la racine (dans le dossier www\\).

Dans tous les cas n'oubliez pas de modifier le fichier _Manager.php_ avec les identifiants de connexion à votre base de données.

Vous pouvez importer ma base de données ou créer la votre (en faisant attention à la concordance des noms de table).

Pour tester le compte d'un utilisateur, créez en un nouveau avec la page d'inscription.

Pour tester le compte de Jean Forteroche,
ses informations de connexion sont:

* email : jean.forteroche@blog.fr
* mot de passe : 1234 (C'est juste pour le test, on est d'accord) Merci de ne pas modifier ces informations.

##Pour conclure.
Ce projet est une fierté pour moi car il représente ma première expérience en Développement.

Il m'a beaucoup appris. Néanmoins pour rester dans un temps de formation correcte, des axes d'améliorations n'ont pas encore été installés. En voici quelques-uns:
* Amélioration de l'espace membre (gestion d'avatar, prendre plus de données).
* Conformation au RGPD pour la gestion des données de l'espace membre.
* Ajout d'autres niveaux d'autorisations.
* Remonter les informations des "SoftDelete" sous forme de corbeille.
* Possibilité d'ajouter, modifier, ou supprimer des catégories.
* Possibilité d'ajouter des sous catégories, et donc plusieurs catégories aux articles.
* Installer un serveur mail.
* Ajout d'un lien de confirmation de création de compte (envoyé par mail).
* Gérer le mot de passe oublié, avec envoie d'un lien pour modifier le mot de passe.
* Création d'une page de contact.
* Ajout de niveaux supplémentaires en sécurité.
* Gestion des erreurs plus poussées.
* Ajout d'image en fond pour les articles.
* Possibilités d'envoyer des messages privées sur le site.
* Possibilité de recevoir des notifications.


Et pleins d'autres...

N'hésitez pas à m'envoyer les améliorations manquantes et vos critiques via [Github](https://github.com/JeremBoyer/Blog_JF_p3) si vous n'y êtes pas déjà.