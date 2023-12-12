<?php

namespace Ngalso\PermissionEditor;

use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Ngalso\PermissionEditor\Http\Middleware\SpatiePermissionMiddleware;


class PermissionEditorServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot()
    {
        Route::prefix('permission-editor')
            ->as('permission-editor.')
            ->middleware(config('permission-editor.middleware', ['web', 'spatie-permission']))
            ->group(function () {
                $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
            });

        $router = $this->app->make(Router::class);
        $router->aliasMiddleware('spatie-permission', SpatiePermissionMiddleware::class);

        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'permission-editor');

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../resources/assets' => public_path('permission-editor'),
            ], 'permission-editor-assets');

            // In addition to publishing assets, we also publish the config
            $this->publishes([
                __DIR__.'/../config/permission-editor.php' => config_path('permission-editor.php'),
            ], 'permission-editor-config');
        }
    }
}
