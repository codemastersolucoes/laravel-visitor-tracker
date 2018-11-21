<?php

namespace CodeMaster\Laravel\VisitorTracker\Facades;

use Illuminate\Support\Facades\Facade;

class VisitStats extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'laravel-visitor-tracker';
    }
}
