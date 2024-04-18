![Screenshot](https://github.com/tomatophp/filament-users/blob/master/art/3x1io-tomato-users.jpg)

# Filament users

[![Latest Stable Version](https://poser.pugx.org/tomatophp/filament-users/version.svg)](https://packagist.org/packages/tomatophp/filament-users)
[![PHP Version Require](http://poser.pugx.org/tomatophp/filament-users/require/php)](https://packagist.org/packages/tomatophp/filament-users)
[![License](https://poser.pugx.org/tomatophp/filament-users/license.svg)](https://packagist.org/packages/tomatophp/filament-users)
[![Downloads](https://poser.pugx.org/tomatophp/filament-users/d/total.svg)](https://packagist.org/packages/tomatophp/filament-users)

User Resource For FilamentPHP Admin Dashboard

## Screenshots

![Users List](https://github.com/tomatophp/filament-users/blob/master/art/users.png)
![Edit User](https://github.com/tomatophp/filament-users/blob/master/art/edit-user.png)
![Users Filters](https://github.com/tomatophp/filament-users/blob/master/art/users-filter.png)


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

## Support

you can join our discord server to get support [TomatoPHP](https://discord.gg/VZc8nBJ3ZU)

## Docs

you can check docs of this package on [Docs](https://docs.tomatophp.com/filament/filament-users)

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Security

Please see [SECURITY](SECURITY.md) for more information about security.

## Credits

- [Tomatophp](mailto:info@3x1.io)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
