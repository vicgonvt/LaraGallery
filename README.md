# Media Vault Generator for Laravel

Turns a directory structure into a Laravel Media Vault with view files using a simple artisan command.

- Resize Thumbnails automatically
- Organizes images following the directory structure
- Uploads them to S3
- Simple update command
- Configurable
- Open-Source & Contributable!

## Usage

1- Clone this repository into your package development folder.

2- Change src/Package to your package name. Customize the package's composer.json autoload section to reflect the previous change.

3- Customize **Package/PackageServiceProvider** with the correct namespace and the name of your package, and replace the $packageName attribute.

```php

    protected $packageName = 'yourpackagename';

```

4- Add the package in your application's **composer.json** autoload section to make it available in your application. 

```

"psr-4": {
            "App\\": "app/",
            "Vendor\\Package\\": "packages/vendor/package/src/Package"
        }

```

5- Run :

```
composer dump-autoload
```

6- Add the newly create package's service provider to your **config/app.php** provider's list.

7- Have fun!

## Package dependencies

Laravel won't autoload the **vendor/** path in your package's development folder. Easiest workaround is to add them in your main application's composer.json.
