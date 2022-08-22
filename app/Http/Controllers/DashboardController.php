<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use App\Models\Tentang;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        //@ddd(Post::date('created_at'));
        // $chartuser     = collect(DB::SELECT("SELECT count(UserID) AS jumlah from f_tblusers where month(created_at)='$bulan'"))->first();
        // for ($bulan = 1; $bulan < 13; $bulan++) {
        //     $chartuser = Post::where('created_at')->count(),
        //     $jumlah_user[] = $chartuser;
        // };
        return view('dashboard.index', [
            'title' => 'Dashboard',
            'totaluser' => User::where('is_admin', false)->count(),
            'totaladmin' => User::where('is_admin', true)->count(),
            'totalakun' => User::count(),
            'totalposts' => Post::count(),
            'totalcategory' => Category::count(),
            'postssaya' => Post::where('user_id', auth()->user()->id)->count(),
            'label' => ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"],
        ]);
    }
    public function tentang()
    {
        $tentang = Tentang::findOrFail(1);
        // return $tentang;
        return view('dashboard.tentang', [
            'title' => 'Tentang',
            'tentang' => $tentang
        ]);
    }
    public function tentangEdit(Request $request, $id)
    {
        // return $request;
        // $tentang = Tentang::findOrFail($id);
        $rules = $request->validate([
            'body' => 'required'
        ]);
        Tentang::where('id', $id)->update($rules);
        return redirect('/dashboard/tentang')->with('success', 'Data tentang berhasil diubah!');
    }
}
