<?php

namespace App\Http\Controllers;

use App\Models\Komentar;
use App\Models\pengunjung;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
class authPengunjung extends Controller
{
    public function index($slug)
    {
        return view('login.pengunjung', [
            'title' => 'Login Untuk Komentar',
            'slug' => $slug
            // 'post' => Post::latest()->where('slug', $slug)->get()
        ]);
    }

    public function register($slug)
    {
        return view('register.pengunjung', [
            'title' => 'Login Untuk Komentar',
            'slug' => $slug
        ]);
    }

    public function create(Request $request, $slug)
    {
        $validatedData = $request->validate([
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required', 'min:5', 'max:20'],
        ]);
        $validatedData['password'] = Hash::make($validatedData['password']);
        Pengunjung::create($validatedData);
        $request->session()->flash('success', 'Berhasil Daftar!, Silahkan login untuk komentar');

        return redirect('/loginPengunjung/' . $slug);
    }

    public function authenticatePengunjung(Request $request, $slug)
    {
        // return $request;
        $dataPengunjung = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        if (Auth::guard('pengunjung')->attempt($dataPengunjung)) {
            // return Auth::pengunjung();
            // $pengunjung = Pengunjung::where('email', '=', $request->email)->get();
            return redirect('/posts/' . $slug);
        }
        return back()->with('loginError', 'Login gagal!, Silahkan cek kembali email dan password');
    }

    public function kirimKomentar(Request $request, $slug)
    {
        // return $request;
        $dataKomentar = $request->validate([
            'post_id' => ['required'],
            'isi' => ['required'],
        ]);
        $dataKomentar['id_pengunjung'] = auth::guard('pengunjung')->user()->id;
        // return $dataKomentar;
        Komentar::create($dataKomentar);
        return redirect('/posts/' . $slug);
    }

    public function logout(Request $request, $slug)
    {
        if (Auth::guard('pengunjung')->check()) {
            Auth::guard('pengunjung')->logout();
            return redirect('/posts/' . $slug);
        }

        $this->guard()->logout();
        $request->session()->invalidate();
        return $this->loggedOut($request) ?: redirect('/posts/' . $slug);
    }
}
