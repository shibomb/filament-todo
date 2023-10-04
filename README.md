# Filament ToDo

[![Latest Version on Packagist](https://img.shields.io/packagist/v/shibomb/filament-todo.svg?style=flat-square)](https://packagist.org/packages/shibomb/filament-todo)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/shibomb/filament-todo/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/shibomb/filament-todo/actions?query=workflow%3Arun-tests+branch%3A3.x)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/shibomb/filament-todo/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/shibomb/filament-todo/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3A3.x)
[![Total Downloads](https://img.shields.io/packagist/dt/shibomb/filament-todo.svg?style=flat-square)](https://packagist.org/packages/shibomb/filament-todo)


The simple todo manager for FilamentPHP Admin Dashboard.

## Installation

You can install the package via composer:

```bash
composer require shibomb/filament-todo
```

You can publish and run the migrations with:

```bash
php artisan vendor:publish --tag="filament-todo-migrations"
php artisan migrate
```

Finally reigster the plugin on `/app/Providers/Filament/AdminPanelProvider.php`

```php
$panel->plugin(\Shibomb\FilamentTodo\FilamentTodoPlugin::make())
```


### option : config 
You can publish the config file with:

```bash
php artisan vendor:publish --tag="filament-todo-config"
```

This is the contents of the published config file:

```php
return [
    'navigation' => [
        'category' => [
            'group' => 'filament-todo::filament-todo.navigation.category.group', // set false to no-group
            'icon' => 'heroicon-o-tag',
            'sort' => 2,
        ],
        'todo' => [
            'group' => 'filament-todo::filament-todo.navigation.todo.group', // set false to no-group
            'icon' => 'heroicon-o-document-check',
            'sort' => 1,
        ],
    ],
];
```


## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [SHIBAHARA Hiroki](https://github.com/shibomb)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
