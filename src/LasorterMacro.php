<?php

namespace Xtompie\Lasorter;

use Illuminate\Support\Collection;
use Xtompie\Sorter\Sorter;

/**
 * @mixin \Illuminate\Support\Collection
 * @return \Illuminate\Support\Collection 
 */
class LasorterMacro
{
    public function __invoke()
    {
        return function (callable $callback): Collection {
            
            /** @var Sorter $sorter */
            $sorter = $callback(Sorter::new());

            /** @var Collection $this */
            return new static($sorter->sort($this->all()));
        };
    }
}