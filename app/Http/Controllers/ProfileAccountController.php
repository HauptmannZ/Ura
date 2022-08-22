<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProfileAccountController extends Controller
{
    public function index()
    {
        return view('dashboard.profile.index', [
            'title' => 'Profil Saya'
        ]);
    }

    public function updatePassword(Request $request)
    {
        //return $request;
        if ($request->password1 != $request->password) {
            return redirect('/dashboard/profile')->with('errorPassword', 'Password yang dimasukkan tidak sama dengan password konfirmasi');
        }
        $data = [
            'password' => 'required|min:5|max:20'
        ];
        $validationData = $request->validate($data, [
            'password.max' => 'Password terlalu panjang!',
            'password.min' => 'Password terlaliu pendek!'
        ]);
        $id = auth()->user()->id;
        $validationData['password'] = hash::make($validationData['password']);
        // return $validationData;
        User::where('id', $id)->update($validationData);
        return redirect('/dashboard/profile')->with('successPassword', 'Berhasil Mengubah Password!');
    }

    public function updateAkun(Request $request)
    {
        // return $request;
        $data = [
            'name' => 'required|max:40',
            'image' => 'image|file|max:1024',
        ];
        $validationData = $request->validate($data, [
            'name.max' => 'Nama terlalu panjang!',
            'name.required' => 'Nama tidak boleh kosong!'
        ]);
        if ($request->oldImage == 'default.png') {
            if ($request->hasFile('image')) {
                $path = storage_path('app/public/profil/');
                $file = $request->file('image');
                $name =  uniqid() . '_' . trim($file->getClientOriginalName());
                $file->move($path, $name);
                $validationData['image'] = $name;
                $id = auth()->user()->id;
                User::where('id', $id)->update($validationData);
                return redirect('/dashboard/profile')->with('successProfil', 'Postingan berhasil diubah!');
            }
        } else {
            $deleteImg = public_path('storage/profil/' . $request->oldImage);
            if (file_exists($deleteImg)) {
                unlink($deleteImg);
            }
            if ($request->hasFile('image')) {
                $path = storage_path('app/public/profil/');
                $file = $request->file('image');
                $name =  uniqid() . '_' . trim($file->getClientOriginalName());
                $file->move($path, $name);
                $validationData['image'] = $name;
                $id = auth()->user()->id;
                User::where('id', $id)->update($validationData);
            }
        }
        return redirect('/dashboard/profile')->with('successProfil', 'Postingan berhasil diubah!');
    }
}
