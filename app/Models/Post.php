<?php

namespace App\Models;

use App\Models\Source;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Auth;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id', 'source_id', 'title', 'creator', 'link',
    ];

    public function category()
    {
        return $this->hasOne(Category::class, 'id','category_id');
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'posts_tags','post_id');
    }

    public function source()
    {
        return $this->hasOne(Source::class,'id', 'source_id');
    }

    public function isFavorite() {
        if (Auth::guard('api')->check()) {
            return Auth::guard('api')->user()->isPostFavoriteByUser($this->id);
        } else {
            return false; 
        }
    }

}
