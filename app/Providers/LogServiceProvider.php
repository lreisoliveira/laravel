<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class LogServiceProvider extends ServiceProvider
{
	// faz com que o serviço seja registrado somene quando for utilizado
	// precisa do metodo provides 
	protected $defer = true; 
	
	/**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //$this->app->bind('LogInterface','logDatabaseWrite');
        $this->app->singleton('LogService',function($app){
        	return new \Log(App::make('LogInterface'));
        });
    }
    
    public function provides()
    {
    	return ['LogService'];	
    }
}
