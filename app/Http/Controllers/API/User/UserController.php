<?php

namespace App\Http\Controllers\API\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\API\BaseController;

class UserController extends BaseController
{

    public function index() {
        return 'redirect()->back()';
    }
    public function getUserInfo() {
        $user = Auth::user();
        $response = [
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
            'email_verified_at' => $user->email_verified_at,
        ];

        return $this->sendResponse($response, 'get posts successfully.');
    }
}
