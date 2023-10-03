# This is my package filament-todo

[![Latest Version on Packagist](https://img.shields.io/packagist/v/shibomb/filament-todo.svg?style=flat-square)](https://packagist.org/packages/shibomb/filament-todo)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/shibomb/filament-todo/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/shibomb/filament-todo/actions?query=workflow%3Arun-tests+branch%3A3.x)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/shibomb/filament-todo/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/shibomb/filament-todo/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3A3.x)
[![Total Downloads](https://img.shields.io/packagist/dt/shibomb/filament-todo.svg?style=flat-square)](https://packagist.org/packages/shibomb/filament-todo)



This is where your description should go. Limit it to a paragraph or two. Consider adding a small example.

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

You can publish the config file with:

```bash
php artisan vendor:publish --tag="filament-todo-config"
```

Optionally, you can publish the views using

```bash
php artisan vendor:publish --tag="filament-todo-views"
```

This is the contents of the published config file:

```php
return [
];
```

## Usage

```php
$filamentTodo = new Shibomb\FilamentTodo();
echo $filamentTodo->echoPhrase('Hello, Shibomb!');
```

## Testing

```bash
composer test
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
