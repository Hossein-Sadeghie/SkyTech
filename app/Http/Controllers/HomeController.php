<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    public function loginPhone(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('loginPhone');
    }

    public function loginPhoneForm(Request $request): \Illuminate\Http\RedirectResponse
    {
        $request->validate([
            'phone' => 'required|regex:/^09\d{9}$/',
        ], [
            'phone.required' => 'شماره موبایل را وارد کنید.',
            'phone.regex' => 'فرمت شماره موبایل معتبر نیست.',
        ]);

        $user = User::where('phone', $request->phone)->first();

        if ($user) {
            return redirect()->route('login')->with('phone', $request->phone);
        } else {
            return redirect()->route('register')->with('phone', $request->phone);
        }
    }



    public function login(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $phone = session('phone', '');
        return view('login' , compact('phone'));
    }

    public function loginForm(Request $request)
    {
        $request->validate([
            'phone' => 'required|regex:/^09\d{9}$/',
            'password' => 'required|min:5',
        ], [
            'phone.required' => 'شماره موبایل را وارد کنید.',
            'phone.regex' => 'فرمت شماره موبایل معتبر نیست.',
            'password.required' => 'رمز عبور را وارد کنید.',
            'password.min' => 'رمز عبور باید حداقل پنج کاراکتر باشد.',
        ]);

        if (auth()->attempt($request->only('phone', 'password'))) {
            $user = auth()->user();

            if ($user->role_id == 1) {
                return redirect()->route('Admin.dashboard');
            } elseif ($user->role_id == 2) {
                return redirect()->route('User.dashboard');
            } elseif ($user->role_id == 3) {
                return redirect()->route('Supplier.dashboard');
            }
        }

        return back()->withErrors([
            'phones' => 'شماره موبایل یا پسورد نادرست است.',
        ])->withInput()->with('phone', $request->phone);
    }




    public function register(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $phone = session('phone', '');
        return view('register' , compact('phone'));
    }

    public function registerForm(Request $request)
    {
        $request->validate([
            'phone' => 'required|regex:/^09\d{9}$/|unique:users,phone',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:5|confirmed',
        ], [
            'phone.required' => 'شماره موبایل را وارد کنید.',
            'phone.regex' => 'فرمت شماره موبایل معتبر نیست.',
            'phone.unique' => 'این شماره موبایل قبلاً ثبت شده است.',
            'email.required' => 'ایمیل را وارد کنید.',
            'email.email' => 'فرمت ایمیل معتبر نیست.',
            'email.unique' => 'این ایمیل قبلاً ثبت شده است.',
            'password.required' => 'رمز عبور را وارد کنید.',
            'password.min' => 'رمز عبور باید حداقل پنج کاراکتر باشد.',
            'password.confirmed' => 'رمز عبور و تکرار آن مطابقت ندارند.',
        ]);


        $user = User::create([
            'phone' => $request->phone,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id' => 2 ,
        ]);

        auth()->login($user);

        return redirect()->route('dashboard');
    }


    public function logout()
    {
        Auth::logout();
        return redirect()->route('loginPhone');
    }


}
