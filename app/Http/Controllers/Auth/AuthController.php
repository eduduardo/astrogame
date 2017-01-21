<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Auth;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Http\Request;
use Validator;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
     */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/game';

    /**
     * Create a new authentication controller instance.
     */
    public function __construct()
    {
        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param array $data
     *
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        $rules = [
            'name'     => 'required|min:2|max:255',
            'email'    => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|max:255',
            'terms'    => 'required',
        ];

        if (env('APP_ENV') != 'local') {
            $rules['g-recaptcha-response'] = 'required|recaptcha';
        }

        return Validator::make($data, $rules);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param array $data
     *
     * @return User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'email'        => $data['email'],
            'name'         => $data['name'],
            'password'     => bcrypt($data['password']),
            'confirm_code' => str_random(30),
        ]);

        return $user;
    }

    public function showRegistrationForm()
    {
        return view('auth.register', ['page' => 'register']);
    }

    public function showLoginForm()
    {
        return view('auth.login', ['page' => 'login']);
    }

    public function showResetForm()
    {
        return view('auth.passwords.email', ['page' => 'reset']);
    }

    public function confirmEmail(Request $request)
    {
        $confirm_code = $request->confirm_code;
        if (!empty($confirm_code)) {
            $user = User::where('confirm_code', '=', $confirm_code)->first();
            $user->confirmed = 1;
            $user->confirm_code = null;
            $user->save();
            session()->put('notify',
                [
                    ['text' => '<i class="uk-icon-exclamation"></i> Email confirmado com sucesso!', 'status' => 'success', 'timeout' => 0],

                ]);
            auth()->login($user);
        }

        return redirect($this->redirectTo);
    }

    // @overwrite the original method
    public function login(Request $request)
    {
        // nickname ou email função
        $field = filter_var($request->input('login'), FILTER_VALIDATE_EMAIL) ? 'email' : 'nickname';
        $request->merge([$field => $request->input('login')]);

        $throttles = $this->isUsingThrottlesLoginsTrait();

        if ($throttles && $lockedOut = $this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        $credentials = $request->only($field, 'password');

        if (Auth::guard($this->getGuard())->attempt($credentials, $request->has('remember'))) {
            return $this->handleUserWasAuthenticated($request, $throttles);
        }

        if ($throttles && !$lockedOut) {
            $this->incrementLoginAttempts($request);
        }

        return $this->sendFailedLoginResponse($request);
    }

    public function rules()
    {
        return [
            'login'    => 'required',
            'password' => 'required',
        ];
    }

    public function authenticated(Request $request, $user)
    {
        if (!$user->confirmed) {
            auth()->logout();

            return back()->withErrors(['msg' => trans('auth.confirmation')]);
        }

        return redirect()->intended($this->redirectPath());
    }

    public function register(Request $request)
    {
        $validator = $this->validator($request->all());
        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }

        $user = $this->create($request->all());
        // send confirm email
        auth()->logout();

        return redirect('/login')->withErrors(['msg' => trans('auth.confirmation')]);
    }
}
