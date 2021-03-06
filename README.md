# UFO Framework Example module

## Requirements
* PHP >= 7.2
* UFO Framework

## Install in UFO Framework based project
Configure composer.json
```json
    "repositories": [
        {
            "type": "git",
            "url": "https://github.com/enikeishik/ufmexample.git",
            "vendor-alias": "ufmexample"
        }
    ]
    ...
    "require": {
        "enikeishik/ufmexample": "dev-master"
    }
    ...
    "scripts": {
        "post-update-cmd": [
            "@php -f loadmodule.php enikeishik/ufmexample"
        ]
    }    
```

Add route
```php
    '/modexample' => [
        'title' => 'My example module', 
        'module' => [
            'vendor' => 'Enikeishik', 
            'name' => 'Ufmexample', 
        ], 
    ]
```

Add widget
```php
    'path' => [
        'place_name' => [
            [
                'vendor' => 'Enikeishik', 
                'module' => 'Ufmexample', 
                'name' => '', 
                'title' => 'UFO Framework Example module widget', 
                'text' => '', 
                'dbless' => false, 
                'params' => [
                    'count' => 3, 
                    'filter' => 'marked', 
                ], 
            ]
        ],
        'another_place_name' => [
            [
                'vendor' => 'Enikeishik', 
                'module' => 'Ufmexample', 
                'name' => 'Rtext', 
                'title' => 'UFO Framework Example module random text widget', 
                'text' => '', 
                'params' => [], 
            ]
        ]
    ]
```
