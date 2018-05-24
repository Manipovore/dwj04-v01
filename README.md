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

![Router](../public/images/Router.png)

-------------
Version dev 1.0
