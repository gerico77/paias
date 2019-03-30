<?php

namespace App\Http\Controllers\Api\Auth;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Hash;
use Laravel\Passport\Client;
use App\Http\Controllers\Controller;

class RegisterController extends Controller
{
    use IssueTokenTrait;

    private $client;

    public function __construct() {
        $this->client = Client::find(1);
    }

    public function register(Request $request) {
        
        $this->validate($request, [
            'username' => ['required', 'string', 'max:255', 'unique:users'],
            'fname' => ['required', 'string', 'max:255'],
            'lname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6'],
        ]);

        $user = User::create([
            'username' => request('username'),
            'fname' => request('fname'),
            'lname' => request('lname'),
            'email' => request('email'),
            'password' => Hash::make(request('password')),
            'role_id' => request('role_id')
        ]);

        return $this->issueToken($request, 'password');
    }
}
