<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Kreait\Firebase\Contract\Database;
use Symfony\Component\HttpFoundation\Response;
use Kreait\Firebase\Contract\Auth as FirebaseAuth;
use Kreait\Firebase\Exception\FirebaseException;

class VerifyUser
{
    public function __construct(FirebaseAuth $auth){
        $this->auth = $auth;
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $uid = Session::get('uid');
        $verify = $this->auth->getUser($uid)->emailVerified;
        if ($verify == 0) {
            return redirect()->route('verify');
        }
        else{
            return $next($request);
        }
    }
}
