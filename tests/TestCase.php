<?php

namespace CodeMaster\Laravel\VisitorTracker\Test;

use CodeMaster\Laravel\VisitorTracker\VisitorTrackerServiceProvider;
use CodeMaster\Laravel\VisitorTracker\Tracker;
use Orchestra\Testbench\TestCase as OrchestraTestCase;

class TestCase extends OrchestraTestCase
{
    /**
     * Load package service provider
     * @param  \Illuminate\Foundation\Application $app
     * @return CodeMaster\Laravel\VisitorTracker\VisitorTrackerServiceProvider
     */
    protected function getPackageProviders($app)
    {
        return [VisitorTrackerServiceProvider::class];
    }

    /**
     * Load package alias
     * @param  \Illuminate\Foundation\Application $app
     * @return array
     */
    protected function getPackageAliases($app)
    {
        return [
            'VisitorTracker' => Tracker::class,
        ];
    }
}
