<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    use HasFactory;
    protected $table = 'categories';
    protected $guarded = ['id'];

    public function articles()
    {

        return $this->hasMany(Article::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
