<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserFavoriteContent extends Model
{
    use HasFactory;
    protected $table = 'users_favorite_contents';

    public function post()
    {
    	return $this->belongsTo(Post::class);
    }
    public function user()
    {
    	return $this->belongsTo(User::class);
    }
}
