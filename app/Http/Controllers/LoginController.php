<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Mail\ResetPassEmail;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.index', [
            'title' => 'Login'
        ]);
    }

    public function authenticate(Request $request)
    {
        // $validatedCaptcha = $request->validate([
        //     'g-recaptcha-response' => ['recaptcha', 'required']
        // ]);
        // if ($validatedCaptcha == true) {

            $credentials = $request->validate([
                'email' => ['required', 'email'],
                'password' => ['required'],
            ]);
        // }

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('dashboard');
        }
        return back()->with('loginError', 'Login gagal!, Silahkan cek kembali email dan password');
    }

    public function forgotpassword()
    {
        return view('auth.forgotPassword', [
            'title' => 'Lupa Password'
        ]);
    }

    public function prosesEmail(Request $request)
    {
        if ($user = User::where('email', $request->input('email'))->first()) {
            $token = Str::random(64);
            $expired = date('m-d-y', strtotime("+1 day"));
            DB::table('password_resets')->insert([
                'email' => $user->email,
                'token' => $token,
                'expired' => $expired
            ]);
            $data = [
                'email' => $request->input('email'),
                'name' => "Anonymous",
                'alamat' => 'http://127.0.0.1:8000/updatePassword/' . $request->input('email') . '/' . $token
                // 'alamat' => 'http://192.168.0.11:8000/updatePassword/' . $request->input('email') . '/' . $token
            ];
            Mail::to($data['email'])->send(new ResetPassEmail($data));
            //return $token;
            return redirect('/forgotPassword')->with('success', 'Berhasil Mendapatkan Token, Silahkan Cek Email Anda!');
        } else {
            return redirect('/forgotPassword')->with('forgotError', 'Email tidak valid!, Silahkan cek kembali email!');
        }
    }

    public function updatePassword($email, $token)
    {
        $data = DB::table('password_resets')->where(['email' => $email, 'token' => $token])->first();
        if ($data->status == false) {
            if (strtotime($data->expired) >= strtotime(date('m-d-y'))) {
                return view('auth.updatePassword', [
                    'title' => 'Ganti Password',
                    'email' => $data->email,
                    'id' => $data->id
                ]);
            } else {
                return redirect('/forgotPassword')->with('forgotError', 'Token Expired!');
            }
        } else {
            return redirect('/forgotPassword')->with('forgotError', 'Token sudah dipakai!');
        }
    }

    public function resetPassword(Request $request)
    {
        $validationData = $request->validate([
            'email' => 'required',
            'password' => ['required', 'min:5', 'max:20']
        ]);

        $validationData['password'] = hash::make($validationData['password']);
        User::where('email', $request->email)->update($validationData);
        DB::table('password_resets')->where('id', $request->id)->update(['status' => 1]);
        return redirect('/login')->with('success', 'Berhasil Mengubah Password, Silahkan Login!');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login')->with('success', 'Berhasil Logout!');
    }
}
