<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Komentar;

class dataKomentar extends Controller
{
    public function index()
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
