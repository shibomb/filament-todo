# Filament Todo

[![Latest Version on Packagist](https://img.shields.io/packagist/v/shibomb/filament-todo.svg?style=flat-square)](https://packagist.org/packages/shibomb/filament-todo)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/shibomb/filament-todo/run-tests?label=tests)](https://github.com/shibomb/filament-todo/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/workflow/status/shibomb/filament-todo/Check%20&%20fix%20styling?label=code%20style)](https://github.com/shibomb/filament-todo/actions?query=workflow%3A"Check+%26+fix+styling"+branch%3Amain)
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

### Todos & Drafts

```php
$todos = Todo::published()->get();

$drafts = Todo::draft()->get();

```

### Todo Content

```php
$todo = Todo::find($id);

$todo->id;
$todo->title;
$todo->content;
$todo->published_at;
$todo->finished_at;
```

### Todo Category

```php
$todo = Todo::with(['category'])->find($id);

$category = $todo->category;

$category->id;
$category->name;
```

### Configurations

This is the contents of the published config file:

```php
<?php

return [

    /**
     * Supported content editors: richtext & markdown:
     *      \Filament\Forms\Components\RichEditor::class
     *      \Filament\Forms\Components\MarkdownEditor::class
     */
    'editor'  => \Filament\Forms\Components\RichEditor::class,

    /**
     * Buttons for text editor toolbar.
     */
    'toolbar_buttons' => [
        'attachFiles',
        'blockquote',
        'bold',
        'bulletList',
        'codeBlock',
        'h2',
        'h3',
        'italic',
        'link',
        'orderedList',
        'redo',
        'strike',
        'undo',
    ],
];
```

## More Screenshots

![](./art/screen2.png)

---

![](./art/screen3.png)

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
