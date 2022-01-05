<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\comment;
class Post extends Model
{
    use HasFactory;
    public function user()
    {
       return $this->belongsTo(User::class);
    }

    public function comment()
    {
        return $this->hasMany(comment::class);
    }
}
