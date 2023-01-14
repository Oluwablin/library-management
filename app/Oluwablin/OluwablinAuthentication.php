<?php

namespace App\Oluwablin;

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\User as Authenticatable;

class OluwablinAuthentication {

    /**
     * Authenticatable user, agent or admin
     *
     * @var Authenticatable
     */
    public Authenticatable $user;

    /**
     * Create Oluwablin Authentication instance
     *
     * @param Authenticatable $user
     */
    public function __construct(Authenticatable $user)
    {
        $this->user = $user;
    }

    /**
     * This create and return the token string
     *
     * @return string
     */
    public function createToken(): string
    {
        $this->updateLastLogin();
        return $this->user->createToken('oluwablin_authentication_token' . '_' . $this->user->id)->plainTextToken;
    }

    /**
     * Attempt login on Authenticatable model
     *
     * @param string $password
     *
     * @return mixed
     */
    public static function authenticate($model, string $email, string $password)
    {
        $user = $model::where('email', $email)->first();

        if ($user) {

            if (null === $user->password) abort(401, 'Looks like you signed up with Google account. Please use that same Google account to login');

            if (!Hash::check($password, $user->password) ) {
                return null;
            }

            $token = (new self($user))->createToken();

            return ['data' => $user, 'token' => $token];
        }

        return null;

    }

    /**
     * Update authenticatable last login timestamp
     *
     * @return bool
     */
    private function updateLastLogin(): bool
    {
        return $this->user->forceFill(['last_login_at' => Carbon::now()])->save();
    }

    /**
     * Determine if the user has verified their email address.
     *
     * @return bool
     */
    private function hasVerifiedEmail()
    {
        return ($this->user->email_verified_at) ? true : false;
    }

    /**
     * Mark the given user's email as verified.
     *
     * @return bool
     */
    public function markEmailAsVerified()
    {
        $this->user->forceFill(['email_verified_at' => Carbon::now()])->save();
    }

}
