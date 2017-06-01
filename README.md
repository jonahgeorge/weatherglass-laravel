# weatherglass-laravel

## Installation

```php
<?php
// config/weatherglass.php

return [
  'site_id' => '<YOUR SITE ID>',
];
```

```php
<?php
// app/Http/Kernel.php

protected $middlewareGroups = [
    'web' => [
        \JonahGeorge\Middleware\Weatherglass::class,
    ],
];
```
