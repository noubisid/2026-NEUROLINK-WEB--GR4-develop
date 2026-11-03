# Edu Framework Skeleton

Bienvenue dans votre projet avec **Edu Framework v2.3** !

## Documentation

La documentation complète est disponible sur : [https://studoo-app.github.io/edu-framework](https://studoo-app.github.io/edu-framework)

## Prérequis

- **PHP 8.4 ou supérieur** (requis pour la version 2.3)
- Extensions PHP requises : `mbstring`, `pdo_sqlite`, `openssl`, `pdo_mysql`
- Composer 2.x
- Docker et Docker Compose (pour les services)

## Installation

1. **Cloner le projet**
   ```bash
   git clone <votre-repo>
   cd <votre-projet>
   ```

2. **Installer les dépendances**
   ```bash
   composer install
   ```

3. **Configurer l'environnement**
   ```bash
   cp .env.example .env
   # Modifier .env selon vos besoins
   ```

4. **Démarrer les services Docker**
   ```bash
   docker compose up -d
   ```

5. **Démarrer l'application**
   ```bash
   php -S localhost:8042 -t public public/index.php
   ```

## Nouveautés de la version 2.3

- **Barre de debug et profiler** : En mode développement (`APP_ENV=dev`), une barre de debug s'affiche en bas de chaque page avec des informations utiles (statut HTTP, route, temps d'exécution, etc.).
- **SQLite logging** : Les requêtes HTTP sont maintenant enregistrées dans une base SQLite pour le profiler.
- **MailPit** : Remplace Mailcatcher pour le test des emails (ports 1025 et 8025).
- **dbgate** : Nouveau service pour administrer vos bases de données (MySQL et SQLite) via une interface web (port 3000).

## Services disponibles

| Service | Port | Description |
|---------|------|-------------|
| MySQL | 3306 | Base de données |
| PHPMyAdmin | 8081 | Administration MySQL |
| MailPit | 1025 (SMTP), 8025 (Web) | Test des emails |
| dbgate | 3000 | Administration des bases de données |
| Application | 8042 | Serveur de développement |

## Commandes utiles

- **Démarrer le serveur** : `php -S localhost:8042 -t public public/index.php` (le dernier argument active le routage des URL applicatives)
- **Vérifier la configuration** : `php bin/edu check:config`
- **Voir la version** : `php bin/edu --version`
- **Générer un controller** : `php bin/edu make:controller NomController`
- **Générer une commande CLI** : `php bin/edu make:command nom:commande`
- **Générer une API** : `php bin/edu make:api NomApi`

## Migration depuis la version 2.2

Pour migrer depuis la version 2.2, consultez le guide officiel :
[Migrer de la version 2.2 à la version 2.3](https://studoo-app.github.io/edu-framework/migrate/migration-2_2-2_3.html)

## Contribuer

Pour contribuer au projet, consultez le [guide de contribution](https://studoo-app.github.io/edu-framework/contributor/contributing.html).

## Licence

MIT License - Copyright (c) 2022-2026 Collectif Studoo
