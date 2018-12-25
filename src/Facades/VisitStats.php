<?php

namespace CodeMaster\Laravel\VisitorTracker\Facades;

use Illuminate\Support\Facades\Facade;

class VisitStats extends Facade
{
    /**
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'laravel-visitor-tracker';
    }
}
