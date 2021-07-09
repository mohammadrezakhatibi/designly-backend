<?php

namespace App\Http\Controllers\API\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\API\BaseController;

class FavoriteController extends BaseController
{
    public function getUserFavoritePost() {
        $user = Auth::user();
        $favorites = $user->favorite;
        $userFavorites = [];

        foreach($favorites as $favorite) {

            $postsArray = new PostResource($favorite->post);
            $userFavorites[] = [
                'id' => $favorite->id,
                'post' => $postsArray,
            ];
        }

        $response = [
            'id' => $user->name,
            'favorite' => $userFavorites,
        ];

        return $this->sendResponse($response, 'get posts successfully.');
    }
}
