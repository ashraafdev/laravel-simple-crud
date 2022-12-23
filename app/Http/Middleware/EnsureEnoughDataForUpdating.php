<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EnsureEnoughDataForUpdating
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
            'newfName' => 'required|string|min:3',
            'newlName' => 'required|string|min:3',
            'userID' => 'required|int',
        ]);

        if ($validator->fails()) 
            return redirect('/users/' . $request->get('userID') . '/edit')->with(['isErrorOccured' => TRUE]);

        return $next($request);
    }
}
