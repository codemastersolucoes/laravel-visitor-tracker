<?php

namespace CodeMaster\Laravel\VisitorTracker;

use Illuminate\Support\ServiceProvider;

class VisitorTrackerServiceProvider extends ServiceProvider
{
    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(VisitStats::class, function () {
            return new VisitStats();
        });

        $this->app->alias(VisitStats::class, 'laravel-visitor-tracker');

        if ($this->app->config->get('visitortracker') === null) {
            $this->app->config->set('visitortracker', require __DIR__ . '/config/visitortracker.php');
        }
    }

    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        // Migrations
//        $this->loadMigrationsFrom(__DIR__ . '/database/migrations');
        $this->copy_directory(__DIR__ . '/database/migrations', __DIR__ . '/../../../../database/migrations');

        // Config
        $this->publishes([
            __DIR__ . '/config/visitortracker.php' => config_path('visitortracker.php'),
        ]);

        // Image assets
        $this->publishes([
            __DIR__ . '/../assets' => public_path('vendor/visitortracker'),
        ], 'public');

        // Views
        $this->loadViewsFrom(__DIR__ . '/views', 'visitstats');

        $this->publishes([
            __DIR__ . '/views' => resource_path('views/vendor/visitstats')
        ]);
    }

    private function copy_directory($directory, $destiny, $see_action = false){
        if ($destiny{strlen($destiny) - 1} === '/'){
            $destiny = substr($destiny, 0, -1);
        }

        if (!is_dir($destiny)){
            if ($see_action){
                echo "Creating directory {$destiny}\n";
            }
            if (!mkdir($destiny, 0755) && !is_dir($destiny)) {
                throw new \RuntimeException(sprintf('Directory "%s" was not created', $destiny));
            }
        }

        $folder = opendir($directory);

        while ($item = readdir($folder)){
            if ($item === '.' || $item === '..'){
                continue;
            }
            if (is_dir("{$directory}/{$item}")){
                $this->copy_directory("{$directory}/{$item}", "{$destiny}/{$item}", $see_action);
            }else{
                if ($see_action){
                    echo "Copying {$item} to {$destiny}"."\n";
                }
                if (!file_exists("{$destiny}/{$item}"))
                    copy("{$directory}/{$item}", "{$destiny}/{$item}");
            }
        }
    }
}
