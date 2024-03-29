<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

/**
 * RegisterController
 *
 * PHP version 7
 *
 * @category RegisterController
 * @package  RegisterController
 * @author   Chesspedia <chesspedia.id@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     http://localhost/
 */
class RegisterController extends Controller
{
	/*
	|--------------------------------------------------------------------------
	| Register Controller
	|--------------------------------------------------------------------------
	|
	| This controller handles the registration of new users as well as their
	| validation and creation. By default this controller uses a trait to
	| provide this functionality without requiring any additional code.
	|
	*/

	use RegistersUsers;

	/**
	 * Where to redirect users after registration.
	 *
	 * @var string
	 */
	protected $redirectTo = '/home';
    protected function redirectTo()
    {
        if (auth()->user()->role == 'admin') {
            return '/admin/dashboard';
        }
        return '/home';
    }

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('guest');
	}

	/**
	 * Get a validator for an incoming registration request.
	 *
	 * @param array $data user data
	 *
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	protected function validator(array $data)
	{
		return Validator::make(
			$data,
			[
				'first_name' => ['required', 'string', 'max:255'],
				'last_name' => ['required', 'string', 'max:255'],
				'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
				'password' => ['required', 'string', 'min:8', 'confirmed'],
			]
		);
	}

	/**
	 * Create a new user instance after a valid registration.
	 *
	 * @param array $data user data
	 *
	 * @return \App\User
	 */
	protected function create(array $data)
	{
		return User::create(
			[
				'first_name' => $data['first_name'],
				'last_name' => $data['last_name'],
				'email' => $data['email'],
				'password' => Hash::make($data['password']),
			]
		);
	}

	/**
	 * Show register form
	 *
	 * @return void
	 */
	public function showRegistrationForm()
	{
		if (property_exists($this, 'registerView')) {
			return view($this->registerView);
		}
		return $this->loadTheme('auth.register');
	}
}
