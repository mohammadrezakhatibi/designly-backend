<?php

namespace App\Http\Controllers\Web\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Web\BaseController;

class UserController extends BaseController
{

    public function index()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){ 
            //$user = Auth::user(); 
            return redirect()->route('admin.post.list');
        } 
        else{ 
            return $this->sendError('Username or password is incorrenct.', ['error'=>'Unauthorised']);
        } 
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->intended('manager/login'); 
    }

}
