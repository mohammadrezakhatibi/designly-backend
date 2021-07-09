<?php

namespace App\Http\Controllers\API\Content;

use App\Models\Future;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use App\Http\Controllers\API\BaseController;

class FutureController extends BaseController
{
    
    public function make(Request $request)
    {
        $user = Auth::user();
        $future = new Future();


        $future->user_id = Auth::user()->id;
        $future->message = $request->message;
        $future->receive_at = $request->receive_at;

        if (!($future->save())) {
            return $this->sendError('Save future was unsuccessful',400);
        }

        $response = $future;
        
        return $this->sendResponse($response, 'Future save successfully.');
    }

    
    public function get($id)
    {

        $future = Future::findOrFail($id);

        if (!($future)) {
            return $this->sendError('Future not found',404);
        }
        $response = [
            'id' => $future->id,
            'encrypted_message' => $future->message,
            'message' => $future->message,
            'receive_at' => $future->receive_at,
            'is_private' => $future->is_private,
            'send_by_email' => $future->send_by_email,
            
        ];
        
        return $this->sendResponse($response, 'Future save successfully.');
    }

}