<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Tentang;
use App\Models\Post;

class BerandaController extends Controller
{
    public function index()
    {
        return view('beranda', [
            'title' => 'Beranda',
            'categories' => Category::all(),
            'posts' => Post::latest()->paginate(4)
        ]);
    }
    public function tentang()
    {
        $tentang = Tentang::findOrFail(1);
        return view('tentang', [
            'title' => 'Tentang',
            'tentang' => $tentang
        ]);
    }
}
