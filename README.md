# Sorter

Laravel collection macro sorter for sort multidimensional array by multiple criteria like columns, keys, any deep value

## Installation

```bash
composer require xtompie/lasorter
```

## Usage

```php
<?php

require 'vendor/autoload.php';

use Xtompie\Sorter\Sorter;

print_r(
    collect([
        'a' => ['city' => 'Warszawa', 'street' => 'Lea', 'meta' => (object)['priority' => '5']],
        'b' => ['city' => 'Krakow', 'street' => 'Lea', 'meta' => (object)['priority' => '10']],
        'c' => ['city' => 'Krakow', 'street' => 'Krolewska', 'meta' => (object)['priority' => '10']],
        'd' => ['city' => 'Krakow', 'street' => 'Lea', 'meta' => (object)['priority' => '10']],
    ])
        ->sorter(function(Sorter $sorter) {
            return $sorter
                ->asc("city")
                ->asc("street")
                ->asc(fn($i) => $i['meta']->priority)
                ->desc(fn($i, $k) => $k)
            ;
        })
);
```
