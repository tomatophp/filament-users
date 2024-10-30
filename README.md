![Screenshot](https://raw.githubusercontent.com/tomatophp/filament-users/master/arts/3x1io-tomato-users.jpg)

# Filament Users Manager

[![Dependabot Updates](https://github.com/tomatophp/filament-users/actions/workflows/dependabot/dependabot-updates/badge.svg)](https://github.com/tomatophp/filament-users/actions/workflows/dependabot/dependabot-updates)
[![PHP Code Styling](https://github.com/tomatophp/filament-users/actions/workflows/fix-php-code-styling.yml/badge.svg)](https://github.com/tomatophp/filament-users/actions/workflows/fix-php-code-styling.yml)
[![Tests](https://github.com/tomatophp/filament-users/actions/workflows/tests.yml/badge.svg)](https://github.com/tomatophp/filament-users/actions/workflows/tests.yml)
[![Latest Stable Version](https://poser.pugx.org/tomatophp/filament-users/version.svg)](https://packagist.org/packages/tomatophp/filament-users)
[![License](https://poser.pugx.org/tomatophp/filament-users/license.svg)](https://packagist.org/packages/tomatophp/filament-users)
[![Downloads](https://poser.pugx.org/tomatophp/filament-users/d/total.svg)](https://packagist.org/packages/tomatophp/filament-users)

Manage your users with a highly customizable user resource for FilamentPHP with integration of filament-shield and filament-impersonate.

for filament v2 please use this [repo](https://github.com/3x1io/filament-user)

## Features

- [x] Users Resource
- [x] Allow To Publish User Resource
- [x] Allow To Use Shield
- [x] Allow To Use Impersonate
- [x] Allow To Use Facade Class to custom the current user resource
- [x] Integration with Laravel Jetstream teams
- [x] custom User model from config file
- [x] custom Team model from config file
- [x] custom Role model from config file
- [ ] Laravel Jetsream user profile page
- [ ] Allow User / Teams Avatars
- [ ] Custom Register/Login Pages for Laravel Jetstream
- [ ] Add OTP Page to Register process

## Screenshots

![Users List](https://raw.githubusercontent.com/tomatophp/filament-users/master/arts/user-list.png)
![Create User](https://raw.githubusercontent.com/tomatophp/filament-users/master/arts/create.png)
![Edit User](https://raw.githubusercontent.com/tomatophp/filament-users/master/arts/edit.png)
![Users Filters](https://raw.githubusercontent.com/tomatophp/filament-users/master/arts/filters.png)
![Delete Current User](https://raw.githubusercontent.com/tomatophp/filament-users/master/arts/delete-current-user.png)
![Impersonate](https://raw.githubusercontent.com/tomatophp/filament-users/master/arts/impersonate.png)
![Shield](https://raw.githubusercontent.com/tomatophp/filament-users/master/arts/shield.png)
![Roles Bulk Action](https://raw.githubusercontent.com/tomatophp/filament-users/master/arts/roles.png)
![Edit Roles](https://raw.githubusercontent.com/tomatophp/filament-users/master/arts/edit-roles.png)

## Installation

```bash
composer require tomatophp/filament-users
```

finally register the plugin on `/app/Providers/Filament/AdminPanelProvider.php`

```php
->plugin(\TomatoPHP\FilamentUsers\FilamentUsersPlugin::make())
```

## Use Filament Shield

you can use the shield to protect your resource and allow user roles by install it first

```bash
composer require bezhansalleh/filament-shield
```

Add the Spatie\Permission\Traits\HasRoles trait to your User model(s):

```php
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasRoles;

    // ...
}
```
Publish the config file then setup your configuration:

```php
->plugin(\BezhanSalleh\FilamentShield\FilamentShieldPlugin::make())
```

Now run the following command to install shield:

```bash
php artisan shield:install
```

Now we can [publish the package assets]([https://github.com/bezhanSalleh/filament-shield](https://github.com/tomatophp/filament-users?tab=readme-ov-file#publish-assets)).
```bash
php artisan vendor:publish --tag="filament-users-config"
```
now on your `filament-users.php` config allow shield

```php
/*
 * User Filament Shield
 */
"shield" => true,
```

now clear your config

```bash
php artisan config:cache
```

for more information check the [Filament Shield](https://github.com/bezhanSalleh/filament-shield)

## Use Filament Impersonate

you can use the impersonate to impersonate the user by install it first

```bash
composer require stechstudio/filament-impersonate
```

now on your `filament-users.php` config allow shield

```php
/*
 * User Filament Impersonate
 */
"impersonate" => true,
```

now clear your config

```bash
php artisan config:cache
```

for more information check the [Filament Impersonate](https://github.com/stechstudio/filament-impersonate)

## Use Laravel Jetstream Teams

you can use the Laravel Jetstream Teams by install it first

```bash
composer require laravel/jetstream
```

now you need to install the jetstream with livewire

```bash
php artisan jetstream:install livewire
```

go to `jetstream.php` and allow teams feature

```php
'features' => [
//     Features::termsAndPrivacyPolicy(),
//     Features::profilePhotos(),
//     Features::api(),
     Features::teams(['invitations' => true]),
//     Features::accountDeletion(),
],
```

now you need to publish teams migration from jetstream

```bash
php artisan vendor:publish --tag=jetstream-teams-migrations
```

now you need to migrate the teams migration

```bash
php artisan migrate
```

now on your `filament-users.php` config allow shield

```php
/*
 * User Filament Teams
 */
"teams" => true,
```

now clear your config

```bash
php artisan config:cache
```

## Publish Resource

you can publish the resource to your project

```bash
php artisan filament-users:publish
```

it will publish the resource to your project

than go to `filament-users.php` config file and change the `publish_resource` to `true`

## Register User Relation Manager

you can register the user relation manager to your project


```php
use TomatoPHP\FilamentUsers\Facades\FilamentUser;

public function boot()
{
    FilamentUser::register([
        \Filament\Resources\RelationManagers\RelationManager::make() // Replace with your custom relation manager
    ]);
}
```

## User Users Resource Hooks

we have add a lot of hooks to make it easy to attach actions, columns, filters, etc

### Table Columns

```php
use TomatoPHP\FilamentUsers\Resources\UserResource\Table\UserTable;

public function boot()
{
    UserTable::register([
        \Filament\Tables\Columns\TextColumn::make('something')
    ]);
}
```

### Table Actions

```php
use TomatoPHP\FilamentUsers\Resources\UserResource\Table\UserActions;

public function boot()
{
    UserActions::register([
        \Filament\Tables\Actions\ReplicateAction::make()
    ]);
}
```

### Table Filters

```php
use TomatoPHP\FilamentUsers\Resources\UserResource\Table\UserFilters;

public function boot()
{
    UserFilters::register([
        \Filament\Tables\Filters\SelectFilter::make('something')
    ]);
}
```

### Table Bulk Actions

```php
use TomatoPHP\FilamentUsers\Resources\UserResource\Table\UserBulkActions;

public function boot()
{
    UserBulkActions::register([
        \Filament\Tables\BulkActions\DeleteAction::make()
    ]);
}
```

### From Components

```php
use TomatoPHP\FilamentUsers\Resources\UserResource\Form\UserForm;

public function boot()
{
    UserForm::register([
        \Filament\Forms\Components\TextInput::make('something')
    ]);
}
```

### Page Actions

```php
use TomatoPHP\FilamentUsers\Resources\UserResource\Actions\ManageUserActions;
use TomatoPHP\FilamentUsers\Resources\UserResource\Actions\EditPageActions;
use TomatoPHP\FilamentUsers\Resources\UserResource\Actions\ViewPageActions;
use TomatoPHP\FilamentUsers\Resources\UserResource\Actions\CreatePageActions;

public function boot()
{
    ManageUserActions::register([
        Filament\Actions\Action::make('action')
    ]);
    
    EditPageActions::register([
        Filament\Actions\Action::make('action')
    ]);
    
    ViewPageActions::register([
        Filament\Actions\Action::make('action')
    ]);
    
    CreatePageActions::register([
        Filament\Actions\Action::make('action')
    ]);
}
```

### Infolist Entries

```php
use TomatoPHP\FilamentUsers\Resources\UserResource\Infolist\UserInfolist;

public function boot()
{
    UserInfolist::register([
       \Filament\Infolists\Components\TextEntry::make('something')
    ]);
}
```

## Custom Resource Classes

you can customize all resource classes to be any class you want with the same return from the config file

```php
/**
 * ---------------------------------------------
 * Resource Building
 * ---------------------------------------------
 * if you want to use the resource custom class
 */
'resource' => [
    'table' => [
        'class' => \TomatoPHP\FilamentUsers\Resources\UserResource\Table\UserTable::class,
        'filters' => \TomatoPHP\FilamentUsers\Resources\UserResource\Table\UserFilters::class,
        'actions' => \TomatoPHP\FilamentUsers\Resources\UserResource\Table\UserActions::class,
        'bulkActions' => \TomatoPHP\FilamentUsers\Resources\UserResource\Table\UserBulkActions::class,
    ],
    'form' => [
        'class' => \TomatoPHP\FilamentUsers\Resources\UserResource\Form\UserForm::class
    ],
    'infolist' => [
        'class' => \TomatoPHP\FilamentUsers\Resources\UserResource\InfoList\UserInfoList::class
    ],
    'pages' => [
        'list' => \TomatoPHP\FilamentUsers\Resources\UserResource\Actions\ManageUserActions::class,
        'create' => \TomatoPHP\FilamentUsers\Resources\UserResource\Actions\CreatePageActions::class,
        'edit' => \TomatoPHP\FilamentUsers\Resources\UserResource\Actions\EditPageActions::class,
        'view' => \TomatoPHP\FilamentUsers\Resources\UserResource\Actions\ViewPageActions::class
    ]
]
```

## Use  Simple User Resource

you can use the simple user resource by change on config, on your `filament-users.php` config allow simple

```php
/**
 * ---------------------------------------------
 * Use Simple Resource
 * ---------------------------------------------
 * change the resource from pages to modals by allow simple resource.
 */
'simple' => true,
```

## Publish Assets

you can publish config file by use this command

```bash
php artisan vendor:publish --tag="filament-users-config"
```

you can publish languages file by use this command

```bash
php artisan vendor:publish --tag="filament-users-lang"
```

## Testing

if you like to run `PEST` testing just use this command

```bash
composer test
```

## Code Style

if you like to fix the code style just use this command

```bash
composer format
```

## PHPStan

if you like to check the code by `PHPStan` just use this command

```bash
composer analyse
```

## Other Filament Packages

Checkout our [Awesome TomatoPHP](https://github.com/tomatophp/awesome)
