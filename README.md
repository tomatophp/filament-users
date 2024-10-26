![Screenshot](https://raw.githubusercontent.com/tomatophp/filament-users/master/art/3x1io-tomato-users.jpg)

# Filament users

[![Latest Stable Version](https://poser.pugx.org/tomatophp/filament-users/version.svg)](https://packagist.org/packages/tomatophp/filament-users)
[![License](https://poser.pugx.org/tomatophp/filament-users/license.svg)](https://packagist.org/packages/tomatophp/filament-users)
[![Downloads](https://poser.pugx.org/tomatophp/filament-users/d/total.svg)](https://packagist.org/packages/tomatophp/filament-users)

User Table Resource with a lot of packages integrations

for v2 please use this [repo](https://github.com/3x1io/filament-user)


## Documentation

1. [Features](#features)
2. [Screenshots](#screenshots)
3. [Installation](#installation)
4. [Use Filament Shield](#use-filament-shield)
5. [Use Filament Impersonate](#use-filament-impersonate)
6. [Use Laravel Jetstream Teams](#use-laravel-jetstream-teams)
7. [Testing](#testing)
8. [Publish Resource](#publish-resource)
9. [Register User Relation Manager](#register-user-relation-manager)
10. [User Users Resource Hooks](#user-users-resource-hooks)
    - [Table Columns](#table-columns)
    - [Table Actions](#table-actions)
    - [Table Filters](#table-filters)
    - [Table Bulk Actions](#table-bulk-actions)
    - [From Components](#from-components)
    - [Page Actions](#page-actions)
    - [Infolist Entries](#infolist-entries)
11. [Use Simple User Resource](#use-simple-user-resource)
12. [Publish Assets](#publish-assets)
13. [Other Filament Packages](#other-filament-packages)

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

![Users List](https://raw.githubusercontent.com/tomatophp/filament-users/master/art/users.png)
![Edit User](https://raw.githubusercontent.com/tomatophp/filament-users/master/art/edit-user.png)
![Users Filters](https://raw.githubusercontent.com/tomatophp/filament-users/master/art/users-filter.png)

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

## Testing

if you like to run `PEST` testing just use this command

```bash
composer test
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

## Other Filament Packages

Checkout our [Awesome TomatoPHP](https://github.com/tomatophp/awesome)
