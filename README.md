# Site internet — Amicale Laïque de l'Île-d'Elle

Site web de l'association : présentation, événements, comptes rendus de réunions, équipe, location de matériel, et un **espace d'administration** pour gérer tout le contenu sans toucher au code.

## Stack technique

| Outil | Rôle |
|---|---|
| [Symfony 8.1](https://symfony.com/) | Framework PHP (PHP >= 8.4) |
| [Twig](https://twig.symfony.com/) | Templates HTML |
| Doctrine ORM + MySQL 8 | Base de données |
| Symfony Security | Authentification admin (utilisateur unique en mémoire) |
| Docker Compose | Environnement de développement (Apache + MySQL) |

## Installation

### Prérequis

- Docker + Docker Compose (recommandé)
- Ou à la main : PHP 8.4+, Composer 2, MySQL 8

### 1. Configuration

Créez un fichier `.env.local` à la racine avec les identifiants admin :

```env
ADMIN_USERNAME="admin"
# Mot de passe haché en bcrypt : php -r "echo password_hash('VotreMotDePasse', PASSWORD_BCRYPT);"
ADMIN_PASSWORD='$2y$13$...'
```

> Le mot de passe doit être **quoté avec des apostrophes simples** (`'...'`), sinon le `$` du hash est interprété par le loader dotenv.

Les autres variables (base de données, secret) sont déjà dans `.env`.

### 2. Lancer avec Docker

```bash
docker compose up -d --build
```

Le site est disponible sur **http://localhost:8000**.

Puis initialiser la base :

```bash
# Créer la base (si besoin)
docker compose exec app php bin/console doctrine:database:create --if-not-exists

# Créer les tables
docker compose exec app php bin/console doctrine:migrations:migrate --no-interaction

# (Optionnel) Charger des données de démonstration
docker compose exec app php bin/console doctrine:fixtures:load --no-interaction
```

### 2 bis. Lancer sans Docker

```bash
composer install
# Adapter DATABASE_URL dans .env.local pour pointer vers votre MySQL
php bin/console doctrine:database:create --if-not-exists
php bin/console doctrine:migrations:migrate --no-interaction
symfony serve
```

## Utilisation

### Site public

| URL | Page |
|---|---|
| `/` | Qui sommes-nous ? |
| `/evenement` | Événements à venir et passés |
| `/reunion` | Comptes rendus des réunions |
| `/equipe` | L'équipe de l'association |
| `/location` | Matériel disponible à la location |
| `/mentions` | Mentions légales |

### Espace administration

- Connectez-vous sur **`/login`** avec les identifiants définis dans `.env.local`.
- Le dashboard **`/loged`** permet d'**ajouter, modifier et supprimer** :
  - les **événements**
  - les **réunions** (comptes rendus)
  - les **membres** de l'équipe
  - les **locations** (matériel + tarifs)
- Chaque action s'ouvre en popup ; les suppressions demandent une confirmation et sont protégées par un token CSRF.

## Structure du projet

```
src/
├── Controller/            # Contrôleurs des pages publiques
│   ├── admin/             # Contrôleurs CRUD de l'espace admin
│   ├── HomeController.php
│   ├── EvenementController.php
│   ├── ...
│   └── SecurityController.php   # login / logout / dashboard /loged
├── Entity/                # Entités Doctrine (Evenements, Reunion, Equipe, Equipement, PhotoEvent)
├── Form/                  # Formulaires Symfony (EvenementsType, ReunionType, ...)
├── Repository/            # Repositories Doctrine
└── DataFixtures/          # Données de démonstration (php bin/console doctrine:fixtures:load)

templates/                 # Templates Twig (une page = un dossier)
assets/
├── styles/app.css         # Toute la feuille de style (avec sommaire en tête de fichier)
├── font/                  # Polices (Cinzel, Bebas Neue)
└── picture/               # Images du site

config/                    # Configuration Symfony (routes, security, packages)
migrations/                # Migrations Doctrine
docker-compose.yml         # Services app (Apache+PHP) et database (MySQL 8)
Dockerfile                 # Image PHP 8.4 + Apache + Composer
```

## Commandes utiles

```bash
docker compose up -d                 # Démarrer
docker compose down                  # Arrêter
docker compose logs -f app           # Voir les logs
docker compose exec app php bin/console cache:clear      # Vider le cache
docker compose exec app php bin/console debug:router     # Lister les routes
docker compose exec app php bin/console doctrine:fixtures:load --no-interaction  # Réinitialiser les données de démo
```

## Notes pour les développeurs

- **Nouvelle entité** : `php bin/console make:entity` puis `make:migration` + `doctrine:migrations:migrate`.
- **Nouveau CRUD admin** : s'inspirer de `src/Controller/admin/ReunionsController.php`, créer le FormType correspondant, puis ajouter les boutons et la popup dans `templates/security/loged.html.twig` (macro `modal()`).
- **CSS** : un seul fichier `assets/styles/app.css`, organisé par sections numérotées (voir le sommaire en tête de fichier). Les couleurs communes sont définies en variables `:root`.
- **Mots de passe** : jamais en clair dans le code — uniquement des hash bcrypt dans `.env.local` (non versionné).
