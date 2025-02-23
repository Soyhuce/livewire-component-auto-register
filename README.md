# Auto-register Livewire components outside base namespace

[![Latest Version on Packagist](https://img.shields.io/packagist/v/soyhuce/livewire-component-auto-register.svg?style=flat-square)](https://packagist.org/packages/soyhuce/livewire-component-auto-register)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/soyhuce/livewire-component-auto-register/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/soyhuce/livewire-component-auto-register/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/soyhuce/livewire-component-auto-register/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/soyhuce/livewire-component-auto-register/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![GitHub PHPStan Action Status](https://img.shields.io/github/actions/workflow/status/soyhuce/livewire-component-auto-register/phpstan.yml?branch=main&label=phpstan)](https://github.com/soyhuce/livewire-component-auto-register/actions?query=workflow%3APHPStan+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/soyhuce/livewire-component-auto-register.svg?style=flat-square)](https://packagist.org/packages/soyhuce/livewire-component-auto-register)

This is where your description should go. Limit it to a paragraph or two. Consider adding a small example.

## Installation

You can install the package via composer:

```bash
composer require soyhuce/livewire-component-auto-register
```

You can publish and run the migrations with:

```bash
php artisan vendor:publish --tag="livewire-component-auto-register-migrations"
php artisan migrate
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="livewire-component-auto-register-config"
```

This is the contents of the published config file:

```php
return [
];
```

Optionally, you can publish the views using

```bash
php artisan vendor:publish --tag="livewire-component-auto-register-views"
```

## Usage

```php
$livewireComponentAutoRegister = new Soyhuce\LivewireComponentAutoRegister();
echo $livewireComponentAutoRegister->echoPhrase('Hello, Soyhuce!');
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

- [Bastien Philippe](https://github.com/bastien-phi)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
