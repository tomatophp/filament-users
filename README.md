![Screenshot](https://raw.githubusercontent.com/tomatophp/filament-users/master/art/3x1io-tomato-users.jpg)

# Filament users

[![Latest Stable Version](http://poser.pugx.org/tomatophp/filament-users/v)](https://packagist.org/packages/tomatophp/filament-users)
[![Daily Downloads](http://poser.pugx.org/tomatophp/filament-users/d/daily)](https://packagist.org/packages/tomatophp/filament-users)
[![Total Downloads](http://poser.pugx.org/tomatophp/filament-users/downloads)](https://packagist.org/packages/tomatophp/filament-users)
[![Version](http://poser.pugx.org/tomatophp/filament-users/version)](https://packagist.org/packages/tomatophp/filament-users)
[![License](http://poser.pugx.org/tomatophp/filament-users/license)](https://packagist.org/packages/tomatophp/filament-users) 
[![PHP Version Require](http://poser.pugx.org/tomatophp/filament-users/require/php)](https://packagist.org/packages/tomatophp/filament-users)
[![Github actions Build](https://github.com/tomatophp/filament-users/workflows/Build/badge.svg)](https://packagist.org/packages/tomatophp/filament-users)

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
9. [Use Facade Class](#use-facade-class)
10. [Publish Assets](#publish-assets)
11. [Other Filament Packages](#other-filament-packages)

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

finally reigster the plugin on `/app/Providers/Filament/AdminPanelProvider.php`

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

## Use Facade Class

you can use the facade class to attach anything to your user resource, in your provider like this 

```php
use TomatoPHP\FilamentUsers\Facades\FilamentUser;

public function boot()
{
    FilamentUser::registerAction(\Filament\Actions\Action::make('update'));
    FilamentUser::registerCreateAction(\Filament\Actions\Action::make('update'));
    FilamentUser::registerEditAction(\Filament\Actions\Action::make('update'));
    FilamentUser::registerFormInput(\Filament\Forms\Components\TextInput::make('text'));
    FilamentUser::registerTableAction(\Filament\Tables\Actions\Action::make('update'));
    FilamentUser::registerTableColumn(\Filament\Tables\Columns\Column::make('text'));
    FilamentUser::registerTableFilter(\Filament\Tables\Filters\Filter::make('text'));
}
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
