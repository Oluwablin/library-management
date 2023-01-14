<?php

namespace App\Http\Controllers\v1\API\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginFormRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use App\Oluwablin\OluwablinApp;
use App\Oluwablin\OluwablinAuthentication;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    use OluwablinApp;

    /**
     * Login endpoint
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function login(LoginFormRequest $request)
    {
        extract($request->validated());

        $user = OluwablinAuthentication::authenticate(new User, $email, $password);

        if (null === $user || empty($user)) {
            return $this->AppResponse('failed', 'The provided credentials are incorrect.', 401);
        }

        return $this->AppResponse('OK', 'Logged in successful', 200, new UserResource($user['data']), $user['token']);
    }

    /**
     * Logout endpoint
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();
        return $this->AppResponse('OK', 'Logout successfully', 200);
    }
}
