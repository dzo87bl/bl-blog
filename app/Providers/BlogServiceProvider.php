<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use View;

class BlogServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        /* nav info */
        View::composer('partials._nav', function($view){
            $web_server = $_SERVER['SERVER_SOFTWARE'];
            $php_ver = phpversion();
            //$db_ver = mysql_get_server_info();
            $os = PHP_OS;
            $view->with('web_server', $web_server)->with('php_ver', $php_ver)->with('os', $os);
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
