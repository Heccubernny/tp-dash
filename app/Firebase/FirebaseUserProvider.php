<?php
namespace App\Firebase;
use Illuminate\Contracts\Auth\Authenticatable as UserContract;
use Illuminate\Contracts\Auth\UserProvider;
use Illuminate\Contracts\Hashing\Hasher as HasherContract;
use Kreait\Firebase\Contract\Auth as FirebaseAuth;
use App\Models\User;

class FirebaseUserProvider implements UserProvider {
    protected $hasher;
    protected $model;
    protected $auth;
    public function __construct(HasherContract $hasher, FirebaseAuth $auth, $model) {
        $this->model = $model;
        $this->hasher = $hasher;
        $this->auth = $auth;
    }
    public function retrieveById($identifier): User
    {
        $firebaseUser = $this->auth->getUser($identifier);
        $user = new User([
            'uid' => $firebaseUser->uid,
            'email' => $firebaseUser->email,
            'displayName' => $firebaseUser->displayName
        ]);
        return $user;
    }
    public function retrieveByToken($identifier, $token) {}
    public function updateRememberToken(UserContract $user, $token) {}
    public function retrieveByCredentials(array $credentials) {}
    public function validateCredentials(UserContract $user, array $credentials) {}
}
