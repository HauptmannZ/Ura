<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Komentar extends Model
{
    use HasFactory;
    protected $table = 'komentar';
    protected $guarded = ['id'];
    public function pengunjung()
    {
        return $this->belongsTo('App\Models\Pengunjung', 'id_pengunjung');
        // return $this->belongsTo(Pengunjung::class);
    }

    public function post()
    {
        return $this->belongsTo('App\Models\Post', 'post_id');
    }
}
