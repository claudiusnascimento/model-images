# Model Gallery

Simple Image Gallery to power up your models

## Installation

You can install the package via composer:

```bash
composer require claudiusnascimento/model-images
```

## Usage

``` php
// Usage description here
```

### Testing

``` bash
composer test
```

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email cau@claudiusnascimento.com instead of using the issue tracker.

## Credits

- [Claudius Nascimento](https://github.com/claudiusnascimento)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

## Laravel Package Boilerplate

This package was generated using the [Laravel Package Boilerplate](https://laravelpackageboilerplate.com).

# PUBLISHING 

php artisan vendor:publish --provider="Vendor\ClaudiusNascimento\ModelGalleryServiceProvider" --tag="xxx"

# MIGRATE

php artisan migrate --path=/packages/claudiusnascimento/model-images/database/migrations/2020_04_05_000000_create_model_images_table.php

### with docker-compose
docker-compose exec app php artisan migrate --path=/packages/claudiusnascimento/model-images/database/migrations/2020_04_05_000000_create_model_images_table.php
