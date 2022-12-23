<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EnsureEnoughDataForAdding
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
        $validator = Validator::make($request->all(), [
            'fName' => 'required|string|min:3',
            'lName' => 'required|string|min:3',
        ]);

        if ($validator->fails()) 
            return redirect('/users/create')->with(['isErrorOccured' => TRUE]);
        
        return $next($request);
    }
}
