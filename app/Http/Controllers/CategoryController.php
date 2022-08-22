<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        return view('categories', [
            'title' => 'Post categories',
            'categories' => Category::all()
        ]);
    }


    // public function category(Category $category)
    // {
    //     return view('posts', [
    //         'title' => "Post By Category : $category->name",
    //         'active' => 'category',
    //         'posts' => $category->posts->load('category', 'user'),
    //         'category' => $category->name
    //     ]);
    // }
}
