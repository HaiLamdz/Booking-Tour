<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\auth\Auth as AuthModel;
use App\Models\clienrs\Account;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth as AuthFacade;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use Laravel\Socialite\Facades\Socialite;
use Exception;

class AuthController extends Controller
{
    public function login()
    {
        return view('client.login');
    }

    public function sign_up()
    {
        return view('client.signUp');
        //
    }

    public function signUpPost(Request $request)
    {
        // dd($request->all());
        $request->validate(
            [
                'name' => 'required|max:50',
                'email' => 'required|unique:users,email|max:50',
                'password' => 'required|min:8|max:20|confirmed',
            ],
            [
                'name.required' => 'Tên Không Được Để Trống',
                'email.required' => 'Email Không Được Để Trống',
                'email.unique' => 'Email Này Đã Đưuọc Đăng Ký',
                'password.required' => 'Mật Khẩu Không Đưucọ Để Trống',
                'password.min' => 'Mật Khẩu Lớn Hơn 8 Ký Tự',
                'password.max' => 'Mật Khẩu Không Đưucọ Quá 20 Ký Tự',
                'password.confirmed' => 'Mật Khẩu Xác Nhận Không Khớp',
            ]
        );
        $token = strtoupper(Str::random(10));
        $data = [
            'user_name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'token' => $token,
        ];
        if ($customer = AuthModel::create($data)) {
            Mail::send('client.active_account', compact('customer'), function ($email) use ($customer) {
                $email->subject('Hải Lam Tour - Xác Nhận Đăng Ký Tài Khoản');
                $email->to($customer->email, $customer->user_name);
            });
            toastr()->success('Đăng ký tài khoản thành công, check email để kích hoạt tài khoản');
            return redirect()->route('loginn');
        };


        return redirect()->back();
    }

    public function loginPost(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'email' => 'required|email|max:50',
            'password' => 'required|min:8|max:20',
        ], [
            'email.required' => 'Email Không Được Để Trống',
            'email.email' => 'Email Không Đúng Định Dạng',
            'password.required' => 'Mật Khẩu Không Đưucọ Để Trống',
            'password.min' => 'Mật Khẩu Lớn Hơn 8 Ký Tự',
            'password.max' => 'Mật Khẩu Không Đưucọ Quá 20 Ký Tự',
        ]);
        if (AuthFacade::attempt(['email' => $request->email, 'password' => $request->password])) {
            $request->session()->put('email', $request->email);
            toastr()->success('Đăng nhập thành công!');
            return redirect()->route('home');
        } else {
            toastr()->error('Email hoặc Mật Khẩu Không Đúng!');
            return redirect()->route('loginn');
        }
    }

    public function actived(AuthModel $customer, $token)
    {
        if ($customer->token === $token) {
            $customer->update(['status' => 1, 'token' => null]);
            toastr()->success('Tài Khoản của bạn đã được kích hoạt, Vui lòng dăng nhập!');
            return redirect()->route('loginn');
        } else {
            toastr()->error('Xác Nhận tài Khoản Không Thành Công');
            return redirect()->route('loginn');
        }
    }


    /**
     * logout
     */
    public function logout()
    {
        AuthFacade::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        toastr()->success('Đăng xuất tài Khoản Thành Công');

        return redirect()->route('home');
    }


    // login with gg
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {

            $user = Socialite::driver('google')->user();
            $finduser = User::where('email', $user->email)->first();
            

            if ($finduser) {
                session()->put('email', $finduser->email);
                AuthFacade::login($finduser);
                toastr()->success('Đăng nhập thành công!');
                return redirect()->intended('/');
            } else {
                $newUser = User::updateOrCreate(['email' => $user->email], [
                    'user_name' => $user->name,
                    'google_id' => $user->id,
                    'password' => encrypt('123456dummy')
                ]);

                AuthFacade::login($newUser);
                session()->put('email', $newUser->email);

                toastr()->success('Đăng nhập thành công!');

                return redirect()->intended('/');
            }
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}
