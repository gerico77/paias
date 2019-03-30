<?php

namespace App\Http\Controllers\Api\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Laravel\Passport\Client;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use IssueTokenTrait;

    private $client;

    public function __construct() {
        $this->client = Client::find(1);
    }

    public function login(Request $request) {
        $this->validate($request, [
            'username' => 'required',
            'password' => 'required'
        ]);

        $credentials = $request->only(['username', 'password']);

    	if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $isStudent = $user->isStudent();

            if($isStudent) {
                return $this->issueToken($request, 'password');

            } else {
                return response()->json(['message' => 'Students can only access the system', 'error' => 'Unauthorized'], 401);
            }

        } else {
            return response()->json(['message' => 'Incorrect username or password','error' => 'Unauthorized'], 401);
        }
        
    }

    public function refresh(Request $request) {
        $this->validate($request, [
            'refresh_token' => 'required'
        ]);

        return $this->issueToken($request, 'refresh_token');
    }

    public function logout(Request $request) {
        $accessToken = Auth::user()->token();

        DB::table('oauth_refresh_tokens')
            ->where('access_token_id', $accessToken->id)
            ->update(['revoked' => true]);

        $accessToken->revoke();

        return response()->json([], 204);
    }
}
