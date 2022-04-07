<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use View;
use Carbon\Carbon;
use App\Sparejob;
use Auth;
use App\User;
use App\Sparejam;
use App\Post;
use App\Observers\PostObserver;

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
		
		view::composer('*', function($view){
			
			$view->with('auth', Auth::user());
			// $view->with('post', Post::where('helper_id', '=', Auth::id())->paginate(4));	
				
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
