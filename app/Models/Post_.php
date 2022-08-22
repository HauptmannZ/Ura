<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;

class Post
{
    private static $activity_post = [
        [
            "title" => "Aktivitas post pertama",
            "slug" => "aktivitas-post-pertama",
            "author" =>  "Anonymous",
            "body" => "kjsabkadbfkj456abkbakjfb435aksbkjbkjsabkadbfkjabkba$*kjfbaksbkjb
                    kjsabkadbfkjabkbakjfbaksbkjbkjsabkadbfkjab^$*kbakj5464fbaksbkjb"
        ],
        [
            "title" => "Aktivitas post kedua",
            "slug" => "aktivitas-post-kedua",
            "author" =>  "Mr.X",
            "body" => "&#*&*KFN84920kjfb435aksbkjbkjsabkadbfkjabkba$*kjfbaksbkjb
                    kjsabkadbfkjabkbakjfbaksbkjbsflksdkjsabkadbfkjab^$*kbakj5464fbaksbkjb"
        ]
    ];
    public static function semua()
    {
        return collect(self::$activity_post);
    }
    public static function find($slug)
    {
        $posts = static::semua();

        return $posts->firstWhere('slug', $slug);
        // $post = [];
        // foreach ($posts as $p) {
        //     if ($p['slug'] === $slug) {
        //         $post = $p;
        //     }
        // }
    }
}
