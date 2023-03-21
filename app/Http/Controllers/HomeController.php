<?php

namespace App\Http\Controllers;

use Kreait\Firebase\Contract\Auth as FirebaseAuth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(FirebaseAuth $auth)
    {
        $this->auth = $auth;
    }
    /**
     * Show the application dashboard.
     *
     * @return \Exception|\Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        // FirebaseAuth.getInstance().getCurrentUser();
        try {
            $uid = Session::get('uid');
            $user = $this->auth->getUser($uid);
//            $user = app('firebase.auth')->getUser($uid);
//            dd($user);
//            dd($users->email);//accessing an object
//                dd($users->providerData[0]->email);//accessing an object inside an array
            return view('home', ['user' => $user]);
        } catch (\Exception $e) {
            return $e;
        } catch (NotFoundExceptionInterface $e) {
            return view('auth.login', );
        } catch (ContainerExceptionInterface $e) {
        }
    }


    public function order()
    {
        $userid = Session::get('uid');
        return view('orders.index',compact('userid'));
    }
}
