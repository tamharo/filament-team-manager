# Filament Team Manager

**Filament Team Manager pour multi-admins & équipes**

Ce package permet de gérer des équipes et des rôles d'administrateurs via **Filament**. Il permet de gérer facilement plusieurs administrateurs et équipes dans votre application Laravel.

## Installation

1. **Ajouter le package dans votre projet Laravel** :

    Si vous ne l'avez pas encore installé, vous pouvez ajouter ce package via Composer :

    ```bash
    composer require manhamprod/filament-team-manager
    ```

2. **Publier les fichiers de configuration** (facultatif) :

    Pour publier les fichiers de configuration et personnaliser les paramètres par défaut du package, exécutez la commande suivante :

    ```bash
    php artisan vendor:publish --provider="Manhamprod\FilamentTeamManager\FilamentTeamManagerServiceProvider" --tag=config
    ```

3. **Publier les vues** (facultatif) :

    Si vous avez des vues que vous souhaitez personnaliser, vous pouvez également les publier :

    ```bash
    php artisan vendor:publish --provider="Manhamprod\FilamentTeamManager\FilamentTeamManagerServiceProvider" --tag=views
    ```

## Dépendances

Ce package nécessite les versions suivantes des packages :

- **Filament** : `^3.0`
- **Spatie Laravel Permission** : `^6.16`
- **Eloquent Sluggable** : `^12.0`


## Utilisation

Après avoir installé et publié les fichiers de configuration, vous pouvez commencer à utiliser les fonctionnalités de gestion des équipes et des rôles dans votre application. Consultez la documentation de Filament pour plus de détails sur l'intégration et la personnalisation.

### Exemple d'utilisation

Exemple de code pour ajouter un utilisateur à une équipe :

```php
$user = User::find(1);
$team = Team::find(1);
$user->teams()->attach($team, ['role' => 'admin']);
