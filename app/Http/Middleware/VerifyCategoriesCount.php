<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use\App\Models\Category;

class VerifyCategoriesCount
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(Category::all()->count() == 0) {
            session()->flash('error', 'You need to add categories to be able to add a post');
            return redirect(route('categories.create'));
        }

        return $next($request);
    }
}
