<?php

namespace App\Http\Middleware;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Kreait\Firebase\Contract\Database;
use Kreait\Firebase\Factory;


class LastActivity
{
    public function __construct(Database $database, Request $request)
    {
        $this->database = $database;
        $this->ref_tablename = 'Order';
    }

    public function handle(Request $request, Closure $next)
    {
        if (Auth::check()) {
            $this->database->getReference($this->ref_tablename . Auth::id())->update([
                'last_activity' => now()->toDateTimeString(),
            ]);
        }

        return $next($request);
    }

}
