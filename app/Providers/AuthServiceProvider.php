<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Firebase\FirebaseUserProvider;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Auth\Events\Logout;
use App\Events\UserLastActivity;
//use Kreait\Firebase\Contract\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Event;
use Kreait\Firebase\Contract\Database;
use Kreait\Firebase\Factory;
use App\Firebase\Guard as FirebaseGuard;

class AuthServiceProvider extends ServiceProvider
{

//    public function __construct(Database $database)
//    {
//        $this->database = $database;
//        $this->ref_tablename = 'users';
//    }
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */

    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        //
//        Event::listen(Logout::class, function ($event) {
//            $uid = $event->user->id;

            // Get a reference to the Firebase Realtime Database


            // Set the user's online status to false on disconnect
//            $userRef = $this->database->getReference($this->ref_tablename . $uid);
//            $userRef->onDisconnect()->update(['lastActivity' => ]);
            // Broadcast the user's last activity event
//            event(new UserLastActivity($uid));
//        });

        $this->registerPolicies();

        \Illuminate\Support\Facades\Auth::provider('firebaseuserprovider', function($app, array $config) {
            return new FirebaseUserProvider($app['hash'], $config['model']);
        });
    }
}
