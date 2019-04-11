<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        // change in view method every time we call view we gonne send archives and tags variable ..

        view()->composer('layouts.sidebar',function($view){
            if (!in_array('guest', request()->route()->middleware())){
                $view->with(['archives' => \App\Post::archives(),'tags' => \App\Tag::PopularTags(),'adminTags' => \App\Admin::adminTags() ]);
            }

            if (in_array('admin', request()->route()->middleware())){
            $view->with(['online_users' => \App\Admin::listOnlineUsers() ]);

            }
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}