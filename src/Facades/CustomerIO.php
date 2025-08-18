<?php

namespace DominionSolutions\CustomerIO\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \DominionSolutions\CustomerIO\CustomerIO
 */
class CustomerIO extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \DominionSolutions\CustomerIO\CustomerIO::class;
    }
}
