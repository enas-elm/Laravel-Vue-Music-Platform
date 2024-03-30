<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;
use App\Models\Tracklist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsCreator
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $tracklist = Tracklist::where('user_id', auth()->user()->id)->get();
        dd($request->defaultLocale); 
        if ($tracklist->user_id == auth()->id()){
            return $next($request);
    }
}
}