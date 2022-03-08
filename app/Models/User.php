<?php

namespace App\Models;

use App\Models\Favorite;
use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    public function favorite()
    {
        return $this->hasMany(UserFavoriteContent::class);
    }

    public function isPostFavoriteByUser($postID) { 
        $post = UserFavoriteContent::where('user_id', $this->id)->where('post_id', $postID)->first();
        if (empty($post)) {
            return false;
        } else {
            return true;
        }
    }
}
