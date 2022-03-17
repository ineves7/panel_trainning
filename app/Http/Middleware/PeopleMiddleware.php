<?php

namespace App\Http\Middleware;

use App\Models\Employee;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;

class PeopleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @param string $people
     * @return mixed
     */
    public function handle(Request $request, Closure $next, string $people)
    {
        if (Auth::people()?->userType() === $people) {
            return $next($request);
        }

        //flash(sprintf('Você não tem acesso em %s', URL::previous()), 'danger');
        return redirect(RouteServiceProvider::HOME);
    }
}
