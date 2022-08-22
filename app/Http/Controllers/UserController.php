<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
    }
    public function author(User $user)
    {
        // Mengunakan lazy eager loadng = untuk persingkat query pada relationship eloquent
        return view('posts', [
            'title' => "Post By Author : $user->name",
            'active' => 'posts',
            'posts' => $user->posts->load('category', 'user')
        ]);
    }


    // malkukan pemanggilan query biasa
    // public function auhor(User $user)
    // {
    //     return view('posts', [
    //         'title' => "Post By Author : $user->name",
    //         'posts' => $user->posts
    //     ]);
    // }
}
