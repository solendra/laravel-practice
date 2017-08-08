<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Socialite;
use App\User;
use Auth;
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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


    public function redirectToProvider()
    {
        return Socialite::driver('facebook')->redirect();
    }

    /**
     * Obtain the user information from facebook
     *
     * @return Response
     */
    public function handleProviderCallback()
    {
        $userFacebook = Socialite::driver('facebook')->user();

        $findUser=User::where('email',$userFacebook->email)->first();

        if ($findUser) {
            Auth::login($findUser);
            //return 'login with old';
            return redirect('home');

        }
       else{
         $user=new User;
         $user->name=$userFacebook->name;
         $user->email=$userFacebook->email;
         $user->password=bcrypt(123456);
         
         $user->save();
         Auth::login($user);
         //return 'login with new';
         return redirect('home');
       }

       


    }
}
