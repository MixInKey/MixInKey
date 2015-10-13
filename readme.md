# Associative Project

### Le contexte du projet

La recherche de titres qui s'accordent entre eux est une problématique à laquelle aucun projet actuel ne répond.

### L'explication du projet

- Un système de recherche de musique avancée (**par matching morceaux**)

### Les objectifs du projet

- Une application web type "Single Page", fluide, intéractive, user-friendly.

### Les concurrents  

- Pour l'instant aucun projet semblable au notre (à premiere vue)
Toutes autres information utiles:

### Matière de départ

- BeatPort API, Laravel5 (back), AngularJS (middle/front)

### Etat des lieux

- Un logiciel existant permettant de 'match' des musiques entre elles (mais pas de rechercher des titres)

### Charte graphique

Respect de la charte imposée par BeatPort lorsqu'on utilise leur API.

Contenus de départ : Logo, media player, Search engine (API)

## Outils

### Nos outils de travail en équipe

- Tasks Management : **Trello**
- Team Communication : **Slack**
- Versionning : **Git**

### Nos outils de développement

- Server: Symfony2
- Client: AngularJS
- Stylesheet: Material-Design / Bootstrap
- DOM manipulation : jQuery

## Usage de l'API BeatPort

- Liste des appels possibles : https://oauth-api.beatport.com/
- Intégrer la classe BeatPort (comme un package Laravel)
- Préparer les différents appels vers l'API (pour chaque recherches possible)

## Interface

- Design de base
- Construction du form de recherche
- Partie utilisateur (playlists, avec lecteur, register, authentication)

### Recherche

- Construire notre formulaire de recherche (simple, puis avancée)
- Intégrer AngularJS pour notre recherche (résultats change en live, filtres custom ... (ng-repeat + q
uery filter))
- Création de compte utilisateur
- Création de playlists globales
- Création de playlists ciblées (nommés **Mixs**) :
      - Association de sons avec proposition d'ordre de lecture par matching multi-critères (sonores, conseil pour réel mix).
- Export/Import de playlists/Mixs (titres) sous forme de csv/pdf.
- Recherche par correspondance de son :
      - Depuis sa playlist
      - Depuis un listing dans recherche multi-critères

### Player

- Intégration du player BeatPorts:
      - Lecture pour chacun des titres/sons
      - Lecture de playlists completes
      - Lecture de mixs réordonnées manuellement/par nos soins.

# SPECS

##DEV BACKEND

### BEATPORT API CLASS

- Créer une classe BeatportApi avec ses méthodes d'appel vers l'API Beatport.
- Intégrer la classe dans notre application Symfony2 comme un Service utilisable depuis nos controlleurs.
- Creer un service REST avec méthodes (GET, POST ...) d'appel vers l'API via Controller (genres, artistes, tracks, audio mp3).

### USER SYSTEM

- Créer un système d'utilisateurs client/server.
- Créer un système de playlists globales par utilisateur, auquel les users pourront ajouter des morceaux / genres / artistes favoris et relire .
- Créer un système de playlists ciblées appelées **Mixs**, conseils de matching pour l'ordre de lecture des titres dans le cas d'utilisation pour un réel mix. Utilisation de paramètres sonores fournis par BeatPort et d'informations extérieures auxquelles on se réferera. pour matcher les titres.

## DEV FRONTEND

- Appeller l'API avec un service AngularJS.
- Créer des functions de scope accessibles dans les templates, appellées par le biais de directives sur évènements (ngClick, ngChange, ngInit ...)
- Créer des filtres Angular pour filter les résultats de notre API.
- Du local storage
- Utilisation d'Angular pour composition/lecture de playlists à l'aide du scope et du routing.

## DESIGN

- Material Design by Google intégration.
- Expérience utilisateur à fond
- Single Page App
- Simple, clair et fonctionnel.
