# Media Vault Generator for Laravel

Turns a directory structure into a Laravel Media Vault with view files using a simple artisan command.

- Resize Thumbnails automatically
- Organizes images following the directory structure
- Uploads them to S3
- Simple update command
- Configurable
- Open-Source & Contributable!

## Usage

1- Add service provider to `App\Config.php`

```php
    'providers' => [
    
        vicgonvt\LaraGallery\LaraGalleryServiceProvider::class,
        
    ]
```
