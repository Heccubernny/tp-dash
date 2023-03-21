<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Kreait\Firebase\Factory;
use Google\Auth\Credentials\ServiceAccountCredentials;
use Kreait\Firebase\Contract\Auth as FirebaseAuth;

use Kreait\Firebase\Exception\FirebaseException;
use Illuminate\Validation\ValidationException;



class ResetController extends Controller
{
    /**
     * @param Auth $auth
     */

    public function __construct(FirebaseAuth $auth)
    {
        $this->auth = $auth;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function index()
    {
        return view("reset.password");
    }

    public function verify_email()
    {
        $uid = Session::get('uid');
        $verify = $this->auth->getUser($uid)->emailVerified;
        if ($verify == 1) {
            return redirect()->route('home');
        }
        else{
            try {
                $email = $this->auth->getUser($uid)->email;
                $link = $this->auth->sendEmailVerificationLink($email);
                Session::flash('message', 'An email verification link has been sent. Please check your inbox.');
                return back()->withInput();
            } catch (FirebaseException $e) {
                Session::flash('error', $e->getMessage());
            }
            return view("reset.email");
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */

    // Password Reset
    public function store(Request $request)
    {
        //
        $request->validate([
            'email' => 'required',
        ]);
        try {
            $email = $request->email;
            $link = $this->auth->sendPasswordResetLink($email);
            Session::flash('message', 'An email has been sent. Please check your inbox.');
            return back()->withInput();
        } catch (FirebaseException $e) {
            $error = str_replace('_', ' ', $e->getMessage());
            Session::flash('error', $error);
            return back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */

    // Verify Email Store Method
    public function verify(Request $request)
    {
        try {
            $uid = Session::get('uid');
            $email = $this->auth->getUser($uid)->email;
            $link = $this->auth->sendEmailVerificationLink($email);

            Session::flash('resent', 'An email has been sent. Please check your inbox.');
            return back()->withInput();
        } catch (FirebaseException $e) {
            Session::flash('error', $e->getMessage());
            return back()->withInput();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
