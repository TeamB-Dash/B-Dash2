<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Laravel\Sanctum\Sanctum;
use App\Models\Department;
use Illuminate\Support\Facades\Blade;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        Sanctum::ignoreMigrations();
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::share('departments', Department::all());
        
        Blade::directive('markdown', function ($expression) {

            $markdown = view(
                str_replace('\'', '', $expression)
            )->render();
    
            $Parsedown = new \Parsedown();
            return $Parsedown->text($markdown);
    
        });
    }
    
}
