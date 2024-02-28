<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function getAuthenticatedUser(Request $request): JsonResponse
    {
        $user = Auth::user();

        if ($user) {
            return response()->json([
                'id' => $user->id,
                // You can include other user details if needed
            ], 200);
        } else {
            return response()->json([
                'error' => 'Unauthorized'
            ], 401); 
        }
    }
}
