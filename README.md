# dwj04-v01
Moteur de blog PHP / MySQL

## Router

Le système de routing se trouve dans le dossier app/Router, il contient :

* Router.php
    * Classe pour initier les routes et les stocker dans un Array.
* Route.php
    * Classe qui permet un traitement spécifique sur une route. Renvoie un match si correspondance avec url et appel un callback, plus particulièrement un controller.
* RouterException.php
    * Classe enfant de "Exception", utile dans le cas de non correspondance et renvoie une vue perso (A venir).
* routes.json
    * Listing des routes hiérarchisées par méthodes (GET, POST, ...).

![Router](https://github.com/Manipovore/dwj04-v01/blob/master/public/images/markdown/Router.png)

## MVC

###Model

La connexion à la base de donnée est initiée dans la classe MysqlDatabase, enfant de Database, dans le core/Database.
La méthode getModel($bdd) sert à charger un model bien spécifique et prend en paramètre la connexion à la bdd. Située dans app/App.php, elle est appelée par le controlleur AppController et par les controlleurs enfants. Chaque Controller peut faire appel à un model particulier suivant le besoin (posts, categories, ...).

![Router](https://github.com/Manipovore/dwj04-v01/blob/master/public/images/markdown/mvc-1.png)

-------------
Version dev 1.0