# Associative Project

[Demo](http://mixinkey.chalasdev.fr)

Usage
----------

Clone the repository:

```bash
~ git clone git@github.com:mixinkey/mixinkey
```

__Install the dependencies using [composer](https://getcomposer.org):__

```bash
~ cd mixinkey
~ composer install
```

__Set your Beatport Api consumer's credentials:__

Copy the `beatport.php.dist` distributed file:

```bash
~ cp config/beatport.php.dist config/beatport.php
```

Set the parameters into:

```php
<?php

return array(
    'consumer' => 'API_CONSUMER',
    'secret'   => 'API_SECRET',
    'login'    => 'ApiAuthLogin',
    'password' => 'ApiAuthPassword'
);
```

__Create the database schema__

After configuring an existing database in `config/database.php`, run the migrations:

```bash
php artisan migrate
```

Browse the project at `localhost:8000`.

__Run the server__

```bash
php artisan serve
```

#### Le contexte du projet

La recherche de titres qui s'accordent entre eux est une problématique à laquelle aucun projet actuel ne répond.

#### Explication du projet

Une plateforme destinée aux DJ's amateurs et professionnels, offrant un service de création/gestion de playlists sous forme de moteur de recherche avancée **par matching sonore** .

Relié à l'API BeatPort (service de recherche de titres par de  multiples critères musicaux), nous fournissons à l'utilisateur une interface lui étant dédiée et lui permettant d'être conseillée sur une sélection de titres correspondants à des critères de départs (titres musicaux, instru musicale, clés sonores, bâtements par minutes ...)

#### Les objectifs du projet

- Une application web type SPA (Single Page App), fluide, interactive, user-friendly.


- Relation directe avec l'utilisateur, développée grâce à une interface de création de mixs automatisée et des playlits illimitées.

![Search](https://raw.githubusercontent.com/mixinkey/mixinkey/master/Mockup/genre.jpg "Search")

#### Les concurrents  

- Pour l'instant aucun projet semblable au notre (à premiere vue).

#### Matière de départ

- BeatPort API, Laravel5 (back), AngularJS (middle/front).

#### Etat des lieux

- Un logiciel existant permettant de 'match' des musiques entre elles (mais pas de rechercher des titres).

#### Charte graphique

Respect de la charte imposée par BeatPort lorsqu'on utilise leur API.

Contenus de départ : Logo, media player, Search engine (API).

### Outils

#### Nos outils de travail en équipe

- Tasks Management : **Trello**
- Team Communication : **Slack**
- Versionning : **Git**

#### Nos outils de développement

- Server: Symfony2
- Client: AngularJS
- Stylesheet: Material-Design / Bootstrap
- DOM manipulation : jQuery

#### Usage de l'API BeatPort

- Liste des appels possibles : [https://oauth-api.beatport.com/](https://oauth-api.beatport.com/)
- Intégrer la classe BeatPort (comme un package Laravel).
- Préparer les différents appels vers l'API (pour chaque recherches possible).

#### Interface

- Design de base.
- Construction du form de recherche.
- Partie utilisateur (playlists, avec lecteur, register, authentication).



#### Recherche

- Construire notre formulaire de recherche (simple, puis avancée).
- Intégrer AngularJS pour notre recherche (résultats change en live, filtres custom ... (ng-repeat + q
uery filter)).
- Recherche par correspondance de son :
      - Depuis sa playlist.
      - Depuis un listing dans recherche multi-critères.

![Menu](https://raw.githubusercontent.com/mixinkey/mixinkey/master/Mockup/Home%20%2B%20Menu.jpg "Menu")

#### Player

- Intégration du player BeatPorts :
      - Lecture pour chacun des titres/sons.
      - Lecture de playlists completes.
      - Lecture de mixs réordonnées manuellement/par nos soins.

# SPECS

### DEV BACKEND

#### BEATPORT API CLASS

- Créer une classe BeatportApi avec ses méthodes d'appel vers l'API Beatport.
- Intégrer la classe dans notre application Symfony2 comme un Service utilisable depuis nos controlleurs.
- Creer un service REST avec méthodes (GET, POST ...) d'appel vers l'API via Controller (genres, artistes, tracks, audio mp3).

#### USER SYSTEM

![Authentication](https://raw.githubusercontent.com/mixinkey/mixinkey/master/Mockup/login.jpg "Authentication")

- Créer un système d'utilisateurs client/server.
- Créer un système de playlists globales par utilisateur, auquel les users pourront ajouter des morceaux / genres / artistes favoris et relire .
- Créer un système de playlists ciblées appelées **Mixs**, conseils de matching pour l'ordre de lecture des titres dans le cas d'utilisation pour un réel mix. Utilisation de paramètres sonores fournis par BeatPort et d'informations extérieures auxquelles on se réferera. pour matcher les titres.
- Création de compte utilisateur.
- Création de playlists globales.
- Création de playlists ciblées (nommés **Mixs**) :
      - Association de sons avec proposition d'ordre de lecture par matching multi-critères (sonores, conseil pour réel mix).
- Export/Import de playlists/Mixs (titres) sous forme de csv/pdf.

### DEV FRONTEND

- Appeller l'API avec un service AngularJS.
- Fonctions de scope accessibles dans les templates, appellées par le biais de directives sur évènements (ngClick, ngChange, ngInit ...).
- Filtres Angular pour filter les résultats d'une recherche via notre API.
- Du local storage.
- Utilisation d'Angular pour composition/lecture de playlists à l'aide du scope et du routing.

![Authentication](https://raw.githubusercontent.com/mixinkey/mixinkey/master/Mockup/Home.jpg "Authentication")


### DESIGN

- Material Design by Google intégration.
- Expérience utilisateur à fond.
- Single Page App.
- Simple, clair et fonctionnel.
