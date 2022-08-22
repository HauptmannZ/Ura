<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\User;
use App\Models\Komentar;

use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        // dd(Post::all());
        $title = '';
        if (request('category')) {
            $category = Category::firstWhere('slug', request('category'));
            $title = ' di ' . $category->name;
        }

        if (request('user')) {
            $user = User::firstWhere('username', request('user'));
            $title = ' by ' . $user->name;
        }

        return view('posts', [
            'title' => "Semua Posts" . $title,
            'posts' => Post::latest()->filter(request(['search', 'category', 'user']))->paginate(7)->withQueryString()
        ]);
    }
    public function tampil(Post $post)
    {
        return view('post', [
            'title' => 'detail post',
            'active' => 'post',
            'post' => $post,
        ]);
    }
    // 'komentar' => Komentar::latest()->where('post_id', $post->id)->get()
    // melakukan looping biasa
    // public function index()
    // {
    //     return view('posts', [
    //         'title' => "Semua Posts",
    //         // "posts" => Post::all()
    //         'posts' => Post::latest()->get()
    //     ]);
    // }
}
