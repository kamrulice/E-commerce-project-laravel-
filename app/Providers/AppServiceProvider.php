<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
 
use View;
use App\Category;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('fontEnd.includes.header',function($view){
            $publishedCatagory = Category::where('publicationStatus',1)->get();
            $view->with('publishedCatagory',$publishedCatagory);
        });
       
    }
}
