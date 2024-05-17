# Laravel Settings Package

A Laravel package to manage settings for any Eloquent model. This package allows you to attach settings to any model using the `HasSettings` trait, retrieve settings with default values, and delete settings.

## Installation

1. Install the package via Composer:

    ```bash
    composer require grhone/laravel-settings
    ```

2. Add the service provider to `config/app.php` if using Laravel version below 5.5:

    ```php
    'providers' => [
        // Other service providers...
        Grhone\LaravelSettings\SettingsServiceProvider::class,
    ],
    ```

3. Publish the migration file:

    ```bash
    php artisan vendor:publish --provider="Grhone\LaravelSettings\SettingsServiceProvider" --tag="migrations"
    ```

4. Run the migrations:

    ```bash
    php artisan migrate
    ```

## Usage

### Using the `HasSettings` Trait

To use settings with your Eloquent models, simply add the `HasSettings` trait to your model:

```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Grhone\LaravelSettings\Traits\HasSetting;

class Event extends Model
{
    use HasSettings;

    public function getWebsiteBannerFilename()
    {
        // Get the setting with a default value
        return $this->getSetting('websiteBannerFilename', 'default_banner.jpg');
    }
}
```

### Available Methods

#### getSetting($key, $default = null)
Retrieve the setting value for a given key. If the setting does not exist, the default value is returned.

```php
$banner = $event->getSetting('websiteBannerFilename'); // without default value
$banner = $event->getSetting('websiteBannerFilename', 'default_banner.jpg'); // with default value
```

#### setSetting($key, $value)
Set the setting value for a given key.

```php
$event->setSetting('websiteBannerFilename', 'banner123.jpg');
```

#### deleteSetting($key)
Delete the setting for a given key.

```php
$event->deleteSetting('websiteBannerFilename');
```

## Contributing

Thank you for considering contributing to the Laravel Settings Package! You can contribute in many ways, including:

- Reporting a bug
- Discussing the current state of the code
- Submitting a fix
- Proposing new features

## License
The Laravel Settings Package is open-source software licensed under the MIT license.