# dwj04-v01
Moteur de blog PHP / MySQL

## Router

Le système de routing se trouve dans le dossier app/Router :

* Router.php
    * Init des routes - Array.
* Route.php
    * Traitement spécifique sur une route. Matching avec url avec callback.
* RouterException.php
    * Héritage de la classe "Exception", personnalisation.
* routes.json
    * Listing des routes hiérarchisées par méthode (GET, POST, PUT, DELETE).

![Router](https://github.com/Manipovore/dwj04-v01/blob/master/public/images/markdown/Router.png)

## MVC

### Model

La connexion à la base de donnée est initiée par la classe MysqlDatabase, enfant de Database, dans le core/Database.

![Router](https://github.com/Manipovore/dwj04-v01/blob/master/public/images/markdown/mvc-1.png)

-------------
Version dev 1.0
