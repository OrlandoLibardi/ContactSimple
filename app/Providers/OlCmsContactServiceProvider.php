<?php 

namespace OrlandoLibardi\ContactCms\app\Providers;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Blade;
use Illuminate\View\Compilers\BladeCompiler;

use OrlandoLibardi\ContactCms\app\Contact;
use OrlandoLibardi\ContactCms\app\ContactObserver;


class OlCmsContactServiceProvider extends ServiceProvider{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        /**
         * Rotas para controlador Contact
         */
        Route::namespace('OrlandoLibardi\ContactCms\app\Http\Controllers')
               ->middleware(['web', 'auth'])
               ->prefix('admin')
               ->group(__DIR__. '/../../routes/web.php');

        //Rotas  para envios de formulário 
        $this->loadRoutesFrom(__DIR__. '/../../routes/web-dynamic.php');       
        /**
         * Publicar os arquivos 
         */
        $this->publishes( [
            __DIR__.'/../../database/migrations/' => database_path('migrations/'),
            __DIR__.'/../../database/seeds/' => database_path('seeds/'),
            __DIR__.'/../../resources/views/admin/' => resource_path('views/admin/'),
            __DIR__.'/../../resources/views/website/' => resource_path('views/website/'), 
            __DIR__.'/../../resources/emails/' => resource_path('emails/'),        
            __DIR__.'/../../config/contact.php' => config_path('contact.php'),     
        ],'config');  
        /**
         * Observer Contact
         */
        Contact::observe(ContactObserver::class);
         
    }
    
}