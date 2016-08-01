# Ennoncé du test :

Test technique – Alternance Développeur web @SantéVet

Technologies acceptées : Framework Symfony2 ou 3, Doctrine, MySQL

Technologies recommandées : Php5 ou 7.

1) Récupérer dynamiquement la liste des 100 premiers résultats de la catégorie Animaux en Rhone-Alpes sur leboncoin.fr, avec les informations suivantes : titre, lieu, prix

Affichage "brut" (shell) ou page html simple

2) Stocker cette liste dans une base de données et les mapper via un ORM.

3) Depuis cette base de donnée

a. Afficher cette liste par ordre de prix, avec ceux sans tarif spécifié à la fin

b. Permet une recherche par titre

c. Permettre de filtrer par prix minimum & maximum

Utiliser la gestion des formulaires proposer par symfony

# Fonctionnement de l'application.

Sur l'index de cette application vous arriverez sur qui présente les bouttons suivant : DESC ASC RECHERCHER et RELOAD.

DESC : Permet d'afficher la liste des annonces contenue dans la base de données dans un ordre décroissant ( desc.php )
ASC : Permet d'afficher la liste des annonces stocker dans la base de données dans un ordre croissant ( asc.php )
RECHERCHER : Permet de faire une recheche par titre ( search.php )
RELOAD : met à jour la base de données ( process.php )

process.php = Récupere les données animaux du site 'Le bon coin' grace à la fonctions CURL puis les stocks dans une base de données.
asc.php = Envoi un requete SELECT à la page de données dans un ordre croissant.
desc.php = Envoi une requete SELECT à la base de données dans un ordre décroissant.
search.php = Envoie une requete Select à la base de données et renvoi seulement les annonces qui contiennes le mots rechercher.
script.js = Réceptionne les données PHP et gére l'affichage  
index.php = Page d'acceuil.


