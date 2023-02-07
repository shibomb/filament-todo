# Filament Todo

[![Latest Version on Packagist](https://img.shields.io/packagist/v/shibomb/filament-todo.svg?style=flat-square)](https://packagist.org/packages/shibomb/filament-todo)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/shibomb/filament-todo/run-tests.yml?branch=master&style=flat-square)](https://github.com/shibomb/filament-todo/actions/workflows/run-tests.yml?query=branch%3Amain++)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/shibomb/filament-todo/php-cs-fixer.yml?branch=master&style=flat-square)](https://github.com/shibomb/filament-todo/actions/workflows/php-cs-fixer.yml?query=branch%3Amain++)
[![Total Downloads](https://img.shields.io/packagist/dt/shibomb/filament-todo.svg?style=flat-square)](https://packagist.org/packages/shibomb/filament-todo)

A faceless todo content manager with configurable richtext and markdown support for filament admin panel.

![](./art/screen1.png)

## Filament Admin Panel

This package is tailored for [Filament Admin Panel](https://filamentphp.com/).

Make sure you have installed the admin panel before you continue with the installation. You can check the [documentation here](https://filamentphp.com/docs/admin)

## Supported Versions

PHP: `8.0`

Laravel: `8` & `9`

## Installation

You can install the package via composer:

```bash
composer require shibomb/filament-todo

php artisan filament-todo:install

php artisan storage:link

php artisan migrate
```

## Displaying your content

Filment todo builder is faceless, it doesn't have any opinions on how you display your content in your frontend. You can use the todo models in your controllers to display the different resources:

-   `Shibomb\FilamentTodo\Models\Todo`
-   `Shibomb\FilamentTodo\Models\Category`

### Todos

```php
$todos = Todo::published()->get();
$todos = Todo::draft()->get();
$todos = Todo::finished()->get();
$todos = Todo::unfinished()->get();
```

### Todo Content

```php
$todo = Todo::find($id);

$todo->id;
$todo->title;
$todo->content;
$todo->published_at;
$todo->is_finished;
```

### Todo Category

```php
$todo = Todo::with(['category'])->find($id);

$category = $todo->category;

$category->id;
$category->name;
$category->color;
$category->sort_order;
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

-   [shibomb](https://github.com/shibomb)
-   [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
