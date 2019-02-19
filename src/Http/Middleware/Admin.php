<?php
/**
 * Created by PhpStorm.
 * User: digi-x
 * Date: 2019-01-12
 * Time: 20:25
 */

namespace Phoenix\Expenses\Http\Middleware;

use Closure;

class Admin
{
    public function handle($request, Closure $next)
    {
        if (auth()->user()->level !== 'Admin')
            redirect()->route('user.home')->withErrors('message', 'Access Deny!');
        return $next($request);
    }
}
