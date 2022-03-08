<?php

namespace App\Http\Controllers\API\User;

use Illuminate\Http\Request;
use App\Models\UserFavoriteContent;
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
            $userFavorites[] = $postsArray;
        }

        $response = [
            'id' => $user->id,
            'favorites' => $userFavorites,
        ];

        return $this->sendResponse($response, 'get posts successfully.');
    }

    public function favoritePost(Request $request) {
        $favorite = new UserFavoriteContent();
        $user = Auth::user();
        $favorite->user_id = $user->id;
        $favorite->post_id = $request->post_id;

        if ($favorite->save()) {
            return $this->sendResponse(true, 'Post state has changed successfully.');
        } else {
            return $this->sendError('unsuccess.', ['error'=>'Something wrong happened']);
        }
    }

    public function removeFavoritePost(Request $request) {
        $user = Auth::user();
        $favorite = UserFavoriteContent::where('user_id', $user->id)->where('post_id', $request->post_id);

        if ($favorite->delete()) {
            return $this->sendResponse(false, 'Post has deleted successfully');
        } else {
            return $this->sendError('unsuccess.', ['error'=>'Something wrong happened']);
        }
    }

    
}
