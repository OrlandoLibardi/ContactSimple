<?php 

namespace OrlandoLibardi\ContactCms\app\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Blade;
use Illuminate\View\Compilers\BladeCompiler;

class OlCmsContactviewServiceProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     */
    public function register()
    {               
        $this->registerOlCmsContactBuilder();
        $this->app->alias('OlCmsContact', OlCmsContactBuilder::class);        
    }

    /**
     * Register the OlCmsContact builder instance.
     */
    protected function registerOlCmsContactBuilder()
    {
        $this->app->singleton('OlCmsContact', function ($app) {
            return new OlCmsContactBuilder($app['url'], $app['request']);
        });
    }    

    /**
     * Get the services provided by the provider.
     */
    public function provides()
    {
        return ['OlCmsContact', OlCmsContactBuilder::class];
    }
}