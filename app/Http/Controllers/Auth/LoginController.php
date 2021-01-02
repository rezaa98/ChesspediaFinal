<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;
use App\Http\Controllers\Auth\role;

/**
 * LoginController
 *
 * PHP version 7
 *
 * @category LoginController
 * @package  LoginController
 * @author   Chesspedia <chesspedia.id@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     http://localhost/
 */
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
	//protected $redirectTo = '/admin/dashboard/';
	public function redirectTo()
    {
		
        if (!$user->hasRole('Admin')) {
			return '/admin/dashboard/';
        }
        return '/home';
	}
	
	// protected function redirectTo()
    // {
    //     if (auth()->user()->role == 'admin') {
    //         return '/admin/dashboard';
    //     }
    //     return '/home';
    // }`

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('guest')->except('logout');
	}

	/**
	 * Show login form
	 *
	 * @return void
	 */
	public function showLoginForm()
	{
		if (view()->exists('auth.authenticate')) {
			return view('auth.authenticate');
		}

		return $this->loadTheme('auth.login');
	}
}
