<?php

namespace Xtompie\Lasorter;

use Illuminate\Support\Collection;
use Illuminate\Support\ServiceProvider;

class LasorterServiceProvider extends ServiceProvider
{
    public function register()
    {
        if (Collection::hasMacro('sorter')) {
            return;
        }
        Collection::macro('sorter', (new LasorterMacro)());
    }
}