<?php

namespace App\Http\ViewComposers;
use Illuminate\View\View;

Class ProfileComposer
{
	
	public function compose(View $view)
	{
		
		$view->with('auth', Auth::user());
		
	}
}