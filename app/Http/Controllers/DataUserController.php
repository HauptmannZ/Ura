<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\VerifyEmail;
use App\Models\Komentar;
use App\Models\Post;

class DataUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.DataUser.index', [
            'title' => 'Data User',
            'users' => User::latest()->where('id', '!=', auth()->user()->id)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // //return $request;
        // $data = [
        //     'is_active' => 'required',
        //     'is_admin' => 'required'
        // ];
        // $dataValidte = $request->validate($data, [
        //     'is_active.required' => 'Status aktif tidak boleh kosong',
        //     'is_admin.required' => 'status role aktif tidak boleh kosong'
        // ]);

        // $cekUser = User::where('id', $request->id)->get();
        // // return $cekUser;
        // foreach ($cekUser as $user) {
        //     if ($user->email_verified_at == null) {
        //         $data = [
        //             'email' => $user->email,
        //             'name' => "Adminstrator",
        //             'alamat' => 'http://192.168.1.4:8000/login'
        //             // 'alamat' => 'http://192.168.0.10:8000/updatePassword/'
        //         ];
        //         //Mail::to($data['email'])->send(new VerifyEmail($data));
        //         $dataValidte['email_verified_at'] = now();
        //     }
        // }
        // User::where('id', $id)->update($dataValidte);
        // return redirect('/dashboard/dataUser')->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        Post::where('user_id', $user->id)->delete();
        User::where('id', $user->id)->delete();
        return redirect('/dashboard/dataUser')->with('success', 'Data User berhasil dihapus!');
    }

    public function dataKomentar()
    {
        return view('dataKomentar.index', [
            'title' => 'Data Komentar',
            'komentar' => Komentar::latest()->get()
        ]);
    }
    public function hapusKomentar($id)
    {
        $komentar = Komentar::findOrFail($id);
        $komentar->delete();
        // Komentar::where('id', $id)->delete();
        return redirect('/dashboard/komentar')->with('success', 'Komentar berhasil dihapus!');
    }
}
