<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Expr\ArrowFunction;
use Cviebrock\EloquentSluggable\Sluggable;

class Post extends Model
{
    use HasFactory, Sluggable;


    // protected $fillable = ['title', 'excerpt', 'body'];
    protected $guarded = ['id'];
    // menggunakan fitur Eager Loading = untuk mempersingkat query db
    protected $with = ['category', 'user'];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
        // return $this->belongsTo('App\Models\User','user_id');
    }

    public function scopeFilter($query, array $filter)
    {
        //fitur kondisi query laravel/rollback
        $query->when($filter['search'] ?? false, function ($query, $search) {
            return $query->where('title', 'like', '%' . $search . '%')
                ->orWhere('body', 'like', '%' . $search . '%');
        });

        //callback
        $query->when($filter['category'] ?? false, function ($query, $category) {
            return $query->whereHas('category', function ($query) use ($category) {
                $query->where('slug', $category);
            });
        });

        //ArrowFunction
        $query->when(
            $filter['user'] ?? false,
            fn ($query, $user) =>
            $query->whereHas(
                'user',
                fn ($query) =>
                $query->where('username', $user)
            )
        );

        // memakai kondisi if biasa
        // if (isset($filter['search']) ? $filter['search'] : false) {
        //     return $query->where('title', 'like', '%' . $filter['search'] . '%')
        //         ->orWhere('body', 'like', '%' . $filter['search'] . '%');
        // }
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    // ganti fungsi untuk memanggil pada view
    // public function author()
    // {
    //     return $this->belongsTo(User::class, 'user_id');
    // }
}
