# Sending sms via Playmobile

[![Latest Version on Packagist](https://img.shields.io/packagist/v/uzbek/laravel-playmobile-client.svg?style=flat-square)](https://packagist.org/packages/uzbek/laravel-playmobile-client)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/professor93/laravel-playmobile-client/run-tests?label=tests)](https://github.com/professor93/laravel-playmobile-client/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/workflow/status/professor93/laravel-playmobile-client/Fix%20PHP%20code%20style%20issues?label=code%20style)](https://github.com/professor93/laravel-playmobile-client/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/uzbek/laravel-playmobile-client.svg?style=flat-square)](https://packagist.org/packages/uzbek/laravel-playmobile-client)

## Installation

You can install the package via composer:

```bash
composer require uzbek/laravel-playmobile-client
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="playmobile-client-config"
```

This is the contents of the published config file:

```php
return [
    'token_lifetime' => env('PLAYMOBILE_TOKEN_DURATION', 24 * 3600 * 30),
    'base_url' => env('PLAYMOBILE_URL'),
    'username' => env('PLAYMOBILE_USERNAME'),
    'password' => env('PLAYMOBILE_PASSWORD'),
    'originator' => env('PLAYMOBILE_ORIGINATOR'),
    'proxy_url' => env('PLAYMOBILE_PROXY_URL'),
    'proxy_proto' => env('PLAYMOBILE_PROXY_PROTO'),
    'proxy_host' => env('PLAYMOBILE_PROXY_HOST'),
    'proxy_port' => env('PLAYMOBILE_PROXY_PORT'),
];
```

## Usage
With object
```php
$laravelPlaymobileClient = new Uzbek\LaravelPlaymobileClient();

$laravelPlaymobileClient->send('998901234567', 'Sms from PHP/Laravel application');
```
or with Facade

```php
use Uzbek\LaravelPlaymobileClient\Facades\Playmobile;

Playmobile::send('998901234567', 'Sms from PHP/Laravel application');
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Inoyatulloh](https://github.com/professor93)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
