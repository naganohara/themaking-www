<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;

use Auth;
use Session;
use Socialite;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use SocialiteProviders\Manager\OAuth2\User as OAuth2User;

class LoginController extends Controller
{
    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Redirect the user to the QQ authentication page,
     * or handle QQ authentication callback.
     *
     * @param Request $request
     * @return Response
     */
    public function QQAuthentication(Request $request)
    {
        if (!$request->has('code')) {
            return Socialite::with('qq')->redirect();
        } else {
            /** @var OAuth2User $oauth2_user */
            $oauth2_user = Socialite::driver('qq')->user();
            $user = $this->QQUserToUser($oauth2_user);

            Auth::login($user);
            return redirect('/');
        }
    }

    /**
     * @param OAuth2User $oauth2_user
     * @return User
     */
    private function QQUserToUser(OAuth2User $oauth2_user) {
        /** @var User $oauth2_user */
        $oauth2_user = User::query()->firstOrCreate([
            'qq_openid' => $oauth2_user->getId(),
        ], [
            'name' => $oauth2_user->getNickname(),
            'avatar' => $oauth2_user->getAvatar(),
            'qq_meta' => $oauth2_user->getRaw(),
        ]);
        return $oauth2_user;
    }

}
