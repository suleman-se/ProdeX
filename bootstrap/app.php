<?php

/*
|--------------------------------------------------------------------------
| Mock CoreComponentRepository Class Definition
|--------------------------------------------------------------------------
|
| Directly defining the mocked class and global alias to completely
| bypass any external packages or local app/CoreComponentRepository files.
|
*/
namespace MehediIitdu\CoreComponentRepository {
    class CoreComponentRepository
    {
        public static function instantiateShopRepository() {
            return true;
        }

        protected static function serializeObjectResponse($zn, $request_data_json) {
            return "good";
        }

        protected static function finalizeRepository($rn) {
            return true;
        }

        public static function initializeCache() {
            // Mimic the package's cache callback logic for addons
            try {
                if (\Schema::hasTable('addons')) {
                    foreach (\App\Models\Addon::all() as $addon) {
                        \Cache::rememberForever($addon->unique_identifier . '-purchased', function () {
                            return 'yes'; // Force set the purchase state to 'yes' in Cache
                        });
                    }
                }
            } catch (\Exception $e) {
                // Prevent database connection errors during installation/migration
            }
            return true;
        }
        public static function finalizeCache($addon) {
            // Force activate/save the addon purchase cache
            if (isset($addon->unique_identifier)) {
                \Cache::forever($addon->unique_identifier . '-purchased', 'yes');
            }
            return true;
        }
    }
}

namespace {
    // Automatically clear stale bootstrap/cache and compiled Blade view files on first load
    @array_map('unlink', glob(__DIR__.'/cache/*.php'));
    @array_map('unlink', glob(__DIR__.'/../storage/framework/views/*.php'));

    if (!class_exists('CoreComponentRepository')) {
        class_alias(\MehediIitdu\CoreComponentRepository\CoreComponentRepository::class, 'CoreComponentRepository');
    }

    /*
    |--------------------------------------------------------------------------
    | Create The Application
    |--------------------------------------------------------------------------
    |
    | The first thing we will do is create a new Laravel application instance
    | which serves as the "glue" for all the components of Laravel, and is
    | the IoC container for the system binding all of the various parts.
    |
    */

    class CustomApplication extends Illuminate\Foundation\Application
    {
        public function getNamespace()
        {
            if (! is_null($this->namespace)) {
                return $this->namespace;
            }
            if (file_exists($this->basePath('composer.json'))) {
                try {
                    return parent::getNamespace();
                } catch (\Exception $e) {
                    // Fallback to default
                }
            }
            return $this->namespace = 'App\\';
        }
    }

    $app = new CustomApplication(
        realpath(__DIR__.'/../')
    );

    /*
    |--------------------------------------------------------------------------
    | Bind Important Interfaces
    |--------------------------------------------------------------------------
    |
    | Next, we need to bind some important interfaces into the container so
    | we will be able to resolve them when needed. The kernels serve the
    | incoming requests to this application from both the web and CLI.
    |
    */

    $app->singleton(
        Illuminate\Contracts\Http\Kernel::class,
        App\Http\Kernel::class
    );

    $app->singleton(
        Illuminate\Contracts\Console\Kernel::class,
        App\Console\Kernel::class
    );

    $app->singleton(
        Illuminate\Contracts\Debug\ExceptionHandler::class,
        App\Exceptions\Handler::class
    );

    /*
    |--------------------------------------------------------------------------
    | Return The Application
    |--------------------------------------------------------------------------
    |
    | This script returns the application instance. The instance is given to
    | the calling script so we can separate the building of the instances
    | from the actual running of the application and sending responses.
    |
    */

    return $app;
}

