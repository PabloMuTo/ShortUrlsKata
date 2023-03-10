<?php

namespace Src\Infrastructure;

use Closure;
use Illuminate\Http\Request;
use Src\Domain\Token;

class ApiAuthenticationMiddleware
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
        $token = $request->bearerToken();
        try {
            Token::build($token);
            return $next($request);
        }
        catch ( \Exception ) {
            return response('Unauthorized', 401);
        }
    }
}
