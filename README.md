# ZZZ-Wiki

Template de site PHP MVC pour un wiki sur le jeu Zenless Zone Zero.

## Structure du projet

- `index.php` : Point d'entrée, redirige vers le routeur.
- `app/`
  - `controller/` : Contrôleurs (ControllerWiki.php, ControllerUser.php, ControllerPage.php, config.php)
  - `model/` : Modèles (Model.php base, ModelUser.php, ModelPage.php)
  - `router/` : Routeur (router.php)
  - `view/` : Vues et fragments
    - `fragment/` : Fragments HTML (header, menu, footer, jumbotron)
- `public/css/` : Feuilles de style

## Installation

1. Configurer la base de données dans `app/controller/config.php`.
2. Créer les tables `user` et `page` en base de données.
3. Lancer le serveur PHP et accéder à `index.php`.

## TODO

- Compléter les modèles complémentaires (ex: ModelCategory.php).
- Ajouter des contrôleurs pour d'autres entités.
- Améliorer les vues et ajouter des fonctionnalités.
