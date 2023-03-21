<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Kreait\Firebase\Contract\Auth as FirebaseAuth;
use Illuminate\Support\Facades\Session;
//use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Kreait\Firebase\Auth\SignInResult;
use App\Models\User;
use Kreait\Firebase\Exception\AppCheck\InvalidAppCheckToken;
use Kreait\Firebase\Exception\FirebaseException;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $auth;
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     *
     */
    public function __construct(FirebaseAuth $auth)
    {
        $this->middleware('guest')->except('logout');
        $this->auth = $auth;
    }

    protected function login(Request $request) {
        try {
            $signInResult = $this->auth->signInWithEmailAndPassword($request['email'], $request['password']);
            $user = new User($signInResult->data());
//TODO::My login error seems to be here.. It get redirecting me to login and also I cant get session id to my web app
            //uid Session
            $loginuid = $signInResult->firebaseUserId();
            Session::put('uid',$loginuid);

            $result = Auth::login($user);
            return redirect($this->redirectPath());
        } catch (FirebaseException $e) {
            throw ValidationException::withMessages([$this->username() => [trans('auth.failed')],]);
        }
    }
    public function username()
    {
        return 'email';
    }

    public function handleCallback(Request $request, $provider) {
        $socialTokenId = $request->input('social-login-tokenId', '');
        try {
            $verifiedIdToken = $this->auth->verifyIdToken($socialTokenId);
            $user = new User();
            $user->displayName = $verifiedIdToken->claims()->get('name');
            $user->email = $verifiedIdToken->claims()->get('email');
            $user->localId = $verifiedIdToken->claims()->get('user_id');
            Auth::login($user);
            return redirect($this->redirectPath());
        } catch (\InvalidArgumentException|InvalidToken $e) {
            return redirect()->route('login');
        }
    }
}
