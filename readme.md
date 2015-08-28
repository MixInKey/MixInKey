# Associative Project
  Specs

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
- Création de playlists
- Recherche par correspondance de son :

      - Depuis sa playlist
      - Depuis un listing dans recherche multi-critères

### Player

- Intégration du player BeatPort :
      - Lecture de sons

# SPECS

##DEV BACKEND

### BEATPORT API CLASS

- Créer une classe BeatportApi avec ses méthodes d'appel vers l'API Beatport.
- Intégrer la classe dans notre application Symfony2 comme un Service utilisable depuis nos controlleurs.
- Creer un service REST avec méthodes (GET, POST ...) d'appel vers l'API via Controller (genres, artistes, tracks, audio mp3).

### USER SYSTEM

- Créer un système d'utilisateurs client/server.
- Créer un système de playlists par utilisateur, auquel les users pourront ajouter des morceaux / genres / artistes favoris et relire .

## DEV FRONTEND

- Appeller l'API avec un service AngularJS.
- Créer un controlleur dans notre app AngularJS et créer des functions de scope accessibles dans les templates, appellées par le biais de directives sur évènements (ngClick, ngChange, ngInit ...)
- Créer des filtres Angular pour filter les résultats de notre API.

## DESIGN

- Material Design by Google intégration.
- Expérience utilisateur à fond
- Single Page App
