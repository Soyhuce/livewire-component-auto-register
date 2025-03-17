# Auto-register Livewire components outside base namespace

[![Latest Version on Packagist](https://img.shields.io/packagist/v/soyhuce/livewire-component-auto-register.svg?style=flat-square)](https://packagist.org/packages/soyhuce/livewire-component-auto-register)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/soyhuce/livewire-component-auto-register/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/soyhuce/livewire-component-auto-register/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/soyhuce/livewire-component-auto-register/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/soyhuce/livewire-component-auto-register/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![GitHub PHPStan Action Status](https://img.shields.io/github/actions/workflow/status/soyhuce/livewire-component-auto-register/phpstan.yml?branch=main&label=phpstan)](https://github.com/soyhuce/livewire-component-auto-register/actions?query=workflow%3APHPStan+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/soyhuce/livewire-component-auto-register.svg?style=flat-square)](https://packagist.org/packages/soyhuce/livewire-component-auto-register)

Auto-register Livewire components outside base namespace

Livewire only supports having one root namespace for your components. This package allows you to automatically register components outside the base namespace.

## Installation

You can install the package via composer:

```bash
composer require soyhuce/livewire-component-auto-register
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="livewire-component-auto-register-config"
```

## Usage

In the `config/livewire-component-auto-register.php` file, you can specify the namespaces you want to register components from.

```php
    'paths' => [
        'Support\\Livewire' => base_path('app/Support/Livewire'),
    ],
```

From now, all components in the `app/Support/Livewire` namespace will be automatically registered and be usable in your views.
For example, if you have a component `app/Support/Livewire/ProgressBar.php`, you can use it in your views like this:
```bladehtml
<livewire:progress-bar />
```

### Optimize discovery for production

Component discovery can be cached using the `livewire-component-auto-register:cache` command.

```bash
php artisan livewire-component-auto-register:cache
```

Cache can be cleared using the `livewire-component-auto-register:clear` command.

```bash
php artisan livewire-component-auto-register:clear
```

Commands are registered as optimization command inside Laravel, meaning that `php artisan optimize` and `php artisan optimize:clear` will automatically run them.

### Generate IDE Helper file

Sometimes, your IDE may not be able to resolve the components correctly (particularly Laravel IDEA plugin). You can generate a helper file using the `livewire-component-auto-register:ide-helper` command.

```bash
php artisan livewire-component-auto-register:ide-helper
```

You can configure ide-helper file path in the configuration file.

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

- [Bastien Philippe](https://github.com/bastien-phi)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
