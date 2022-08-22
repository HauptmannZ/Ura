<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Models\User;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register.index', [
            'title' => 'Buat Akun'
        ]);
    }
    public function store(Request $request)
    {
        // $validatedCaptcha = $request->validate([
        //     'g-recaptcha-response' => ['recaptcha', 'required']
        // ]);

        // if ($validatedCaptcha == true) {
            $validatedData = $request->validate([
                'name' => ['required', 'max:30'],
                'username' => ['required', 'min:3', 'max:20', 'unique:users'],
                'email' => ['required', 'email', 'unique:users'],
                'password' => ['required', 'min:5', 'max:20']
            ]);
            // 'email' => ['required', 'email:dns', 'unique:users'], DNS = wajib menggunakan gmail.com
        // }

        $validatedData['image'] = 'default.png';
        $validatedData['password'] = Hash::make($validatedData['password']);
        $validatedData['is_admin'] = 1;
        User::create($validatedData);

        $request->session()->flash('success', 'Berhasil Daftar!, Silahkan login');

        return redirect('/login');
    }
}

//return redirect('/login')->with('success', 'Berhasil Daftar!, Silahkan login');